$("#tab-cart").DataTable({
    // dom: "Bfrtip", //Thêm dom vào thì nó sẽ hiện đồng thời giữa language và bottom
    responsive: true,
    lengthChange: false,
    autoWidth: false,
    // language: {
    //     url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json",
    // },
});

$(".btn-delete").click(function (e) {
    var coupon_id = $(this).attr('data-bs-id');

    $("#delCartModal input[name='id']").val(coupon_id);
    $('#delCartModal').modal('show');
});