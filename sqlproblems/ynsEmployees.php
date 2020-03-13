<?php
class User 
{
    public function getEmployeesByAge($greaterThan, $lessThan)
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

            $sql = "SELECT e.id, e.first_name, e.last_name, e.middle_name, e.birth_date, e.hire_date,
                           FLOOR(DATEDIFF(CURRENT_DATE, e.birth_date)/365) AS age 
                    FROM employees e 
                    HAVING age < $lessThan 
                    AND age > $greaterThan";
            
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $fetchedData = $stmt->fetchALL(PDO::FETCH_ASSOC);

            return $fetchedData;
        }
        catch(PDOException $e)
        {
            
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
            return $e->getMessage();
        }
    }
}

    $company = new User;
    $greaterThan = 30;
    $lessThan = 40;
    $employees = $company->getEmployeesByAge($greaterThan, $lessThan);
    
    $table = '<table style="width:100%" border=1><tr>';
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
            $table .= "<td>".$value."</td>";
        }
        $table .= "</tr>";
    }
    $table .= "</tbody><table>";
    echo $table;
?>