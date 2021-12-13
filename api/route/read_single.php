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

  // Get ID
  $route->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get route
  $route->read_single();

  // Create array
  $route_arr = array(
    'id' => $route->id,
    'vehicle' => $route->vehicle,
    'driver' => $route->driver,
    'dateStart' => $route->dateStart,
    'dateFinish' => $route->dateFinish,
    'placeStart' => $route->placeStart,
    'placeFinish' => $route->placeFinish,
    'loadType' => $route->loadType,
    'lengthRoute' => $route->lengthRoute,
    'fuelCosts' => $route->fuelCosts,
    'expeditionTime' => $route->expeditionTime,
    'driverSalary' => $route->driverSalary,
    'profitExpedition' => $route->profitExpedition,
    'incomeExpedition' => $route->incomeExpedition,
    'expensesExpedition' => $route->expensesExpedition,
  );

  // Make JSON
  print_r(json_encode($route_arr));