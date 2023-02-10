$(function () {
  $("button[type='submit']").on("click", function () {
    const newElement = $("#newTxt").val();
    if (newElement !== "") {
      let element;
      if ($("input[value='Sport']").is(":checked")) {
        element =
          "<div class='item'  style='background-color: lightgreen; margin:1rem; padding:1rem; display:flex; justify-content:space-between'><p>" +
          newElement +
          "</p><button class='delete'>delete</button></div>";
      } else if ($("input[value='Social']").is(":checked")) {
        element =
          "<div class='item' style='background-color: lightblue; margin:1rem; padding:1rem; display:flex; justify-content:space-between'><p>" +
          newElement +
          "</p><button class='delete'>delete</button></div>";
      } else if ($("input[value='Politic']").is(":checked")) {
        element =
          "<div class='item' style='background-color: lightyellow; margin:1rem; padding:1rem; display:flex; justify-content:space-between'><p>" +
          newElement +
          "</p><button class='delete'>delete</button></div>";
      }
      $("#articles").append(element);
      $(".delete").click(function () {
        $(this).parents(".item").remove();
      });
    }
  });
  $("input[name='search']").keyup(function () {
    $("#articles div p").each(function (index, element) {
      const value = element.innerText;
      const search = $("input[name='search']").val();
      if (value.includes(search)) {
        $(element).parents(".item").slideDown();
      } else $(element).parents(".item").slideUp();
    });
  });
});
