// db.instructors.aggregate([
//     //satge1
//     {
//         $match:{age:{$gt:20}}
//     }//satge 1
//     ,
//     //satge2  (accumelators) $concat
//     {
// //         $project:{firstName:1,lastName:1,age:1}
//         $project:{
//             instructorAge:"$age", 
//             fullName:{$concat:["$firstName"," ","$lastName"]}
//             }//project
//     }//stage2
//     //satge3
//     ,
//     {
//         $match:{instructorAge:{$gt:21}}
//         
//     }
//     
// 
// ]);

// 
// db.instructors.aggregate([
//      {
//          $group:{
// //                 _id:"$age",
//                  _id:{age:"$age",city:"$address.city"}       , 
//                  count:{$sum:1} ,
//                  sumSalary:{$sum:"$salary"},
//                  maxSalary:{$max:"$salary"}}
//       } 
//     ,
//     {
//          $project:{
//             _id:0,
//              group:{age:"$_id.age", city:"$_id.city"}
//              
//              }
//         
//      }  
//     
//     ])
// 
// 



// $lookup

// _id===Number(id)

db.students.aggregate([
    {
            $lookup:{
                from:"departments",
                localField:"department",
                foreignField:"_id",
                as :"dept"
                
                }
        
     }


])

































