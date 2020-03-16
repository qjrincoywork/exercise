<?php
class DB {
  private $pdo = null;
  private $stmt = null;
  private $table;

  public function __construct()
  {
    try {
      $this->table = strtolower(get_called_class());
      $this->pdo = new PDO(
        "mysql:host=localhost;dbname=yns;charset=utf8", 
        "root", "vagrant", [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false,
        ]
      );
    } catch (Exception $ex) {
        die($ex->getMessage()); 
    }
  }

  public function __destruct()
  {
    if ($this->stmt!==null) { $this->stmt = null; }
    if ($this->pdo!==null) { $this->pdo = null; }
  }

  public function select($sql, $cond=null)
  {
    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
      $result = $this->stmt->fetchAll();
    } catch (Exception $ex) { 
        die($ex->getMessage()); 
    }

    $this->stmt = null;
    return $result;
  }
  
  public function find($table = null, $where = null, $order = null)
  {
    $sql = "SELECT * FROM `$table` ";
    if($where)
    {
        $sql .= 'WHERE ';
        foreach ($where as $columnName => $value)
        {
            $sql .= $columnName . " ";
            if(is_array($value))
            {
                $values = implode(", ", $value);
                $sql .= "IN ($values)";
            } else {
                $sql .= "= " . $value;
            }
        }
    }

    if($order)
    {
        if(is_array($order))
        {
            $sql .= 'ORDER BY ';
            $count = 1;
            foreach ($order as $columnName => $value) {
                if($count > 1){
                    $sql .= ", ". $columnName ." ". $value;
                } else {
                    $sql .= $columnName ." ". $value;
                }
                $count++;
            }
        } else {
            $sql .= 'ORDER BY ' . $order;
        }
    }
    
    $db = new DB;
    return $db->select($sql);
  }

  public function insert($values = [])
  {
      $ins = [];
      foreach ($values as $field => $v)
          $ins[] = ':' . $field;
          
      $ins = implode(',', $ins);
      $fields = implode(',', array_keys($values));
      $sql = "INSERT INTO $this->table ($fields) VALUES ($ins)";
      try {
        $this->pdo->beginTransaction();
        $sth = $this->pdo->prepare($sql);
        foreach ($values as $f => $v)
        {
            $sth->bindValue(':' . $f, $v);
        }
        $sth->execute();
        $this->pdo->commit();
      } catch (Exception $e) {
        $this->pdo->rollback();
        throw $e;
      }
  }

  public function update($values = [])
  {
    if(isset($values['id'])) {
      $id = $values['id'];
      unset($values['id']);

      $sets = [];
      foreach ($values as $field => $v)
          $sets[] = $field. '=:' . $field;

      $sets = implode(', ', $sets);
      $values['id'] = $id;
      $sql = "UPDATE $this->table SET $sets WHERE id=:id";

      try {
        $this->pdo->beginTransaction();
        $this->pdo->prepare($sql)->execute($values);
        $this->pdo->commit();
      } catch (Exception $e) {
        $this->pdo->rollback();
        throw $e;
      }
    }
  }
}
?>