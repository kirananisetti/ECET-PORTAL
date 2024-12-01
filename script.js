function loadResults() {
    fetch('your-backend-url.php') // మీ బ్యాక్ ఎండ్ URL
        .then(response => response.json())
        .then(data => {
            const resultsBody = document.getElementById('results-body');
            resultsBody.innerHTML = ''; // పాత డేటాను క్లియర్ చేయడం

            data.forEach((item, index) => {
                const row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.subjectCode}</td>
                        <td>${item.subjectName}</td>
                        <td>${item.internals}</td>
                        <td>${item.externals}</td>
                        <td>${item.credits}</td>
                    </tr>
                `;
                resultsBody.innerHTML += row;
            });
        })
        .catch(error => console.error('Error fetching results:', error));
}
