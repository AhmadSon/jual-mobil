<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleModel extends Model
{
    protected $table = 'vehicles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['brand', 'model', 'year', 'price'];

    public function getVehicles()
    {
        return $this->findAll();
    }

    public function getVehicle($id)
    {
        return $this->find($id);
    }

    public function addVehicle($data)
    {
        return $this->insert($data);
    }

    public function updateVehicle($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteVehicle($id)
    {
        return $this->delete($id);
    }
}
