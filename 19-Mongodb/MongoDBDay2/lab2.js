
//  find({condition},{projection})
db.instructors.find();
// comparisions
db.instructors.find({salary: {$gt:4000}},{firstName:1,salary:1});
db.instructors.find({age: {$lte:21} });
// embeded Object
db.instructors.find({"address.city":"mansoura", "address.street":{$in:[10, 14]}},{firstName:1, address:1, salary:1});
//Display all instructors that have js and jquery in their courses (both of them not one of them 
// array operator 'all'
db.instructors.find({courses:{$all:["js","jquery"]}})

// Display number of courses for each instructor and display first name with number of courses
let coursessArray = db.instructors.find({courses:{$exists:true}},{courses:1, _id:0}).toArray();
let namesArray = db.instructors.find({},{firstName:1, _id:0}).toArray();
for(let i in namesArray)
{
    print(`${namesArray[i].firstName} ${coursessArray[i].courses.length}` );
}
// Write mongodb query to get all instructors that have firstName and lastName properties ,
// sort them by firstName ascending then by
// lastName descending and finally display their data FullName and age
// elements Operators $exists
db.instructors.find({firstName:{$exists:true}, lastName:{$exists:true}} ,{firstName:1, lastName:1, age:1});
let sortedInstructors = db.instructors.aggregate([{$sort: {firstName: 1, lastName: -1}}]).toArray();
for(let instructor of sortedInstructors)
{
    print(`FullName: ${instructor.firstName} ${instructor.lastName}, Age: ${instructor.age}`);
}

// Delete instructor with first name “ebtesam” and has only 5 courses 
db.instructors.deleteOne({firstName:"ebtesam", courses:{$size:5}});
// Add active property to all instructors and set its value to true
db.instructors.updateMany(
    //condition
    {}
    , 
     //upadtes
    {
        // add new filed fo all documents active:true
        $set:{active:true}
    }
    ,
     //options
     {
         
     }
    )
     
// Change “EF” course to “jquery” for “mazen mohammed” instructor
// (without knowing EF Index in courses array)
     
 db.instructors.updateOne(
//condition
{
    firstName: "mazen",
    lastName: "mohammed",
    courses:"EF"
}
, 
 //upadtes
{
    $set:{"courses.$":"jquery"}
}
,
 //options
 {
     
 }
)
//  Add jquery course for “noha hesham”
db.instructors.updateOne(
//condition
{
    firstName: "noha",
    lastName: "hesham",
}
, 
 //upadtes
{
    //add elm to array
    $addToSet:{courses:"jquery"}
}
,
 //options
 {
     
 }
)

// Remove courses property for “ahmed mohammed ” instructor
db.instructors.updateOne(
//condition
{
    firstName: "ahmed",
    lastName: "mohammed",
}
, 
 //upadtes
{
  
   //remove property
    $unset:{"courses":""}
}
,
 //options
 {
     upsert:true
 }
)
// Decrease salary by 500 for all instructors that has only 3 courses ($inc)
db.instructors.updateMany(
//condition
{
   courses: {$size:3}
}
, 
 //upadtes
{
  
   //remove property
   $inc:{salary:-500}
}
,
 //options
 {
     
 }
)
 
//  Rename address field for all instructors to fullAddress.
 db.instructors.updateMany(
//condition
{}
, 
 //upadtes
{
  
   // rename property
   $rename:{address:"fullAddress"}
}
,
 //options
 {}
)
 
// Change street number for noha hesham to 20
db.instructors.updateMany(
//condition
{
     firstName: "noha",
    lastName: "hesham",
}
, 
 //upadtes
{
    // dealing with embeded object  
    $set:{"fullAddress.street":20}
}
,
 //options
 {}
)
 


// craete collection with schema
db.createCollection("workers",{
    validator:{
        $jsonSchema:{
            bsonType:"object",
            required:["fullName", "salary", "age"],
            additionalProperties:false,
            properties:{
                _id:{bsonType:"number"},
                fullName:{bsonType:"string"},
                salary:{bsonType:"number", minimum: 2000},
                age:{bsonType:"number", minimum: 25, maximum: 45},                
                locations: {bsonType: "array" , minItems: 1, uniqueItems: true, items: {bsonType: "string"}}
           }
        }
   }
});//options

db.workers.insertOne({_id: 1, "fullName": "adele", "salary": 10000, "age": 25})
db.workers.insertOne({_id: 2, "fullName": "adele", "salary": 10000, "age": 45})
db.workers.insertOne({_id: 3, "fullName": "yasmine", "salary": 20000, "age": 45, locations:[]})
db.workers.insertOne({_id: 3, "fullName": "yasmine", "salary": 20000, "age": 45, locations:["man","cai", "man"]})
db.workers.insertOne({_id: 3, "fullName": "yasmine", "salary": 20000, "age": 45, locations:["man","cai"]})

db.workers.find();