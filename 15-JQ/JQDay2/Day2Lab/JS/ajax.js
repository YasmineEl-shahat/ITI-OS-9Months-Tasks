$(function () {
  $("#dtJSONP").on("click", function () {
    $.ajax({
      type: "get",
      url: "https://jsonplaceholder.typicode.com/comments", //===>Requset===>URL Local
      success: function (res) {
        res = res.splice(0, 20);
        for (let i = 0; i < res.length; i++) {
          const header = `<h3>${res[i].name}</h3>`;
          $("#accordion").append(header);
          const comment = `<div><p>${res[i].body}</p></div>`;
          $("#accordion").append(comment);
        }
        $("#accordion").accordion();
      },
    });
  });
});
