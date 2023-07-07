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

- [Server DEMO](#server-demo)
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


##  Server DEMO
Untuk mencoba aplikasi ini silahkan klik [DEMO](https:dinkadealer.site) ini<p>
User/Password Admin Page kita user: `admin2100` , password: `Ganteng12345`

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
```sql
CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```
<br>


2. <b>Customers Table</b>
```sql
CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```
<br>


3. <b>Salesperson Table</b>
```sql
CREATE TABLE `salesperson` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```
<br>


4. <b>Transaction Table</b>
```sql
CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `car_id` varchar(255) NOT NULL,
  `salesperson_id` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```
<br>


5. <b>Users Table</b>
```sql
CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```
<br>



### Langkah 4: Configuration
<p>Buka file <b>app/Config/Database.php</b> dan konfigurasikan detail koneksi database Anda (misalnya, hostname, username, password, database name).</p>
<br>


### Langkah 5: Create Model
Buat model file <b>app/Models/</b><p>
Disini model yang kita buat ada `CarModel.php`, `CustomerModel.php`, `SalesPersonModel.php`, dan `TransactionModel.php`<p>

* <b>CarModel.php</b>
```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class CarModel extends Model
{
    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'type', 'price', 'picture', 'description'];

    public function search($keyword)
    {
        return $this->like('name', $keyword)->findAll();
    }
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
    protected $allowedFields = ['name', 'phone_number', 'email', 'address'];
    public function search($keyword)
    {
        return $this->like('name', $keyword)->findAll();
    }
}
```        
<br>


* <b>SalesPersonModel.php</b>
```php
<?php
namespace App\Models;
use CodeIgniter\Model;
class SalesPersonModel extends Model
{
    protected $table = 'salesperson';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'phone_number', 'email'];

    public function search($keyword)
    {
        return $this->like('name', $keyword)->findAll();
    }
}
```     
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
    protected $allowedFields = ['customer_id', 'car_id', 'salesperson_id', 'price'];
    protected $useTimestamps = true; // Enable automatic timestamps

    protected $createdField = 'created_at'; // Specify the created_at field name
    protected $updatedField = 'updated_at'; // Specify the updated_at field name

    public function search($keyword)
    {
        return $this->like('customer_id', $keyword)->findAll();
    }
}
```
<br>



### Langkah 6: Create Controller
Buat Controller file <b>app/Controllers/</b><p>
Disini model yang kita buat ada `CarsController.php`, `CustomerController.php`, `DashboardController.php`, `SalesPersonController.php`, `Home.php`, `Pages.php`, `UserPageController.php`, dan `TransactionController.php`<p>

* <b>CarsController.php</b>
```php
<?php

namespace App\Controllers;

use App\Models\CarModel;
use CodeIgniter\Controller;

class CarsController extends Controller
{
    public function index()
    {
        $carModel = new CarModel();
        $data = [
            'title' => 'Cars List',
            'cars' => $carModel->findAll()
            
        ];

        return view('cars/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Input New Cars'
        ];
        return view('cars/create', $data);
    }

    public function store()
    {

        $filepicture = $this->request->getFile('picture');
        $filepicture->move('car_img');
        $namepicture = $filepicture->getName();

        $carModel = new CarModel();
        $carData = [
            'name' => $this->request->getPost('name'),
            'type' => $this->request->getPost('type'),
            'picture' => $namepicture,
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
        ];

        $carModel->insert($carData);

        return redirect()->to('/car');
    }

    public function edit($id)
    {
        $carModel = new CarModel();
        $data = [
            'title' => 'Edit Cars',
            'car' => $carModel->find($id)
            
        ];
        return view('cars/edit', $data);
    }

    public function update($id)
    {
        $carModel = new CarModel();
        $carData = [
            'name' => $this->request->getPost('name'),
            'type' => $this->request->getPost('type'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
        ];


        $carModel->update($id, $carData);

        return redirect()->to('/car');
    }

    public function delete($id)
    {
        $carModel = new CarModel();
        $carModel->delete($id);

        return redirect()->to('/car');
    }

    public function find()
    {
        $keyword = $this->request->getPost('keyword');
        $carModel = new CarModel();

        $data = [
            'title' => 'Edit Sales Person',
            'cars' => $carModel->search($keyword)
        ];

        return view('cars/index', $data);
    }
}
```
<br>


* <b>CustomerController.php</b>
```php
<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customerModel = new CustomerModel();
        $data = [
            'title' => 'Customer List',
            'customers' => $customerModel->findAll()
            
        ];

