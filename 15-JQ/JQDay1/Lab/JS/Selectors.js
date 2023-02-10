$(function () {
  $("p,li").css({
    backgroundColor: "lightgreen",
  });

  $(".a").css({
    border: "3px solid green",
  });

  $("img").css({
    border: "3px solid green",
    width: "200px",
    height: "200px",
  });
  $("div > p").css({
    color: "cyan",
    backgroundColor: "black",
  });
  $("p:first+p").css({
    color: "blue",
    fontSize: "20px",
  });

  $("div > p").nextAll("p").css({
    color: "white",
    backgroundColor: "black",
  });

  $("a[href^='http']").css({
    color: "red",
  });

  $("input[name*='ok']").css({
    color: "orange",
  });

  $("tr:first-child").css({
    backgroundColor: "yellow",
  });

  $("tr:first").css({
    backgroundColor: "lightgray",
  });

  $("table:eq(1) tr:last-child td:last-child").css({
    color: "gray",
  });

  $("td:nth-child(odd)").css({
    backgroundColor: "pink",
  });

  $("td:odd").css({
    backgroundColor: "lightblue",
  });

  $("input").css({
    color: "blue",
  });
});
