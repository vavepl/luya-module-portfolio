$(window).resize(function() {
    $('.element_portfolio').height($('.element_portfolio').width()/1.5);
    $('.portfolio-sticky-top').css('height', $( window ).height());
    if($(window).width() < 768){
        $('.modal-dialog .col-12').removeClass('portfolio-sticky-top');
    } else {
        $('.modal-dialog .col-12').addClass('portfolio-sticky-top');
    }
});

$('.element_portfolio').hover(function () {
    $(this).children().fadeIn();
}, function () {
    $(this).children().fadeOut();
});

$('.portfolio-fade-in').on('click', function () {
    var id = $(this).attr('data-target');
    var img = $(this).attr('data-img')
    var group = $(this).children('h1')[0].innerText;
    var name = $(this).children('h2')[0].innerText;
    var description = $(this).attr('data-description');
    $(id + ' .modal-header').html(name);
    $(id + ' .modal-btn').html(group);
    $(id + ' .modal-p').html(description);
    $(id + ' img').attr('src', img);
    $(id).modal();
});

$('.portfolio-sticky-top').css('height', $( window ).height());

$('#group_all').on('click', function(){
    $('.element_portfolio').fadeOut();
    $('.element_portfolio').fadeIn();
    $('.portfolio-menu li').css('color', 'black');
    $(this).css('color', '#fe8f00')
});

$('.portfolio-menu li').on('click', function(){
    if(this.id != 'group_all'){
        $('.element_portfolio').fadeOut();
        $('.' + this.id).fadeIn();
        $('.portfolio-menu li').css('color', 'black');
        $(this).css('color', '#fe8f00')
    }
});

$(window).trigger('resize');
