<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:400,600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato:300;400;700&display=swap" rel="stylesheet">


</head>
<body>
  <header>
    <nav>
      <div class="container flex items-center justify-center">
        <div class="left flex items-center">
          <!--Logo and links -->
          <div class="branding">
            <img src="./images/logo.svg" alt="">
          </div>
          <div>
            <a href="index.php">Home</a>
            <a href="trains-information.php">Trains Information</a>
            <a href="view-cancel-tickets.php">View or Cancel Ticket</a>
          </div>
        </div>
        <div class="right">
          <!--Contact Button -->
          <a href="trains-status.php"><button class="btn-nb btn-nb-primary">Book Ticket</button></a>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <!-- Display the error message and sad emoji -->
    <div class="error-message">We have successfully cancelled your booking!</div>
    <div class="sad-emoji"></div>
  </main>
</body>
</html>

<?php
include_once 'dbconnection.php';

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$ticket_id = $_POST['ticket_id'];

function cancel($ticket_id)
{
  // Retrieve the passenger record from the database
  global $conn;
  $query = "SELECT * FROM passenger WHERE ticket_id = $ticket_id";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    // There is a record for this ticket_id
    $row = mysqli_fetch_assoc($result);
    // Delete the record from the passenger table
    $query = "DELETE FROM passenger WHERE ticket_id = $ticket_id";
    mysqli_query($conn, $query);

    // Search for the first record with a waiting status for the same train and same category
    $query = "SELECT * FROM passenger WHERE status = 'w' AND train_number = {$row['train_number']} AND category = '{$row['category']}' LIMIT 1";
    $waiting_result = mysqli_query($conn, $query);
    if (mysqli_num_rows($waiting_result) > 0) {
      $waiting_record = mysqli_fetch_assoc($waiting_result);
      // Change the status of the waiting record to confirm
      $query = "UPDATE passenger SET status = 'c' WHERE ticket_id = {$waiting_record['ticket_id']}";
      mysqli_query($conn, $query);

      //train_status - wait_seats
      $query = "SELECT * FROM train_status WHERE train_number = {$row['train_number']} AND train_date = '{$row['booked_date']}'";
      $train_result = mysqli_query($conn, $query);
      if (mysqli_num_rows($train_result) > 0) {
        $train_row = mysqli_fetch_assoc($train_result);
        $wait_seats = $train_row['wait_seats'] + 1;
        $query = "UPDATE train_status SET wait_seats = $wait_seats WHERE train_number = {$row['train_number']} AND train_date = '{$row['booked_date']}'";
        mysqli_query($conn, $query);

      }

      // train_status - wait_seats
    } else {
      // Update the train_status table
      $query = "SELECT * FROM train_status WHERE train_number = {$row['train_number']} AND train_date = '{$row['booked_date']}'";
      $train_result = mysqli_query($conn, $query);
      if (mysqli_num_rows($train_result) > 0) {
        // Update the booked seats in the train_status table
        $train_row = mysqli_fetch_assoc($train_result);
        if ($row['category'] == 'AC') {
          $booked_ac_seats = $train_row['booked_ac_seats'] - 1;
          $query = "UPDATE train_status SET booked_ac_seats = $booked_ac_seats WHERE train_number = {$row['train_number']} AND train_date = '{$row['booked_date']}'";
          mysqli_query($conn, $query);
        } else {
          $booked_general_seats = $train_row['booked_general_seats'] - 1;
          $query = "UPDATE train_status SET booked_general_seats = $booked_general_seats WHERE train_number = {$row['train_number']} AND train_date = '{$row['booked_date']}'";
          mysqli_query($conn, $query);
        }
      }
    }
  } else {
    // No record found with the given ticket ID
    return "No record found with ticket ID: $ticket_id";
  }
}
cancel($ticket_id);
?>