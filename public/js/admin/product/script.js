$("#tab-product").DataTable({
    // dom: "Bfrtip", //Thêm dom vào thì nó sẽ hiện đồng thời giữa language và bottom
    responsive: true,
    lengthChange: false,
    autoWidth: false,
    // language: {
    //     url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json",
    // },
})

$(".btn-edit").click(function (e) {
    var product_id = $(this).attr('data-bs-id');
    var name = $(this).attr('data-bs-name');
    var description = $(this).attr('data-bs-description');
    var feature_id = $(this).attr('data-bs-feature');
    var price = $(this).attr('data-bs-price');
    var img = $(this).attr('data-bs-img');
    // console.log(title);
    $("#editProductModal input[name='id']").val(product_id);
    $("#editProductModal input[name='name']").val(name);
    $("#editProductModal textarea[name='description']").val(description);
    $("#editProductModal select[name='feature_id']").val(feature_id);
    $("#editProductModal input[name='price']").val(price);
    $("#editProductModal input[name='img']").val(img);
    $('#editProductModal').modal('show');
});

$(".btn-delete").click(function (e) {
    var product_id = $(this).attr('data-bs-id');
    var img = $(this).attr('data-bs-img'); 
    $("#delProductModal input[name='img']").val(img);
    $("#delProductModal input[name='id']").val(product_id);
    $('#delProductModal').modal('show');
});