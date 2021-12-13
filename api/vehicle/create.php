<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Vehicle.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $vehicle = new Vehicle($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $vehicle->brand = $data->brand;
  $vehicle->model = $data->model;
  $vehicle->yearManufacture = $data->yearManufacture;
  $vehicle->vin = $data->vin;
  $vehicle->fuelType = $data->fuelType;
  $vehicle->registrationNumber = $data->registrationNumber;
  $vehicle->avgFuelConsumption = $data->avgFuelConsumption;
  $vehicle->vehicleType = $data->vehicleType;

  // Create post
  if($vehicle->create()) {
    echo json_encode(
      array('message' => 'Vehicle Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Vehicle Not Created')
    );
  }

