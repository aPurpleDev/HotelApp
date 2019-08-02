<?php

namespace App\Controller;

use Predis\Client;

class BookingCustomer
{
  public $client;
  public $customerdb;
  public $customercollection;

  public $firstname;
  public $lastname;
  public $title;
  public $email;
  public $address;
  public $city;
  public $country;
  public $phone;

  public function __construct($firstname="default",$lastname="default",$title="default",$email="default",$address="default",$city="default",$country="default",$phone="0101")
  {
  if($this->client == null){
    // $this->client = new Client([
    //       'scheme' => 'tcp',
    //       'host'   => '127.0.0.1',
    //       'port'   => 6379,]);
         $this->client = new \MongoDB\Client(
        "mongodb://51.15.217.149:27718/?retryWrites=true&w=majority");

         $this->customerdb = $this->client->ANGSF02_CH;
         $this->customercollection = $this->customerdb->customercollection;
      }

  $this->firstname = $firstname;
  $this->lastname = $lastname;
  $this->title = $title;
  $this->email = $email;
  $this->address = $address;
  $this->city = $city;
  $this->country = $country;
  $this->phone = $phone;

  }

  public function httpGetRequest()
  {
      if($this->client === true){
      $this->client->HGETALL("customerlist");
      }
  }

  public function httpPostRequest()
  {
    if(isset($_POST['submit']))
    {
      $newCustomer = new BookingCustomer($_POST['firstname'],$_POST['lastname'],$_POST['title'],$_POST['email'],$_POST['address'],$_POST['city'],$_POST['country'],$_POST['phone']);
    }
      $newCustomer->saveCustomer();
      //var_dump($newCustomer->findCustomer());
      var_dump($newCustomer->findAllCustomers());
  }

  public function saveCustomer()
  {
    $this->customerdb->customercollection->insertOne($this);
  }

  public function findCustomer()
  {
    return $this->customercollection->findOne($this);
  }

  public function findAllCustomers()
  {
          $customercursor = $this->customercollection->find();
      foreach ( $customercursor as $id => $value )
      {
          echo "$id: ";
          var_dump( $value );
      }
  }

  // public function updateCustomer() //ajoute un object customer dans la BDD Mongo.
  // {
  //   if(is_null(self::$dbclient)){
  //     self::$dbclient = new MongoClient;
  //     $dbcustomer = $dbclient->customer;
  //   }
  //
  //   $customer = array ("firstName" => $this->firstName,
  //       "lastName" => $this->lastName,
  //       "title" => $this->title,
  //       "email" => $this->email,
  //       "address" => $this->address,
  //       "city" => $this->city,
  //       "country" => $this->country,
  //       "phone" => $this->phone);
  //
  //   $dbcustomer->insert($customer);
  //
  //   return self::$dbclient;
  // }
}
