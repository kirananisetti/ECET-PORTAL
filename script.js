<script>
    async function handleSubmit(event) {
        event.preventDefault(); // Prevent default form submission

        const rollNumber = document.getElementById('roll-number').value;
        const year = document.getElementById('year').value;
        const semester = document.getElementById('semester').value;

        if (year === "2" && semester === "2") {
            try {
                // Fetch results from the PHP backend
                const response = await fetch(`results.php?roll_number=${rollNumber}&semester=2-2`);
                const results = await response.json();

                if (results.error) {
                    alert(results.error);
                    return;
                }

                // Generate results table
                let resultTable = `
                    <div style="text-align: center; margin-top: 20px;">
                        <h2>Results for Roll Number: ${rollNumber}</h2>
                        <table border="1" style="margin: 20px auto; border-collapse: collapse; width: 80%;">
                            <tr>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Internals</th>
                                <th>Grade</th>
                                <th>Credits</th>
                            </tr>
                `;

                results.forEach(result => {
                    resultTable += `
                        <tr>
                            <td>${result.subject_code}</td>
                            <td>${result.subject_name}</td>
                            <td>${result.internals}</td>
                            <td>${result.grade}</td>
                            <td>${result.credits}</td>
                        </tr>
                    `;
                });

                resultTable += `</table><button onclick="window.location.reload()">Go Back</button></div>`;

                // Display the results
                document.body.innerHTML = resultTable;

            } catch (error) {
                console.error("Error fetching results:", error);
                alert("Failed to fetch results. Please try again later.");
            }
        } else {
            alert("Only 2-2 semester results are available.");
        }
    }
</script>
