// prettier-ignore
const colors = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#3f51b5', '#2196f3', '#03a9f4', '#00bcd4', '#009688', '#4caf50', '#8bc34a', '#cddc39', '#ffeb3b', '#ffc107', '#ff9800', '#ff5722'];
const colorsContainer = document.getElementById("color-container");
const divs = [];
let activeColor = +(localStorage.getItem("activeColor") || 0);
let radius = +(localStorage.getItem("radius") || 10);

colors.forEach((c, i) => {
  const div = document.createElement("div");
  div.style.backgroundColor = c;
  i !== activeColor || div.classList.add("active");
  div.addEventListener("click", function () {
    if (i === activeColor) return;
    divs[activeColor].classList.remove("active");
    activeColor = i;
    divs[activeColor].classList.add("active");
    localStorage.setItem("activeColor", activeColor);
  });
  divs.push(div);
  colorsContainer.appendChild(div);
});

/* radius */
const increment = document.getElementById("increment");
const decrement = document.getElementById("decrement");
const radiusResult = document.getElementById("radius-result");

// init value
radiusResult.textContent = radius;

function changeRadius(by) {
  radius += by;
  radiusResult.textContent = radius;
  localStorage.setItem("radius", radius);
}

increment.addEventListener("click", () => {
  if (radius === 50) return;
  changeRadius(1);
});

decrement.addEventListener("click", () => {
  if (radius === 10) return;
  changeRadius(-1);
});

const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

const { offsetWidth: w, offsetHeight: h } = canvas.parentElement;
canvas.width = w;
canvas.height = h;

function onMouseMove({ clientX: x, clientY: y }) {
  ctx.beginPath();
  ctx.arc(x, y, radius, 0, Math.PI * 2);
  ctx.fillStyle = colors[activeColor];
  ctx.fill();
  ctx.closePath();
}

canvas.addEventListener("mousedown", (e) => {
  onMouseMove(e);
  canvas.onmousemove = onMouseMove;
});

canvas.addEventListener("mouseup", () => {
  canvas.onmousemove = null;
});

/* download canvas */
const download = document.getElementById("download");
download.addEventListener("click", function () {
  const href = canvas.toDataURL("image/png");

  const a = document.createElement("a");
  a.setAttribute("download", "canvas-image.png");
  a.setAttribute("href", href);
  a.style.display = "none";
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
});
