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
        url: 'index.php?page=main&controller=cart&action=add',
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

$('.modal-product').on('show.bs.modal', (e) => {
    let mainImg = $(this).find('.big-img');

    $(this).find('.small-img').each((idx, item) => {
        $(item).click((e) => {
            mainImg.attr('src', item.src);
        })
    });

    // $(this).find('.small-img').click((e) => {
    //     mainImg.attr('src', $(this).attr('src'));
    // })
})