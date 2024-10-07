document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('reservation-form'); // Ensure this ID matches your form

    // Check if the form exists
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Basic validation
            const restaurantId = document.getElementById('restaurant-id').value; // Ensure this ID matches your input element
            const time = document.getElementById('time-select').value; 
            const date = document.getElementById('booktable').value; 

            if (!restaurantId || !time || !date) {
                alert('Please fill in all fields.');
                return;
            }

            // If validation passes, submit the form
            form.submit(); // This will send the form data to the server
        });
    } else {
        console.error('Reservation form not found!');
    }
});
