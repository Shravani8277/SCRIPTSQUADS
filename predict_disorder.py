import sys
import pandas as pd
import joblib

# Load the trained model
model = joblib.load('path/to/your/model/mental_health_model.pkl')  # Adjust the path

# Load the dataset if needed (not mandatory for predictions)
dataset = pd.read_csv('path/to/your/data/simulated_mental_health_data.csv')  # Adjust the path

# Get the user responses from command line arguments
responses = sys.argv[1].split(',')
responses = [int(r) for r in responses]

# Predict the disorder
prediction = model.predict([responses])

# Output the prediction
print(prediction[0])
