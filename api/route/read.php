<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Route.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $route = new Route($db);

  // Blog post query
  $result = $route->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $route_arr = array();
    // $route_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $route_item = array(
        'id' => $id,
        'vehicle' => array(
          'id' => $id,
          'brand' => $brand,
          'model' => $model,
          'yearManufacture' => $yearManufacture,
          'vin' => $vin,
          'fuelType' => $fuelType,
          'registrationNumber' => $registrationNumber,
          'avgFuelConsumption' => $avgFuelConsumption,
          'vehicleType' => $vehicleType,
        ),
        'driver' => array(
          'id' => $id,
          'name' => $name,
          'surname' => $surname,
          'pesel' => $pesel,
          'hourlyRate' => $hourlyRate
        ),
        'dateStart' => $dateStart,
        'dateFinish' => $dateFinish,
        'placeStart' => $placeStart,
        'placeFinish' => $placeFinish,
        'loadType' => $loadType,
        'lengthRoute' => $lengthRoute,
        'fuelCosts' => $fuelCosts,
        'expeditionTime' => $expeditionTime,
        'driverSalary' => $driverSalary,
        'profitExpedition' => $profitExpedition,
        'incomeExpedition' => $incomeExpedition,
        'expensesExpedition' => $expensesExpedition,
      );

      // Push to "data"
      array_push($route_arr, $route_item);
      // array_push($route_arr['data'], $route_item);
    }

    // Turn to JSON & output
    echo json_encode($route_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }
