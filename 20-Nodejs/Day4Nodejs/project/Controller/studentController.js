const { default: mongoose } = require("mongoose");

require("./../Model/studentModel");
const StudentSchema=mongoose.model("students");
const DepartmentSchema=mongoose.model("departments");

exports.getAllStudents=(request,response,next)=>{

    StudentSchema.find({})
                .populate({path:"department",select:{name:1}})
                // .populate({path:"supervisor",select:{fullName:1}})
                .then(data=>{
                    response.status(200).json({data})
                })
                .catch(error=>next(error))
}
exports.insertStudent=async(request,response,next)=>{

        // DepartmentSchema.findOne({_id:request.body.department},{_id:1})
        //                 .then(data=>{
        //                        if(data==null)
        //                        {
        //                             next(new Error("Department not Found"))
        //                        }
        //                        else
        //                       return new  StudentSchema({
        //                                 _id:request.body.id,
        //                                 userName:request.body.name,
        //                                 password:request.body.password,
        //                                 department:request.body.department
        //                             }).save()        
        //                 })
        //                 .then(data=>{
        //                     response.status(201).json({data})
        //                 })
        //                 .catch(error=>next(error))
        try
        {
            let department=await DepartmentSchema.findOne({_id:request.body.id},{_id:1});
            if(department==null)
            throw new Error("department not found");

            let data=await new StudentSchema({
                                                _id:request.body.id,
                                                userName:request.body.name,
                                                password:request.body.password,
                                                department:request.body.department
                                            }).save() 

             response.status(201).json({data})

        }catch(error)
        {
            next(error);
        }
        
        
        

}