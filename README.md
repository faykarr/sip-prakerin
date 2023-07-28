# SIP-Prakerin

<b>Sistem Informasi Prakerin</b>.
<br>
Repository ini berisi proyek SIP-Prakerin (Sistem Informasi Prakerin) yang dikembangkan untuk mempermudah proses manajemen kegiatan magang SMK di UPT Komputer, kampus STMIK Widya Pratama. Sistem ini bertujuan untuk meningkatkan efisiensi dalam mengelola informasi dan memfasilitasi koordinasi antara SMK dan UPT Komputer dalam pelaksanaan kegiatan prakerin.

## Teknologi yang digunakan:

<ul>
  <li> Bahasa Pemrograman : PHP </li>
  <li> Framework          : Codeigniter 4 </li>
  <li> Database           : MySQL </li>
  <li> Frontend           : HTML, CSS, Bootstrap 5 </li>
  <li> Template           : <a href="https://github.com/zuramai/mazer">Mazer Admin Dashboard</a> </li>
</ul>

## Sistem ini sedang dalam pengembangan.

Sistem yang saya buat sedang dalam tahap pengembangan untuk memenuhi tugas mata kuliah Pengembangan Aplikasi Enterprise. Sistem ini hanya bisa dijalankan dengan local development server. Defaultnya adalah localhost:8080. <br>

## Cara Penggunaan

Go to project destination & run `composer install` in terminal to start this project. <br>
Note : `The migration is currently error!, do the importing SQL in database instead of migration.` <br>
`The SQL file is in the SQL directory of this project.` <br>

Cara menjalankan project ini adalah dengan menjalankan perintah `php spark serve` di terminal. <br>

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings. <br>
`Change the configuration in .env to :` <br>
` 1. app.BaseURL = 'domain-name'` <br>
` 2. database.name = 'db_sip-prakerin`

## Server Requirements

MySQL Server extra extension configuration `my.ini` or `my.cnf` is required, some config is: <br>

`[mysqld]` <br>
`1. event_scheduler=ON`

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

## Some Screenshot of the Program

- Master Data SMK view.
  <img src="./public/assets/static/images/bg/master-smk.png"> <br>

- Profile view.
  <img src="./public/assets/static/images/bg/profile-view.png"> <br>

- Manage Account view.
  <img src="./public/assets/static/images/bg/reset-password.png"> <br>