        return view('customer/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Customer'
        ];
        return view('customer/create', $data);
    }

    public function store()
    {
        $customerModel = new CustomerModel();

        $data = [
            
            'name' => $this->request->getVar('name'),
            'phone_number' => $this->request->getVar('phone_number'),
            'email' => $this->request->getVar('email'),
            'address' => $this->request->getVar('address')
        ];

        $customerModel->insert($data);

        return redirect()->to('/customer');
    }

    public function edit($id)
    {
        $customerModel = new CustomerModel();
        $data['customer'] = $customerModel->find($id);

        $data = [
            'title' => 'Edit Customer',
            'customer' => $customerModel->find($id)
            
        ];

        return view('customer/edit', $data);
    }

    public function update($id)
    {
        $customerModel = new CustomerModel();

        $data = [
            'name' => $this->request->getVar('name'),
            'phone_number' => $this->request->getVar('phone_number'),
            'email' => $this->request->getVar('email'),
            'address' => $this->request->getVar('address')
        ];

        $customerModel->update($id, $data);

        return redirect()->to('/customer');
    }

    public function delete($id)
    {
        $customerModel = new CustomerModel();
        $customerModel->delete($id);

        return redirect()->to('/customer');
        
    }

    public function find()
    {
        $keyword = $this->request->getPost('keyword');
        $customerModel = new CustomerModel();

        $data = [
            'title' => 'Edit Customer',
            'customers' => $customerModel->search($keyword)
        ];

        return view('customer/index', $data);
    }

}
```
<br>


* <b>DashboardController.php</b>
```php
<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $transactionModel = new TransactionModel();
        $transactions = $transactionModel->findAll();

        $data['prices'] = [];
        $data['dates'] = [];
        $data['title'] = 'Dasboard';

        foreach ($transactions as $transaction) {
            $data['prices'][] = $transaction['price'];
            $data['dates'][] = $transaction['created_at'];
        }

        return view('sales/dashboard', $data);
    }
}
```
<br>


* <b>SalesPersonController.php</b>
```php
<?php

namespace App\Controllers;

use App\Models\SalesPersonModel;
use CodeIgniter\Controller;

class SalesPersonController extends Controller
{

    protected $salesPersonModel;

    public function __construct()
    {
        $this->salesPersonModel = new SalesPersonModel();
    }
    public function index()
    {
        $model = new SalesPersonModel();
        $data = [
            'title' => 'Sales Person List',
            'agents' => $model->findAll()
            
        ];

        return view('sales-person/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Sales Person',
            
        ];
        return view('sales-person/create', $data);
    }

    public function store()
    {
        $model = new SalesPersonModel();

        $agentData = [
            'name' => $this->request->getVar('name'),
            'phone_number' => $this->request->getVar('phone_number'),
            'email' => $this->request->getVar('email')
        ];

        $model->insert($agentData);

        return redirect()->to('/sales-person');
    }

    public function edit($id)
    {
        $model = new SalesPersonModel();
        $data = [
            'title' => 'Edit Sales Person',
            'salesperson' => $model->find($id)
            
        ];

        return view('sales-person/edit', $data);
    }

    public function update($id)
    {
        $model = new SalesPersonModel();

        $agentData = [
            'name' => $this->request->getVar('name'),
            'phone_number' => $this->request->getVar('phone_number'),
            'email' => $this->request->getVar('email')
        ];

        $model->update($id, $agentData);

        return redirect()->to('/sales-person');
    }

    public function delete($id)
    {
        $model = new SalesPersonModel();
        $model->delete($id);

        return redirect()->to('/sales-person');
    }

    public function find()
    {
        $keyword = $this->request->getPost('keyword');
        $salesPersonModel = new SalesPersonModel();

        $data = [
            'title' => 'Edit Sales Person',
            'agents' => $salesPersonModel->search($keyword)
        ];

        return view('sales-person/index', $data);
    }
    
}

```
<br>


* <b>Home.php</b>
```php
<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
}
```
<br>


* <b>Pages.php</b>
```php
<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function home()
    {
        $data = [
            'title' => 'Home Page'
        ];
        echo view('Pages/home', $data);

    }
    public function about()
    { 
        $data = [
            'title' => 'About'
        ];
        echo view('Pages/About', $data);
    }

    public function contact()
    { 
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jalan Bosih',
                    'kota' => 'Bekasi'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jalan Kota',
                    'kota' => 'Jakarta'
                ]
            ]
        ];
        echo view('Pages/contact', $data);
    }


}
```
<br>


* <b>UserPageController.php</b>
```php
<?php

