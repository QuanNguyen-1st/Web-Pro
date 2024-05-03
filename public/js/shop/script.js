$('.add-to-cart').on('click', (e) => {
    e.preventDefault();
    let product_id = $(this).attr('data-product');
    let imgSrc = $('#modal-' + product_id + ' ' + '.big-img').attr('src');
    let size = $('#modal-' + product_id + ' ' + 'select[name="size"]').val();
    let amount = $('#modal-' + product_id + ' ' +'select[name="amount"]').val();

    $.ajax({
        type: 'POST',
        url:'index.php?page=main&controller=cart&action=add',
        data: {
            product_id: product_id,
            img: imgSrc,
            size: size,
            amount: amount
        },
        success: function (response) {
            if (response == 'success')
            {
                
            }
            else
            {
                alert('Not enough stocks');
            }
        }
    })
});