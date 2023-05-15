<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$adsoyad = $_POST["adsoyad"];
$telefon = $_POST["telefon"];
$eposta = $_POST["eposta"];
$mesaj = $_POST["mesaj"];

$gidenmail = "$adsoyad  $telefon  $eposta  $mesaj";

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tsl';
$mail->Port = 587;
$mail->Host = "smtp.gmail.com";
$mail->CharSet  = 'UTF-8';

$mail->Username = "visioncomhelper@gmail.com";
$mail->Password = /*mail sifrenizi giriniz*/;

$mail->addAddress("metehansozen1907@gmail.com");

$mail->Subject = "Iletisim";
$mail->Body = $gidenmail;

if ($mail->Send())
    echo "<script> alert('Mesajınız Başarı İle İletilmiştir'); window.location.href = 'index.php'; </script>";
else
    echo "<script> alert('HATA: Mesaj Gönderilemedi!'); window.location.href = 'index.php'; </script>";

?>