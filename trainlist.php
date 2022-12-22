<?php
include_once 'dbconnection.php';

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Select all records from the TrainList table
  $sql = "SELECT * FROM TrainList";
  $result = mysqli_query($conn, $sql);

  // Loop through the results and display them in the table
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["train_number"] . "</td>";
      echo "<td>" . $row["train_name"] . "</td>";
      echo "<td>" . $row["source"] . "</td>";
      echo "<td>" . $row["destination"] . "</td>";
      echo "<td>" . $row["ac_fare"] . "</td>";
      echo "<td>" . $row["general_fare"] . "</td>";
      echo "</tr>";
    }
  } else {
    echo "<tr><td colspan='6'>No trains found</td></tr>";
  }

  // Close the connection
  //mysqli_close($conn);
?>
