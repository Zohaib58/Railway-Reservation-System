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


$sysDate = date('Y-m-d');

$dateDifference = (strtotime($_SESSION['train_date']) - strtotime($sysDate)) / (60 * 60 * 24);
if ($dateDifference > 7) {
  header("Location:more7daysbook.html");
}
?>
<html>
<section id="Book">

  <head>
    <link rel="stylesheet" href="./css/style.css">
    <title>Booking</title>


    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->

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








    <div class="formMiddle">

    
  
    </div>
    <form action="booking.php" method="post" class="formMiddle">

      <!--<body background="./images/railway track.jpg" width = 200% style="background-size: 100%;">-->

      <div class="flex textfieldBookTNTD">
        <div class="leftField">
          <label>Train Number <input type="text" width="50px" name="train_number"
              value="<?php echo $_SESSION['train_number']; ?>" readonly></label>

        </div>
        <div class="rightField">
          <label>Train Date <input type="text" name="train_date" value="<?php echo $_SESSION['train_date']; ?>"
              readonly></label>
        </div>

      </div>

      <label for="name">Name</label><br>
      <div class="fieldSizeAddress">
        <input type="text" name="name" id="name" required>
      </div>

      <label for="age">Age</label><br>
      <div class="fieldSizeAddress">
      <style>
  select {
    width: 100px; 
    height: 35px; 
    font-size: 20px;
  }
</style>

      <select name="age" id="age">


    <?php for ($i = 1; $i <= 300; $i++): ?>
    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
</select>
      </div>



      <label for="gender">Gender</label>

      <div class="flex">
        <label><input type="radio" name="gender" value="male" id="gender_male" required>Male</label>
        <div class="rightFieldCat">
          <label><input type="radio" name="gender" value="female" id="gender_female">Female</label>
        </div>
        <div class="rightFieldCat">
          <label><input type="radio" name="gender" value="other" id="gender_other">Other</label>
        </div>
      </div>


      <label for="category">Category</label>

      <div class="flex">

        <label><input type="radio" name="category" value="ac" id="category_AC" required>AC</label>


        <div class="rightFieldGen">
          <label><input type="radio" name="category" value="general" id="category_general">General</label>
        </div>

      </div>

      <label for="address">Address:</label><br>
      <div class="fieldSizeAddress">
        <input type="text" name="address" id="address" required><br>
      </div>
      </div>



      <div class="btn-nb phpButtons">
        <input type="submit" value="Book Ticket">
      </div>


    </form>
    
</section>

</body>

</html>