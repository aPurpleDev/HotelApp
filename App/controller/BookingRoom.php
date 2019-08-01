<?php
Namespace App\Controller;

class BookingRoom
{
  private static $roomdb = null;

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
  }

  public function __contruct($number = 1,$floor = 1,$type = "type",$beds = "beds",$hasAirConditioner = true, $hasTelevision = false, $costPerNight = null, $bookings = array("checkinDate" => "2018-08-01", "checkoutDate" => "2018-08-29","adults" => "1", "children" => "0"))
  {

  $this->number = $number;
  $this->floor = $floor;
  $this->type = $type;
  $this->beds = $beds;
  $this->hasAirConditioner = $hasAirConditioner;
  $this->hasTelevision = $hasTelevision;
  $this->costPerNight = costPerNight;
  $this->bookings = $bookings;
  }
}
