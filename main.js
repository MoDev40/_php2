$("#showModal").click(function () {
  $("#formModal").addClass("show");
});

$("#closeModal").click(function () {
  $("#formModal").removeClass("show");
});

$("#studentForm").submit((e) => {
  e.preventDefault();

  let formData = new FormData(e.target);
  formData.append("action", "addStudent");

  $.ajax({
    method: "POST",
    dataType: "JSON",
    data: formData,
    url: "api.php",
    processData: false,
    contentType: false,
    success: function (data) {
      const { data: message } = data;
      alert(message);
    },
    error: function (xhr, status, error) {
      alert("AJAX Error: ", status, error);
      alert("Response Text: ", xhr.responseText);
    },
  });
});
