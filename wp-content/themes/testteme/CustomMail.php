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

        /**
         * Стили для письма
         * 
         * @var array
         */
        private array $styles = [
            "body" => "margin: 0px 0px 0px 0px; padding: 10px 10px 10px 10px; background: #ffffff; color: #000000; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;",
            "a" => "color: #000000; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-decoration: underline;",
            "p" => "color: #000000; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; margin: 0px 0px 10px 0px; padding: 0px 0px 0px 0px;",
            "h1" => "color: #000000; font-family: Arial, sans-serif; font-size: 24px; line-height: 28px; font-weight: bold; margin: 0px 0px 20px 0px; padding: 0px 0px 0px 0px;",
            "h2" => "color: #000000; font-family: Arial, sans-serif; font-size: 22px; line-height: 26px; font-weight: bold; margin: 0px 0px 20px 0px; padding: 0px 0px 0px 0px;",
            "h3" => "color: #000000; font-family: Arial, sans-serif; font-size: 20px; line-height: 24px; font-weight: bold; margin: 0px 0px 20px 0px; padding: 0px 0px 0px 0px;",
            "h4" => "color: #000000; font-family: Arial, sans-serif; font-size: 18px; line-height: 22px; font-weight: bold; margin: 0px 0px 20px 0px; padding: 0px 0px 0px 0px;",
            "h5" => "color: #000000; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; font-weight: bold; margin: 0px 0px 20px 0px; padding: 0px 0px 0px 0px;",
            "h6" => "color: #000000; font-family: Arial, sans-serif; font-size: 14px; line-height: 18px; font-weight: bold; margin: 0px 0px 20px 0px; padding: 0px 0px 0px 0px;",
        ];


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
         * Отправляет письмо
         * 
         * @return Bool
         */
        public function sendMail():string {
            $result = [
                'status' => 'error',
                'errors' => $this->errors,
                'message' => 'Ошибка при отправке',
                'submessage' => 'попробуйте отправить заявку заново'
            ];

            if (empty($this->subject)) {
                $this->errors[] = 'Не установлена тема письма!';
            }

            if (empty($this->fromEmail)) {
                $this->errors[] = 'Не назначен отправитель!';
            }

            if (empty($this->toEmail)) {
                $this->errors[] = 'Не назначен получатель!';
            }

            if (!function_exists('mail')) {
                $this->errors = 'Функция mail() отключена на сервере';
            }

            if (count($this->errors) > 0) {
                $result['errors'] = $this->errors;

                exit(json_encode($result));
            }

            $this->setHeaders();

            if (mail($this->toEmail, $this->subject, $this->body, $this->headers)) {
                $result['status'] = 'success';
                $result['message'] = 'Ваша заявка успешно отправлена';
                $result['submessage'] = 'менеджер свяжется с Вами в ближайшее время';

                exit(json_encode($result));
            }

            return json_encode($result);
        }
    }
?>