# Laravel Simple Blog

## Feature  
1.分前台(blade,alpine.js)、後台(vue.js,jetstream inertia)頁面。  
2.前台會員功能：登入、註冊、忘記密碼、修改個人資料及密碼。  
3.後台會員管理、角色管理、類別管理、標籤管理、文章管理。  
4.前台會員可以發文章及在文章下留言。  
5.通知會員文章有新留言。  
6.後台推送系統通知功能。


## Use
[Laravel](https://laravel.com/)  
[Blade](https://laravel.com/docs/8.x/blade)  
[Jetstream](https://jetstream.laravel.com/2.x/introduction.html)  
[Tailwind css](https://tailwindcss.com/)  
[Alpine js](https://alpinejs.dev/)  
[Vue js](https://vuejs.org/)  
[CKEditor 5](https://ckeditor.com/ckeditor-5/)  


## Install
```sh
$ git clone https://github.com/samchentw/blog.git
$ cp .env.example .env
$ composer install
$ npm install
$ php artisan migrate
$ php artisan db:seed
```
## Unit Test
```sh
$ php artisan test
```