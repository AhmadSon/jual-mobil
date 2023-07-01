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
<br>

3. <b>Vehicles Table</b>
    ```sql
    CREATE TABLE vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(100),
    model VARCHAR(100),
    year INT,
    price DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

    ```
<br>

4. <b>Transactions Table</b>
    ```sql
    CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    vehicle_id INT,
    sales_id INT,
    transaction_date DATE,
    amount DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (vehicle_id) REFERENCES vehicles(id),
    FOREIGN KEY (sales_id) REFERENCES sales(id)
    ) ENGINE=InnoDB;

    ```
<br>

## Langkah 3: Configuration
<p>Buka file <b>app/Config/Database.php</b> dan konfigurasikan detail koneksi database Anda (misalnya, hostname, username, password, database name).</p>
<br>


## Langkah 4: Create Model
Buat model file <b>app/Models/</b><p>
Disini model yang kita buat ada `CarModel.php`, `CustomerModel.php`, `SalesModel.php`, `TransactionModel.php`, dan `VehicleModel.php`<p>

   * <b>CarModel.php</b>
        ```php
        <?php

        namespace App\Models;

        use CodeIgniter\Model;

        class CarModel extends Model
        {
            protected $table = 'cars';
            protected $primaryKey = 'id';
            protected $allowedFields = ['make', 'model', 'price'];
        }
        ```
<br>

* <b>CustomerModel.php</b>
```php
        <?php

        namespace App\Models;

        use CodeIgniter\Model;

        class CustomerModel extends Model
        {
            protected $table = 'customers';
            protected $primaryKey = 'id';
            protected $allowedFields = ['name', 'email', 'phone'];
        }
```
        
<br>

* <b>SalesModel.php</b>
        
<br>

* <b>TransactionModel.php</b>
        ```php
        <?php

        namespace App\Models;

        use CodeIgniter\Model;

        class TransactionModel extends Model
        {
            protected $table = 'transactions';
            protected $primaryKey = 'id';
            protected $allowedFields = ['vehicle_id', 'customer_id', 'sales_id', 'amount', 'transaction_date'];
        }

        ```
<br>

* <b>VehicleModel.php</b>
        
<br>



## Langkah 5: Create Controller


## Langkah 6: Create Views


## Langkah 7: Routes

