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
        header("Location:error.html");

    }
}

?>
<!DOCTYPE html>
<html>
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
    <div class="container">
      <!-- Display the passenger information in a table -->
      <table>
        <thead>
          <tr>
            <th>Ticket ID</th>
            <th>Train Number</th>
            <th>Train Date</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Status</th>
            <th>Category</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $row['ticket_id']; ?></td>
            <td><?php echo $row['train_number']; ?></td>
            <td><?php echo $row['booked_date']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['sex']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['category']; ?></td>
          </tr>
        </tbody>
      </table>
      <!-- Create a form to pass the ticket_id to the cancel_ticket page -->
      <form method="post" action="cancel_ticket.php">
        <input type="hidden" name="ticket_id" value="<?php echo $ticket_id; ?>">
        <input type="submit" value="Cancel Ticket" onclick="return confirm('Are you sure you want to cancel your booking?')">
      </form>
    </div>
  </main>
  <footer>
    <!-- Add your footer content here -->
  </footer>
</body>
</html>

