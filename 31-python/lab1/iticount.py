string = input("Enter a string: ")

iti_count = 0

for i in range(len(string) - 2):
    if string[i:i+3] == 'iti':
        iti_count += 1

print("The number of times 'iti' occurs in the string is:", iti_count)
