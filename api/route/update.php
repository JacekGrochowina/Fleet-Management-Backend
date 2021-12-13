<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/Route.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $route = new Route($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $route->id = $data->id;

  $route->vehicle = $data->vehicle;
  $route->driver = $data->driver;
  $route->dateStart = $data->dateStart;
  $route->dateFinish = $data->dateFinish;
  $route->placeStart = $data->placeStart;
  $route->placeFinish = $data->placeFinish;
  $route->loadType = $data->loadType;
  $route->lengthRoute = $data->lengthRoute;
  $route->fuelCosts = $data->fuelCosts;
  $route->expeditionTime = $data->expeditionTime;
  $route->driverSalary = $data->driverSalary;
  $route->profitExpedition = $data->profitExpedition;
  $route->incomeExpedition = $data->incomeExpedition;
  $route->expensesExpedition = $data->expensesExpedition;

  // Update route
  if($route->update()) {
    echo json_encode(
      array('message' => 'Route Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Route Not Updated')
    );
  }

