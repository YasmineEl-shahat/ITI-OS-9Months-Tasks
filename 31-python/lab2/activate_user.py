import json

def activate_user():
    email = input("enter user email:")
    with open("users.json", "r") as f:
        users = json.load(f)
    for user in users:
        if user["email"] == email:
            user["is_active"] = True
            with open("users.json", "w") as f:
                json.dump(users, f)
            print("User activated.")
            return
    print("Error: User not found.")
