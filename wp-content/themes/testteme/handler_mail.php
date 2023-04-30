<?php
    header('Content-type: application/json');
    require_once (__DIR__ . '/CustomMail.php');

    if (!empty($_GET) || empty($_POST)) {
        exit();
    }
    
    $subject = $_POST['subject'] ? htmlspecialchars($_POST['subject']) : "Заявка с сайта ";

    $data = [];
    $result = [
        'status' => 'error',
        'errors' => [],
        'errorValidationField' => '',
        'field' => '',
        'message' => 'Ошибка при отправке',
        'submessage' => 'попробуйте отправить заявку заново'
    ];
    
    foreach ($_POST as $key => $value) {
        $data[$key] = validateFieldValue($key, $value);
    }
    
    function validateFieldValue($fieldName, $fieldValue) {
        $fieldValue = trim($fieldValue);
        $error = '';
        
        switch ($fieldName) {
            case 'name':
                if(empty($fieldValue)){
                    break;
                }elseif(!preg_match("/^([а-яА-яЁ]){1,50}/u", $fieldValue)){
                    $error = 'Некорректное имя.';
                }
                break;
            
            case 'phone':
                if(!preg_match("/^((\+7)) (\(\d{3}\)[\- ]?)?[\d\- ]{7,10}$/", $fieldValue)){
                    $error = 'Некорректный номер телефона.';
                }
                break;
            
            default:
                $fieldValue = stripslashes($fieldValue);
                $fieldValue = htmlspecialchars($fieldValue);
                break;
        }
        
        if (!empty($error)) {
            $result['errorValidationField'] = $error;
            $result['field'] = $fieldName;
            
            exit(json_encode($result));
        }
        
        return $fieldValue;
    }

    function compileLogDataOrder(array $data){
        $order = '';
        
        foreach($data as $key => $value){
            switch($key){
                case 'phone':
                    $order .= "Номер телефона: $value" . PHP_EOL;
                    break;
                
                case 'name':
                    $order .= "Имя: $value" . PHP_EOL;
                    break;
                
                default:
                    $order .= $value . PHP_EOL;
                    break;
            }
        }
        
        return $order;
    }
        
    function createLogOrders(string $data){
        $data .= '--------— Заявка от ' . date('d.m.Y H:i:s') . '----------' . PHP_EOL;
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/orders_log.txt', $data, FILE_APPEND);
    }

    define('SITE_NAME', 'Test Job');
    define('SITE_DOMEN', 'test-job.ru');
    define('MAIL_CHARSET', 'utf8');
    define('ADMIN_EMAIL', '1slider1@mail.ru');

    $mail = new CustomMail();
    $mail->setSubject($subject . ' с сайта ' . SITE_DOMEN);
    $mail->setFrom('1slider1@mail.ru', 'Андрей');
    $mail->setTo(['1slider1@mail.ru']);
    $mail->setBody($data);

    if($mail->sendMail()){
        $orderData = compileLogDataOrder($data);
        createLogOrders($orderData);
        
        $result['status'] = 'success';
        $result['message'] = 'Ваша заявка успешно отправлена';
        $result['submessage'] = 'менеджер свяжется с Вами в ближайшее время';
        
        exit(json_encode($result));
    }else{
        $result['errors'] = $mail->getErrors();
        
        exit(json_encode($result));
    }
?>