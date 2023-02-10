$(function () {
  $("ul").on("click", "li", function () {
    $(this).toggleClass("selected");
  });

  $("#to-list1").on("click", function () {
    let elements = $(".selected");
    $("#list1").append(elements);
    elements.removeClass("selected");
  });

  $("#to-list2").on("click", function () {
    let elements = $(".selected");
    $("#list2").append(elements);
    elements.removeClass("selected");
  });

  $("#newItem").on("keyup", function (e) {
    if (e.keyCode == 13) {
      const newItem = $("#newItem").val();
      if (newItem !== "") {
        const element = "<li >" + newItem + "</li>";
        $("#list1").append(element);
      }
    }
  });
}); //end of loading
