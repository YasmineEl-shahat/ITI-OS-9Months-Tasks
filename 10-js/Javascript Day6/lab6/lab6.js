class Engine {
  #image;
  static #count = 0;
  // <img src="" />
  constructor(src) {
    if (this.constructor.name == "Engine") {
      throw new Error("Engine is abstract class can't be instantiated");
    }
    let img = document.createElement("img");
    img.src = src;
    this.#image = img;
    this.#image.style.position = "absolute";
    this.#image.style.width = 200 + "px";
    this.#image.style.height = 100 + "px";
    Engine.#count++;
  }
  static get count() {
    return Engine.#count;
  }
  get image() {
    return this.#image;
  }
}

class Car extends Engine {
  constructor(src, x, y) {
    super(src);
    this.image.style.left = x + "px";
    this.image.style.top = y + "px";
    this.left = x;
    document.body.append(this.image);
  }
  moveLeft(value) {
    this.image.classList.add("flip");
    if (this.left > 0) {
      this.left -= value;
      this.image.style.left = this.left + "px";
    }
  }
  moveRight(value) {
    this.image.classList.remove("flip");
    if (this.left < window.innerWidth - (this.image.width + 7)) {
      this.left += value;
      this.image.style.left = this.left + "px";
    }
  }
  changeStyle(object) {
    for (let key in object) {
      this.image.style[key] = object[key];
    }
  }
  moveCar(direction) {
    if (direction == "left") {
      let leftInterval = setInterval(() => {
        if (this.left > 0) this.moveLeft(10);
        else clearInterval(leftInterval);
      }, 10);
    } else if (direction == "right") {
      let rightInterval = setInterval(() => {
        if (this.left < window.innerWidth - (this.image.width + 7))
          this.moveRight(10);
        else clearInterval(rightInterval);
      }, 10);
    }
  }
  toString() {
    console.log(`x:${this.image.x}, y: ${this.image.y}, src:${this.image.src}`);
  }
}
let car = new Car("car.png", 300, 200);
car + "";
window.addEventListener("load", function () {
  window.addEventListener("keydown", function (event) {
    if (event.key == "ArrowRight") {
      car.moveRight(10);
    } else if (event.key == "ArrowLeft") {
      car.moveLeft(10);
    } else if (event.key == "ArrowUp") {
      car.moveCar("left");
    } else if (event.key == "ArrowDown") {
      car.moveCar("right");
    }
  });
});
