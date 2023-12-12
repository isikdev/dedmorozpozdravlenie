<?php

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$email = $_POST['user_email'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'newyearmail@list.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'JN2WrDnjpJ1s3eNvaPzn'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('newyearmail@list.ru'); // от кого будет уходить письмо?
$mail->addAddress('dedmorozpozdravleniemail@gmail.com');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с сайта';
$mail->Body =
    '<h1>На сайте оставили заявку<br></h1>' .
    '<h3 style="font-size:14px;">Имя этого пользователя:'. '<h3 style="font-size:15px;">' . $name . '</h3>'.'</h3>' .
    '<br><h3 style="font-size:14px;">Почта этого пользователя: ' . '<h3 style="font-size:15px;">' . $email . '</h3>' .'</h3>';
$mail->AltBody = '';

if (!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>