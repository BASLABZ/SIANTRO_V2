
<?php
include 'config/config.php';
// $ids = $_GET['id'];
// $id = base64_encode($ids);
$emails = $_GET['email'];
date_default_timezone_set('Etc/UTC');
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
// $mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "nsjm.cs@gmail.com";
$mail->Password = "W0r3&Tr0j43";
$mail->setFrom('ahmad.bastian8@gmail.com', 'Aktifasi Akun Member SIANTRO UGM');
$namaPenerimaEmail  = "$emails";
$mail->addAddress($emails, 'ADMIN');
function get_include_contents($filename) {

    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}
$mail->IsHTML(true);    // set email format to HTML
$mail->Subject = "Aktifasi Akun Member SIANTRO UGM";
$mail->Body = get_include_contents('content\invoice.php'); // HTML -> PHP!
// $mail->addAttachment("file/file.txt", "File.txt");
// //Attach an image file
// $mail->addAttachment('imgTes/amanda.jpg');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "<script> alert('Mohon cek email anda untuk mengaktifasi akun SiantroUGM anda.'); location.href='../index.php' </script>";exit;
}
