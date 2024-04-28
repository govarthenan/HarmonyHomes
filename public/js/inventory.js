
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('consumptionChart').getContext('2d');
    const consumptionChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'], // Example monthly labels
            datasets: [{
                label: 'Total Electricity Consumption (kWh)', // Adjusted label for clarity
                data: [300, 400, 350, 500, 450, 550], // Example data for electricity consumption
                fill: false,
                borderColor: 'rgb(75, 192, 192)', // Line color for electricity
                tension: 0.1 // Slight curve in the line
            }, {
                label: 'Total Water Consumption (Liters)', // Adjusted label for clarity
                data: [1200, 1100, 1150, 1080, 1220, 1250], // Example data for water consumption
                fill: false,
                borderColor: 'rgb(21, 74, 170)', // Line color for water
                tension: 0.1 // Slight curve in the line
            }]
        },
        options: {
            aspectRatio: 1, // Ensures the chart maintains a square shape
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Consumption'
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'Total Consumption Overview', // Title for the chart
                    padding: {
                        top: 10,
                        bottom: 25
                    },
                    font: {
                        size: 16,
                        weight: 'bold'
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: false // Allows flexibility in adjusting aspect ratio
        }
    });
  });
  


let newDateFunction = new Date()
function randerDate(){
  newDateFunction.setDate(1)
  let day = newDateFunction.getDay()

  let currentDate = new Date(
      newDateFunction.getFullYear(),
      newDateFunction.getMonth() + 1,0
  ).getDate() // to get the last date of current month


  let prevDate = new Date(
      newDateFunction.getFullYear(),
      newDateFunction.getMonth(), 0
  ).getDate() // to get the last date of previous month

  let addNext = new Date(newDateFunction.getFullYear(), 
  newDateFunction.getMonth() + 2, 0).getDate() + 7;

  console.log(currentDate, prevDate, addNext);

  let month = newDateFunction.getMonth()
  let year = newDateFunction.getFullYear()
  let monthArr = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
  document.getElementById("month").innerHTML = monthArr[month] + " - " + year

  let today = new Date()
  let weekDay = today.getDay()
  document.getElementById("date").innerHTML = today.toDateString()
  document.querySelector(`.week :nth-child(${weekDay + 1})`).classList.add("active")



  let DATES = ""

  for(let x = day; x > 0; x--){
      DATES += "<div class='prev'>" + (prevDate - x + 1) + "</div>"
  }

  for(let i = 1; i <= currentDate; i++){
      if(i === today.getDate() && newDateFunction.getMonth() == today.getMonth() && newDateFunction.getFullYear() === today.getFullYear()){
          DATES += "<div class='today'>" + i + "</div>"
      }
      else{
          DATES += "<div>" + i + "</div>"
      }
  }

  for(let k = 1; k <= addNext; k++){
      if(k <= 1){
          DATES += "<div class='next'>" + k + "</div>"
      }
      else{
          break;
      }
  }

  document.querySelector('.dates').innerHTML = DATES
}

function moveDate(para){

  if(para == 'prev'){
      newDateFunction.setMonth(newDateFunction.getMonth() - 1)
  }

  else if(para == 'next'){
      newDateFunction.setMonth(newDateFunction.getMonth() + 1)
  }

  randerDate()
}


document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('financeChart').getContext('2d');
    const financeChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'], // Example months
            datasets: [
                {
                    label: 'Income',
                    data: [5000, 6000, 5500, 6500, 6200, 6800], // Example income data
                    borderColor: '#154aaa',
                    backgroundColor: 'rgba(21, 74, 170,0.1)',
                    fill: true,
                    tension: 0.1
                },
                {
                    label: 'Expense',
                    data: [3000, 3500, 2800, 4000, 3700, 4500], // Example expense data
                    borderColor: '#f43c6e',
                    backgroundColor: 'rgba(244, 60, 110,0.1)',
                    fill: true,
                    tension: 0.1
                },
                {
                    label: 'Balance',
                    data: [2000, 2500, 2700, 2500, 2500, 2300], // Example balance data (Income - Expense)
                    borderColor: '#4cc2c4',
                    backgroundColor: 'rgba(76, 194, 196,0.1)',
                    fill: true,
                    tension: 0.1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Amount ($)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Month'
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                title: { // Adding title configuration here
                    display: true,
                    text: 'Account Overview',
                    position: 'top',
                    font: {
                        size: 18
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: false // Adjusted to maintain aspect ratio within the given square
        }
    });
});


