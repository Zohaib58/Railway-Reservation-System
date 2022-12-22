<?php
  include_once 'dbconnection.php';

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

function cancel($ticket_id) {
  // Connect to the database
  $db = new mysqli('localhost', 'username', 'password', 'database');
  
  // Search for a record with a matching ticket ID
  $result = $db->query("SELECT * FROM passenger WHERE ticket_id = '$ticket_id'");
  if ($result->num_rows > 0) {
    // Delete the record from the passenger table
    $db->query("DELETE FROM passenger WHERE ticket_id = '$ticket_id'");
    // Search for the first record with a waiting status for the same train and same category
    $waiting_result = $db->query("SELECT * FROM passenger WHERE status = 'w' AND train_number = (SELECT train_number FROM passenger WHERE ticket_id = '$ticket_id') AND category = (SELECT category FROM passenger WHERE ticket_id = '$ticket_id') LIMIT 1");
    if ($waiting_result->num_rows > 0) {
      $waiting_record = $waiting_result->fetch_assoc();
      // Change the status of the waiting record to confirm
      $db->query("UPDATE passenger SET status = 'c' WHERE ticket_id = '{$waiting_record['ticket_id']}'");
    }
  } else {
    // No record found with the given ticket ID
    echo "No record found with ticket ID: $ticket_id";
  }

  // Close the database connection
  $db->close();
}
?>