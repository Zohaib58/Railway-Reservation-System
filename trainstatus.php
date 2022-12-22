<?php
  include_once 'dbconnection.php';

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Select all records from the Train_Status table
  $sql = "SELECT * FROM train_status";
  $result = mysqli_query($conn, $sql);

  // Loop through the results and display them in the table
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["train_number"] . "</td>";
      //echo "<td>" . $row["train_name"] . "</td>";
      //echo "<td>" . $row["source"] . "</td>";
      //echo "<td>" . $row["destination"] . "</td>";
      echo "<td>" . $row["train_date"] . "</td>";
      echo "<td>" . $row["total_ac_seats"] . "</td>";
      echo "<td>" . $row["total_general_seats"] . "</td>";
      echo "<td>" . $row["booked_ac_seats"] . "</td>";
      echo "<td>" . $row["booked_general_seats"] . "</td>";
//      echo"<td> <a href='book.php'?train_number=" . $row["train_number"] . "&train_date=" . $row["train_date"] . "'>Book</a></td>";
      echo "<form method='post' action='book.php'>";
      echo "<input type='hidden' name='train_number' value='" . $row["train_number"] . "'>";
      echo "<input type='hidden' name='train_date' value='" . $row["train_date"] . "'>";
      echo "<td><button type='submit'>Book</button></td>";
      echo "</form>";
      
      echo "</tr>";

    }
  } else {
    echo "<tr><td colspan='10'>No trains found</td></tr>";
  }
  
  // Close the connection
  //mysqli_close($conn);
?>