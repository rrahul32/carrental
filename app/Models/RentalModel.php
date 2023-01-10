<?php namespace App\Models;

use CodeIgniter\Model;

class RentalModel extends Model{
    protected $table = 'rentals';
    protected $allowedFields = ['car_id', 'customer_id', 'from_date', 'no_of_days', 'rent'];
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