const form = $("#studentForm")[0];

$("#showModal").click(function () {
  $("#formModal").addClass("show");
  $("#saveData").removeClass("modal");
  form.reset();
  form[0].disabled = false;
});

$("#closeModal").click(function () {
  $("#formModal").removeClass("show");
  $("#updateData").removeClass("show");
});

function showEditBtn() {
  $("#updateData").addClass("show");
  $("#formModal").addClass("show");
  $("#saveData").addClass("modal");
}

$("#studentForm").on("submit", function (e) {
  e.preventDefault();

  form[0].disabled = false;

  const action = $(document.activeElement).attr("id");

  let formData = new FormData(e.target);

  if (action === "saveData") {
    formData.append("action", "addStudent");

    $.ajax({
      method: "POST",
      dataType: "JSON",
      data: formData,
      url: "api.php",
      processData: false,
      contentType: false,
      success: function () {
        e.target.reset();
        getStudents();
      },
      error: function (xhr, status, error) {
        alert(
          `Error: status:${status}, error:${error},text:${xhr.responseText}`
        );
      },
    });
  } else if (action === "updateData") {
    formData.append("action", "updateStudent");
    
    $.ajax({
      method: "POST",
      dataType: "JSON",
      data: formData,
      url: "api.php",
      processData: false,
      contentType: false,
      success: function () {
        e.target.reset();
        getStudents();
      },
      error: function (xhr, status, error) {
        form[0].disabled = true;
        alert(
          `Error: status:${status}, error:${error},text:${xhr.responseText}`
        );
      },
    });
  }
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
      $("#studentTale tbody").empty();

      $.each(data, function (index, item) {
        $("#studentTale tbody").append(`
          <tr class='border-b'>
            <td class='py-3 px-4'>${index + 1}</td>
            <td class='py-3 px-4'>${item.id}</td>
            <td class='py-3 px-4'>${item.name}</td>
            <td class='py-3 px-4'>${item.class}</td>
            <td class='py-3 px-4'>
              <button update_id="${
                item.id
              }" class='update_info bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600'>Update</button>
              <button delete_id="${
                item.id
              }" class='delete_info bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 ml-2'>Delete</button>
            </td>
          </tr>
        `);
      });
    },
    error: function (xhr, status, error) {
      alert(
        `Error:, status:${status}, error:${error},text:${xhr.responseText}`
      );
    },
  });
}

getStudents();

function getStudent(id) {
  let formData = new FormData();

  formData.append("action", "getStudent");
  formData.append("id", id);

  $.ajax({
    method: "POST",
    data: formData,
    url: "api.php",
    contentType: false,
    processData: false,
    success: function ({ data }) {
      form[0].value = data.id;
      form[1].value = data.name;
      form[2].value = data.class;
      form[0].disabled = true;
    },
    error: function (xhr, status, error) {
      alert(
        `Error:, status:${status}, error:${error},text:${xhr.responseText}`
      );
    },
  });
}
// update
$("#studentTale").on("click", "button.update_info", function () {
  showEditBtn();
  const id = $(this).attr("update_id");
  getStudent(id);
});

// delete
$("#studentTale").on("click", "button.delete_info", function () {
  let formData = new FormData();

  const id = $(this).attr("delete_id");

  formData.append("id", id);
  formData.append("action", "deleteStudent");

  if (confirm(`Are you sure you want to delete student with ID: ${id}?`)) {
    $.ajax({
      method: "POST",
      url: "api.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function () {
        getStudents();
      },
      error: function (xhr, status, error) {
        alert(
          `Delete Error:, status:${status}, error:${error},text:${xhr.responseText}`
        );
      },
    });
  }
});
