console.log("afer converting to upper:", ToUpper("the quick brown fox"));

console.log(
  "The longest word within the string:",
  findLongest("Web Development Tutorial")
);

console.log("afer sorting:", alphabeticalSort("javascript"));

var date = new Date();
console.log("get the month name from a particular date :", getMonName(date));
let num;
do {
  num = prompt("Enter number from 1 to 10");
} while (num > 10 || num < 1);

console.log(getRandomNum(num));

let nums = [2, 1, 3, 2, 7, 2, 8, 4, 3, 6, 10, 9, 12];

//ascending
nums.sort((a, b) => {
  return a - b;
});
console.table("after ascending sort: ", nums);

//descending
nums.sort((a, b) => {
  return b - a;
});
console.log("after descending sort: ", nums);

let filtered = nums.filter(function (element) {
  return element > 5;
});

console.log("After filtering numbers larger than 5 ", filtered);

console.log(Array.from(nums, (num) => num * 5));

console.log("after removing duplicate items: ", removeDuplicate(nums));
