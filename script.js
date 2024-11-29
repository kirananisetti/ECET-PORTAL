function handleSubmit(event) {
    event.preventDefault(); // Form submissionని అరికట్టండి
    const rollNumber = document.getElementById('roll-number').value;
    const year = document.getElementById('year').value;
    const semester = document.getElementById('semester').value;

    // JSON డేటాను పొందడం
    fetch('data.json')
        .then(response => response.json())
        .then(data => {
            const result = data.find(item => item.rollNumber === rollNumber && item.year === year && item.semester === semester);
            if (result) {
                // ఫలితాలను ప్రదర్శించడం
                const resultPage = `
                    <div style="text-align: center; margin-top: 50px;">
                        <h2>Results</h2>
                        <p><strong>Roll Number:</strong> ${result.rollNumber}</p>
                        <p><strong>Year:</strong> ${result.year}</p>
                        <p><strong>Semester:</strong> ${result.semester}</p>
                        <p><strong>Result:</strong> ${result.result}</p>
                        <button onclick="window.location.reload()">Go Back</button>
                    </div>
                `;
                document.body.innerHTML = resultPage; // ప్రస్తుత పేజీ కంటెంట్‌ను ఫలితాలతో మార్చండి
            } else {
                alert('No results found for the given details.');
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}
