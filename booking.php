<?php
  include_once 'dbconnection.php';

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }



  // Get the values from the form fields
  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $category = $_POST['category'];
  $address = $_POST['address'];
  $train_number = $_POST['train_number'];
  $train_date = $_POST['train_date'];

  // Do something with the data, such as inserting it into a database or sending an email
  // ...


function bookTicket($trainNumber, $trainDate, $category, $name, $age, $gender, $address)
{
    global $conn;

    // Retrieve the train status record from the database
    $query = "SELECT * FROM Train_Status WHERE train_number = $trainNumber AND train_date = '$trainDate'";
    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) > 0) {
        // There is a record for this train, date, and category
        $row = mysqli_fetch_assoc($result);

        
        if ($category == 'ac') {
            $booked_seats = $row['booked_ac_seats'];
            $total_seats = $row['total_ac_seats'];
        } else {
            $booked_seats = $row['booked_general_seats'];
            $total_seats = $row['total_general_seats'];
        }

        // Check if there are any seats available
        if (($booked_seats < $total_seats) || ($row['wait_seats'] != 0)) {
            // There are seats available, so we can book a ticket

            // Insert the passenger into the database

            if ($booked_seats < $total_seats) {
                $status = 'c';
            } else {
                $status = 'w';
            }

            // Code for implementing change in train_status 
            if ($status == 'c') {
                if ($category == 'ac') {
                    $query = "UPDATE Train_Status SET booked_ac_seats = booked_ac_seats + 1 WHERE train_number = $trainNumber AND train_date = '$trainDate'";
                } else {
                    $query = "UPDATE Train_Status SET booked_general_seats = booked_general_seats + 1 WHERE train_number = $trainNumber AND train_date = '$trainDate'";
                }
                $result = mysqli_query($conn, $query);
            } elseif ($status == 'w') {
                $query = "UPDATE Train_Status SET wait_seats = wait_seats - 1 WHERE train_number = $trainNumber AND train_date = '$trainDate'";
                $result = mysqli_query($conn, $query);
            }
            

            $query = "SELECT MAX(ticket_id) FROM passenger";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    // Get the maximum ticket_id
    $row = mysqli_fetch_assoc($result);
    $max_ticket_id = $row['MAX(ticket_id)'];
    // Increment the maximum ticket_id by 1 to get the new ticket_id for the new passenger
    $ticket_id = $max_ticket_id + 1;
} else {
    // If there are no records in the passenger table, set the ticket_id to 1
    $ticket_id = 1;
}
            
            $query = "INSERT INTO Passenger VALUES ($ticket_id, $trainNumber, '$trainDate', '$name', $age, '$gender','$address', '$status', '$category')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                // Ticket was booked successfully
                return true;
            } else {
                // There was an error booking the ticket
                return "Error booking ticket: " . mysqli_error($conn);
            }
        } else {
            // There are no seats available
            return "Sorry, no seats available in the desired category.";
        }
    } else {
        // There is no record for this train, date, and category
        return "Invalid train number, date, or category.";
    }
}


bookTicket($train_number, $train_date, $category, $name, $age, $gender, $address);
