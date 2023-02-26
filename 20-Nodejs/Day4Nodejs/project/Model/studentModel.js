const mongoose=require("mongoose");

const schema=new mongoose.Schema({
    _id:Number,
    userName:{type:String,required:true},
    password:{type:String,required:true},
    image:String,
    department:{type:Number, ref:"departments"},
    // supervisor:{type:Number,ref:"instructors"}

});

mongoose.model("students",schema);