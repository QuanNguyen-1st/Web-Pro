$('#tab-news').DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    // language: {
    //     url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json"
    // } ,
})

$("#form-add-student").submit(function (e) {
        e.preventDefault();
        //Write code to check if student id is existed!
        //Camel case
        var form = $(this);
        var title = $("#form-add-student input[name='title']").val();
        var description = $("#form-add-student textarea[name='description']").val();
        var content = $("#form-add-student textarea[name='content']").val();
        if (title == "" || description == "" || content == "" ) {
          $(document).Toasts("create", {
            class: "bg-danger",
            title: "Quản lý",
            subtitle: "Library",
            body: "Bạn phải nhập đầy đủ thông tin",
          });
        } else {
          form.unbind("submit").submit();
            $(document).Toasts("create", {
                class: "bg-success",
                title: "Quản lý",
                subtitle: "Library",
                body: "Bạn Thêm mới thành công",
              });
              form.unbind("submit").submit();
              setTimeout(function () {
              }, 1000);
    
        }
    
        //     if (data.status == "FOUND") alert("Đã tồn tại mã số sinh viên này!");
    });

$(".btn-edit").click(function (e) {
    var id = $(this).attr('data-bs-id');

    var description = $(this).attr('data-bs-description');
    var content = $(this).attr('data-bs-content');
    var title = $(this).attr('data-bs-title');
    var img = $(this).attr('data-bs-img');
    // console.log(title);
    $("#EditStudentModal input[name='id']").val(id);
    $("#EditStudentModal textarea[name='description']").val(description);
    $("#EditStudentModal textarea[name='content']").val(content);
    $("#EditStudentModal input[name='title']").val(title);
    $("#EditStudentModal input[name='img']").val(img);
    $('#EditStudentModal').modal('show');
});

$(".btn-delete").click(function (e) {
    var id = $(this).attr('data-bs-id');
    var img = $(this).attr('data-bs-img');

    $("#DeleteStudentModal input[name='img']").val(img);
    $("#DeleteStudentModal input[name='id']").val(id);
    $('#DeleteStudentModal').modal('show');
});

$(".btn-hide").click(function (e) {
    var id = $(this).attr('data-bs-id');
    $("#HideStudentModal input[name='id']").val(id);
    $('#HideStudentModal').modal('show');
});
