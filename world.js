// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Get references to the button and result div
    const lookupButton = document.getElementById('lookup');
    const resultDiv = document.getElementById('result');
    const countryInput = document.getElementById('country');

    // Add click event listener to the lookup button
    lookupButton.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent form submission if inside a form
        
        // Get the country name from the input field
        const country = countryInput.value.trim();
        
        // Create the URL with query parameter
        const url = `world.php?country=${encodeURIComponent(country)}`;
        
        // Make AJAX request using Fetch API
        fetch(url)
            .then(response => response.text())
            .then(data => {
                // Display the data in the result div
                resultDiv.innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
                resultDiv.innerHTML = '<p>An error occurred while fetching data.</p>';
            });
    });
});