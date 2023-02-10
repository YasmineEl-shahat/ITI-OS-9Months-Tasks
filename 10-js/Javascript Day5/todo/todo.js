//add event listner
var table = document.getElementsByTagName("table")[0];
var tbody = document.getElementsByTagName("tbody")[0];

var classstyleodd = "";
var classstyleeven = "";
var checkbox = "";

document.querySelector("#submit").addEventListener("click", function () {
  var input = document.getElementsByTagName("input")[0];
  if (input.value !== "") {
    var tr = document.createElement("tr");
    tr.innerHTML = `<th><input type="checkbox" class='selectedelem'></th>
        <th>${input.value}</th>
        <th><button  style=" border: none;"><i class="deletbtn fas fa-trash-alt"></i></button></th>`;
    tbody.appendChild(tr);
    input.value = "";
  }
});

window.addEventListener("load", function () {
  table.addEventListener("click", function (ev) {
    if (ev.target.className === "selectedelem")
      ev.target.parentElement.nextElementSibling.classList.toggle("selected");

    if (ev.target.className.includes("deletbtn")) {
      ev.target.parentElement.parentElement.parentElement.remove();
    }
  });
});
