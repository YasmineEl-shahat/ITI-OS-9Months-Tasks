num1sum = document.getElementById("num1sum");
num2sum = document.getElementById("num2sum");
resultsum = document.getElementById("resultsum");

num1mul = document.getElementById("num1mul");
num2mul = document.getElementById("num2mul");
resultmul = document.getElementById("resultmul");

num1sum.addEventListener("change", sum);

num2sum.addEventListener("change", sum);

num1mul.addEventListener("change", mul);

num2mul.addEventListener("change", mul);

function sum() {
  resultsum.value = +num1sum.value + +num2sum.value;
}

function mul() {
  resultmul.value = parseInt(num1mul.value) * parseInt(num2mul.value);
}
