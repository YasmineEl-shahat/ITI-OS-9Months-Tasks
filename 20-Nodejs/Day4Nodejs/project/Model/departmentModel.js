const mongoose=require("mongoose");


//create schema objcet
const schema=new mongoose.Schema({
    _id:Number,
    name:{type:String,required:true},
    location:String
});

//mapping
mongoose.model("departments",schema);

//setter
// mongoose.model(collectionName, schemaObejct);
//getter
// const schemaObject= mongoose.model(collectionName);



