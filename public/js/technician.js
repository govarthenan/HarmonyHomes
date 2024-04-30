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


/*task chart*/

function createPieChart(chartId) {
    const data = {
        labels: ['Ongoing Tasks', 'Completed Tasks'],
        datasets: [{
            label: 'Task Distribution',
            data: [40, 60], // Percentage data for Ongoing and Completed tasks
            backgroundColor: ['rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)'],
            borderColor: ['rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)'],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'pie',
        data: data,
        options: {
            plugins: {
                legend: {
                    position: 'right' // Positioning legend on the right
                },
                title: {
                    display: true,      // Ensure the title is shown
                    text: 'Monthly Summary', // Title text
                    font: {
                        size: 16         // Font size of the title
                    }
                }
            },
            responsive: true,   // Ensures the canvas size is responsive to container
            maintainAspectRatio: false // Ensures aspect ratio is not maintained, allowing custom dimensions
        }
    };

    const ctx = document.getElementById(chartId).getContext('2d');
    const taskChart = new Chart(ctx, config); // Create the chart
}

createPieChart('taskChart'); // Call this function with the id of the canvas element


/*bar chart*/

function createBarChart(chartId) {
    const data = {
        labels: ['LED bulbs', 'Volters', 'Switches', 'Wires'], // Example inventory items
        datasets: [{
            label: 'Inventory Count',
            data: [50, 75, 150, 120], // Example quantity of each item
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true // Ensures the scale starts at zero
                }
            },
            plugins: {
                legend: {
                    position: 'top' // Positions the legend at the top of the chart
                },
                title: {
                    display: true,
                    text: 'Inventory Items',
                    font: {
                        size: 16
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    };

    const ctx = document.getElementById(chartId).getContext('2d');
    new Chart(ctx, config); // Create the chart
}
createBarChart('inventoryChart');
