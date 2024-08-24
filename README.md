
Chat Application
================

Bu proje, Laravel 11, Pusher.js, Bootstrap, Vite ve Vue.js kullanılarak geliştirilmiş bir chat uygulamasıdır. Proje, gerçek zamanlı mesajlaşma ve kullanıcı yönetimi özellikleri sunar.

Ekran görüntülerine göz atabilirsiniz [Ekran Görüntüleri](https://github.com/hasanablak/example-pusher-with-laravel/tree/main/screenshots).

<p align="center">
  <a href="https://github.com/hasanablak/example-pusher-with-laravel/blob/main/screenshots/0.%20ana%20sayfa%20giri%C5%9F%20yok.jpeg?raw=true" target="_blank">
    <img src="https://github.com/hasanablak/example-pusher-with-laravel/blob/main/screenshots/0.%20ana%20sayfa%20giri%C5%9F%20yok.jpeg?raw=true" alt="Ana Sayfa Giriş Yok" style="width: 250px; margin: 10px;" />

  </a>
  <a href="https://github.com/hasanablak/example-pusher-with-laravel/blob/main/screenshots/1.%20giri%C5%9F%20formu.jpeg?raw=true" target="_blank">
    <img src="https://github.com/hasanablak/example-pusher-with-laravel/blob/main/screenshots/1.%20giri%C5%9F%20formu.jpeg?raw=true" alt="Giriş Formu" style="width: 250px; margin: 10px;" />
  </a>
  <a href="https://github.com/hasanablak/example-pusher-with-laravel/blob/main/screenshots/2.%20oda%20se%C3%A7ilmemi%C5%9F.jpeg?raw=true" target="_blank">
    <img src="https://github.com/hasanablak/example-pusher-with-laravel/blob/main/screenshots/2.%20oda%20se%C3%A7ilmemi%C5%9F.jpeg?raw=true" alt="Oda Seçilmemiş" style="width: 250px; margin: 10px;" />
  </a>
</p>
<p align="center">
  <a href="https://github.com/hasanablak/example-pusher-with-laravel/blob/main/screenshots/3.%20oda%20se%C3%A7ildi.jpeg?raw=true" target="_blank">
    <img src="https://github.com/hasanablak/example-pusher-with-laravel/blob/main/screenshots/3.%20oda%20se%C3%A7ildi.jpeg?raw=true" alt="Oda Seçildi" style="width: 250px; margin: 10px;" />
  </a>
  <a href="https://github.com/hasanablak/example-pusher-with-laravel/blob/main/screenshots/4.%20oda%20d%C4%B1%C5%9F%C4%B1ndayken%20bir%20mesaj%20geldi.jpeg?raw=true" target="_blank">
    <img src="https://github.com/hasanablak/example-pusher-with-laravel/blob/main/screenshots/4.%20oda%20d%C4%B1%C5%9F%C4%B1ndayken%20bir%20mesaj%20geldi.jpeg?raw=true" alt="Oda Dışındayken Bir Mesaj Geldi" style="width: 250px; margin: 10px;" />
  </a>
  <a href="https://github.com/hasanablak/example-pusher-with-laravel/blob/main/screenshots/5.%20yeni%20oda%20olu%C5%9Fturma%20formu.jpeg?raw=true" target="_blank">
    <img src="https://github.com/hasanablak/example-pusher-with-laravel/blob/main/screenshots/5.%20yeni%20oda%20olu%C5%9Fturma%20formu.jpeg?raw=true" alt="Yeni Oda Oluşturma Formu" style="width: 250px; margin: 10px;" />
  </a>
</p>




Gereksinimler
-------------

*   **PHP:** 8.3
*   **Laravel:** 11.9
*   **Node.js:** 14.x
*   **Composer:** 2.x
*   **NPM:** 6.x

Kurulum
-------

Projenizi klonladıktan sonra, aşağıdaki adımları takip ederek kurulum yapabilirsiniz.

### 1\. Depoyu Klonlayın

        `git clone https://github.com/kullanici/chat-app.git cd chat-app`
    

### 2\. Composer Paketlerini Kurun

        `composer install`
    

### 3\. NPM Paketlerini Kurun

        `npm install`
    

### 4\. Yapılandırma Ayarlarını Yapın

        `.env.example` dosyasını .env olarak değiştirin

         Not: default olarak sqlite kullanmıştır, eğer mysql ya da başka bir veritabanı istiyorsanız .env'dan değiştirebilirsiniz.
    
### 5\. Pusher.com'dan alacağınız app bilgilerini .env içerisine girin

        PUSHER_APP_ID="" <---- PUSHER.JS APP ID 
        PUSHER_APP_KEY=""  <---- PUSHER.JS APP KEY 
        PUSHER_APP_SECRET=""  <---- PUSHER.JS APP SECRET 
        PUSHER_HOST=
        PUSHER_PORT=443
        PUSHER_SCHEME="https"
        PUSHER_APP_CLUSTER=""  <---- PUSHER.JS CLUSTER 
        
### 6\. Veritabanını Migrasyonla Oluşturun

        `php artisan migrate`
    

### 7\. Varsayılan Kullanıcıları Seed Edin

        `php artisan db:seed`
    

### 8\. Projeyi Geliştirme Ortamında Çalıştırın

        `npm run dev`
    

### 9\. Queue İşlemlerini Başlatın

        `php artisan queue:work`
    

Kullanıcı Giriş Bilgileri
-------------------------

### 1\. Hasan Kullanıcısı

*   **E-posta:** hasan@test.com
*   **Şifre:** password

### 2\. Ümmügülsüm Kullanıcısı

*   **E-posta:** ummugulsum@test.com
*   **Şifre:** password


Debug
-------------------------
### 1\. Telescope
        Proje içerisinde telescope yüklüdür, dilerseniz site-adi.com/telescope adresinden
        anlık olarak faliyetleri görebilirsiniz.
### 2\. PUSHER.JS DEBUG CONSOLE
        Kullanıcı hesabına giriş yapıldıktan sonra pusher.js işlemleri başlatılır, bu logları görmek için
        pusher.js'den ilgili app altında bulunan 'Debug console' sekmesinden yararlanabilirsiniz.

Katkıda Bulunma
---------------

Katkıda bulunmak isterseniz, lütfen bir pull request gönderin veya bir issue açın.


## Özellikler

| Özellik                                                                | Durum     |
|------------------------------------------------------------------------|-----------|
| Giriş / Çıkış                                                           | Yapıldı   |
| Odaya gir çık                                                            | Yapıldı   |
| Mesaj yaz                                                                | Yapıldı   |
| Mesajlarda Pusher.js ile bildirim gönder                               | Yapıldı   |
| Kullanıcı kayıt etme                                                     | Yapılacak |
| Kullanıcı profil düzenleme                                               | Yapılacak |
| Yeni oda oluşturma                                                       | Yapılacak |
| Odaya kullanıcı ekleme                                                   | Yapılacak |
| Kullanıcının odadan çıkması aksiyonu                                     | Yapılacak |
| Odadaki kullanıcıları görme                                              | Yapılacak |
| Odadaki aktif kullanıcıları görme                                        | Yapılacak |
| Admin kullanıcısının bütün odalara erişimi                               | Yapılacak |


Lisans
------

Bu proje MIT lisansı altında lisanslanmıştır.
