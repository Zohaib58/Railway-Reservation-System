<?php
  include_once 'dbconnection.php';

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  

  // Select all records from the Train_Status table
  $sql = "SELECT ts.train_number, tl.train_name, ts.train_date, tl.source, tl.destination, (ts.total_ac_seats - ts.booked_ac_seats) aas, 
  tl.ac_fare, (ts.total_general_seats - ts.booked_general_seats) ags, tl.general_fare, ts.wait_seats FROM train_status ts INNER JOIN 
  trainlist tl WHERE ts.train_number = tl.train_number ORDER BY ts.train_date;";
  $result = mysqli_query($conn, $sql);

  // Loop through the results and display them in the table
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["train_number"] . "</td>";
      echo "<td>" . $row["train_name"] . "</td>";
      echo "<td>" . $row["train_date"] . "</td>";
      echo "<td>" . $row["source"] . "</td>";
      echo "<td>" . $row["destination"] . "</td>";
      echo "<td>" . $row["aas"] . "</td>";
      echo "<td>" . $row["ac_fare"] . "</td>";
      echo "<td>" . $row["ags"] . "</td>";
      echo "<td>" . $row["general_fare"] . "</td>";
      echo "<td>" . $row["wait_seats"] . "</td>";
//      echo"<td> <a href='book.php'?train_number=" . $row["train_number"] . "&train_date=" . $row["train_date"] . "'>Book</a></td>";
      echo "<form method='post' action='book.php'>";
      echo "<input type='hidden' name='train_number' value='" . $row["train_number"] . "'>";
      echo "<input type='hidden' name='train_date' value='" . $row["train_date"] . "'>";
      echo "<td><button type='submit' style='width:80px; height:30px; align-self:center;  background-color: #4CAF50;
      color: white;
      font-size:1.2rem;
      margin-left: -25%;
      border: none;
  
      cursor: pointer;'>Book</button></td>";
      echo "</form>";
      
      echo "</tr>";

    }
  } else {
    echo "<tr><td colspan='10'>No trains found</td></tr>";
  }
  
  // Close the connection
  //mysqli_close($conn);
?>