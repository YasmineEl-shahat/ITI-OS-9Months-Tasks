function carSpeed(speed) {
  if (speed < 0 || speed >= 220) {
    return "Invalid";
  } else if (speed < 40) {
    return "Low";
  } else if (speed < 120) {
    return "Normal";
  } else if (speed < 200) {
    return "High";
  } else {
    return "V.High";
  }
}
describe("Car speed function", function () {
  it("should return Invalid when speed is less than 0", function () {
    expect(carSpeed(-10)).toEqual("Invalid");
  });

  it("should return Low when speed is between 0 and 40", function () {
    expect(carSpeed(20)).toEqual("Low");
  });

  it("should return Normal when speed is between 40 and 120", function () {
    expect(carSpeed(80)).toEqual("Normal");
  });

  it("should return High when speed is between 120 and 200", function () {
    expect(carSpeed(150)).toEqual("High");
  });

  it("should return V.High when speed is between 200 and 220", function () {
    expect(carSpeed(210)).toEqual("V.High");
  });

  it("should return Invalid when speed is greater than or equal to 220", function () {
    expect(carSpeed(300)).toEqual("Invalid");
  });
});
