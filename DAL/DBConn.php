<?php
require_once('settings.php');
class Database
{  

    private static $conn  = null;
     
    public static function DB()
    {       
		if (!isset(self::$conn)) {
			
          self::$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
		  self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
           return self::$conn;
    }
}

class tartarus{

  public function getSchedule(){
    $pdo = Database::DB();
    $stmt = $pdo->query('select * 
      from prod_schedule
      order by scheduleDate asc
      ');
   
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function productionSchedule($order){
     $pdo = Database::DB();
    $stmt =$pdo->prepare('select *
      from goods_out
      where order_id = :stmt
     ');
  $stmt->bindValue(':stmt',$order);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function schedule($order,$sku, $qty, $machine, $duration,$scheduleDate){
    $pdo = Database::DB();
    $stmt =$pdo->prepare('insert into
      prod_schedule
      (order_id,sku, qty, machine, duration,scheduleDate)
      values 
      (?,?,?,?,?,?)');
    $stmt->bindValue(1,$order);
    $stmt->bindValue(2,$sku);
    $stmt->bindValue(3,$qty);
    $stmt->bindValue(4,$machine);
    $stmt->bindValue(5,$duration);
    $stmt->bindValue(6,$scheduleDate);
    
    $stmt->execute();
  }
}