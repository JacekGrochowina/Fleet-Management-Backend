<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Driver.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $driver = new Driver($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $driver->name = $data->name;
  $driver->surname = $data->surname;
  $driver->pesel = $data->pesel;
  $driver->hourlyRate = $data->hourlyRate;

  // Create post
  if($driver->create()) {
    echo json_encode(
      array('message' => 'Driver Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Driver Not Created')
    );
  }

