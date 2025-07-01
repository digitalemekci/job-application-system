# Laravel 12 İş Başvuru Yönetim Sistemi

Bu proje, Laravel 12 ve Livewire kullanarak geliştirilmiş modern bir iş başvuru platformudur.  
Firma ve admin kullanıcıları için dashboard paneli içerir. Vatandaş başvuru modülü ileride eklenecektir.

---

## 🎯 Özellikler

- Kullanıcı rolleri:
  - **admin:** Tüm firmaların ilanlarını görebilir
  - **company:** Sadece kendi ilanlarını yönetir
  - **citizen:** Başvuru yapar (ileride eklenecek)
- Firma dashboard:
  - İlan listeleme
  - Yeni ilan ekleme
  - İlan düzenleme
  - İlan silme
- Admin dashboard:
  - Tüm ilanları listeleme (CRUD ileride eklenecek)
- Laravel 12 + Livewire 3 altyapısı
- TailwindCSS ile modern UI

---

## 🚀 Kurulum

Projeyi klonladıktan sonra aşağıdaki adımları izleyin:

```bash
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate

Veritabanı ayarlarını .env dosyanızda yapılandırın.

🛠 Veritabanı Migrasyonu

Aşağıdaki komutla tüm tabloları oluşturun:

php artisan migrate

🧑‍💻 Gerekli Kullanıcı Hesapları

İlk kurulumda bir admin ve bir firma hesabı oluşturmanız gerekir.
1️⃣ Admin Hesabı

Terminalde:

php artisan tinker

Tinker konsolunda:

$user = new \App\Models\User();
$user->name = 'Admin Kullanıcı';
$user->email = 'admin@example.com';
$user->password = bcrypt('password'); // güçlü şifre seçin
$user->role = 'admin';
$user->save();

Çıkmak için:

exit

2️⃣ Firma Hesabı

Yine Tinker açın:

php artisan tinker

Tinker konsolunda:

$user = new \App\Models\User();
$user->name = 'Firma 1';
$user->email = 'firma@example.com';
$user->password = bcrypt('password'); // güçlü şifre seçin
$user->role = 'company';
$user->save();

Çıkmak için:

exit

🖥 Panel Adresleri

    Firma Dashboard

        URL: /firma/dashboard

        Giriş: firma@example.com

    Admin Dashboard

        URL: /dashboard

        Giriş: admin@example.com

⚠️ Bilinen Kısıtlamalar ve Notlar

    Sistem şu anda V1 sürümündedir.

    Firma ilan ekleme ve düzenleme işlemleri tek ekranda yapılır.

    İlerleyen sürümlerde ilan ekleme ve düzenleme bağımsız sayfalara taşınacaktır.

    Vatandaş başvuru süreçleri (CV yükleme, başvuru yapma) henüz eklenmemiştir.

    Projede TailwindCSS kullanılmıştır, stil geliştirmesi yapılabilir.

📂 Dizin Yapısı Özet

app/Livewire/Firma/Ilanlar.php
resources/views/livewire/firma/ilanlar.blade.php
app/Livewire/Admin/Ilanlar.php
resources/views/livewire/admin/ilanlar.blade.php
app/Models/JobPost.php
routes/web.php