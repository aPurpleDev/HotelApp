<?php

namespace App\Controller;

use Predis\Client;

class BookingRoom
{
  public $roomclient;
  public $roomdb;
  public $roomcollection;

  public $pendingroomdb;

  public $number;
  public $floor;
  public $type;
  public $beds;
  public $hasAirConditioner;
  public $hasTelevision;
  public $costPerNight;
  public $bookings = [];

  public function __contruct($number = 1,$floor = 1,$type = "type",$beds = "beds",$hasAirConditioner = true, $hasTelevision = false, $costPerNight = null)
  {
    if($this->roomclient == null)
        {
           $this->roomclient = new \MongoDB\Client(
          "mongodb://51.15.217.149:27718/?retryWrites=true&w=majority");

           $this->roomdb = $this->roomclient->ANGSF02_CH;
           $this->roomcollection = $this->roomdb->roomcollection;
        }


  if($this->pendingroomdb == null){
    $pendingroomdb = new Client([
          'scheme' => 'tcp',
          'host'   => '127.0.0.1',
          'port'   => 6379,
      ]);
    }

  $this->number = $number;
  $this->floor = $floor;
  $this->type = $type;
  $this->beds = $beds;
  $this->hasAirConditioner = $hasAirConditioner;
  $this->hasTelevision = $hasTelevision;
  $this->costPerNight = costPerNight;
  $this->bookings = array(checkinDate => $this->checkinDate, checkoutDate => $this->checkoutDate, adults => $this->adults, children => $this->children);
  }

  public function httpGetRequest()
  {
  }

  public function httpPostRequest()
  {
    if(isset($_POST['submit']))
    {
      $newRoom = new BookingRoom($_POST['number'],$_POST['floor'],$_POST['type'],$_POST['beds'],$_POST['hasAirConditioner'],$_POST['hasTelevision'],$_POST['costPerNight']);
      var_dump($newRoom);
    }

    //$newRoom->pendingBooking();

    return $newRoom;
  }

  public function pendingBooking(){

  $this->pendingroomdb->HSET("pendingreservation",$this->number,json_encode($this));

  }

}
