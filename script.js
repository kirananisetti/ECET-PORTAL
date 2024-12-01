function handleSubmit(event) {
    event.preventDefault();
    const rollNumber = document.getElementById('roll-number').value.toUpperCase();
    const year = document.getElementById('year').value;
    const semester = document.getElementById('semester').value;

    fetch(`your-backend-url.php?rollNumber=${rollNumber}&year=${year}&semester=${semester}`)
        .then(response => response.json())
        .then(results => {
            if (results.length > 0) {
                const resultsBody = document.getElementById('results-body');
                resultsBody.innerHTML = ''; // Clear previous results

                results.forEach((result, index) => {
                    const row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${result.subjectCode}</td>
                            <td>${result.subjectName}</td>
                            <td>${result.internals}</td>
                            <td>${result.externals}</td>
                            <td>${result.credits}</td>
                        </tr>
                    `;
                    resultsBody.innerHTML += row;
                });

                document.getElementById('results').style.display = 'block';
            } else {
                alert('No results found for the given details.');
            }
        })
        .catch(error => console.error('Error:', error));
}