/*Notification*/

document.addEventListener('DOMContentLoaded', function() {
    var quill = new Quill('#editor', {
        theme: 'snow'  // Specify theme in configuration
    });

    document.getElementById('notificationForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const title = document.getElementById('title').value;
        const message = quill.root.innerHTML;  // Get the inner HTML of the editor

        console.log('Notification Title:', title);
        console.log('Notification Message:', message);

        // Here you would typically send the data to a server
        alert('Notification Created!\nTitle: ' + title + '\nMessage: ' + message);
    });
});


/*create Notification*/

function toggleDropdowns() {
    var userType = document.getElementById('userType').value;
    var groupSelect = document.getElementById('groupSelect');
    var residentIdSelect = document.getElementById('residentIdSelect');

    // Handling Group Select visibility
    if (userType === 'groups') {
        groupSelect.style.display = 'block';
        residentIdSelect.style.display = 'none';  // Ensure this is hidden if not 'customUser'
    } else {
        groupSelect.style.display = 'none';
    }

    
    if (userType === 'customUser') {
        residentIdSelect.style.display = 'block';
        groupSelect.style.display = 'none';  // Ensure this is hidden if not 'groups'
    } else {
        residentIdSelect.style.display = 'none';
    }
}



/* displying full details when clicked on view button of sign request table*/
document.addEventListener('DOMContentLoaded', function() {
    const viewButtons = document.querySelectorAll('.viewButton');
    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const detailsRow = this.closest('tr').nextElementSibling; // Get the next row, which should be the details row
            detailsRow.style.display = detailsRow.style.display === 'none' ? 'table-row' : 'none'; // Toggle visibility
        });
    });
});

$(document).ready(function() {
    $('.viewButton').click(function() {
        $(this).closest('tr').next('.description-row').toggle();  // Toggle the visibility of the next description row
    });
});

/*fac-man-inventory-count*/

$(document).ready(function() {
    
      

    $('.btn-decrease').click(function() {
      let count = parseInt($('.count').text());
      if (count > 0) {
        count--;
        $('.count').text(count);
      }
    });
  
    $('.btn-increase').click(function() {
      let count = parseInt($('.count').text());
      count++;
      $('.count').text(count);
    });
  });
  
// fac-inventory-add

// Modal handling
function openModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// fac-manager-assign




// Dynamic dropdown for technician assignment
document.getElementById('techTypeSelect').addEventListener('change', function() {
    var techType = this.value;
    var techSelect = document.getElementById('techSelect');
    techSelect.innerHTML = '';  // Clear existing options

    // Replace these with actual API calls if necessary
    var technicians = {
        electrician: ['Alice', 'Bob', 'Charlie'],
        plumber: ['Dave', 'Eve', 'Frank']
    };

    // Populate the select element with technicians based on the selected type
    if (technicians[techType]) {
        technicians[techType].forEach(function(tech) {
            var option = new Option(tech, tech);  // new Option(text, value)
            techSelect.appendChild(option);
        });
    }
});


// Function to open the modal
function openModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = 'block';
}

// Function to close the modal
function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.style.display = 'none';
}


// Initial population of technician names based on the default selected type
document.addEventListener('DOMContentLoaded', function() {
    // Populate and open modal for assignment if needed
    document.querySelectorAll('.assignButton').forEach(button => {
        button.addEventListener('click', function(event) {
            const issueId = event.target.closest('tr').cells[1].textContent; // Assuming Resident ID is unique enough for example
            document.getElementById('issueId').value = issueId;
            openModal('assignmentModal'); // Assuming 'assignmentModal' is the ID of your modal
        });
    });

    // Initialize the technician type select to populate technicians
    document.getElementById('techTypeSelect').dispatchEvent(new Event('change'));
});

// Handle the form submission
document.getElementById('assignTechForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const tech = document.getElementById('techSelect').value;
    const issueId = document.getElementById('issueId').value;
    const description = document.getElementById('description').value;
    console.log('Assigning', tech, 'to issue', issueId, 'with description', description);

    // Here you would typically send data to the server via fetch/AJAX
    closeModal('assignmentModal'); // Close the modal after submission
});


