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
        // Display the passenger information in a table
        echo "<table>";
        echo "<tr>";
        echo "<th>Ticket ID</th>";
        echo "<th>Train Number</th>";
        echo "<th>Train Date</th>";
        echo "<th>Name</th>";
        echo "<th>Age</th>";
        echo "<th>Gender</th>";
        echo "<th>Address</th>";
        echo "<th>Status</th>";
        echo "<th>Category</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $row['ticket_id'] . "</td>";
        echo "<td>" . $row['train_number'] . "</td>";
        echo "<td>" . $row['booked_date'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['sex'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "</tr>";
        echo "</table>";
// Create a form to pass the ticket_id to the cancel_ticket page
echo "<form method='post' action='cancel_ticket.php'>";
echo "<input type='hidden' name='ticket_id' value='$ticket_id'>";
echo "<input type='submit' value='Cancel Ticket' onclick='return confirm(\"Are you sure you want to cancel your booking?\")'>";
echo "</form>";
    }
}
?>