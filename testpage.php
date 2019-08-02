<?php

// Chargement de l'autoload de classes de Composer.
require './vendor/autoload.php';

$client = new MongoDB\Client(
    "mongodb+srv://admin:admin@cluster0-be4z9.mongodb.net/test?retryWrites=true&w=majority");

$db = $client->test;

var_dump($db);
