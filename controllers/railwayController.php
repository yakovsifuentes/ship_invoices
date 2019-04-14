<?php
require '../conections/conection.php';


class Railway{

  public $price;

  public function __construct($price_railway){
    if(isset($price_railway) && !is_null($price_railway) ){
      $this->price = $price_railway;
    }else{
      header("Location:../views/price.html");
    }
  }

  public function store(){
    $conn = OpenCon();
    $date_now = date("Y-m-d H:i:s");
    $query = "INSERT INTO price_ralway VALUES (null,$this->price, '$date_now')";
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
  $railway = new Railway($_POST['price_railway']);
  $railway->store();
}else{

}
