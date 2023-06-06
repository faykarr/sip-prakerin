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
  <li> Template           : Mazer Admin Dashboard </li>
</ul>

## Sistem ini sedang dalam pengembangan.

Sistem yang saya buat sedang dalam tahap pengembangan untuk memenuhi tugas mata kuliah Pengembangan Aplikasi Enterprise.

## Codeigniter 4

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

The user guide corresponding to the latest version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
