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
document.getElementById('submit-btn-amenity').addEventListener('click', showConfirmationModal);

// Add event listener to cancel button in modal
document.querySelector('.modal .cancel-btn-confirmation').addEventListener('click', hideConfirmationModal);

// Add event listener to confirm button in modal
document.querySelector('.modal .submit-btn-cofirmation').addEventListener('click', submitBookingForm);
