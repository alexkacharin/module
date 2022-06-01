
$('.list li').on('click', function(e) {
    e.stopPropagation();
    var subList = $(this).children('.sub-list');

    if (subList.hasClass('open')) {
        $(this).find('.sub-list').removeClass('open');
    } else {
        subList.addClass('open');
    }
});
