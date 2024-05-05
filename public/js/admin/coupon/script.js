$("#tab-coupon").DataTable({
    // dom: "Bfrtip", //Thêm dom vào thì nó sẽ hiện đồng thời giữa language và bottom
    responsive: true,
    lengthChange: false,
    autoWidth: false,
    // language: {
    //     url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json",
    // },
})

$(".btn-edit").click(function (e) {
    var coupon_id = $(this).attr('data-bs-id');
    var stock = $(this).attr('data-bs-stock');
    var discount = $(this).attr('data-bs-discount');
    var expireAt = $(this).attr('data-bs-expireAt');
    $("#editCouponModal input[name='id']").val(coupon_id);
    $("#editCouponModal input[name='stock']").val(stock);
    $("#editCouponModal input[name='discount']").val(discount);
    $("#editCouponModal input[name='expireAt']").val(expireAt.split(' ')[0]);

    $('#editCouponModal').modal('show');
});

$(".btn-delete").click(function (e) {
    var coupon_id = $(this).attr('data-bs-id');

    $("#delCouponModal input[name='id']").val(coupon_id);
    $('#delCouponModal').modal('show');
});