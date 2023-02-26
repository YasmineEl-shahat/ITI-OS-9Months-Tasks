const express=require("express");
const {body,param,query}=require("express-validator");
const validateMW=require("./../Core/validations/validateMW");
const controller=require("./../Controller/departmentContoller");
const router=express.Router();


// body("id") , body("name"), body("location")


router.route("/departments")
    .get([
        body("id").Optional().isInt().withMessage("department Id should be integer"),
        body("name").isAlpha().withMessage("departmenName should be string")
                    .isLength({max:10}).withMessage("department name <10")
    ],validateMW,controller.getAllDepartments)
    .post(validatePostArray,validateMW,controller.addDepartment)
    .patch(validatePostArray,validateMW,controller.updateDepartment)
    .delete(controller.deleteDepartment)

router.get("/departments/:id",controller.getdepartment)



// more options  to write your end points 
//router.delete("/departments/:id",controller.getdepartment)
// router.route("/departments/:id")
//      .get(controller.getdepartment)
//     .delete(controller.deleteDepartment)


module.exports=router;