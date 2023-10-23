<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    include 'env.php';

    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';


    function sendMail($to,$subject,$content){
        global $password;
        try{
            $mail =new PHPMailer(true);
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                     
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'arya.an@somaiya.edu';                     
            $mail->Password   = $password;                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465;     
            
            $mail->setFrom('arya.an@somaiya.edu','Wanderer');
            $mail->addAddress($to,'Customer');
            $mail->isHTML(true);
            
            $mail->Subject=$subject;
            $mail->Body=$content;
            
            if($mail->send()){
                return true;
            }else{
                return false;
            }
        }catch (Exception $e){
            echo "Error in sending mail: ".$mail->ErrorInfo;
            return false;
        }
    }

?>