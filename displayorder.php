<?php
class PizzaOrder {
    // ... Same as before ...

    // Method to fetch orders from the database
    public function getOrders() {
        $sql = "SELECT * FROM orders";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result; // Return the query result
        } else {
            return false; // Return false if no orders are found
        }
    }
}

// Create an instance of PizzaOrder class
$db = new PizzaOrder();

// Get the list of orders
$result = $db->getOrders();

if ($result !== false) { // Check if there are orders
    while ($row = $result->fetch_assoc()) {
        echo "Pizza Type: " . $row["pizza_type"] . "<br>"; // Display each pizza type
    }
} else {
    echo "No orders yet."; // Display a message if no orders are found
}

$db->closeConnection(); // Close the database connection
?>
