db.instructors.insertOne({ firstName: "", lastName: "" });

// db.instructors.insertMany(instructorsArray);

db.instructors.find({});
db.instructors.find();
db.instructors.findOne();
db.instructors.find().constructor.name;
db.instructors.find({}, { firstName: 1, address: 1 });
let instructors = db.instructors.find().toArray();
instructors.sort((a, b) => a.salary - b.salary);
print("minsalary=", instructors[0].salary);
print("maxsalary=", instructors[instructors.length - 1].salary);
let avarage = 0;
instructors.forEach((instructor) => (avarage += instructor.salary));
avarage /= instructors.length;
