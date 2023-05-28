function evaluateScore(score) {
  if (score < 0) {
    return "Invalid";
  } else if (score < 50) {
    return "Failed";
  } else if (score < 65) {
    return "Passed";
  } else if (score < 75) {
    return "Good";
  } else if (score < 85) {
    return "V.Good";
  } else if (score < 100) {
    return "Excellent";
  } else {
    return "In";
  }
}

describe("evaluateScore", function () {
  it("should return 'Invalid' for scores less than 0", function () {
    expect(evaluateScore(-10)).toEqual("Invalid");
  });

  it("should return 'Failed' for scores between 0 and 50 (exclusive)", function () {
    expect(evaluateScore(25)).toEqual("Failed");
  });

  it("should return 'Passed' for scores between 50 and 65(inclusive)", function () {
    expect(evaluateScore(60)).toEqual("Passed");
  });

  it("should return 'Good' for scores between 65 and 75 (inclusive)", function () {
    expect(evaluateScore(70)).toEqual("Good");
  });

  it("should return 'V.Good' for scores between 75 and 85 (inclusive)", function () {
    expect(evaluateScore(80)).toEqual("V.Good");
  });

  it("should return 'Excellent' for scores between 85 and 100 (exclusive)", function () {
    expect(evaluateScore(95)).toEqual("Excellent");
  });

  it("should return 'In' for scores greater than or equal to 100", function () {
    expect(evaluateScore(110)).toEqual("In");
  });
});
