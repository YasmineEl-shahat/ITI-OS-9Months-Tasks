


exports.getAllDepartments=(request,response)=>{
    console.log(request.query);
    console.log(request.params);
    response.status(200).json({data:[]});
}

exports.addDepartment=(request,response,next)=>{
  
    response.status(201).json({data:"added"});
}

exports.updateDepartment=(request,response)=>{
    response.status(200).json({data:"update"});
}
exports.deleteDepartment=(request,response)=>{
    response.status(200).json({data:"delete"});
}


exports.getdepartment=(request,response)=>{
    response.status(200).json({data:request.params.id});
}