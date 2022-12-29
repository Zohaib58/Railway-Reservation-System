<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" href="./css/style.css">
  
   <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->


  <link href="https://fonts.googleapis.com/css2?family=Poppins:400,600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato:300;400;700&display=swap" rel="stylesheet">

  <title>Railway Reservation System</title>

</head>
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
<link rel="stylesheet" href="./css/style.css">
<section id="intro">
      <h1>Welcome to the Railway Reservation System</h1>
      <p>
        This website allows you to search for trains, book tickets, cancel tickets, and check the status of your
        booking.
      </p>
    </section>
  </main>
  <section id="train-information">
    <table>
      <thead>
        <tr>
          <th>Train Number</th>
          <th>Train Name</th>
          <th>Source</th>
          <th>Destination</th>
          <th>AC Fare</th>
          <th>General Fare</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Include the PHP script to retrieve and display the records from the TrainList table
        include "trainlist.php";
        ?>
      </tbody>
    </table>
</html>