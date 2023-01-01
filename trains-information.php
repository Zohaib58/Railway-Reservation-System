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
          <th>Available Weekdays</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Include the PHP script to retrieve and display the records from the TrainList table
        include "trainlist.php";
        ?>
      </tbody>
    </table>
    <style>
     section {
      
  
  font-family: Arial, sans-serif;
  font-size: 16px;
}

h3{
  margin-top: 1.5%;
  margin-bottom: 1.2%;
}
h3, h5 {
 
  
  margin-left: 12.5%;
}

ol {
  list-style-type: decimal;
  
  margin: 20px 0;
  padding: 0 20px;
  
}

li {
 
  margin: 10px 0;
  margin-left: 13%;
}

      </style>
    <section>
        <h3>How to book Ticket on ZRRS?</h3>
        <ol>
              <p style = "margin-left:12%;">ZRRS Train ticket Booking Video Tutorial - <a href='https://youtu.be/O2rObpPNAjY' rel="noopener"
            target='_blank'>ZRRS Train Ticket Booking</a></p>
          <li>Click on Book Ticket in the nav bar</li>
          <li>A table with information about trains availability would be visible. Search Card can be used to filter the rows</li>
          <li>Click on the Book button against row you want. Train Number and Date would be copied to the next page's booking form </li>
          <li>Enter personal details and select the Train Category</li>
          <li>After entering details click on the Book Ticket button </li>
          <li>Your ticket would be displayed if the booking is completed, otherwise message would be displayed of seat's non availability</li>
        </ol>
      
      </section>

</html>