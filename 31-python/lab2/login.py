import json

def login():
    email = input("Email: ")
    password = input("Password: ")
    with open("users.json", "r") as f:
        users = json.load(f)
    for user in users:
        if user["email"] == email and user["password"] == password and user["is_active"]:
            print("Login successful.")
            return user
    print("Error: Invalid email or password.")
