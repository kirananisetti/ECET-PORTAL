function handleSubmit(event) {
    event.preventDefault(); // Prevent form submission
            
    // Get input values
    const rollNumber = document.getElementById('roll-number').value.toUpperCase().trim();
    const year = document.getElementById('year').value;
    const semester = document.getElementById('semester').value;

    // Validate inputs
    if (!rollNumber || !year || !semester) {
        alert('Please fill all fields correctly.');
        return;
    }

    // Fetch JSON data
    fetch(`data.json?cache_buster=${new Date().getTime()}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to load data');
            }
            return response.json();
        })
        .then(data => {
            // Filter results
            const results = data.filter(item => 
                item.rollNumber === rollNumber &&
                item.year === year &&
                item.semester === semester
            );

            // Display results
            const resultsContainer = document.getElementById('results');
            if (results.length > 0) {
                let resultTable = `
                    <table>
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Internals</th>
                                <th>Externals (Grades)</th>
                                <th>Credits</th>
                            </tr>
                        </thead>
                        <tbody>`;

                results.forEach((result, index) => {
                    resultTable += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${result.subjectCode}</td>
                            <td>${result.subjectName}</td>
                            <td>${result.internals}</td>
                            <td>${result.externals}</td>
                            <td>${result.credits}</td>
                        </tr>`;
                });

                resultTable += `</tbody></table>`;
                resultsContainer.innerHTML = resultTable; // Update the results container
            } else {
                resultsContainer.innerHTML = '<p>No results found for the given details.</p>';
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            alert('Error loading results. Please try again later.');
        });
}
