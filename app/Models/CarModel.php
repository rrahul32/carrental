<?php namespace App\Models;

use CodeIgniter\Model;

class CarModel extends Model{
    protected $table = 'cars';
    protected $allowedFields = ['agency_id', 'model', 'number', 'capacity', 'rent_per_day'];
    // protected $beforeInsert = ['beforeInsert'];
    // protected $beforeUpdate = ['beforeUpdate'];

    // protected function beforeInsert(array $data){

    //     return $data;
    // }
    
    // protected function beforeUpdate(array $data){

    //     return $data;
    // }
}

?>