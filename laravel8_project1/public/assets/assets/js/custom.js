$(document).ready(function () {
  $("#product_submit_btn").click(function () {
    alert($("form").serialize());
  });

  $('#select_page').on('change', function () {
    var path = $(this).val();
    window.location.href = path;
  })
});
