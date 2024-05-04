$('#tab-comment').DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
});

$(".btn-edit").click(function (e) {
    var id = $(this).attr('data-bs-id');
    var content = $(this).attr('data-bs-content');
    // console.log(content);
    $("#EditStudentModal input[name='id']").val(id);
    $("#EditStudentModal input[name='title']").val(content);
    $('#EditStudentModal').modal('show');
});

$(".btn-delete").click(function (e) {
    var id = $(this).attr('data-bs-id');
    $("#DeleteStudentModal input[name='id']").val(id);
    $('#DeleteStudentModal').modal('show');
});
$(".btn-hide").click(function (e) {
    var id = $(this).attr('data-bs-id');
    $("#HideStudentModal input[name='id']").val(id);
    $('#HideStudentModal').modal('show');
});