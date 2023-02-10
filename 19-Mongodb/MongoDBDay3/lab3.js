use ITIDB
// Display Instructors Full Name and Instructor Address
db.instructors.aggregate([
    
    //satge2 (accumelators) $concat
    {
        $project:{
            fullName:{$concat:["$firstName"," ","$lastName"]},
            address:"$address", 
        }//project
    }
   
]);
    
// Display student full Name and Department Name for All Students

let departments=db.departments.find({},{name:1}).toArray();

db.students.find({},{firstName:1,lastName:1,department:1})
    .forEach(student=>{
        
        let department=departments
                        .find(dept=>dept._id==student.department)
                        .name
        
        print(`${student.firstName} ${student.lastName} ${department}`)
});

// Display student full Name and student Addresses City for All Students

db.students.find({},{firstName:1,lastName:1,addresses:1})
    .forEach(student=>{
       
        print(`${student.firstName} ${student.lastName} `)
        let addresses = student.addresses;
        addresses.forEach(add =>  print(`${add.city}`))
});


// Display student Name the students subjects
let subjects=db.subjects.find({},{name:1}).toArray();

db.students.find({},{firstName:1, department:1, subjects:1})

    .forEach(student=>{
        
        print(`${student.firstName}`);
        student.subjects.forEach(subj=>{
              let Subject=subjects
                        .find(sub=>sub._id==subj)
                        .name
              print(`${Subject}`);
        })
      
});
db.students.aggregate([
    {
        $lookup:{
            from:"subjects",
            localField:"subjects",
            foreignField:"_id",
            as :"subjects"
            }// lookup     
     }// stage1
     ,
     {
        $project:{
            fullName:{$concat:["$firstName"," ","$lastName"]},
            subject:"$subjects.name", 
        }//project
    }

])
// Display student Names who study Jquery
db.students.aggregate([
    {
        $lookup:{
            from:"subjects",
            localField:"subjects",
            foreignField:"_id",
            as :"subjects"
            }// lookup     
     }// stage1
     ,
     {
         $match:
         {
             "subjects.name":{$all:["jquery"]}
         }
     },
     {
        $project:{
            fullName:{$concat:["$firstName"," ","$lastName"]},
            subject:"$subjects.name", 
        }//project
    }

])
    
use inventory
//  Display employees fullname and department name for all employees
db.employee.aggregate([
    {
        $lookup:{
            from:"department",
            localField:"department_id",
            foreignField:"department_id",
            as :"dept"
            }// lookup     
     }// stage1
    ,
     {
        $project:{
            fullName:"$full_name",
            department:"$dept.department_description", 
        }//project
    }

])
//     Display employees with position “VP Country Manager” (only
// display employee full name and salary)
    use inventory
    db.employee.aggregate([
    //satge1
    {
        $match:{position_title:{$eq:"VP Country Manager"}}
    }//satge 1
    ,
   
    {
        $project:{_id:0, full_name:1,salary:1}
       
    }//stage2
    
]);
    
// Display customers full names and their regions
use inventory
db.customer.aggregate([
    {
        $lookup:{
            from:"region",
            localField:"address.customer_region_id",
            foreignField:"region_id",
            as :"region"
            }// lookup     
     }// stage1
    ,
     {
        $project:{
            fullName:{$concat:["$fname"," ","$lname"]},
            region:"$region", 
        }//project
    }

])
    
// In product find all products that was branded by “Washington“
db.product.aggregate([
        {
            $match:{
                brand_name:{$eq:"Washington"}
                }
         }
    ])