<?php

  require '../controllers/controller.php';

  class Invoice{

      public $quantity, $tranport, $name, $cost, $descount, $total;

      public function getData(){
        $collection_transport = array();
        $discount_transport = null;
        $price_ship = null;
        $price_railway = null;


        //get tranport
        $conn = OpenCon();
        $query = "SELECT name, name_unity FROM means_transport";
        $tranports = $conn->query($query);
        array_push($collection_transport, $tranports);

        //get Discount
        $query_discount = "SELECT max(discount) from discount_ship";
        $discount_transport = $conn->query($query_discount);

        //get Price Ship
        $query_price_ship = "SELECT max(price) from price_ship";
        $price_ship = $conn->query($query_price_ship);

        //get Price Railway
        $query_price_railway = "SELECT max(price) from price_ralway";
        $price_railway = $conn->query($query_price_railway);
        CloseCon($conn);
      }

      public function register(){

      }

      public function calculate_discount(){

      }

  }
?>
