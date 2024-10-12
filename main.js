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
      e.target.reset();
      alert(message);
    },
    error: function (xhr, status, error) {
      alert("AJAX Error: ", status, error);
      alert("Response Text: ", xhr.responseText);
    },
  });
});

function getStudents() {
  let formData = new FormData();
  formData.append("action", "readAllData");
  $.ajax({
    method: "POST",
    data: formData,
    url: "api.php",
    contentType: false,
    processData: false,
    success: function ({ data }) {
      $.each(data, function (index, item) {
        $("#studentTale tbody").append(`
          <tr class='border-b'>
            <td class='py-3 px-4'>${index + 1}</td>
            <td class='py-3 px-4'>${item.id}</td>
            <td class='py-3 px-4'>${item.name}</td>
            <td class='py-3 px-4'>${item.class}</td>
            <td class='py-3 px-4'>
              <button  class='bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600'>Update</button>
              <button  class='bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2'>Delete</button>
            </td>
          </tr>
        `);
      });
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error:", status, error);
      console.error("Response Text:", xhr.responseText);
    },
  });
}

getStudents();
