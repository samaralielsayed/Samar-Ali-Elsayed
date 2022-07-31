<?php

namespace App\Database\Models;
use App\Database\Config\Connection;

class Model extends Connection {
    const table = '';
    public function all(array $columns = ['*'],array $filters = [])
    {
        $select = implode(', ',$columns);
        $query = "SELECT {$select} FROM " . static::table;
        if(!empty($filters)){
            $query .= " WHERE";
            foreach($filters AS $index => $filter){
                if($index != 0){
                    $query .= " AND ";
                }
                $query .= " {$filter[0]} {$filter[1]} {$filter[2]}";
            }
        }
        return $this->connect->query($query);
    }
    public function find(int $id)
    {
        $query = "SELECT * FROM " . static::table. " WHERE id = ?";
        $stmt = $this->connect->prepare($query);
        if(! $stmt){
            return false;
        }
        $stmt->bind_param('i',$id);
        $stmt->execute();
        return $stmt->get_result();
    }


}