
<?php
include 'config/config.php';
$ids = $_GET['id'];
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
$mail->Username = "ahmad.bastian8@gmail.com";
$mail->Password = "W0r3&Tr0j43";
$mail->setFrom('ahmad.bastian8@gmail.com', 'NOFITIFIKASI PEMBAYARAN KURSUS ANTROPOLOGI');
$namaPenerimaEmail  = "$emails";
$mail->addAddress($emails, 'John Doe');
function get_include_contents($filename) {

    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}
$mail->IsHTML(true);    // set email format to HTML
$mail->Subject = "You have an event today";
$mail->Body = get_include_contents('content\invoice.php'); // HTML -> PHP!
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='../index.php?hal=pembayaran/pembayaran' </script>";exit;

}
