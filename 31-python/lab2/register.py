import re
import json

def register():
    email_pattern = r'^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$'
    first_name = input("First name: ")
    while not first_name or first_name.isdigit():
        first_name = input("Error: Invalid first name, re-enter first name:")

    last_name = input("Last name: ")
    while not last_name or last_name.isdigit():
        last_name = input("Error: Invalid last name, re-enter last name:")

    email = input("Email: ")
    while not re.match(email_pattern, email):
        email = input("Error: Invalid email, re-enter email:")

    password = input("Password: ")
    confirm_password = input("Confirm password: ")
    while password != confirm_password:
        print("Error: Passwords do not match.")
        password = input("Password: ")
        confirm_password = input("Confirm password: ")

    mobile_phone = input("Mobile phone: ")
    while not re.match(r'^\+20\d{10}$', mobile_phone):
        mobile_phone = input("Error: Invalid mobile phone number. Must be a valid Egyptian phone number, re-enter Mobile phone:")

    user = {"first_name": first_name, "last_name": last_name, "email": email, "password": password, "mobile_phone": mobile_phone, "is_active": False}
    with open("users.json", "r") as f:
        users = json.load(f)
    users.append(user)
    with open("users.json", "w") as f:
        json.dump(users, f)
    print("User registered successfully.")
