<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\CustomerModel;
use App\Models\VehicleModel;
use App\Models\SalesModel;

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
        $customerModel = new CustomerModel();
        $vehicleModel = new VehicleModel();
        $salesModel = new SalesModel();

        $data['customers'] = $customerModel->findAll();
        $data['vehicles'] = $vehicleModel->findAll();
        $data['sales'] = $salesModel->findAll();

        return view('transaction/create', $data);
    }

    public function store()
    {
        // Retrieve form data
        $customer_id = $this->request->getPost('customer_id');
        $vehicle_id = $this->request->getPost('vehicle_id');
        $transaction_date = $this->request->getPost('transaction_date');
        $amount = $this->request->getPost('amount');

        // Create a new transaction model instance
        $transactionModel = new TransactionModel();

        // Prepare data for insertion
        $data = [
            'customer_id' => $customer_id,
            'vehicle_id' => $vehicle_id,
            'transaction_date' => $transaction_date,
            'amount' => $amount
        ];

        // Insert the transaction data into the database
        $transactionModel->insert($data);

        // Redirect to the transactions index page
        return redirect()->to('transaction');
    }

    public function edit($id)
    {
        $transactionModel = new TransactionModel();
        $customerModel = new CustomerModel();
        $vehicleModel = new VehicleModel();
        $salesModel = new SalesModel();

        $data['transaction'] = $transactionModel->find($id);
        $data['customers'] = $customerModel->findAll();
        $data['vehicles'] = $vehicleModel->findAll();
        $data['sales'] = $salesModel->findAll();

        if (empty($data['transaction'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Transaction not found');
        }

        return view('transaction/edit', $data);
    }

    public function update($id)
    {
        $transactionModel = new TransactionModel();

        $data = [
            'customer_id' => $this->request->getPost('customer_id'),
            'vehicle_id' => $this->request->getPost('vehicle_id'),
            'sales_id' => $this->request->getPost('sales_id'),
            'transaction_date' => $this->request->getPost('transaction_date'),
            'amount' => $this->request->getPost('amount')
            // Add any additional fields you have in the transactions table
        ];

        $transactionModel->update($id, $data);

        return redirect()->to('/transaction');
    }

    public function delete($id)
    {
        $transactionModel = new TransactionModel();

        $transactionModel->delete($id);

        return redirect()->to('/transaction');
    }
}
