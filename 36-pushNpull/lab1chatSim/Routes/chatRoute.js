const express = require("express");
const ChatController = require("../Controller/chatController");

const router = express.Router();

router.route("/chat").get(ChatController.getChat).post(ChatController.postChat);

router
  .route("/long/chat")
  .get(ChatController.getLongChat)
  .post(ChatController.postLongChat);

module.exports = router;
