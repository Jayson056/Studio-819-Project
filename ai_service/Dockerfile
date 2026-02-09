FROM python:3.11-slim

WORKDIR /app

# Copy requirements from root to current dir
COPY ../requirements.txt .

RUN pip install --no-cache-dir -r requirements.txt

# Copy all content of ai_service
COPY . .

# Expose port
EXPOSE 5000

# Run with gunicorn
CMD ["gunicorn", "--bind", "0.0.0.0:5000", "narrative_engine:app"]
