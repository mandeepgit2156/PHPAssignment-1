<?php
class PizzaOrder {
    // Database credentials
    private $servername = "localhost";
    private $username = "username";
    private $password = "password";
    private $dbname = "pizza_db";
    private $conn;

    // Constructor to establish database connection
    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method to place an order in the database
    public function placeOrder($pizzaType) {
        $sql = "INSERT INTO orders (pizza_type) VALUES ('$pizzaType')";

        if ($this->conn->query($sql) === TRUE) {
            echo "Order placed successfully!";
        } else {
            echo "Error placing order: " . $this->conn->error;
        }
    }

    // Method to close the database connection
    public function closeConnection() {
        $this->conn->close();
    }
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pizzaType = $_POST["pizza_type"];

    // Create an instance of PizzaOrder class
    $order = new PizzaOrder();
    
    // Place the order and handle the database connection
    $order->placeOrder($pizzaType);
    $order->closeConnection();
}
?>
