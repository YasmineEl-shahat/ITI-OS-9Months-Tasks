def generate_array(length, start):
    array = []
    for i in range(length):
        array.append(start + i)
    return array
my_array = generate_array(4, 5)
print(my_array)