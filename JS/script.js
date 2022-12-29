
// Get the form element and the table body
var form = document.getElementById('search-card');
var tableBody = document.querySelector('table tbody');

// Add an event listener for the submit event on the form
form.addEventListener('submit', function(event) {
  // Prevent the default form submission behavior
  event.preventDefault();

  // Get the values of the form fields
  var trainName = form.elements['train-name'].value.toLowerCase();
  var source = form.elements['source'].value.toLowerCase();
  var destination = form.elements['destination'].value.toLowerCase();
  var date = form.elements['date'].value;

  // Loop through all the rows in the table
  for (var i = 0; i < tableBody.rows.length; i++) {
	// Get the current row and its cells
	var row = tableBody.rows[i];
	var cells = row.cells;
	console.log(cells);

	// Check if the values in the cells match the search criteria
	var trainNameMatch = cells[1].textContent.toLowerCase().indexOf(trainName) > -1;
	var sourceMatch = cells[3].textContent.toLowerCase().indexOf(source) > -1;
	var destinationMatch = cells[4].textContent.toLowerCase().indexOf(destination) > -1;
	var dateMatch = cells[2].textContent === date;

	// If all the criteria are met, show the row. Otherwise, hide it.
	if (destinationMatch) {
	  row.style.display = '';
	  window.print("not print");
	} else {
	  row.style.display = 'none';
	  window.print("else");
	}
  }
});