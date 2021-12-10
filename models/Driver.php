<?php 
  class Driver {
    // DB stuff
    private $conn;
    private $table = 'TBTRA_KIEROWCY';

    // Post Properties
    public $id;
    public $name;
    public $surname;
    public $pesel;
    public $hourlyRate;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Drivers
    public function read() {
        // Create query
        $query = 'SELECT id, name, surname, pesel, hourlyRate FROM ' . $this->table ;
        
        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // Get Single Driver
    public function read_single() {
        // Create query
        $query = 'SELECT id, name, surname, pesel, hourlyRate WHERE p.id = ? LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->category_name = $row['id'];
        $this->title = $row['name'];
        $this->body = $row['surname'];
        $this->author = $row['pesel'];
        $this->category_id = $row['hourlyRate'];
    }

    // Create Driver
    public function create() {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET name = :name, surname = :surname, pesel = :pesel, hourlyRate = :hourlyRate';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->surname = htmlspecialchars(strip_tags($this->surname));
        $this->pesel = htmlspecialchars(strip_tags($this->pesel));
        $this->hourlyRate = htmlspecialchars(strip_tags($this->hourlyRate));

        // Bind data
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':surname', $this->surname);
        $stmt->bindParam(':pesel', $this->pesel);
        $stmt->bindParam(':hourlyRate', $this->hourlyRate);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Update Driver
    public function update() {
        // Create query
        $query = 'UPDATE ' . $this->table . '
                            SET name = :name, surname = :surname, pesel = :pesel, hourlyRate = :hourlyRate
                            WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->surname = htmlspecialchars(strip_tags($this->surname));
        $this->pesel = htmlspecialchars(strip_tags($this->pesel));
        $this->hourlyRate = htmlspecialchars(strip_tags($this->hourlyRate));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':surname', $this->surname);
        $stmt->bindParam(':pesel', $this->pesel);
        $stmt->bindParam(':hourlyRate', $this->hourlyRate);
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Delete Driver
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