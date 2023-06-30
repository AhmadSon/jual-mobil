# Kelompok
<body>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Kelas</th>
        </tr>
        <tr>
            <td>Ahmad Syukron</td>
            <td>312110056</td>
            <td>TI.21.A.1</td>
        </tr>
        <tr>
            <td>Abid Husein</td>
            <td>312110031</td>
            <td>TI.21.A.1</td>
        </tr>
        <tr>
            <td>Iman Setiawan</td>
            <td>312110219</td>
            <td>TI.21.A.1</td>
        </tr>
    </table>
</body>

# Langkah Pembuatan
## Langkah 1: Instal CodeIgniter 4

Download dan install CodeIgniter 4 menggunakan Composer dengan cara 
```bash
composer create-project codeigniter4/appstarter jual-mobil -vvv
```
  - <b>create-project</b> adalah perintah untuk membuat proyek baru dengan composer;
  - <b>codeigniter4/appstarter</b> adalah file CI yang akan di-download;
  - <b>jual-mobil</b> adalah nama proyek yang akan kita buat;
  - <b>-vvv</b> berfungsi untuk melihat proses install lebih detail.<p>

Jika belum mempunyai composer anda bisa download di sini [Get Composer](https://getcomposer.org/download/) </p><br>


## Langkah 2: Create the Database
Buat database MySQL untuk aplikasi penjualan mobil, nama database `car_sales_db`<p><br>

1. <b>Customers Table:</b>
```sql
        CREATE TABLE customers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        email VARCHAR(100),
        phone VARCHAR(20),
        address VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
```
<br>

2. <b>Sales Table</b>
```sql
    CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE
    CURRENT_TIMESTAMP
    );
```


3.  Configuration


4. Create Model


5. Create Controller


6. Create Views


7. Routes

