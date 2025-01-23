import pandas as pd
import random
from faker import Faker

# Initialize Faker
fake = Faker()

# Constants
num_entries = 800
sex_options = ['M', 'F']
program_options = ['NORMAL', 'SPECIAL']
year_options = [1, 2, 3]
option_choices = ['CBE', 'CME', 'PCE', 'PC', 'CM', 'KE']
admission_years = [2022, 2023, 2024]

# Generate data
data = []
for _ in range(num_entries):
    first_name = fake.first_name()
    middle_name = fake.first_name()
    last_name = fake.last_name()
    dob = fake.date_of_birth(minimum_age=18, maximum_age=30).strftime('%Y-%m-%d')
    admission_year = random.choice(admission_years)
    admission_number = f"{admission_year}-{random.choice(['OD', 'SD'])}-{random.randint(1000, 9999)}"
    sex = random.choice(sex_options)
    option = random.choice(option_choices)
    program = random.choice(program_options)
    year = random.choice(year_options)

    data.append([first_name, middle_name, last_name, dob, admission_number, sex, option, program, year])

# Create DataFrame
df = pd.DataFrame(data, columns=['First Name', 'Middle Name', 'Last Name', 'Date Of Birth', 'Admission Number', 'Sex', 'Option', 'Program', 'Year'])

# Save to Excel
df.to_excel('student_data.xlsx', index=False, engine='openpyxl')
print("Excel file 'student_data.xlsx' created with 800 entries.")

#pip install pandas faker openpyxl
#python generate_student_data.py
