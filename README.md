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



