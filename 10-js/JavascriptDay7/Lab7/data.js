const getData = async function () {
  try {
    let result = await fetch("https://jsonplaceholder.typicode.com/users");
    let jsonData = await result.json();
    let table = document.querySelector("table");
    let tr = document.createElement("tr");
    for (let item in jsonData[0]) {
      let thData = jsonData[0][item];
      if (typeof thData == "string") {
        let th = document.createElement("th");
        th.innerText = item;
        tr.append(th);
      }
    }
    table.append(tr);
    for (let data in jsonData) {
      let tr = document.createElement("tr");
      for (let item in jsonData[data]) {
        let tdData = jsonData[data][item];
        if (typeof tdData == "string") {
          let td = document.createElement("td");
          td.innerText = tdData;
          tr.append(td);
        }
        table.append(tr);
      }
    }
    console.log(jsonData);
  } catch (error) {
    console.log("error", error);
  }
};

getData();
