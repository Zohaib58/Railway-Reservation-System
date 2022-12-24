<!DOCTYPE html>
<?php
 include_once 'dbconnection.php'
 ?>
<html>
  <head>
    <title>Railway Reservation System</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#search-trains">Search Trains</a></li>
          <li><a href="#book-ticket">Book Ticket</a></li>
          <li><a href="#cancel-ticket">Cancel Ticket</a></li>
          <li><a href="#check-status">Check Status</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <section id="intro">
        <h1>Welcome to the Railway Reservation System</h1>
        <p>
          This website allows you to search for trains, book tickets, cancel tickets, and check the status of your booking.
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
          
    </section>


    <section id="train-status">
    <header>
    <h1>Train Status</h1>
  </header>
  <main>
    <table  class = "table-sortable">
      <thead>
        <tr>
          <th>Train Number</th>
          
          <th>Train Date</th>
          <th>Total AC Seats</th>
          <th>Total General Seats</th>
          <th>Booked AC Seats</th>
          <th>Booked General Seats</th>
          <th>        </th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Include the PHP script to retrieve and display the records from the Train_Status table
          include "trainstatus.php";
        ?>
      </tbody>
      <!-- Add filter inputs for each column -->
<div class="filter">
  <label for="train-number-filter">Train Number:</label>
  <input type="text" id="train-number-filter" onkeyup="filterTable()">
</div>
<div class="filter">
  <label for="train-date-filter">Train Date:</label>
  <input type="text" id="train-date-filter" onkeyup="filterTable()">
</div>
<div class="filter">
  <label for="total-ac-seats-filter">Total AC Seats:</label>
  <input type="text" id="total-ac-seats-filter" onkeyup="filterTable()">
</div>
<div class="filter">
  <label for="total-general-seats-filter">Total General Seats:</label>
  <input type="text" id="total-general-seats-filter" onkeyup="filterTable()">
</div>
<div class="filter">
  <label for="booked-ac-seats-filter">Booked AC Seats:</label>
  <input type="text" id="booked-ac-seats-filter" onkeyup="filterTable()">
</div>
<div class="filter">
  <label for="booked-general-seats-filter">Booked General Seats:</label>
  <input type="text" id="booked-general-seats-filter" onkeyup="filterTable()">
</div>

    </table>
  </main>
  <script src="script.js"></script>
  </section>



  <section id="Book">
  <h1>Book Ticket</h1>
  <form action="book.php" method="post">
    <label for="name">Name:</label><br>
    <input type="text" name="name" id="name"><br>
    <label for="age">Age:</label><br>
    <input type="date" name="age" id="age"><br>
    <label for="gender">Gender:</label><br>
    <input type="radio" name="gender" value="male" id="gender_male">Male<br>
    <input type="radio" name="gender" value="female" id="gender_female">Female<br>
    <input type="radio" name="gender" value="other" id="gender_other">Other<br>
    <label for="category">Category:</label><br>
    <input type="radio" name="category" value="ac" id="category_AC">AC<br>
    <input type="radio" name="category" value="general" id="category_general">General<br>
    <label for="address">Address:</label><br>
    <input type="text" name="address" id="address"><br>
    <input type="hidden" name="train_number" value="<?php echo $_POST['train_number']; ?>" readonly>
    <input type="hidden" name="train_date" value="<?php echo $_POST['train_date']; ?>" readonly>
    <input type="submit" value="Book Ticket">
  </form>
  </section>  



  <h1>View/Cancel Ticket</h1>
  <form action="view_ticket.php" method="post">
    <label for="ticket_id">Ticket ID:</label><br>
    <input type="text" name="ticket_id" id="ticket_id"><br>
    <input type="submit" value="View Ticket">
  </form>
</body>
</html>

  