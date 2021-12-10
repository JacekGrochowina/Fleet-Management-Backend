<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Driver.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $driver = new Driver($db);

  // Get ID
  $driver->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get driver
  $driver->read_single();

  // Create array
  $driver_arr = array(
    'id' => $driver->id,
    'name' => $driver->name,
    'surname' => $driver->surname,
    'pesel' => $driver->pesel,
    'hourlyRate' => $driver->hourlyRate
  );

  // Make JSON
  print_r(json_encode($driver_arr));