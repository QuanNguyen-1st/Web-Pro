$("#tab-stock").DataTable({
    // dom: "Bfrtip", //Thêm dom vào thì nó sẽ hiện đồng thời giữa language và bottom
    responsive: true,
    lengthChange: false,
    autoWidth: false,
    // language: {
    //     url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json",
    // },
})

$(".btn-edit").click(function (e) {
    var stock_id = $(this).attr('data-bs-id');
    var product_id = $(this).attr('data-bs-product_id');
    var size = $(this).attr('data-bs-size');
    var stock_num = $(this).attr('data-bs-stock_num');
    var img = $(this).attr('data-bs-img');
    // console.log(title);
    $("#editStockModal input[name='id']").val(stock_id);
    $("#editStockModal select[name='size']").val(size);
    $("#editStockModal select[name='product_id']").val(product_id);
    $("#editStockModal input[name='stock_num']").val(stock_num);
    $("#editStockModal input[name='img']").val(img);

    $('#editStockModal').modal('show');
});

$(".btn-delete").click(function (e) {
    var stock_id = $(this).attr('data-bs-id');
    var img = $(this).attr('data-bs-img'); 
    $("#delStockModal input[name='img']").val(img);
    $("#delStockModal input[name='id']").val(stock_id);
    $('#delStockModal').modal('show');
});