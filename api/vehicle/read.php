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

  // Blog post query
  $result = $vehicle->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $vehicle_arr = array();
    // $vehicle_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $vehicle_item = array(
        'id' => $id,
        'brand' => $brand,
        'model' => $model,
        'yearManufacture' => $yearManufacture,
        'vin' => $vin,
        'fuelType' => $fuelType,
        'registrationNumber' => $registrationNumber,
        'avgFuelConsumption' => $avgFuelConsumption,
        'vehicleType' => $vehicleType,
      );

      // Push to "data"
      array_push($vehicle_arr, $vehicle_item);
      // array_push($vehicle_arr['data'], $vehicle_item);
    }

    // Turn to JSON & output
    echo json_encode($vehicle_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }
