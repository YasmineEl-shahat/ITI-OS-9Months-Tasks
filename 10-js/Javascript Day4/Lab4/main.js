let dateStr;

setInterval(function () {
  dateStr = new Date().toLocaleString();
  document.title = dateStr;
}, 1000);
