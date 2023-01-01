<!DOCTYPE html>
<html>
<head>
  <title>View Ticket</title>
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
  </main>
  <footer>
    <!-- Add your footer content here -->
  </footer>
</body>
</html>

<?php
  include_once 'dbconnection.php';

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }


if (isset($_POST['name']) && $_POST['age'] && $_POST['gender'] && $_POST['category'] && $_POST['address']) {
    // Get the values from the form fields
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = substr($_POST['gender'], 0, 1);
    
    $category = $_POST['category'];
    $address = $_POST['address'];
    $train_number = $_POST['train_number'];
    $train_date = $_POST['train_date'];
} else {
    echo 'hi';
    return "hi";
}
  // Do something with the data, such as inserting it into a database or sending an email
  // ...


function bookTicket($trainNumber, $trainDate, $category, $name, $age, $gender, $address)
{
    global $conn;

    // Retrieve the train status record from the database
    $query = "SELECT * FROM train_status WHERE train_number = $trainNumber AND train_date = '$trainDate'";
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
                    $query = "UPDATE train_status SET booked_ac_seats = booked_ac_seats + 1 WHERE train_number = $trainNumber AND train_date = '$trainDate'";
                } else {
                    $query = "UPDATE train_status SET booked_general_seats = booked_general_seats + 1 WHERE train_number = $trainNumber AND train_date = '$trainDate'";
                }
                $result = mysqli_query($conn, $query);
            } elseif ($status == 'w') {
                $query = "UPDATE train_status SET wait_seats = wait_seats - 1 WHERE train_number = $trainNumber AND train_date = '$trainDate'";
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
            
            $query = "INSERT INTO passenger VALUES ($ticket_id, $trainNumber, '$trainDate', '$name', $age, '$gender','$address', '$status', '$category')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                // Ticket was booked successfully
                ?>
                <html>
                <div class="ticket-container">
  <div class="ticket-header">
    <h4>Booking Completed</h4>
  </div>
  <div class="ticket-body">
    <div class="ticket-info">
      Ticket ID: <?php echo $ticket_id; ?>
      <p id="ticket-id"></p>
      Train Number: <?php echo $trainNumber; ?>
      <p id="train-number"></p>
      Booking Date: <?php echo $trainDate; ?>
      <p id="train-date"></p>
      Name: <?php echo $name; ?>
      <p id="name"></p>
      Age: <?php echo $age; ?>
      <p id="age"></p>
      Gender: <?php   if ($gender == 'O') {
        echo 'Other';
      } elseif ($gender == 'F') {
        echo 'Female';
      } elseif ($gender == 'M') {
        echo 'Male';
      } ?>
      <p id="gender"></p>
      Address: <?php echo $address ?>
      <p id="address"></p>
      Status: <?php if ($status == 'c') {
        echo 'Confirmed';
      } elseif ($status == 'w') {
        echo 'Wait List';
      } ?>
      <p id="status"></p>
      Category: <?php  echo $category == 'general' ? 'General' : 'AC'; ?>
      <p id="category"></p>
    </div>
  </div>

</div>

                </html>
                <?php
                
                
                return true;
            } else {
                // There was an error booking the ticket
                echo "Error booking ticket: " . mysqli_error($conn);
                return "Error booking ticket: " . mysqli_error($conn);
            }
        } else {
            // There are no seats available
            ?>
                <html>
                <div class="error-message">No Seats Available in this Category at the moment.</div>
                <div class="sad-emoji">🙁</div>
                </html>
                <?php
            
            return "Sorry, no seats available in the desired category.";
        }
    } else {
        // There is no record for this train, date, and category
        echo "Invalid train number, date, or category.";
        return "Invalid train number, date, or category.";
    }
}


bookTicket($train_number, $train_date, $category, $name, $age, $gender, $address);
?>