<?php
    /**
     * CustomMail
     * @description Класс для отправки заявок с сайта через функцию php mail()
     * 
     * @author Андрей Тодоровский <1slider1@mail.ru>
     * @require
     * @version 1.0.0
     * 
     * PHP >= 7.4
     */
    class CustomMail {
        /**
         * Массив, содержащий ошибки при попытке отправки заявки
         * 
         * @var array
         */
        private array $errors = [];

        /**
         * Заголовки письма
         * 
         * @var array
         */
        private array $headers = [];

        /**
         * E-mail-адрес отправителя
         * 
         * @var string|null
         */
        public ?string $fromEmail;

        /**
         * Имя отправителя отправителя
         * 
         * @var string|null
         */
        public ?string $fromName;

        /**
         * E-mail-адрес получателя
         * 
         * @var string|null
         */
        public ?string $toEmail;

        /**
         * Тема письма
         * 
         * @var string|null
         */
        public ?string $subject;

        /**
         * Текст письма
         * 
         * @var string|null
         */
        public ?string $body;

        public function __construct() {
            $this->fromEmail = null;
            $this->fromName = null;
            $this->toEmail = null;
            $this->subject = null;
            $this->body = null;
        }

        /**
         * Инициализация заголовков письма
         */
        private function setHeaders():void {
            $this->headers["MIME-Version"] = "1.0";
            $this->headers["Content-Type"] = "text/plain; charset=utf-8";
            $this->headers["X-Mailer"] = "PHP/" . phpversion();
            $this->headers["Date"] = date("r");
            $this->headers["From"] = "\"" . $this->fromName . "\" <" . $this->fromEmail . ">";
        }

        /**
         * Устанавливает отправителя (email-адрес и имя)
         * 
         * @return void
         */
        public function setFrom($email, $name = null): void {
            $this->fromEmail = $email;
            $this->fromName = $name;
        }

        /**
         * Устанавливает получателя (email-адрес и имя)
         * 
         * @param Array $email email-адрес(а) получателя(ей)
         * 
         * @return void
         */
        public function setTo($email): void {
            $this->toEmail = implode(', ', $email);
        }
        
        /**
         * Устанавливает тему письма
         * 
         * @param String $subject Тема письма
         * 
         * @return void
         */
        public function setSubject(string $subject):void {
            $subject = trim($subject);

            if (empty($subject)) {
                $subject = "Заявка с сайта";
            }

            $this->subject = "=?utf8?b?" . $subject . "?=";
        }

        /**
         * Устанавливвает текст письма
         */
        public function setBody(array $data):void {
            foreach($data as $key => $value){
                $value = htmlspecialchars($value);
                switch ($key) {
                    case 'phone':
                    $this->body .= "Номер телефона: $value" . PHP_EOL;
                    break;
                    
                    case 'name':
                    $this->body .= "Имя: $value" . PHP_EOL;
                    break;
                    
                    default:
                    $this->body .= $value . PHP_EOL;
                    break;
                }
            }
        }

        /**
        * Получает все записи об ошибках
        *
        * @return array
        */
        public function getErrors():array {
            return $this->errors;
        }
            
        /**
        * Добавляет новую запись об ошибке в массив ошибок
        *
        * @param string $error Строка, содержащая текст ошибки
        *
        * @return void
        */
        public function pushError(string $error): void {
            $this->errors[] = $error;
        }

        /**
         * Отправляет письмо
         * 
         * @return Bool
         */
        public function sendMail():bool {
            if (empty($this->subject)) {
                $this->pushError('Не установлена тема письма!');
            }
            
            if (empty($this->fromEmail)) {
                $this->pushError('Не назначен отправитель!');
            }
            
            if (empty($this->toEmail)) {
                $this->pushError('Не назначен получатель!');
            }
            
            if (!function_exists('mail')) {
                $this->pushError('Функция mail() отключена на сервере!');
            }
            
            if (count($this->getErrors()) > 0) {
                return false;
            }
            
            $this->setHeaders();
            
            return mail($this->toEmail, $this->subject, $this->body, $this->headers);
        }
    }
?>