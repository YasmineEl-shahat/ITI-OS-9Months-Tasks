$(function () {
  $("div").click(function () {
    $("body").append($(this).clone(true));
    $(this).off("click");
  });
});
