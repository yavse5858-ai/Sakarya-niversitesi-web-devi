<?php
// Sayfaya doğrudan erişim engellenmiş, sadece POST metodu ile veri kabul edilmektedir.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Form elemanlarından gelen veriler değişkenlere atanmıştır.
    $adSoyad  = $_POST['adSoyad']  ?? 'Bilgi Girilmedi';
    $email    = $_POST['email']    ?? 'Bilgi Girilmedi';
    $telefon  = $_POST['telefon']  ?? 'Bilgi Girilmedi';
    $konu     = $_POST['konu']     ?? 'Belirtilmedi';
    $cinsiyet = $_POST['cinsiyet'] ?? 'Belirtilmedi';
    $mesaj    = $_POST['mesaj']    ?? 'Mesaj içeriği boş.';
    
    // KVKK onayı kontrolü
    $kvkkOnay = isset($_POST['kvkk']) ? 'Onaylandı' : 'Onaylanmadı';

    // Verilerin kullanıcıya sunulması için Bootstrap tabanlı bir arayüz oluşturulmuştur.
    echo "<!DOCTYPE html>
    <html lang='tr'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Gönderim Sonucu</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    </head>
    <body class='bg-light'>
        <div class='container py-5'>
            <div class='row justify-content-center'>
                <div class='col-md-8'>
                    <div class='card shadow-lg border-0'>
                        <div class='card-header bg-primary text-white text-center py-3'>
                            <h4 class='mb-0'>Form Gönderim Detayları</h4>
                        </div>
                        <div class='card-body p-4'>
                            <p class='text-muted text-center mb-4'>Aşağıdaki bilgiler tarafımıza başarıyla iletilmiştir.</p>
                            
                            <table class='table table-striped table-hover border'>
                                <thead class='table-dark'>
                                    <tr>
                                        <th scope='col'>Alan</th>
                                        <th scope='col'>İçerik</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td><strong>Ad Soyad:</strong></td><td>$adSoyad</td></tr>
                                    <tr><td><strong>E-posta:</strong></td><td>$email</td></tr>
                                    <tr><td><strong>Telefon:</strong></td><td>$telefon</td></tr>
                                    <tr><td><strong>Konu:</strong></td><td>$konu</td></tr>
                                    <tr><td><strong>Cinsiyet:</strong></td><td>$cinsiyet</td></tr>
                                    <tr><td><strong>Mesaj:</strong></td><td>$mesaj</td></tr>
                                    <tr><td><strong>KVKK Durumu:</strong></td><td><span class='badge bg-info'>$kvkkOnay</span></td></tr>
                                </tbody>
                            </table>

                            <div class='text-center mt-4'>
                                <a href='index.html' class='btn btn-outline-primary px-4'>Ana Sayfaya Dön</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>";

} else {
    // Güvenlik protokolü gereği doğrudan erişimlerde uyarı verilmektedir.
    echo "<div style='text-align:center; margin-top:50px;'>
            <h3>Hata: Bu sayfaya doğrudan erişim izni bulunmamaktadır.</h3>
            <p>Lütfen iletişim formunu kullanarak giriş yapınız.</p>
            <a href='iletisim.html'>İletişim Sayfasına Git</a>
          </div>";
}
?>