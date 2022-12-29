<!DOCTYPE html>

<?php
include_once 'dbconnection.php'
  ?>
<html>


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" href="./css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <link href="https://fonts.googleapis.com/css2?family=Poppins:400,600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato:300;400;700&display=swap" rel="stylesheet">

  <title>Railway Reservation System</title>

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
    <img src="./images/train.jpg" alt="" id="train" class="responsive">

    

    <div class="feature-list">
      <div class="row">
        <div class="col-md-12 col-xs-12" style="margin-top:46px; margin-left: 12px;">
          <h2>Why Book ZRRS Train Tickets With ZRRS?</h2>
        </div>
      </div>
      <div class="row rowBox">
        <div class="col-xs-12 col-md-6 feature-container">
          <div class="col-xs-2 f-icon">
            <amp-img width="50" height="50" src="https://www.confirmtkt.com/img/home/icons/ic-web-confirm-ticket@3x.png"
              class="features-img img-responsive" alt="ZRRS train ticket cancallations and refund">
            </amp-img>
          </div>
          <div class="col-xs-10">
            <h3>Get ZRRS Train Tickets </h3>
            <p>With our same train alternates and prediction feature,
              increase your chances of getting confirm ZRRS train tickets. </p>
          </div>
        </div>
        <div class="col-xs-12 col-md-6 feature-container">
          <div class="col-xs-2 f-icon">
            <amp-img width="50" height="50" src="https://www.confirmtkt.com/img/home/icons/ic-web-upi@3x.png"
              class="features-img img-responsive" alt="ZRRS waitlist tickets prediction and alternative options">
            </amp-img>
          </div>
          <div class="col-xs-10">
            <h3>UPI Enable Secured Payment </h3>
            <p>Payment on Confirmtkt is highly secured. Easy UPI and other multiple payment modes available. </p>
          </div>
        </div>
      </div>
      <div class="row rowBox">
        <div class="col-xs-12 col-md-6 feature-container">
          <div class="col-xs-2 f-icon">
            <amp-img width="50" height="50"
              src="ticket.png"
              class="features-img img-responsive" alt="Secure train ticket booking"></amp-img>
          </div>
          <div class="col-xs-10">
            <h3>Free Cancellation on ZRRS Tickets </h3>
            <p>Get a full refund on ZRRS train tickets by opting our free cancellation feature. </p>
          </div>
        </div>
        <div class="col-xs-12 col-md-6 feature-container">
          <div class="col-xs-2 f-icon">
            <amp-img width="50" height="50" src="https://www.confirmtkt.com/img/home/icons/ic-web-support@3x.png"
              class="features-img img-responsive" alt="train ticket booking customer support">
            </amp-img>
          </div>
          <div class="col-xs-10">
            <h3>ZRRS Booking & Enquiry Support </h3>
            <p>24X7 customer support,
              for any ZRRS train enquiry & booking related queries call 08068243910. </p>
          </div>
        </div>
      </div>
      <div class="row rowBox">
        <div class="col-xs-12 col-md-6 feature-container">
          <div class="col-xs-2 f-icon">
            <amp-img width="50" height="50" src="https://www.confirmtkt.com/img/home/icons/ic-web-refund@3x.png"
              class="features-img img-responsive" alt="Secure train ticket booking"></amp-img>
          </div>
          <div class="col-xs-10">
            <h3>ZRRS Instant Refund & Cancellation </h3>
            <p>Get an instant refund and book your next ZRRS ticket easily. </p>
          </div>
        </div>
        <div class="col-xs-12 col-md-6 feature-container">
          <div class="col-xs-2 f-icon">
        
    
        </div>
      </div>
    </div>


  </header>
  
  <footer>
        <img class = "footer-logo" src="./images/logo.svg" alt="">
        
        

        <div class = "footer-copyright">
            Copyright 2022 © Zohaib's Railway Reservation System. All rights reserved.
        </div>


    </footer>
</body>

</html>