string=input("Enter string:")
vowels_arr= ['a', 'e', 'i', 'o', 'u']
vowels=0
for i in string:
      if(i in vowels_arr ):
            vowels=vowels+1
print("Number of vowels are:")
print(vowels)