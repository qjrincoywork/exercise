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
        $database = 'spa';
        $charset = 'utf8mb4';
        try 
        {
            $dbh = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT *,
                        CASE
                            WHEN d.start_time <= '05:59:59' THEN CONVERT(CONCAT(DATE_ADD(d.target_date, INTERVAL 1 DAY), ' ', d.start_time), DATETIME)
                            ELSE CONVERT(CONCAT(d.target_date, ' ', d.start_time), DATETIME)
                        END work_schedule
                    FROM therapists t
                    INNER JOIN daily_work_shifts d
                        ON t.id = d.therapist_id
                    ORDER BY work_schedule";
            
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


    $table = '<table style="width:100%" border=1><tr>';
    $header = '';
    
    if(isset($employees[0]))
    {
        foreach ($employees[0] as $eKey => $eVal)
        {
            if($eKey != 'target_date')
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
            if($key != 'target_date')
                $table .= "<td>".$value."</td>";
        }
        $table .= "</tr>";
    }
    $table .= "</tbody><table>";
    echo $table;
?>
    
</body>
</html>