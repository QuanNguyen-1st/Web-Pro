$('#bar').click((e) => {
    $('#navbar').addClass('active');
})

$('#close-navbar').click((e) => {
    $('#navbar').removeClass('active');
})

// let mainImg = $('#big-img');

// $('.small-img').each((idx, item) => {
//     $(item).click((e) => {
//         $('#big-img').attr('src', item.src);
//     })
    
// });