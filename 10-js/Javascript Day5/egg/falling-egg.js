let basket = document.querySelector("#basket");
basket.style.left = 0 + "px";
basket.style.right = window.innerWidth - (basket.offsetWidth + 10) + "px";
function moveLeft(value, element) {
  let left = element.offsetLeft;
  if (left > 10) {
    console.log(left);
    left -= value;
    element.style.left = left + "px";
  }
}
function moveRight(value, element) {
  let left = element.offsetLeft;
  if (left < window.innerWidth - (element.offsetWidth + 10)) {
    left += value;

    element.style.left = left + "px";
  }
}
window.addEventListener("load", function () {
  let egg = document.createElement("img");
  egg.src = "images/egg.png";
  egg.style.width = "200px";
  egg.style.height = "200px";
  let x = Math.round(Math.random() * window.innerWidth - egg.width);
  egg.classList.add("egg");

  egg.style.left = x + "px";
  egg.style.right = window.innerWidth - (egg.offsetWidth + x + 10) + "px";
  document.body.append(egg);
  let top = 0;
  let fall = setInterval(function () {
    if (top > window.innerHeight - (egg.height + 20)) {
      clearInterval(fall);
      setTimeout(function () {
        if (
          parseInt(egg.style.left) >= parseInt(basket.style.left) &&
          parseInt(egg.style.right) >= parseInt(basket.style.right)
        )
          egg.remove();
        else egg.src = "images/broken.png";
      }, 1000);
    }
    top += 10;
    egg.style.top = top + "px";
  }, 10);
  window.addEventListener("keydown", function (event) {
    if (event.key == "ArrowRight") {
      moveRight(50, basket);
    } else if (event.key == "ArrowLeft") {
      moveLeft(50, basket);
    }
  });
});
