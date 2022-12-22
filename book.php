<!DOCTYPE html>
<?php
  session_start();

  // Store the train_number and train_date values in a session variable
  if (isset($_POST['train_number'])) {
    $_SESSION['train_number'] = $_POST['train_number'];
  }
  if (isset($_POST['train_date'])) {
    $_SESSION['train_date'] = $_POST['train_date'];
  }
?>

<html>
  <head>
  <title>Booking</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>



  <section id="Book">


  <h1>Book Ticket</h1>
  <form action="booking.php" method="post">
    <label for="name">Name:</label><br>
    <input type="text" name="name" id="name"><br>
    <label for="age">Age:</label><br>
    <input type="date" name="age" id="age"><br>
    <label for="gender">Gender:</label><br>
    Male<input type="radio" name="gender" value="male" id="gender_male"><br>
    <input type="radio" name="gender" value="female" id="gender_female">Female<br>
    <input type="radio" name="gender" value="other" id="gender_other">Other<br>
    <label for="category">Category:</label><br>
    <input type="radio" name="category" value="AC" id="category_AC">AC<br>
    <input type="radio" name="category" value="general" id="category_general">General<br>
    <label for="address">Address:</label><br>
    <input type="text" name="address" id="address"><br>
    
    <input type="text" name="train_number" value="<?php echo $_SESSION['train_number']; ?>" readonly>Train number
<input type="text" name="train_date" value="<?php echo $_SESSION['train_date']; ?>" readonly> Train Date

    <input type="submit" value="Book Ticket">
  </form>
</section>

</body>
</html>

  