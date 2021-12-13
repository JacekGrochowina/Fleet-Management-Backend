<?php 
  class Route {
    // DB stuff
    private $conn;
    private $table = 'TBTRA_TRASY';
    private $tableDriver = 'TBTRA_KIEROWCY';
    private $tableVehicle = 'TBTRA_POJAZDY';

    // Post Properties
    public $id;
    public $vehicle;
    public $driver;
    public $dateStart;
    public $dateFinish;
    public $placeStart;
    public $placeFinish;
    public $loadType;
    public $lengthRoute;
    public $fuelCosts;
    public $expeditionTime;
    public $driverSalary;
    public $profitExpedition;
    public $incomeExpedition;
    public $expensesExpedition;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Routes
    public function read() {
        // Create query
        $query = 'SELECT ' . $this->table . '.*, ' . $this->tableDriver . '.*, ' . $this->tableVehicle . '.*' .
            ' FROM ' . $this->table . 
            ' LEFT JOIN ' . $this->tableDriver . 
            ' ON ' . $this->table . '.driver=' . $this->tableDriver . '.id' .
            ' LEFT JOIN ' . $this->tableVehicle . 
            ' ON ' . $this->table . '.vehicle=' . $this->tableVehicle . '.id';
        
        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // Get Single Route
    public function read_single() {
        // Create query
        $query = 'SELECT ' . $this->table . '.* FROM ' . $this->table . ' WHERE p.id = ? LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->id = $row['id'];
        $this->vehicle = $row['vehicle'];
        $this->driver = $row['driver'];
        $this->dateStart = $row['dateStart'];
        $this->dateFinish = $row['dateFinish'];
        $this->placeStart = $row['placeStart'];
        $this->placeFinish = $row['placeFinish'];
        $this->loadType = $row['loadType'];
        $this->lengthRoute = $row['lengthRoute'];
        $this->fuelCosts = $row['fuelCosts'];
        $this->expeditionTime = $row['expeditionTime'];
        $this->driverSalary = $row['driverSalary'];
        $this->profitExpedition = $row['profitExpedition'];
        $this->incomeExpedition = $row['incomeExpedition'];
        $this->expensesExpedition = $row['expensesExpedition'];
    }

    // Create Route
    public function create() {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET vehicle = :vehicle, driver = :driver, dateStart = :dateStart, dateFinish = :dateFinish, placeStart = :placeStart, placeFinish = :placeFinish, loadType = :loadType, lengthRoute = :lengthRoute, fuelCosts = :fuelCosts, expeditionTime = :expeditionTime, driverSalary = :driverSalary, profitExpedition = :profitExpedition, incomeExpedition = :incomeExpedition, expensesExpedition = :expensesExpedition';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->vehicle = htmlspecialchars(strip_tags($this->vehicle));
        $this->driver = htmlspecialchars(strip_tags($this->driver));
        $this->dateStart = htmlspecialchars(strip_tags($this->dateStart));
        $this->dateFinish = htmlspecialchars(strip_tags($this->dateFinish));
        $this->placeStart = htmlspecialchars(strip_tags($this->placeStart));
        $this->placeFinish = htmlspecialchars(strip_tags($this->placeFinish));
        $this->loadType = htmlspecialchars(strip_tags($this->loadType));
        $this->lengthRoute = htmlspecialchars(strip_tags($this->lengthRoute));
        $this->fuelCosts = htmlspecialchars(strip_tags($this->fuelCosts));
        $this->expeditionTime = htmlspecialchars(strip_tags($this->expeditionTime));
        $this->driverSalary = htmlspecialchars(strip_tags($this->driverSalary));
        $this->profitExpedition = htmlspecialchars(strip_tags($this->profitExpedition));
        $this->incomeExpedition = htmlspecialchars(strip_tags($this->incomeExpedition));
        $this->expensesExpedition = htmlspecialchars(strip_tags($this->expensesExpedition));

        // Bind data
        $stmt->bindParam(':vehicle', $this->vehicle);
        $stmt->bindParam(':driver', $this->driver);
        $stmt->bindParam(':dateStart', $this->dateStart);
        $stmt->bindParam(':dateFinish', $this->dateFinish);
        $stmt->bindParam(':placeStart', $this->placeStart);
        $stmt->bindParam(':placeFinish', $this->placeFinish);
        $stmt->bindParam(':loadType', $this->loadType);
        $stmt->bindParam(':lengthRoute', $this->lengthRoute);
        $stmt->bindParam(':fuelCosts', $this->fuelCosts);
        $stmt->bindParam(':expeditionTime', $this->expeditionTime);
        $stmt->bindParam(':driverSalary', $this->driverSalary);
        $stmt->bindParam(':profitExpedition', $this->profitExpedition);
        $stmt->bindParam(':incomeExpedition', $this->incomeExpedition);
        $stmt->bindParam(':expensesExpedition', $this->expensesExpedition);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Update Route
    public function update() {
        // Create query
        $query = 'UPDATE ' . $this->table . '
                            SET vehicle = :vehicle, driver = :driver, dateStart = :dateStart, dateFinish = :dateFinish, placeStart = :placeStart, placeFinish = :placeFinish, loadType = :loadType, lengthRoute = :lengthRoute, fuelCosts = :fuelCosts, expeditionTime = :expeditionTime, driverSalary = :driverSalary, profitExpedition = :profitExpedition, incomeExpedition = :incomeExpedition, expensesExpedition = :expensesExpedition
                            WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->vehicle = htmlspecialchars(strip_tags($this->vehicle));
        $this->driver = htmlspecialchars(strip_tags($this->driver));
        $this->dateStart = htmlspecialchars(strip_tags($this->dateStart));
        $this->dateFinish = htmlspecialchars(strip_tags($this->dateFinish));
        $this->placeStart = htmlspecialchars(strip_tags($this->placeStart));
        $this->placeFinish = htmlspecialchars(strip_tags($this->placeFinish));
        $this->loadType = htmlspecialchars(strip_tags($this->loadType));
        $this->lengthRoute = htmlspecialchars(strip_tags($this->lengthRoute));
        $this->fuelCosts = htmlspecialchars(strip_tags($this->fuelCosts));
        $this->expeditionTime = htmlspecialchars(strip_tags($this->expeditionTime));
        $this->driverSalary = htmlspecialchars(strip_tags($this->driverSalary));
        $this->profitExpedition = htmlspecialchars(strip_tags($this->profitExpedition));
        $this->incomeExpedition = htmlspecialchars(strip_tags($this->incomeExpedition));
        $this->expensesExpedition = htmlspecialchars(strip_tags($this->expensesExpedition));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':vehicle', $this->vehicle);
        $stmt->bindParam(':driver', $this->driver);
        $stmt->bindParam(':dateStart', $this->dateStart);
        $stmt->bindParam(':dateFinish', $this->dateFinish);
        $stmt->bindParam(':placeStart', $this->placeStart);
        $stmt->bindParam(':placeFinish', $this->placeFinish);
        $stmt->bindParam(':loadType', $this->loadType);
        $stmt->bindParam(':lengthRoute', $this->lengthRoute);
        $stmt->bindParam(':fuelCosts', $this->fuelCosts);
        $stmt->bindParam(':expeditionTime', $this->expeditionTime);
        $stmt->bindParam(':driverSalary', $this->driverSalary);
        $stmt->bindParam(':profitExpedition', $this->profitExpedition);
        $stmt->bindParam(':incomeExpedition', $this->incomeExpedition);
        $stmt->bindParam(':expensesExpedition', $this->expensesExpedition);
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Delete Route
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