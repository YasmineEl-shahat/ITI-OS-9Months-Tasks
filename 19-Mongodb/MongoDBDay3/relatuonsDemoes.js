// db.students.find({},{firstName:1,lastName:1,department:1})
//             .forEach(student=>{
//                 
//                 let department=db.departments.findOne({_id:student.department}).name
//                 
//                 print(`${student.firstName} ${department}`)
//                 });
//                 
//  let departments=db.departments.find({},{name:1}).toArray();
// 
// db.students.find({},{firstName:1,lastName:1,department:1})
//             .forEach(student=>{
//                 
//                 let department=departments
//                                 .find(object=>object._id==student.department)
//                                 .name
//                 
//                 print(`${student.firstName} ${department}`)
//                 });




















