
//console.log(printValue(1,2,3));
let localVar=90;

// function printValue(value1,value2,value3=0)
// {
//     console.log("inside fun",localVar); //
//    var localVar=3 , testingVar=5;
   
//    console.log("inside fun after definintion",localVar);
//     console.log(arguments);
//     return [value1,value2,value3];
// }

//function expression 
//  let printValue = function (value1,value2,value3=0)
// {
//     console.log("inside fun",localVar); //
//    var localVar=3 , testingVar=5;
   
//    console.log("inside fun after definintion",localVar);
//     console.log(arguments);
//     return [value1,value2,value3];
// }

// arrow function 
let printValue =  (value1,value2,value3=0) =>
{
    console.log("inside fun",localVar); //
   var localVar=3 , testingVar=5;
   
   console.log("inside fun after definintion",localVar);
    // console.log(arguments);
    return [value1,value2,value3];
}

function ValidateEmail(email)
{
    var mailformat = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    return mailformat.test(email);
}