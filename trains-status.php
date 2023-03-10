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

<body>
<section id="train-status">
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
  <main>
    <form>



      <div class="flex">

        <div id="search-card">
              Train Name:<label for="train-name"></label><br>
              <input type="text" id="train-name" name="train-name"><br>
              Source:<label for="source"></label><br>
              <input type="text" id="source" name="source"><br>
              Destination:<label for="destination"></label><br>
              <input type="text" id="destination" name="destination"><br>
              Date:<label for="date"></label><br>
              <input type="date" id="date" name="date" format = "YYYY-MM-DD"><br><br>
              <div class = "sbtn">
              <input type="button" onclick="search_table()" id="search-button" value="Search">
              </div>
              
          </div>

    </form>
    


        <div class="trains-status-table">
          <table class="table-sortable">
            <thead>
              <tr>
                <th>Train Number</th>
                <th>Train Name</th>
                <th>Date</th>
                <th>Source</th>
                <th>Destination</th>
                <th>Available AC Seats</th>
                <th>AC Fare</th>
                <th>Available general Seats</th>
                <th>General Fare</th>
                <th>Available Wait Seats</th>
                <th> </th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Include the PHP script to retrieve and display the records from the Train_Status table
              include "trainstatus.php";
              ?>
            </tbody>


          </table>
        </div>

      </div>

<script  type="text/javascript">
    // Get the form element and the table body
var form = document.getElementById('search-card');
var tableBody = document.querySelector('table tbody');

// Add an event listener for the submit event on the form
//form.addEventListener('button', function(event) {

function search_table(){
  // Prevent the default form submission behavior
  //event.preventDefault();

  // Get the values of the form fields
  var trainName = document.querySelector('#train-name');
  var source = document.querySelector('#source');
  var destination = document.querySelector('#destination');
  var date = document.querySelector('#date');

  // Loop through all the rows in the table
  for (var i = 0; i < tableBody.rows.length; i++) {
	  // Get the current row and its cells
	  var row = tableBody.rows[i];
	  var cells = row.cells;
	  //console.log(cells);
	  console.log(cells[2].textContent );

	// Check if the values in the cells match the search criteria
	if((cells[1].textContent.toLowerCase().indexOf(trainName.value.toLowerCase()) > -1) && trainName.value != '')
	{
	  var trainNameMatch = true;
	}
	else
	{
		var trainNameMatch = false;
	}

	if((cells[3].textContent.toLowerCase().indexOf(source.value.toLowerCase()) > -1) && source.value != '')
	{
	  var sourceMatch = true;
	}
	else
	{
		var sourceMatch = false;
	}

	if((cells[4].textContent.toLowerCase().indexOf(destination.value.toLowerCase()) > -1) && destination.value != '')
	{
	  var destinationMatch = true;
	}
	else
	{
		var destinationMatch = false;
	}

	if(cells[2].textContent === date.value && date.value != '')
	{
	  var dateMatch = true;
	}
	else
	{
		var dateMatch = false;
	}
	// If all the criteria are met, show the row. Otherwise, hide it.
    
	if (((trainNameMatch || trainName.value == '') && (destinationMatch || destination.value == '') 
	&& (sourceMatch || source.value == '') && (dateMatch || date.value == '')) || (trainName.value === '' && source.value === '' && destination.value === '' && date.value === ''))
	 {
		row.style.display = '';
		// window.print("not print");
		//console.log(row.id,'yes');
	} 
	else {
		row.style.display = 'none';
		// window.print("else");
		//console.log(row.id,'no');
		}
  }
}
   
</script>


   
</body>





</html>