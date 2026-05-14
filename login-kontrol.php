<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    // Kullanıcı adı e-posta formatında mı kontrolü
    // Şifre kontrolü
    if (empty($user) || empty($pass)) {
        header("Location: login.html?hata=bos");
        exit();
    }

    // Örnek doğrulama: Kullanıcı adı öğrenci numarası formatında olmalı, şifre de öğrenci numarası olmalı.
    if ($user == "b251210014@sakarya.edu.tr" && $pass == "b251210014") {
        echo "<!DOCTYPE html>
        <html lang='tr'>
        <head>
            <meta charset='UTF-8'>
            <title>Hoşgeldiniz</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body class='bg-light text-center' style='padding-top: 100px;'>
            <div class='container'>
                <div class='alert alert-success shadow'>
                    <h2>Hoşgeldiniz \"$pass\"</h2>
                    <p class='mt-3'>Giriş işleminiz başarıyla onaylanmıştır.</p>
                    <a href='index.html' class='btn btn-success mt-3'>Ana Sayfaya Git</a>
                </div>
            </div>
        </body>
        </html>";
    } else {
        // Hatalı girişte kullanıcıyı tekrar login sayfasına yönlendirir
        header("Location: login.html?hata=yanlis");
        exit();
    }
}
?>