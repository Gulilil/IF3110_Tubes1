# IF3110_Pengembangan Aplikasi Berbasis Web

## *Tubes1_Kelompok 8*

## **Table of Contents**
* [Program Description](#program-description)
* [Required Program](#required-program)
* [Installation Guide](#installation-guide)
* [Execution Guide](#execution-guide)
* [Implementation Screenshots](#implementation-screenshots)
* [Progress Report](#progress-report)
* [Workload Distribution](#workload-distribution)

## **Program Description**
**InfoAnimeMasse**, adalah aplikasi berbasis web yang memungkinkan pengguna untuk melacak dan merating serial anime yang mereka tonton. Pengguna dapat mencari serial anime, menambahkannya ke dalam daftar yang mereka miliki, memberi rating, serta memberikan ulasan.

## **Program Requirement**
1. HTML
2. CSS
3. JavaScript
4. PostgreSQL
5. PHP
6. Docker

## **Installation Guide**
1. Clone _repository_ ini dengan menggunakan perintah: 
```
git clone https://gitlab.informatika.org/if3110-2023-01-08/if-3110-tugas-besar-1-wbd.git
```
2. Pastikan komputer Anda telah menginstalasi dan menjalankan aplikasi Docker.
3. Buatlah sebuah file `.env` yang bersesuaian dengan penggunaan (contoh file tersebut dapat dilihat pada `.env.example`).


## **Execution Guide**
1. Jalankan perintah `docker-compose up` pada terminal _directory_ aplikasi web.
```
docker-compose up --build
```
2. Aplikasi web dapat diakses dengan menggunakan browser pada URL `http://localhost:8080`.
3. Aplikasi web dapat dihentikan dengan menjalankan perintah perintah `docker-compose down` pada terminal _directory_ aplikasi web.
```
docker-compose down
```

## **Implementation Screenshots**

### Home Page
<img src='assets/homepage.jpg'>

### Home Page : Responsive
<img src='assets/homepage_responsive.jpg'>

### Anime List Page
<img src='assets/anime_list.jpg'>

### Anime List Page : Responsive
<img src='assets/anime_list_responsive.jpg'>

### Anime Details Page
<img src='assets/anime_details.jpg'>

### Studio List Page
<img src='assets/studio_list.jpg'>

### Studio List Page : Responsive
<img src='assets/studio_list_responsive.jpg'>

### Studio Details Page
<img src='assets/studio_details.jpg'>

### Trailer List Page
<img src='assets/trailer_list.jpg'>

### Trailer List Page : Responsive
<img src='assets/trailer_list_responsive.jpg'>

### Trailer Video Page
<img src='assets/trailer_vid.jpg'>

### Admin Page
<img src='assets/admin.jpg'>

### Profile Page
<img src='assets/profile.jpg'>

### Client Anime List Page
<img src='assets/client_anime_list.jpg'>

### Login Page
<img src='assets/login.jpg'>

### Signup Page
<img src='assets/signup.jpg'>

## **Workload Distribution**
| Name                     | Student ID | Client-side | Server-side |
|--------------------------|------------|-------------|-------------|
| Irfan                    | 10023176   | <ul> <li> Figma design <li> Login Page </ul>  | - |
| Bagas Aryo Seto          | 13521081   |  <ul> <li> Navbar and Footer <li> Home Page <li> Admin Page <li> Anime Detail Page <li> Studio Detail Page </ul> | <ul> <li> Schema design <li> Database Tables Implementation <li> Admin Page: Client CRUD <li> Admin Page: Anime CRUD <li> Admin Page: Studio CRUD </ul>|
| Juan Christopher Santoso | 13521116   | <ul> <li> Anime List Page <li> Studio List Page <li> Trailer Page <li> Profile Page <li> Login Page <li> Signup Page <li> Error Page <li> Client Anime List Page <li> Search, Filter, and Pagination Display <li> Responsive Design </ul> | <ul> <li> All API <li> All Controllers <li> Database Constraints Implementation <li> Data Searching and Seeding Implementation <li> All Models and DB Connection <li> All Routing Mechanism <li> ENV Loader <li> Repository Setup <li> Search Implementation <li> Filter Implementation <li> Pagination Implementation <li> Docker Setup and Implementation  <li> Login and signup authorization <li> AJAX on Signup </ul> |
