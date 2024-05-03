$('.add-fea-cart').on('click', (e) => {
    e.preventDefault();
    let product_id = $(this).attr('data-product');
    let imgSrc = $('#modal-feature-' + product_id + ' ' + '.big-img').attr('src');
    let size = $('#modal-feature-' + product_id + ' ' + 'select[name="size"]').val();
    let amount = $('#modal-feature-' + product_id + ' ' +'select[name="amount"]').val();

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

$('.add-new-cart').on('click', (e) => {
    e.preventDefault();
    let product_id = $(this).attr('data-product');
    let imgSrc = $('#modal-newpro-' + product_id + ' ' + '.big-img').attr('src');
    let size = $('#modal-newpro-' + product_id + ' ' + 'select[name="size"]').val();
    let amount = $('#modal-newpro-' + product_id + ' ' +'select[name="amount"]').val();

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