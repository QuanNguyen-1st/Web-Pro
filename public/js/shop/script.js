$('.add-to-cart').on('click', function (e) {
    e.preventDefault();
    let product_id = parseInt($(this).attr('data-product'));
    let imgSrc = $('#modal-' + product_id + ' ' + '.big-img').attr('src');
    let size = parseInt($('#modal-' + product_id + ' ' + 'select[name="size"]').val());
    let amount = parseInt($('#modal-' + product_id + ' ' +'input[name="amount"]').val());
    if (!Number.isInteger(size)) {
        alert('Please enter size');
        return;
    }

    if (imgSrc[0] == "p") {
        alert('Please enter img');
        return;
    }

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
                alert('Added seccesfully');
            }
            else if (response == 'Not enough stocks')
            {
                alert('Not enough stocks');
            }
            else if (response == 'login') {
                alert('Please login and try again');
                location.href='index.php?page=main&controller=login&action=index';
            }
            else {
                // alert('Already in cart');
                alert(response);
            }
        }
    })
});

$('.modal-product').on('show.bs.modal', function (e) {
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