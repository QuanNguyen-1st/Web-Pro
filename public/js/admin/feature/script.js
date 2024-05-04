$("#tab-feature").DataTable({
    // dom: "Bfrtip", //Thêm dom vào thì nó sẽ hiện đồng thời giữa language và bottom
    responsive: true,
    lengthChange: false,
    autoWidth: false,
    // language: {
    //     url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json",
    // },
})

$(".btn-edit").click(function (e) {
    var feature_id = $(this).attr('data-bs-id');
    var title = $(this).attr('data-bs-title');

    // console.log(title);
    $("#editFeatureModal input[name='id']").val(feature_id);
    $("#editFeatureModal input[name='title']").val(title);

    $('#editFeatureModal').modal('show');
});

$(".btn-delete").click(function (e) {
    var feature_id = $(this).attr('data-bs-id');
    
    $("#delFeatureModal input[name='id']").val(feature_id);
    $('#delFeatureModal').modal('show');
});