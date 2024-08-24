
Chat Application
================

Bu proje, Laravel 11 ve Vue.js kullanılarak geliştirilmiş bir chat uygulamasıdır. Proje, gerçek zamanlı mesajlaşma ve kullanıcı yönetimi özellikleri sunar.

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

Lisans
------

Bu proje MIT lisansı altında lisanslanmıştır.
