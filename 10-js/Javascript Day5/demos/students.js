function ToUpper(str) {
  //the quick brown fox -> str
  // [the, quick, brown, fox] -> arr
  var arr = str.split(" ");
  var result = "";
  for (var i = 0; i < arr.length; i++) {
    //the
    //T
    //The
    result +=
      arr[i][0].toUpperCase() +
      arr[i].substr(1) +
      (" " ?? i !== arr.length - 1);
  }
  return result;
}

function addStudent(name, grade, tableData) {
  let trObject = document.createElement("tr"); //<tr></tr>
  let tdObject = document.createElement("td"); //<td></td>
  tdObject.innerText = ToUpper(name);
  trObject.append(tdObject);
  tableData.append(trObject);
  tdObject = document.createElement("td"); //<td></td>
  tdObject.innerText = ToUpper(grade);
  trObject.append(tdObject);

  tdObject = document.createElement("td"); //<td></td>
  let deleteButton = document.createElement("button");
  deleteButton.innerText = "delete";
  deleteButton.onclick = function () {
    const student =
      this.parentElement.parentElement.firstChild.innerText.toLowerCase();
    const index = studentNames.indexOf(student);
    studentNames.splice(index, 1);
    this.parentElement.parentElement.remove();
  };
  tdObject.append(deleteButton);
  trObject.append(tdObject);

  //department
  let departmentValue = document.querySelector(
    "input[name=Department]:checked"
  ).value;

  trObject.classList.add(departmentValue);
}
window.addEventListener("load", function () {
  let addButton = document.querySelector("input[value=Add]");
  let nameTxtBox = document.querySelector("input[name=studentName]");
  let gradeTxtBox = document.querySelector("input[name=studentGrade]");
  let tableData = document.querySelector("table#studentsData");
  let spanName = document.querySelector("#nameError");
  let gradeSpan = document.querySelector("#gardeError");
  let search = document.querySelector("input[name=searchTxt]");
  let successSelect = document.querySelector("select");
  let sortSelect = document.querySelector("#sort");
  let studentNames = [];
  let students = [];
  // action adding
  addButton.onclick = function () {
    if (nameTxtBox.value === "") {
      spanName.innerText = "Name is Required";
      spanName.style.display = "inline";
      gradeSpan.style.display = "none";
    } else {
      let name = nameTxtBox.value.toLowerCase();
      if (
        gradeTxtBox.value > 100 ||
        gradeTxtBox.value < 0 ||
        !gradeTxtBox.value ||
        isNaN(Number(gradeTxtBox.value))
      ) {
        gradeSpan.style.display = "inline";
      } else if (studentNames.indexOf(name) === -1) {
        spanName.style.display = "none";
        gradeSpan.style.display = "none";
        studentNames.push(name);
        students.push({ name, grade: gradeTxtBox.value });
        addStudent(nameTxtBox.value, gradeTxtBox.value, tableData);
      } else {
        spanName.innerText = "This name is taken before";
        gradeSpan.style.display = "none";
        spanName.style.display = "inline";
      }
    }
  };
  // success filteration
  successSelect.onchange = function () {
    const elements = tableData.querySelectorAll("tr");

    if (successSelect.value === "success") {
      for (const element of elements) {
        if (element.children[1].textContent >= 60) {
          element.style.display = "";
        } else {
          element.style.display = "none";
        }
      }
    } else if (successSelect.value === "fail") {
      for (const element of elements) {
        if (element.children[1].textContent < 60) {
          element.style.display = "";
        } else {
          element.style.display = "none";
        }
      }
    } else {
      for (const element of elements) {
        element.style.display = "";
      }
    }
  };

  //sort
  sortSelect.onchange = function () {
    let newStudents = [...students];
    if (sortSelect.value == "name") {
      newStudents.sort((a, b) => {
        if (a.name > b.name) return 1;
        else if (a.name < b.name) return -1;
        else return 0;
      });
      tableData.innerText = "";
      for (let student of newStudents) {
        addStudent(student.name, student.grade, tableData);
      }
    } else if (sortSelect.value == "grade") {
      newStudents.sort((a, b) => a.grade - b.grade);
      tableData.innerText = "";
      for (let student of newStudents) {
        addStudent(student.name, student.grade, tableData);
      }
    } else {
      tableData.innerText = "";
      for (let student of students) {
        addStudent(student.name, student.grade, tableData);
      }
    }
  };
  // search by name
  function searchHandler() {
    const elements = tableData.querySelectorAll("tr");
    const searchValue = search.value.toLowerCase();
    for (const element of elements) {
      const name = element.children[0].textContent.toLowerCase();
      if (name.includes(searchValue)) element.style.display = "";
      else element.style.display = "none";
    }
  }
  search.onkeyup = searchHandler;
  //   search.addEventListener("keyup", "keypress")
}); //load
