const mongoose = require("mongoose");

const ChatSchema = new mongoose.Schema(
  { content: { type: String, required: true } },
  { timestamps: true }
);

mongoose.model("chat", ChatSchema);
