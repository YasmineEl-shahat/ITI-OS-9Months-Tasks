const mongoose = require("mongoose");

require("../Model/chatModel");

const chatSchema = mongoose.model("chat");

// short polling
exports.getChat = (request, response, next) => {
  const { lastTimeStamp } = request.query;
  const query = lastTimeStamp
    ? { createdAt: { $gt: new Date(lastTimeStamp) } }
    : {};

  chatSchema
    .find(query)
    .exec()
    .then((data) => response.status(200).json(data))
    .catch((error) => next(error));
};

exports.postChat = (request, response, next) => {
  new chatSchema({ content: request.body.content })
    .save()
    .then((data) => response.status(201).json(data))
    .catch((error) => next(error));
};

// long polling
// subscribers
const subscribers = {};

exports.getLongChat = (request, response) => {
  let id = Math.floor(Math.random() * 100000);
  subscribers[id] = response;
  request.on("close", () => {
    delete subscribers[id];
  });
};
exports.postLongChat = async (request, response, next) => {
  const chat = await chatSchema.create({ content: request.body.content });
  Object.keys(subscribers).forEach((id) => {
    subscribers[id].json(chat);
    delete subscribers[id];
  });
  response.status(201).json(chat);
};
