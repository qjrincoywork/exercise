<?php
class Employees extends DB {

    public function getAllEmployees()
    {
        return $this->select("SELECT * FROM `employees`");
    }
    
    public function getEmployee($id)
    {
        return $this->select("SELECT * FROM `employees` WHERE id = :id", [':id' => $id]);
    }

    public function create($values = [])
    {
        return Employees::insert($values);
    }

    public function edit($values = [])
    {
        return Employees::update($values);
    }
    
    public function get()
    {
        return DB::find('employees');
        // return Employees::find();
    }
}
?>