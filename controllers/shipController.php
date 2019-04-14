<?php
require '../conections/conection.php';

class Ship{

  public $price;

  public function __construct($price){

    if(isset($price)){
      if (!is_null($price)){
        $this->price = $price;
      }
    }
  }

  public function store(){
    $conn = OpenCon();
    $date_now = date("Y-m-d H:i:s");
    $query = "INSERT INTO price_ship VALUES (null,$this->price, '$date_now')";
    $insert = $conn->query($query);
    CloseCon($conn);
    header("Location:../views/price.html");
  }

  public function show(){
    $conn = OpenCon();
    $query = "SELECT price, created_at FROM price_ralway ORDER BY created_at";
    $prices = $conn->query($query);
    CloseCon($conn);
    header("Location:../views/price.html");
  }

}


if(isset($_POST['register'])){
  $ship = new Ship($_POST['price_ship']);
  $ship->store();
}else{

}
