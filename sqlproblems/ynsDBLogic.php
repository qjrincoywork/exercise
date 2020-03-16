<!DOCTYPE html>
<html>
<head>  
    <title>Exercise - SQL Problems</title>  
</head>
<body>
    <a href="ynsEmployees.php">Employees By Age</a></br>
    <a href="ynsSpa.php">Sort Therapists Schedule</a></br>
    <a href="ynsPositions.php">Get Employee Details and Positions</a></br>
    <a href="ynsDBLogic.php">Query Logic</a></br>
<?php
class User 
{
    public function getEmployeesPosition()
    {
        $hostname='127.0.0.1';
        $username='root';
        $password='vagrant';
        $database = 'yns';
        $charset = 'utf8mb4';
        try 
        {
            $dbh = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM logic_table l 
                    WHERE l.id IS NOT NULL 
                    ORDER BY l.parent_id , l.id";
            
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $fetchedData = $stmt->fetchALL(PDO::FETCH_ASSOC);

            return $fetchedData;
        }
        catch(PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}

    $company = new User;
    $employees = $company->getEmployeesPosition();


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