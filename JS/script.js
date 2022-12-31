
// Get the form element and the table body
var form = document.getElementById('search-card');
var tableBody = document.querySelector('table tbody');

// Add an event listener for the submit event on the form
//form.addEventListener('button', function(event) {

function search_table(){
  // Prevent the default form submission behavior
  event.preventDefault();

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