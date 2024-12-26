from flask import Flask, render_template, request, jsonify

app = Flask(__name__)

# Mock database for results
results = {
    "2": {
        "1": {
            "pin123": {
                "DC Machines and Transformers": {"grade": "E", "credits": 3.0},
                "Electro Magnetic Fields": {"grade": "F", "credits": 3.0},
                "Electrical Circuits Lab": {"grade": "A", "credits": 1.5},
                "DC Machines and Transformers Lab": {"grade": "A", "credits": 1.5},
                "Electronic Devices and Circuits Lab": {"grade": "A", "credits": 1.5},
                "Skill Oriented Course I": {"grade": "A", "credits": 2.0},
                "Professional Ethics & Human Values": {"grade": "A+", "credits": 0.0}
            }
        }
    }
}

@app.route('/')
def home():
    return render_template('index.html')

@app.route('/get-results', methods=['POST'])
def get_results():
    data = request.json
    year = data.get('year')
    semester = data.get('semester')
    pin = data.get('pin').lower()  # Ensure PIN is case-insensitive

    # Fetch results
    year_data = results.get(year, {})
    semester_data = year_data.get(semester, {})
    student_results = semester_data.get(pin)

    if student_results:
        return jsonify({"success": True, "results": student_results})
    else:
        return jsonify({"success": False, "message": "Results not found for the provided details."})

if __name__ == "__main__":
    app.run(debug=True)
