# ERP Dashboard

## Install Laravel
 0. wajib punya Git dan akun Github dong wkwk
 1. masukkan ```git clone https://github.com/rafaelvitoadrian/dashboard_erp.git```
 2. Run ```composer update``` pada cmd di folder project. kalo error coba ```composer install --ignore-platform-reqs``` or ```composer update --ignore-platform-reqs```
 3. Copy file .env "cp .env.examples .env" 
 4. Atur file .env (Nama aplikasi, nama db dsb)
 5. Run ```php artisan key:generate```
 6. Run ```php artisan storage:link```
 6. Buat Database sesuai variable .env yang dibuat tadi
 7. Setelah Kalian mengatur .env yang ada jangan lupa untuk menjalankan command berikut
    "php artisan migrate:fresh --seed"
    gunanya untuk merefresh database yang ada dan memberikan seed untuk user login and register (biar bisa di masukin ke dalam table users)
 8. Happy Coding!

## Todo before Develop
 0. ```git pull``` dulu
 1. project ter clone dan sudah update dependecies (composer update)
 2. Wajib buat "BRANCH" baru dan commit pada branch itu (nama branch = nama kalian)
 3. Commit seuai dengan arahan issue (wajib)
 4. Sematkan pesan commit sesuai docs github (agar terhubung dengan issue yang dibuat) (pelajari: https://github.blog/2011-04-09-issues-2-0-the-next-generation/ https://stackoverflow.com/questions/1687262/link-to-the-issue-number-on-github-within-a-commit-message)
 5. Dilarang ikut campur terhadap branch orang lain (ditakutkan terjadi conflict) jika ingin memberi masukkan bisa via issue comment 

## Real Source
Real source in bitbucket : '''https://bitbucket.org/rafaelvito11/dashboard-erp/src/master/'''

## THow To Connect in SSO/OAuth 2.0 this dashbiard : https://github.com/rafaelvitoadrian/erp_kelompok2_client
