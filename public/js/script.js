$('#bar').click((e) => {
    $('#navbar').addClass('active');
})

$('#close-navbar').click((e) => {
    $('#navbar').removeClass('active');
})

let mainImg = $('#big-img');

$('.small-img').each((idx, item) => {
    $(item).click((e) => {
        $('#big-img').attr('src', item.src);
    })
    
});


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