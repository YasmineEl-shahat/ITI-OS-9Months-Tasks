// Express to run server and routes
const express = require("express");
const mongoose = require("mongoose");

const chatRoute = require("./Routes/chatRoute");

const { PORT } = require("./config/env");

const server = express(); // create http server -> http.createServer()

let port = PORT;
mongoose.set("strictQuery", true);

mongoose
  .connect("mongodb://127.0.0.1:27017/pushNpull")
  .then(() => {
    console.log("DB connected");
    // listen port
    server.listen(port, () => {
      console.log("server is listening....", port);
    });
  })
  .catch((error) => {
    console.log("Db Problem " + error);
  });

server.use(express.json());

// serve static files from statics folder
server.use(express.static("statics"));

// Routes
server.use(chatRoute);

// not found middleware
server.use((request, response, next) => {
  response.status(404).json({ message: "page not found" });
});

// error middleware
server.use((error, request, response, next) => {
  if (request.file) fs.unlinkSync(request.file.path);
  let status = error.status || 500;
  response.status(status).json({ message: error + "" });
});
