<?php

namespace App\Controllers;

use App\Models\SalesModel;

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
            'email' => $this->request->getPost('email')
            // Add any additional fields you have in the sales table
        ];

        $salesModel->insert($data);

        return redirect()->to('/sales');
    }

    public function edit($id)
    {
        $salesModel = new SalesModel();
        $data['sale'] = $salesModel->find($id);

        if (empty($data['sale'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Sale not found');
        }

        return view('sales/edit', $data);
    }

    public function update($id)
    {
        $salesModel = new SalesModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email')
            // Add any additional fields you have in the sales table
        ];

        $salesModel->update($id, $data);

        return redirect()->to('/sales');
    }

    public function delete($id)
    {
        $salesModel = new SalesModel();

        $salesModel->delete($id);

        return redirect()->to('/sales');
    }
}
