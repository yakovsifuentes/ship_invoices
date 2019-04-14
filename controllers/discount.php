<?php
require '../conections/conection.php';

class Discount{

  public $amount;

  public function __construct($amount){
    $this->amount = $amount;
  }

  public function store(){
    $conn = OpenCon();
    $date_now = date("Y-m-d H:i:s");
    $query = "INSERT INTO discount_ship VALUES(null, $this->amount, '$date_now')";
    $conn->query($query);
    CloseCon($conn);
    header("Location:../views/discount.html");
  }

  public function show(){
    $conn = OpenCon();
    $query = "SELECT * from discount_ship ORDER BY created_at";
    return $conn->query($query);
  }

}

if(isset($_POST['register'])){
    $discount = new Discount($_POST['amount']);
    $discount->store();
}else{

}
