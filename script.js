fetch('your-backend-url.php')
    .then(response => response.json())
    .then(data => console.log(data)) // es
    .catch(error => console.error('Fetch Error:', error)); // ex
