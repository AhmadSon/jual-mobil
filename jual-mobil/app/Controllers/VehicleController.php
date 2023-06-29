<?php

namespace App\Controllers;

use App\Models\VehicleModel;
use CodeIgniter\Controller;

class VehicleController extends Controller
{
    public function index()
    {
        $model = new VehicleModel();
        $data['vehicles'] = $model->getVehicles();

        return view('vehicle/index', $data);
    }

    public function create()
    {
        return view('vehicle/create');
    }

    public function store()
    {
        $model = new VehicleModel();
        $data = [
            'brand' => $this->request->getPost('brand'),
            'model' => $this->request->getPost('model'),
            'year' => $this->request->getPost('year'),
            'price' => $this->request->getPost('price')
        ];
        $model->addVehicle($data);

        return redirect()->to('/vehicle');
    }

    public function edit($id)
    {
        $model = new VehicleModel();
        $data['vehicle'] = $model->getVehicle($id);

        return view('vehicle/edit', $data);
    }

    public function update($id)
    {
        $model = new VehicleModel();
        $data = [
            'brand' => $this->request->getPost('brand'),
            'model' => $this->request->getPost('model'),
            'year' => $this->request->getPost('year'),
            'price' => $this->request->getPost('price')
        ];
        $model->updateVehicle($id, $data);

        return redirect()->to('/vehicle');
    }

    public function delete($id)
    {
        $model = new VehicleModel();
        $model->deleteVehicle($id);

        return redirect()->to('/vehicle');
    }
}
