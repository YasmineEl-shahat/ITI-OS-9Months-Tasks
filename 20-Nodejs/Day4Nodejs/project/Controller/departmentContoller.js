const mongoose=require("mongoose");
require("./../Model/departmentModel");

const DepartmentSchema=mongoose.model("departments");

exports.getAllDepartments=(request,response,next)=>{
    
    DepartmentSchema.find({})
                    .then((data)=>{
                            response.status(200).json({data});
                    })
                    .catch(error=>{
                        next(error);
                    })
}

exports.addDepartment=async(request,response,next)=>{
  
    try
    {
        let data=await new DepartmentSchema({
                _id:request.body.id,
                name:request.body.name,
                location:request.body.location
               }).save(); 
        response.status(201).json({data});
    
    }catch(error)
    {
        next(error);
    }

    //    new DepartmentSchema({
    //     _id:request.body.id,
    //     name:request.body.name,
    //     location:request.body.location
    //    }).save()  //insertOne
    //    .then(data=>{
    //     response.status(201).json({data});

    //    })
    //    .catch(error=>next(error))


}

exports.updateDepartment=(request,response,next)=>{
    
    DepartmentSchema.updateOne({
        _id:request.body.id
    },{
        $set:{
            name:request.body.name,
            location:request.body.location
        }
    }).then(data=>{
        if(data.matchedCount==0)
        {
            next(new Error("department not found"));
        }
        else
        response.status(200).json({data:"updated"});
    })
    .catch(error=>next(error));
    
}
exports.deleteDepartment=(request,response)=>{
    response.status(200).json({data:"delete"});
}


exports.getdepartment=(request,response)=>{
    response.status(200).json({data:request.params.id});
}