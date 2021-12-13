<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Vehicle.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $vehicle = new Vehicle($db);

  // Get ID
  $vehicle->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get vehicle
  $vehicle->read_single();

  // Create array
  $vehicle_arr = array(
    'id' => $vehicle->id,
    'brand' => $vehicle->brand,
    'model' => $vehicle->model,
    'yearManufacture' => $vehicle->yearManufacture,
    'vin' => $vehicle->vin,
    'fuelType' => $vehicle->fuelType,
    'registrationNumber' => $vehicle->registrationNumber,
    'avgFuelConsumption' => $vehicle->avgFuelConsumption,
    'vehicleType' => $vehicle->vehicleType,
  );

  // Make JSON
  print_r(json_encode($vehicle_arr));