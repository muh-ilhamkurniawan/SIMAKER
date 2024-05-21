# <p align="center">SIMAKER</p>

## <p align="center">"Sistem Manajemen Keterlambatan Kereta"</p>

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white) ![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white) ![MySQL](https://img.shields.io/badge/mysql-%2300000f.svg?style=for-the-badge&logo=mysql&logoColor=white)

<p>Sistem Manajemen Keterlambatan Kereta adalah sebuah sistem berbasis website untuk memanajemen keterlambatan keberangkatan ataupun kedatangan kereta di Stasiun Kutoarjo. Sistem ini dirancang untuk memudahkan proses pencatatan keterlambatan kereta yang terjadi di Stasiun Kutorajo yang dilakukan oleh petugas PT Kereta Api Indonesia. Data keterlambatan ini dapat berguna sebagai bahan evaluasi dari PT Kereta Api Indonesia untuk menjadikan pelayanan yang lebih baik. Dengan aplikasi ini pengguna dapat menambah, mengedit, serta melihat laporan keterlambatan.</p>
<p>Sistem ini merupakan hasil dari kerja praktek yang telah dilaksanakan di PT Kereta Api Indonesia (Persero) tepatnya di Divisi IT Daop 5 Purwokerto.</p>

## Tampilan Sistem

<div align="center">
    <img width="300" height="150" src="/dokumentasi/dashboard-light.png" alt="SIMAKER Dashboard-light">
    <img width="300" height="150" src="/dokumentasi/dashboard-dark.png" alt="SIMAKER Dashboard-Dark">
    <img width="300" height="150" src="/dokumentasi/login.png" alt="SIMAKER Login">
    <img width="300" height="150" src="/dokumentasi/laporan_keterlambatan.png" alt="SIMAKER Laporan Keterlambatan">
</div>

## Langkah Instalasi

1.  Clone repository ke local machine anda menggunakan perintah git:

    ```bash
    git clone https://https://github.com/muh-ilhamkurniawan/SIMAKER.git
    cd SIMAKER
    ```

2.  Import Database

    Import database sistem yang berada di path `"database\kai_keterlambatan.sql"` pada database dengan nama `kai_keterlambatan`

    Atur Informasi Database dan Server pada file `"koneksi.php"`

3.  Jalankan Program