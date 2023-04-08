def division(num):
    if num % 3 == 0 and num % 5 == 0:
        return "FizzBuzz"
    elif num % 5 == 0:
        return "buzz"
    elif num % 3 == 0:
        return "Fizz"


result = division(15)
print(result)