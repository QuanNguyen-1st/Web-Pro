
function calculateTotalPrice() {
    return $('.cart-item').get().reduce((total, item) => {
        return total + parseFloat($(item).find('.subtotal-price').text());
    }, 0);
}

let percent = 1;
let discount = $('#discount');
let totalPrice = $('#total-price');
let finalPrice = $('#final-price');

$('.cart-item').each((idx, item) => {
    if (discount.length) percent = discount.text() / 100;

    let input = $(item).find('input');
    let unit = $(item).find('.unit-price');
    let subtotal = $(item).find('.subtotal-price');

    subtotal.text(input.val() * unit.text());
    totalPrice.text(calculateTotalPrice());
    finalPrice.text(totalPrice.text() * percent);

    $(input).on('input', (e) => {
        if ($(e.target).val() > 0) {
            let newSubtotal = $(e.target).val() * unit.text();
            subtotal.text(newSubtotal);
            totalPrice.text(calculateTotalPrice());
            finalPrice.text(totalPrice.text() * percent);
        }
    })
})

$('#deleteProductConfirm').on('shown.bs.modal',(e) => {
    let cart_id = e.relatedTarget.getAttribute('data-bs-pro');
    $('#del-cart-holder').val(cart_id);
});

$('#make-purchase').on('click', (e) => {
    e.preventDefault();
    let cart_ids = [];
    let amounts = [];
    let coupon = '';
    
    $('.cart-item').each((idx, item) => {
        cart_ids.push($(item).find('a').getAttribute('data-bs-pro'));
        amounts.push($(item).find('input').val());
        if (discount) coupon = discount.getAttribute('coupon-code');
    })

    let data = {
        cart_ids: cart_ids,
        amounts: amounts,
    }

    if (coupon == '') {

    } else {
        data['coupon'] = coupon;
    }

    $.ajax({
        type: 'POST',
        url: 'index.php?page=main&controller=cart&action=purchase',
        data: data,
        success: function (response) {
            if (response == 'success') {
                
            }
            else {
                alert('Not enough stocks');
            }
        }
    })
})

