// Grab elements from index.html
const button = document.getElementById('excuseBtn'); //button
const excuseList = document.getElementById('excuseList'); //list

// Listen for a click event on the button
button.addEventListener('click', () => {
    
    // Step 2 & 3 from diagram: Make a fetch() request towards our backend api.php
    fetch('api.php') // request http begin from here 
        .then(response => response.json()) // hana fin step 4 kansta9blo request HTTP
        .then(data => {
            // Step 5: Manufacture HTML tags (<li>) and inject them into the screen
            excuseList.innerHTML = `<li>✨ <strong>Excuse:</strong> "${data.excuse}"</li>`;
        })
        .catch(error => {
            console.error('Everything broke:', error);
        });
});