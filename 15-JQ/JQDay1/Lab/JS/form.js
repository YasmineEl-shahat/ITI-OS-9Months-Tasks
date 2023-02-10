$(function () {
  $("input[value='Add']").click(function () {
    const name = $(":text:first").val();
    const grade = $(":text:eq(1)").val();
    const dept = $("select").val();

    const nameTd = document.createElement("td");

    $(nameTd).text(name);

    const gradeTd = document.createElement("td");
    $(gradeTd).text(grade);

    const deptTd = document.createElement("td");
    $(deptTd).text(dept);

    const _tr = document.createElement("tr");
    $(_tr).css({
      backgroundColor: "pink",
      border: "2px solid red",
    });

    $(_tr).append(nameTd);
    $(_tr).append(gradeTd);
    $(_tr).append(deptTd);

    const tb = document.getElementById("tb1");

    $(tb).append(_tr);
  });
});
