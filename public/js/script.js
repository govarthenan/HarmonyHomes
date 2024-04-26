// Function to select date
function selectDate(element) {
    var date = element.textContent.split(',')[1].trim();
    document.getElementById('selected_date').value = date;

    // Enable time slots when a date is selected
    var timeSlots = document.querySelectorAll('.time-slot');
    timeSlots.forEach(function(timeSlot) {
        timeSlot.disabled = false;
    });

    // Submit form only when a date is selected
    document.querySelector('form').submit();
}

// Function to select time
function selectTime(element) {
    var selectedDate = document.getElementById('selected_date').value;
    var selectedTime = element.innerText.trim();

    // Check if the selected time slot is already booked
    // var bookedSlots = <?php echo json_encode($bookedSlots); ?>; // Assuming $bookedSlots is PHP array containing booked slots
    if (bookedSlots[selectedDate] && bookedSlots[selectedDate].includes(selectedTime)) {
        alert("This time slot is already booked. Please select another time.");
        return;
    }

    var timeSlots = document.querySelectorAll('.time-slot');
    timeSlots.forEach(function(timeSlot) {
        timeSlot.classList.remove('active');
        timeSlot.disabled = false;
    });

    element.classList.add('active');
    element.disabled = true;

    document.getElementById('selected_time').value = selectedTime;
}

// Function to show modal confirmation
function showConfirmationModal() {
    const modal = document.getElementById('myModal');
    modal.style.display = 'block';
}

// Function to hide modal confirmation
function hideConfirmationModal() {
    const modal = document.getElementById('myModal');
    modal.style.display = 'none';
}

// Function to submit booking form
function submitBookingForm() {
    document.getElementById('amenety_gym').submit();
}

// Add event listener to submit button
// document.getElementById('submit-btn-amenity').addEventListener('click', showConfirmationModal);

// Add event listener to cancel button in modal
// document.querySelector('.modal .cancel-btn-confirmation').addEventListener('click', hideConfirmationModal);

// Add event listener to confirm button in modal
// document.querySelector('.modal .submit-btn-cofirmation').addEventListener('click', submitBookingForm);
// ------------------------------------------------------------------------------------------------------------
// JavaScript function to open the assignment modal


function openAssignmentModal() {
    // Display the modal
    document.getElementById('assignmentModal').style.display = 'block';
}

// Add event listeners to all assign buttons
document.addEventListener('DOMContentLoaded', function() {
    const assignButtons = document.querySelectorAll('.assignButton');
    
    assignButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Open the modal
            openAssignmentModal();
        });
    });
});

// Function to close the modal
function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}
// -------------------------------------------------------------------------------------------------------------
// /add new technichian model/

var modal = document.getElementById("myModal");
var btn = document.getElementById("addnewTechnician");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function () {
    modal.style.display = "block";
};

span.onclick = function () {
    modal.style.display = "none";
};

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};
{/* <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> */}

$(document).ready(function() {
    // Your jQuery code goes here
    var script = document.createElement('script');

// Set the source of the script to the jQuery CDN
script.src = 'https://code.jquery.com/jquery-3.6.0.min.js';

// Set the onload event handler to execute your custom script once jQuery is loaded
script.onload = function() {
    // Your custom script that depends on jQuery goes here
    $(document).ready(function() {
        // jQuery code
        console.log('jQuery is loaded!');
    });
};

// Append the script element to the document body
document.body.appendChild(script);
    $('#techType').change(function() {
        var techType = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'get_technician_details.php',
            data: { techType: techType },
            dataType: 'html',
            success: function(response) {
                $('#techDetails').html(response);
            }
        });
    });
});