namespace App\Controllers;

use App\Models\CarModel;

class UserPageController extends BaseController
{
    public function index()
    {


        $carModel = new CarModel();
        // Retrieve car data from the database

        $randomPictures = $carModel
            ->select('picture')
            ->orderBy('RAND()')
            ->limit(5)
            ->findAll();

        $cars = $carModel->findAll();

        // Pass the car data to the view
        $data = [
            'cars' => $cars,
            'title' => 'Dinka Dealer',
            'randomPictures' => array_slice($randomPictures, 0, 5),
        ];
        echo view('user/home', $data);
    }

    public function vehicle()
    {

        $carModel = new CarModel();
        $data = [
            'title' => 'Vehicle List',
            'cars' => $carModel->findAll()
        ];

        echo view('user/vehicle', $data);
    }
}
```
<br>


* <b>TransactionController.php</b>
```php
<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\CarModel;
use App\Models\SalesPersonModel;
use App\Models\TransactionModel;

class TransactionController extends BaseController
{
    protected $customerModel;
    protected $carModel;
    protected $salesPersonModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
        $this->carModel = new CarModel();
        $this->salesPersonModel = new SalesPersonModel();
    }

    // Display a list of transactions
    public function index()
    {
        // Assuming you have a TransactionModel.php model, retrieve all transactions
        $transactionModel = new TransactionModel();


        $data = [
            'title' => 'Transaction',
            'transactions' => $transactionModel->findAll()
            
        ];

        return view('transaction/index', $data);
    }

    // Display the create transaction form
    public function create()
    {
        $data['title'] = 'Create Transaction';
        $data['customers'] = $this->customerModel->findAll();
        $data['cars'] = $this->carModel->findAll();
        $data['salespersons'] = $this->salesPersonModel->findAll();
    

        return view('transaction/create', $data);
    }

    // Store the newly created transaction
    public function store()
    {
        // Get the input data
        $customerId = $this->request->getPost('customer_id');
        $carId = $this->request->getPost('car_id');
        $salespersonId = $this->request->getPost('salesperson_id');
        $price = $this->request->getPost('price');
    
        // Store the transaction in the database (you need to create the transaction model)
        $transactionData = [
            'customer_id' => $customerId,
            'car_id' => $carId,
            'salesperson_id' => $salespersonId,
            'price' => $price
        ];
    
        // Assuming you have a TransactionModel.php model, create a new instance and save the data
        $transactionModel = new TransactionModel();
        $transactionModel->insert($transactionData);
    
        // Redirect to the transaction list page or show a success message
        return redirect()->to('/transaction')->with('success', 'Transaction created successfully.');
    }

    // Display the edit transaction form
    public function edit($id)
    {
        $transactionModel = new TransactionModel();
        $data['title'] = 'Edit Data';
        $data['transaction'] = $transactionModel->find($id);
        $data['customers'] = $this->customerModel->findAll();
        $data['cars'] = $this->carModel->findAll();
        $data['salespersons'] = $this->salesPersonModel->findAll();

        return view('transaction/edit', $data);
    }

    // Update the existing transaction
    public function update($id)
    {
        // Get the input data
        $customerId = $this->request->getPost('customer_id');
        $carId = $this->request->getPost('car_id');
        $salespersonId = $this->request->getPost('salesperson_id');
        $price = $this->request->getPost('price');

        // Update the transaction in the database
        $transactionData = [
            'customer_id' => $customerId,
            'car_id' => $carId,
            'salesperson_id' => $salespersonId,
            'price' => $price
        ];

        // Assuming you have a TransactionModel.php model, update the transaction data
        $transactionModel = new TransactionModel();
        $transactionModel->update($id, $transactionData);

        // Redirect to the transaction list page or show a success message
        return redirect()->to('/transaction')->with('success', 'Transaction updated successfully.');
    }

    // Delete a transaction
    public function delete($id)
    {
        // Assuming you have a TransactionModel.php model, delete the transaction
        $transactionModel = new TransactionModel();
        $transactionModel->delete($id);

        // Redirect to the transaction list page or show a success message
        return redirect()->to('/transaction')->with('success', 'Transaction deleted successfully.');
    }

    public function index2()
    {
        $transactionModel = new TransactionModel();

        // Get total sales
        $totalSales = $transactionModel->selectSum('price')->get()->getRowArray()['price'];

        // Calculate profit (10% of total sales)
        $profit = $totalSales * 0.1;

        // Get transactions for the selected month
        $selectedMonth = $this->request->getGet('month');
        $transactions = $transactionModel->where('MONTH(created_at)', $selectedMonth)->findAll();

        // Pass the data to the view
        $data = [
            'totalSales' => $totalSales,
            'profit' => $profit,
            'transactions' => $transactions,
            'title' => 'asd'
        ];

        return view('sales/dashboard', $data);
    }
    public function find()
    {
        $keyword = $this->request->getPost('keyword');
        $transactionModel = new TransactionModel();

        $data = [
            'title' => 'Edit Sales Person',
            'transactions' => $transactionModel->search($keyword)
        ];

        return view('transaction/index', $data);
    }
}
```
<br>



### Langkah 7: Create Views
* Buat folder `app/Views/cars` dan buat file ini:<p>

  + <b>create.php</b>
```php
<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Input New Cars</h1>

            <form method="post" action="/car/store" enctype="multipart/form-data">


                <div class="row mb-3">
                    <label for="name" class="col-sm-2 form-label">Name:</label>
                    <div class="col-sm-5">
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="type" class="col-sm-2 form-label">Tipe</label>
                    <div class="col-sm-5">
                        <input type="type" name="type" id="type" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="picture" class="col-sm-2 form-label">Image</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="file" id="picture" name="picture" required>

                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-sm-2 form-label">Description</label>
                    <div class="col-sm-5">
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="price" class="col-sm-2 form-label">Price</label>
                    <div class="col-sm-5">
                        <input type="number" name="price" id="price" class="form-control" required oninput="formatCurrency(this)">
                        <div id="currency-display" class="form-control" style="border: none; pointer-events: none;"></div>
                    </div>
                    <div class="col-sm-5">
                    </div>
                </div>

                <script>
                    function formatCurrency(input) {
                        const price = input.value;
                        const formattedPrice = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(price);
                        document.getElementById('currency-display').innerText = formattedPrice;
                    }
                </script>



                <button type="submit" class="btn btn-primary">Add Cars</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
