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

// Delete product

$(function () {
  // This is for ajax
  $(".pr_del").click(function (e) {
    e.preventDefault();
    var link = this.href;
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
      url: link,
      type: "DELETE",
      data: { _token: token },
      success: function () {
        // alert(data.success);
        location.reload();
      },
    });
  });

  // This is for form
  $(".pr_del_sub").click(function (e) {
    e.preventDefault();
    $(this).parent(".pr_del_form").submit();
  });
});

// Show selected photo
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#showSelectedPhoto").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
