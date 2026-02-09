import os
import google.generativeai as genai
from flask import Flask, request, jsonify
from dotenv import load_dotenv

load_dotenv()

# Configure Gemini
genai.configure(api_key=os.getenv("GEMINI_API_KEY"))
model = genai.GenerativeModel('gemini-1.5-flash')

app = Flask(__name__)

@app.route('/generate-story', methods=['POST'])
def generate_story():
    data = request.json
    package_name = data.get('package_name', 'Basic')
    customer_name = data.get('customer_name', 'Valued Customer')
    
    prompt = f"Create a short, magical, and heartwarming narrative about a photography session at Studio 819 for {customer_name} who chose the {package_name} package. Focus on capturing timeless memories."
    
    try:
        response = model.generate_content(prompt)
        return jsonify({
            "status": "success",
            "story": response.text,
            "metadata": {
                "package": package_name,
                "customer": customer_name
            }
        })
    except Exception as e:
        return jsonify({"status": "error", "message": str(e)}), 500

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