```
<br>


  + <b>edit.php</b>
```php
<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Edit Cars Data</h1>
            <form method="post" action="/car/update/<?= $car['id']; ?>" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="name" class="form-label col-sm-2">Name</label>
                    <div class="col-sm-5">
                        <input type="text" name="name" id="name" value="<?= $car['name']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="type" class="form-label col-sm-2">Type</label>
                    <div class="col-sm-5">
                        <input type="type" name="type" id="type" value="<?= $car['type']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-sm-2 form-label">Description</label>
                    <div class="col-sm-5">
                        <textarea name="description" id="description" class="form-control" required><?= $car['description']; ?></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="price" class="form-label col-sm-2">Price</label>
                    <div class="col-sm-5">
                        <input type="type" name="price" id="price" value="<?= $car['price']; ?>" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Cars</button>
            </form>


        </div>
    </div>
</div>

<?= $this->endSection(); ?>
```
<br>


  + <b>index.php</b>
```php
<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <br>
    <div class="d-flex justify-content-center">
        <h1>Cars List</h1>
    </div>


    <div class="d-flex justify-content-between">
        <a class="btn btn-success" href="/car/create">Add New Cars</a>
        <form action="/car/find" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search by name" name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-info" type="submit">Search</button>
                    <a class="btn btn-info" href="/car" role="button">Reset</a>
                </div>
            </div>
        </form>
    </div>

    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success"><?= session('success') ?></div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Name</th>
                <th>Picture</th>
                <th>Type</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $index => $customer) : ?>
                <tr class="text-center">
                    <td tyle="white-space: nowrap;"><?= $index + 1; ?></td>
                    <td tyle="white-space: nowrap;"><?= $customer['name']; ?></td>
                    <td tyle="white-space: nowrap;">

                        <img class="img-fluid" src="/car_img/<?= $customer['picture']; ?>" alt="Car Picture" width="250px">

                    </td>
                    <td tyle="white-space: nowrap;"><?= $customer['type']; ?></td>
                    <td><?= $customer['description']; ?></td>

                    <td style="white-space: nowrap;">Rp <?= number_format($customer['price'], 0, ',', '.'); ?></td>


                    <td style="white-space: nowrap;">
                        <a href="/car/edit/<?= $customer['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="/car/delete/<?= $customer['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>
```
<br>


* Buat folder `app/Views/customer` dan buat file ini:<p>

  + <b>create.php</b>
```php
<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Add New Customer</h1>

            <form method="post" action="/customer/store">


                <div class="row mb-3">
                    <label for="name" class="col-sm-2 form-label">Name:</label>
                    <div class="col-sm-5">
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                </div>




                <div class="row mb-3">
                    <label for="phone_number" class="col-sm-2 form-label">Phone Number:</label>
                    <div class="col-sm-5">
                        <input type="text" name="phone_number" id="phone_number" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-sm-2 form-label">Email:</label>
                    <div class="col-sm-5">
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address" class="col-sm-2 form-label">Address:</label>
                    <div class="col-sm-5">
                        <textarea name="address" id="address" class="form-control" required></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Add Customer</button>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
```
<br>


  + <b>edit.php</b>
```php
<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Edit Customers</h1>
            <form method="post" action="/customer/update/<?= $customer['id']; ?>">
                <div class="row mb-3">
                    <label for="name" class="form-label col-sm-2">Name:</label>
                    <div class="col-sm-5">
                    <input type="text" name="name" id="name" value="<?= $customer['name']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone_number" class="form-label col-sm-2">Phone Number:</label>
                    <div class="col-sm-5">
                    <input type="text" name="phone_number" id="phone_number" value="<?= $customer['phone_number']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="form-label col-sm-2">Email:</label>
                    <div class="col-sm-5">
                    <input type="email" name="email" id="email" value="<?= $customer['email']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address" class="form-label col-sm-2">Address:</label>
                    <div class="col-sm-5">
                    <textarea name="address" id="address" class="form-control" required><?= $customer['address']; ?></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Customer</button>
            </form>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>
```
<br>


  + <b>index.php</b>
```php
<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">


    <br>
    <div class="d-flex justify-content-center">
        <h1>Customer List</h1>
    </div>

    
    <div class="d-flex justify-content-between">
    <a class="btn btn-success" href="/customer/create">Add New Customer</a>
        <form action="/customer/find" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search by name" name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-info" type="submit">Search</button>
                    <a class="btn btn-info" href="/customer" role="button">Reset</a>
                </div>
            </div>
        </form>
    </div>

    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success"><?= session('success') ?></div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $index => $customer) : ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= $customer['name']; ?></td>
                    <td><?= $customer['phone_number']; ?></td>
                    <td><?= $customer['email']; ?></td>
                    <td><?= $customer['address']; ?></td>
                    <td>
                        <a href="/customer/edit/<?= $customer['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="/customer/delete/<?= $customer['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    </table>




</div>
<?= $this->endSection(); ?>
```
<br>


* Buat folder `app/Views/Layout` dan buat file ini:<p>

  + <b>footer.php</b>
```php
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
```
<br>


  + <b>navbar.php</b>
```php
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">
            <a class="navbar-brand" href="/">Dinka Dealer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/sales">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sales-person">Sales Person</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/customer">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/car">Cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/transaction">Transaction</a>
                    </li>
                    
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="logout">Logout</a>
                    </li>
                </ul>

            </div>
        </div>
        
</nav>
```
<br>


  + <b>templete.php</b>
```php
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="/style.css">

    <title> <?= $title; ?> </title>
</head>

<body>

    <?= $this->include('Layout/navbar') ?>

    <?= $this->renderSection('content') ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
```
<br>


* Buat folder `app/Views/Pages` dan buat file ini:<p>

  + <b>about.php</b>
```php
<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
<h1>Iman Setiawan</h1>
<h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, libero. Officiis, impedit, vel commodi assumenda, magnam deserunt non veritatis sunt ducimus modi fugiat sapiente repellendus fugit? Odio facere atque quo.</h2>
</div>

<?= $this->endSection(); ?>
```
<br>


  + <b>contact.php</b>
```php
<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Contact Us</h1>
            <?php foreach ($alamat as $a) : ?>
                <ul>
                    <li><?= $a['tipe']; ?></li>
                    <li><?= $a['alamat']; ?></li>
                    <li><?= $a['kota']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
```
<br>


  + <b>home.php</b>
```php
<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
<h1>Dashbore</h1>


<?= $this->endSection(); ?>
```
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



