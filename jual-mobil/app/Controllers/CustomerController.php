<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Controller;

class CustomerController extends Controller
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

    public function edit($id)
    {
        $customerModel = new CustomerModel();
        $data['customer'] = $customerModel->find($id);

        return view('customer/edit', $data);
    }

    public function update($id)
    {
        $customerModel = new CustomerModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone')
        ];

        $customerModel->update($id, $data);

        return redirect()->to('/customer');
    }
}
