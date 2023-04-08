arr = []
for i in range(5):
    arr.append(input(f"Enter element{i+1}:"))

print(arr)
arr.sort(reverse=True)
print(arr)
arr.sort()
print(arr)
