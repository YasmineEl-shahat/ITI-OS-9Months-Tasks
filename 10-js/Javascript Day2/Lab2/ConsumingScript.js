//console.log(value1);
//printValue();
//console.log(testingVar);//local variable can not be access
console.log(localVar);
console.log(printValue(1, 2));
console.log(printValue(1, 2, 3, 4, 5));
console.log(localVar);
//console.log(localVar); //local variable can not be access
//console.log(testingVar);//local variable can not be access

do {
  username = prompt("enter name");
  console.log(username.toUpperCase());
} while (!isNaN(Number(username)));

let n = Number(prompt("enter number of students"));

let students = [];
let names = [];
for (let i = 0; i < n; i++) {
  students[i] = prompt("student data(Name , id , email , track)").split(",");
  names[i] = students[i][0];
  students[i][2] = students[i][2].trim();
  while (isNaN(students[i][1])) students[i][1] = prompt("invalid id, enter id");

  while (!ValidateEmail(students[i][2])) {
    students[i][2] = prompt("invalid mail, enter mail");
  }
  students[i][3] = students[i][3].trim();
  while (!["SD", "AI", "OS"].includes(students[i][3]))
    students[i][3] = prompt("invalid track, enter track");
}

console.table("name", names);
