<!DOCTYPE htm>
<html>
<head>  
    <title>Exercise - ORM Helper</title>  
</head>  
<body>
<?php
  require "database.php";
  require "employees.php";
  $user = new Employees;
//   $user->create(['first_name' => 'Quir', 'last_name' => 'Incoy', 'birth_date' => '1995-12-05', 'department_id' => 4, 'hire_date' => '2020-03-02', 'boss_id' => 1]);
//  $res = $user->edit(['id' => 10, 'first_name' => 'Quir John', 'last_name' => 'Incoy']);
//  if($res) {
//     header( "Location: index.php" );
//     exit;
//  }
  $employees = $user->get();
  // $res = DB::find('employees', null, ['id' => 'DESC']);
  // $res = DB::find('employee_positions', ['id' =>[1,2,3]]);
  // $res = DB::find('employees', ['id' =>[1,2,3]]);
  /* echo "<pre>";
  print_r($user->get());
  die(' index'); */
  // DB::find('employees', ['id' => 1]);
  // $employees= $user->getEmployee(1);
  /* echo "<pre>";
  print_r($employee);
  die('hits'); */   
  $table = '<table style="width:50%" border=1><tr>';
    $header = '';
    
    if(isset($employees[0]))
    {
        foreach ($employees[0] as $eKey => $eVal)
        {
            $header .= "<th>".ucwords(str_replace('_', ' ', $eKey))."</th>";
        }
    }

    $header .= "</tr>";
    $table .= $header;
    $table .= "<tr><tbody>";
    foreach($employees as $key => $employee) 
    {
        foreach ($employee as $key => $value)
        {
            if(!$value)
                $value = "NULL";
                
            $table .= "<td>".$value."</td>";
        }
        $table .= "</tr>";
    }
    $table .= "</tbody><table>";
    echo $table;
?>
</body>
</html>