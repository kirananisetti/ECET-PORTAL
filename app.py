from flask import Flask, jsonify, request
from flask_cors import CORS

app = Flask(__name__)
CORS(app)  # Enable CORS for frontend-backend communication

# Sample Results Data
results = {
    "2-1": [
        {"subject": "DC Machines and Transformers", "grade": "E", "credits": 3.0},
        {"subject": "Electro Magnetic Fields", "grade": "F", "credits": 3.0},
        {"subject": "Electrical Circuits Lab", "grade": "A", "credits": 1.5},
        {"subject": "DC Machines and Transformers Lab", "grade": "A", "credits": 1.5},
        {"subject": "Electronic Devices and Circuits Lab", "grade": "A", "credits": 1.5},
        {"subject": "Skill Oriented Course I", "grade": "A", "credits": 2.0},
        {"subject": "Professional Ethics & Human Values", "grade": "A+", "credits": 0.0},
    ]
}

@app.route('/get_results', methods=['GET'])
def get_results():
    year = request.args.get('year')
    semester = request.args.get('semester')
    key = f"{year}-{semester}"
    if key in results:
        return jsonify({"status": "success", "data": results[key]})
    return jsonify({"status": "error", "message": "Results not found!"}), 404

if __name__ == '__main__':
    app.run(debug=True)
