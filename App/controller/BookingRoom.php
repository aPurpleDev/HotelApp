<?php

namespace App\Controller;

class BookingRoom
{
  public $pendingroomdb;

  public $number;
  public $floor;
  public $type;
  public $beds;
  public $hasAirConditioner;
  public $hasTelevision;
  public $costPerNight;
  public $bookings = [];

  public function httpGetRequest()
  {
  }

  public function httpPostRequest()
  {
    if(isset($_POST['submit']))
    {
      $newRoom = new BookingRoom($_POST['number'],$_POST['floor'],$_POST['type'],$_POST['beds'],$_POST['hasAirConditioner'],$_POST['hasTelevision'],$_POST['costPerNight']);
    }

    //$newRoom->pendingBooking();

    return $newRoom;
  }

  public function __contruct($number = 1,$floor = 1,$type = "type",$beds = "beds",$hasAirConditioner = true, $hasTelevision = false, $costPerNight = null)
  {

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

  public function pendingBooking(){

  $this->pendingroomdb->HSET("pendingreservation",$this->number,json_encode($this));

  }

}
