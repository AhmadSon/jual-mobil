<?php

namespace App\Controllers;

use App\Models\CarModel;
use App\Models\CustomerModel;
use App\Models\SalesModel;
use App\Models\TransactionModel;

class CarController extends BaseController
{
    public function index()
    {
        $carModel = new CarModel();
        $data['cars'] = $carModel->findAll();

        return view('car/index', $data);
    }

    public function create()
    {
        return view('car/create');
    }

    public function store()
    {
        $carModel = new CarModel();

        $data = [
            'make' => $this->request->getPost('make'),
            'model' => $this->request->getPost('model'),
            'price' => $this->request->getPost('price')
        ];

        $carModel->insert($data);

        return redirect()->to('/car');
    }
}

class CustomerController extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();
        $data['customers'] = $customerModel->findAll();

        return view('customer/index', $data);
    }

    public function create()
    {
        return view('customer/create');
    }

    public function store()
    {
        $customerModel = new CustomerModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone')
        ];

        $customerModel->insert($data);

        return redirect()->to('/customer');
    }
}

class SalesController extends BaseController
{
    public function index()
    {
        $salesModel = new SalesModel();
        $data['sales'] = $salesModel->findAll();

        return view('sales/index', $data);
    }

    public function create()
    {
        return view('sales/create');
    }

    public function store()
    {
        $salesModel = new SalesModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone')
        ];

        $salesModel->insert($data);

        return redirect()->to('/sales');
    }
}

class TransactionController extends BaseController
{
    public function index()
    {
        $transactionModel = new TransactionModel();
        $data['transactions'] = $transactionModel->findAll();

        return view('transaction/index', $data);
    }

    public function create()
    {
        $carModel = new CarModel();
        $customerModel = new CustomerModel();
        $salesModel = new SalesModel();

        $data['cars'] = $carModel->findAll();
        $data['customers'] = $customerModel->findAll();
        $data['sales'] = $salesModel->findAll();

        return view('transaction/create', $data);
    }

    public function store()
    {
        $transactionModel = new TransactionModel();

        $data = [
            'car_id' => $this->request->getPost('car_id'),
            'customer_id' => $this->request->getPost('customer_id'),
            'sales_id' => $this->request->getPost('sales_id'),
            'price' => $this->request->getPost('price'),
            'date' => $this->request->getPost('date')
        ];

        $transactionModel->insert($data);

        return redirect()->to('/transaction');
    }
    public function report()
    {
        $transactionModel = new TransactionModel();
        $data['transactions'] = $transactionModel->findAll();

        return view('transaction/report', $data);
    }
}
