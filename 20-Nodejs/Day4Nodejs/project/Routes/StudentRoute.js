const express=require("express");

const controller=require("./../Controller/studentController");
const router=express.Router();


// body("id") , body("name"), body("location")


router.route("/students")
    .get(controller.getAllStudents)
    .post(controller.insertStudent)
   

module.exports=router;