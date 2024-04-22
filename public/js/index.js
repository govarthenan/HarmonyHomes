//calendar
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


//maintenance payment variation chart 

document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('maintenancePaymentChart').getContext('2d');
    var maintenancePaymentChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['September', 'Octomber', 'November', 'December', 'January', 'February'],
            datasets: [{
                label: 'Maintenance Payment (Rs)',
                data: [1000, 1350, 1250, 1400, 1500, 1950], 
                backgroundColor: '#154aaa',
                borderColor: '#0c3866',
                borderWidth: 1,
                tension: 0.1 
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Amount (Rs.)',
                        color:'black',
                        font: { 
                            size: 14
                        }   
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Month',
                        color:'black',
                        font: { 
                            size: 14
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        boxWidth: 20
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
});


//utility usage chart

document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('utilityUsageChart').getContext('2d');
    var utilityUsageChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['August', 'September', 'Octomber', 'November', 'December', 'January'],
            datasets: [{
                label: 'Electricity (kWh)',
                data: [200, 185, 220, 210, 230, 195],
                backgroundColor: 'rgba(12, 56, 102, 0.8)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }, {
                label: 'Water (Liters)',
                data: [300, 290, 310, 305, 320, 280],
                backgroundColor: 'rgba(75, 192, 192, 0.8)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Usage'
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
});


//modal

document.addEventListener('DOMContentLoaded', function() {
    function closeModal(modal) {
      modal.style.display = "none";
    }
  
   
    var modalBooking = document.getElementById("popupModal-booking");
    var btnBooking = document.querySelector(".booking-reminder");
    btnBooking.onclick = function() {
      modalBooking.style.display = "block";
    };
  
   
    var modalEvents = document.getElementById("popupModal-events");
    var btnEvents = document.querySelector(".event-reminder");
    btnEvents.onclick = function() {
      modalEvents.style.display = "block";
    };
  
    
    var modalPayment = document.getElementById("popupModal-payment");
    var btnPayment = document.querySelector(".payment-reminder");
    btnPayment.onclick = function() {
      modalPayment.style.display = "block";
    };
  
    
    var closeButtons = document.querySelectorAll('.close');
    closeButtons.forEach(function(btn) {
      btn.onclick = function() {
        closeModal(btn.closest('.popup-booking, .popup-events, .popup-payment'));
      };
    });
  
    
    window.onclick = function(event) {
      if (event.target.classList.contains('popup-booking') || event.target.classList.contains('popup-events') || event.target.classList.contains('popup-payment')) {
        closeModal(event.target);
      }
    };
  });


/*consumption chart general manger*/

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



/*finance chart for both general manager and finance manger*/

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

// Function to close the alert manually
function closeAlert() {
    var alertElement = document.getElementById('alert');
    alertElement.style.opacity = '0';
    setTimeout(function () {
        alertElement.style.display = 'none';
    }, 500);
}

// Automatically close the alert after 5 seconds
setTimeout(function () {
    closeAlert();
}, 5000);