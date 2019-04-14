<?php

require '../conections/conection.php';

class Transport{

  public $name;
  public $name_unity;

  public function __construct($name, $name_unity){
    if(isset($name) && isset($name_unity)){
      if(!is_null($name) && !is_null($name_unity)){
        $this->name = $name;
        $this->name_unity = $name_unity;
      }
    }

  }


  public function store(){
    $conn = OpenCon();
    $query = "INSERT INTO means_transport VALUES(null,'$this->name', '$this->name_unity')";
    $insert = $conn->query($query);
    CloseCon($conn);
    header("Location:../views/transport.html");
  }

  public static function show(){
    $conn = OpenCon();
    $query = "SELECT name, name_unity FROM means_transport";
    return $transports = $conn->query($query);
  }

}

if(isset($_POST['register'])){
  $transport = new Transport($_POST['name'], $_POST['name_unity']);
  $transport->store();
}else{
  $transport_show = Transport::show();
}

 ?>
