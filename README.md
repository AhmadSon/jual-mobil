# Kelompok
<body>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Kelas</th>
            <th>Contribution</th>
        </tr>
        <tr>
            <td>Ahmad Syukron</td>
            <td>312110056</td>
            <td>TI.21.A.1</td>
            <td>Design User Interface (Front End, HTML dan CSS)</td>
        </tr>
        <tr>
            <td>Abid Husein</td>
            <td>312110031</td>
            <td>TI.21.A.1</td>
            <td>Rancangan Basis Data ERD</td>
        </tr>
        <tr>
            <td>Iman Setiawan</td>
            <td>312110219</td>
            <td>TI.21.A.1</td>
            <td>Publikasi Aplikasi (Web Hosting)</td>
        </tr>
        <tr>
        </tr>
    </table>
</body>
 
## Pembuatan Bersama
* Implementasi kode php menggunakan CodeIgniter 4
* Laporan (Dalam Bentuk toturial Lengkap dengan tahapan hasil eksekusi query) dalam bentuk:<p>
  + README.md
  + Video yang diyoutube

# Daftar Isi

- [Langkah Pembuatan](#langkah-pembuatan)
  - [Langkah 1: Install Codeigniter 4](#langkah-1-instal-codeigniter-4)
  - [Langkah 2: Create ERD](#langkah-2-create-erd)
  - [Langkah 3: Create the Database](#langkah-3-create-the-database)
  - [Langkah 4: Configuration](#langkah-4-configuration)
  - [Langkah 5: Create Model](#langkah-5-create-model)
  - [Langkah 6: Create Controller](#langkah-6-create-controller)
  - [Langkah 7: Create Views](#langkah-7-create-views)
  - [Langkah 8: Routes](#langkah-8-routes)
  - [Membuat Menu LOGIN](#membuat-menu-login)
- [Server DEMO](#server-demo)




## Langkah Pembuatan
### Langkah 1: Instal CodeIgniter 4

Download dan install CodeIgniter 4 menggunakan Composer dengan cara 
```bash
composer create-project codeigniter4/appstarter jual-mobil -vvv
```
  - <b>create-project</b> adalah perintah untuk membuat proyek baru dengan composer;
  - <b>codeigniter4/appstarter</b> adalah file CI yang akan di-download;
  - <b>jual-mobil</b> adalah nama proyek yang akan kita buat;
  - <b>-vvv</b> berfungsi untuk melihat proses install lebih detail.<p>

Jika belum mempunyai composer anda bisa download di sini [Get Composer](https://getcomposer.org/download/) </p><br>

### Langkah 2: Create ERD

<br>


### Langkah 3: Create the Database
Buat database MySQL untuk aplikasi penjualan mobil, nama database `ci4`<p><br>

1. <b>Cars Table:</b>

<br>

2. <b>Customers Table</b>

<br>

3. <b>Salesperson Table</b>

<br>

4. <b>Transaction Table</b>

<br>

5. <b>Users Table</b>

<br>


### Langkah 4: Configuration
<p>Buka file <b>app/Config/Database.php</b> dan konfigurasikan detail koneksi database Anda (misalnya, hostname, username, password, database name).</p>
<br>


### Langkah 5: Create Model
Buat model file <b>app/Models/</b><p>
Disini model yang kita buat ada `CarModel.php`, `CustomerModel.php`, `SalesPersonModel.php`, dan `TransactionModel.php`<p>

* <b>CarModel.php</b>
       
<br>

* <b>CustomerModel.php</b>

        
<br>

* <b>SalesPersonModel.php</b>

        
<br>

* <b>TransactionModel.php</b>

<br>



### Langkah 6: Create Controller
Buat Controller file <b>app/Controllers/</b><p>
Disini model yang kita buat ada `CarsController.php`, `CustomerController.php`, `SalesPersonController.php`, `Home.php`, `Pages.php`, `UserPageController.php`, dan `TransactionController.php`<p>

* <b>CarsController.php</b>

<br>


* <b>CustomerController.php</b>

<br>


* <b>SalesPersonController.php</b>

<br>


* <b>Home.php</b>

<br>


* <b>Pages.php</b>

<br>


* <b>UserPageController.php</b>

<br>


* <b>TransactionController.php</b>

<br>



### Langkah 7: Create Views
* Buat folder `app/Views/cars` dan buat file ini:<p>

  + <b>create.php</b>

<br>


  + <b>edit.php</b>

<br>


  + <b>index.php</b>

<br>


* Buat folder `app/Views/customer` dan buat file ini:<p>

  + <b>create.php</b>

<br>


  + <b>edit.php</b>

<br>


  + <b>index.php</b>

<br>


* Buat folder `app/Views/Layout` dan buat file ini:<p>

  + <b>footer.php</b>

<br>


  + <b>navbar.php</b>

<br>


  + <b>templete.php</b>

<br>


* Buat folder `app/Views/Pages` dan buat file ini:<p>

  + <b>about.php</b>

<br>


  + <b>contact.php</b>

<br>


  + <b>home.php</b>

<br>


* Buat folder `app/Views/sales` dan buat file ini:<p>

  + <b>dashboard.php</b>

<br>


* Buat folder `app/Views/sales-person` dan buat file ini:<p>

  + <b>create.php</b>

<br>


  + <b>edit.php</b>

<br>


  + <b>index.php</b>

<br>


* Buat folder `app/Views/transaction` dan buat file ini:<p>

  + <b>create.php</b>

<br>


  + <b>edit.php</b>

<br>


  + <b>index.php</b>

<br>


* Buat folder `app/Views/user` dan buat file ini:<p>

  + <b>home.php</b>

<br>


  + <b>navbar.php</b>

<br>


  + <b>template.php</b>

<br>

  + <b>vehicle.php</b>

<br>

### Langkah 8: Routes
buka `app/Config/Routes.php` file dan tambahkan routes:<p>


<br>

### Membuat Menu LOGIN

<br>


#  Server DEMO
Untuk mencoba aplikasi ini silahkan klik [DEMO](https:dinkadealer.site) ini<p>
User/Password Admin Page kita user: `admin2100` , password: `Ganteng12345`
