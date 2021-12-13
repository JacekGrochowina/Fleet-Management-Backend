<?php 
  class Vehicle {
    // DB stuff
    private $conn;
    private $table = 'TBTRA_POJAZDY';

    // Post Properties
    public $id;
    public $brand;
    public $model;
    public $yearManufacture;
    public $vin;
    public $fuelType;
    public $registrationNumber;
    public $avgFuelConsumption;
    public $vehicleType;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Vehicles
    public function read() {
        // Create query
        $query = 'SELECT id, brand, model, yearManufacture, vin, fuelType, registrationNumber, avgFuelConsumption, vehicleType FROM ' . $this->table ;
        
        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // Get Single Vehicle
    public function read_single() {
        // Create query
        $query = 'SELECT id, brand, model, yearManufacture, vin, fuelType, registrationNumber, avgFuelConsumption, vehicleType WHERE p.id = ? LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->id = $row['id'];
        $this->brand = $row['brand'];
        $this->model = $row['model'];
        $this->yearManufacture = $row['yearManufacture'];
        $this->vin = $row['vin'];
        $this->fuelType = $row['fuelType'];
        $this->registrationNumber = $row['registrationNumber'];
        $this->avgFuelConsumption = $row['avgFuelConsumption'];
        $this->vehicleType = $row['vehicleType'];
    }

    // Create Vehicle
    public function create() {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET brand = :brand, model = :model, yearManufacture = :yearManufacture, vin = :vin, fuelType = :fuelType, registrationNumber = :registrationNumber, avgFuelConsumption = :avgFuelConsumption, vehicleType = :vehicleType';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->brand = htmlspecialchars(strip_tags($this->brand));
        $this->model = htmlspecialchars(strip_tags($this->model));
        $this->yearManufacture = htmlspecialchars(strip_tags($this->yearManufacture));
        $this->vin = htmlspecialchars(strip_tags($this->vin));
        $this->fuelType = htmlspecialchars(strip_tags($this->fuelType));
        $this->registrationNumber = htmlspecialchars(strip_tags($this->registrationNumber));
        $this->avgFuelConsumption = htmlspecialchars(strip_tags($this->avgFuelConsumption));
        $this->vehicleType = htmlspecialchars(strip_tags($this->vehicleType));

        // Bind data
        $stmt->bindParam(':brand', $this->brand);
        $stmt->bindParam(':model', $this->model);
        $stmt->bindParam(':yearManufacture', $this->yearManufacture);
        $stmt->bindParam(':vin', $this->vin);
        $stmt->bindParam(':fuelType', $this->fuelType);
        $stmt->bindParam(':registrationNumber', $this->registrationNumber);
        $stmt->bindParam(':avgFuelConsumption', $this->avgFuelConsumption);
        $stmt->bindParam(':vehicleType', $this->vehicleType);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Update Vehicle
    public function update() {
        // Create query
        $query = 'UPDATE ' . $this->table . '
                            SET brand = :brand, model = :model, yearManufacture = :yearManufacture, vin = :vin, fuelType = :fuelType, registrationNumber = :registrationNumber, avgFuelConsumption = :avgFuelConsumption, vehicleType = :vehicleType
                            WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->brand = htmlspecialchars(strip_tags($this->brand));
        $this->model = htmlspecialchars(strip_tags($this->model));
        $this->yearManufacture = htmlspecialchars(strip_tags($this->yearManufacture));
        $this->vin = htmlspecialchars(strip_tags($this->vin));
        $this->fuelType = htmlspecialchars(strip_tags($this->fuelType));
        $this->registrationNumber = htmlspecialchars(strip_tags($this->registrationNumber));
        $this->avgFuelConsumption = htmlspecialchars(strip_tags($this->avgFuelConsumption));
        $this->vehicleType = htmlspecialchars(strip_tags($this->vehicleType));

        // Bind data
        $stmt->bindParam(':brand', $this->brand);
        $stmt->bindParam(':model', $this->model);
        $stmt->bindParam(':yearManufacture', $this->yearManufacture);
        $stmt->bindParam(':vin', $this->vin);
        $stmt->bindParam(':fuelType', $this->fuelType);
        $stmt->bindParam(':registrationNumber', $this->registrationNumber);
        $stmt->bindParam(':avgFuelConsumption', $this->avgFuelConsumption);
        $stmt->bindParam(':vehicleType', $this->vehicleType);
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Delete Vehicle
    public function delete() {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

}