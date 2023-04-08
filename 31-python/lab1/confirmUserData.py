import re

def checkmail(email):

    email_pattern = r'^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$'
    return re.match(email_pattern, email)

name = input("Enter your name: ")


while not name or name.isdigit():
    print("Invalid name, please enter a valid name")
    name = input("Enter your name: ")

email = input("Enter your email: ")



while not checkmail(email) :
    print("Invalid email, please enter a valid email")
    email = input("Enter your email: ")


print("Name:", name)
print("Email:", email)