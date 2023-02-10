export class Car {
  constructor(model, year) {
    this.model = model;
    this.year = year;
  }
  toString() {
    return `model:${this.model}, year: ${this.year}`;
  }
}
