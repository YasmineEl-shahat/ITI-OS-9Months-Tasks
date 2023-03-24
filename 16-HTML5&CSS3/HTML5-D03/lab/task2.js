images = document.querySelectorAll("img");
let divs = document.getElementsByTagName("div");
topp = document.getElementsByClassName("top")[0];
bottom = document.getElementsByClassName("bottom")[0];

let top_images = images.length;
let bottom_images = 0;

let topEmpty = top_images || true;
let bottomEmpty = bottom_images || true;
function dragStart(e) {
  e.dataTransfer.setData("img", e.target.outerHTML);
}
function dragEnd(e) {
  e.preventDefault();
  let data_stock = e.target.getAttribute("data_stock");
  if (e.dataTransfer.dropEffect !== "none") {
    data_stock--;
    e.target.setAttribute("data_stock", data_stock);
  }
  if (!data_stock) {
    if (e.target.parentElement == topp) {
      top_images--;
      bottom_images++;
    } else {
      top_images++;
      bottom_images--;
    }
    e.target.style.display = "none";
  }
  topEmpty = !top_images;
  bottomEmpty = !bottom_images;
  if (topEmpty) {
    topp.innerHTML = `<p>Empty</p>`;
  }
  if (bottomEmpty) {
    bottom.innerHTML = `<p>Empty</p>`;
  }
}
for (let div of divs) {
  div.addEventListener("dragstart", function (event) {
    if (event.target.className == "img") {
      dragStart(event);
    }
  });
  div.addEventListener("dragend", function (event) {
    if (event.target.className == "img") {
      dragEnd(event);
    }
  });
}
function drop(e) {
  // remove empty
  if (e.target.querySelector("p")) {
    let p = e.target.querySelector("p");
    p.remove();
  }
  e.preventDefault();
  e.target.innerHTML += e.dataTransfer.getData("img");
  // e.target.append(document.querySelector("#" + e.dataTransfer.getData("img")));
}
function dragEnter(e) {
  e.preventDefault();
  //if i want to use hex value for color i shoud usr background instead of backgroundColor
  e.target.style.background = "#a6a6fc";
}
bottom.addEventListener("drop", drop);
bottom.addEventListener("dragenter", dragEnter);
topp.addEventListener("dragenter", dragEnter);
bottom.addEventListener("dragover", function (e) {
  e.preventDefault();
});
topp.addEventListener("dragover", function (e) {
  e.preventDefault();
});

topp.addEventListener("drop", drop);
