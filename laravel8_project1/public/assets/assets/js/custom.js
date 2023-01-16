$(document).ready(function () {
  $("#product_submit_btn").click(function () {
    var values = $("form").serialize();
    $.post("products", values, function (data) {
      alert(data);
      window.location.reload();
    });
  });

  $("#select_page").on("change", function () {
    var path = $(this).val();
    window.location.href = path;
  });
});
