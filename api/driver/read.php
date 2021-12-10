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

  // Blog post query
  $result = $driver->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $driver_arr = array();
    // $driver_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $driver_item = array(
        'id' => $id,
        'name' => $name,
        'surname' => $surname,
        'pesel' => $pesel,
        'hourlyRate' => $hourlyRate
      );

      // Push to "data"
      array_push($driver_arr, $driver_item);
      // array_push($driver_arr['data'], $driver_item);
    }

    // Turn to JSON & output
    echo json_encode($driver_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }
