/**************************************
 one-to-one Relation  ----Instructor and Address
***************************************/
//Sql server   
//mongoDB
// instrcutors(_id,,,,,,,,,,,,,,,,address:{city,street})

/**************************************
 one-to-many  Relation  ----Student and Department
                        ----Student and addresses
***************************************/
//Sql server  Student(PK,,,,,,FKAddresses)   Addresses(PK)
//MongoDB     Student(_id,,,,,,,,Addresses:[{},{}])

// Student - Department

//1- refrence
// Student(_id,,,,,,,,department:_idDepartment);
// Departments(_id,,,,,,,,)
//2- Embdeded
// students(_id,,,,,,,,,,,,,,,, department:{_id,name,supervisor,branches,,,,,})

// 3- embeded 
// Student(_id,,,,,,,,department:{_id,name,supervisor,branches,,,,,});
// Departments(_id,,,,,,,,)

//4- 
// Departments(_id,,,,,,,,,,,,,,,students:[{},{},{},{}]);

//5   refrence and emdeded
// students(_id,firstName,,,,,,,,,,,,, department:{_id,name})
// departemnts(_id,name, location , manger, branches)



/**************************************
 many-to-many Relation  ----Students and Subjects
***************************************/
// 
// students(_id,,,,,,,,,,,,)
// subjects(_id,name, standardGrade,,,,,,,,,)
// subjects(_idStudent,_idSubject,grade,1stCorrective,2ndCorrective)


// 
// students(_id,,,,,,,,,,,, subjects:[{_id,name,grade},{}])
// subjects(_id,name, standardGrade,,,,,,,,)
// // subjects(_idStudent,_idSubject,grade,1stCorrective,2ndCorrective)


db.students.find({},{firstName:1,lastName:1,department:1})