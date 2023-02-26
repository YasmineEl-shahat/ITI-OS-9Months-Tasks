const express=require("express");
const cors=require("cors");
const mongoose=require("mongoose");
const departmentRoute=require("./Routes/departmentRoute")
const studentRoute=require("./Routes/StudentRoute")

/************** server */
const server=express();   //http.createServer()
let port=process.env.PORT||8080; //swagger


mongoose.set('strictQuery', true);
mongoose.connect("mongodb://127.0.0.1:27017/ITIDB")
        .then(()=>{
            console.log("DB connected");
            server.listen(port,()=>{
                console.log("server is listenng.....",port);
            });
        })
        .catch(error=>{
            console.log("Db Problem "+error);
        })


/******************* */

server.use(cors());  
server.use((request,response,next)=>{
    console.log(request.url,request.method);
    next();
});

server.use(express.json());
server.use(express.urlencoded({extended:false}));
//Routes  
server.use(departmentRoute);
server.use(studentRoute);



//-------Not found MW
server.use((request,response)=>{

    response.status(404).json({message:"Not Found"});

});
//-------Error MW
server.use((error,request,response,next)=>{
    let status=error.status||500;
    response.status(status).json({message:error+""});
})






