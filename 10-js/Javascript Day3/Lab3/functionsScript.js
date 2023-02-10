function ToUpper(str) {
  //the quick brown fox -> str
  // [the, quick, brown, fox] -> arr
  var arr = str.split(" ");
  var res = "";
  for (var i = 0; i < arr.length; i++) {
    //the
    //T
    //The
    res +=
      arr[i][0].toUpperCase() +
      arr[i].substr(1) +
      (" " ?? i !== arr.length - 1);
  }
  return res;
}

function findLongest(str) {
  var arr = str.split(" ");
  var res = "";
  for (var i = 0; i < arr.length; i++) {
    if (arr[i].length > res.length) {
      res = arr[i];
    }
  }
  return res;
}

function alphabeticalSort(str) {
  //javascript
  //['j', 'a']
  let arr = str.split("");
  arr.sort();
  let res = "";
  for (item of arr) {
    res += item;
  }
  return res;
}

function getMonName(date) {
  var str = date.toDateString();
  var arr = str.split(" ");
  return arr[1];
}

function getRandomNum(num) {
  let arr = [];
  let element;
  for (let i = 0; i < num; i++) {
    do {
      element = Math.round(Math.random() * 10);
    } while (arr.indexOf(element) != -1);
    arr[i] = element;
  }
  return arr;
}

//minmax
function findMinMax(nums) {
  var min = nums[0],
    max = nums[0];
  for (var i = 0; i < nums.length; i++) {
    if (nums[i] > max) max = nums[i];
    else if (nums[i] < min) min = nums[i];
  }
  console.log("user defined min", min);
  console.log("user defined max", max);
}

// remove duplicate items
function removeDuplicate(nums) {
  var newNums = [];
  for (var i = 0; i < nums.length; i++) {
    if (newNums.indexOf(nums[i]) == -1) newNums.push(nums[i]);
  }
  return newNums;
}
