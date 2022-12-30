<?php

include_once 'dbconnection.php';


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['ticket_id'])) {
    // Get the ticket_id from the form field
    $ticket_id = $_POST['ticket_id'];

    // Retrieve the passenger record from the database
    $query = "SELECT * FROM passenger WHERE ticket_id = $ticket_id";
    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) > 0) {
        // There is a record for this ticket_id
        $row = mysqli_fetch_assoc($result);
    } else {

        header("Location:invalid-ticketid.html");
        

    }
}

?>
<!DOCTYPE html>
<html>
<section id = "view_ticket">
<head>
  <title>View Ticket</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" href="./css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


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
  <div class="ticket-container">
  <div class="ticket-header">
    <h4>Ticket</h4>
  </div>
  <div class="ticket-body">
    <div class="ticket-info">
      <h5>Ticket ID: <?php echo $row['ticket_id']; ?></h5>
      <p id="ticket-id"></p>
      <h5>Train Number: <?php echo $row['train_number']; ?> </h5>
      <p id="train-number"></p>
      <h5>Booking Date: <?php echo $row['booked_date']; ?></h5>
      <p id="train-date"></p>
      <h5>Name: <?php echo $row['name']; ?></h5>
      <p id="name"></p>
      <h5>Age: <?php echo $row['age']; ?></h5>
      <p id="age"></p>
      <h5>Gender: <?php   if ($row['sex'] == 'o') {
        echo 'Others';
      } elseif ($row['sex'] == 'f') {
        echo 'Female';
      } elseif ($row['sex'] == 'm') {
        echo 'Male';
      } ?></h5>
      <p id="gender"></p>
      <h5>Address: <?php echo $row['address']; ?></h5>
      <p id="address"></p>
      <h5>Status: <?php if ($row['status'] == 'c') {
        echo 'Confirmed';
      } elseif ($row['status'] == 'w') {
        echo 'Wait List';
      } ?></h5>
      <p id="status"></p>
      <h5>Category: <?php  echo $row['category'] == 'general' ? 'General' : 'AC'; ?></h5>
      <p id="category"></p>
    </div>
  </div>

</div>


      <!-- Create a form to pass the ticket_id to the cancel_ticket page -->
      <form method="post" action="cancel_ticket.php">
        <input type="hidden" name="ticket_id" value="<?php echo $ticket_id; ?>">
        <div class = "cancelbtn phpButtons ">
            <input type="submit" value="Cancel Ticket" onclick="return confirm('Are you sure you want to cancel your booking?')">
        </div>
      </form>
    </div>
  </main>
</body>
</html>

