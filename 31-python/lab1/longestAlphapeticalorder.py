def longest_alphabetical_substring(string):
    longest_substring = ""
    current_substring = ""

    for i in range(len(string) - 1):
        if string[i] <= string[i+1]:
            current_substring += string[i]
            if len(current_substring) > len(longest_substring):
                longest_substring = current_substring
        else:
            current_substring += string[i]
            if len(current_substring) > len(longest_substring):
                longest_substring = current_substring
            current_substring = ""

    current_substring += string[-1]
    if len(current_substring) > len(longest_substring):
        longest_substring = current_substring

    return longest_substring


print("The longest alphabetical ordered substring is:", longest_alphabetical_substring('abdulrahman'))
