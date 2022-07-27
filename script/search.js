/*필터 토글*/
$('.area-arrow').click(function(){

$(this).parent().next().slideToggle('active3').css('display','flex');

$(this).toggleClass('active');
$(this).css('transform','rotate(90deg)');
if($(this).hasClass('active')) $(this).css('transform','rotate(-90deg)');

});

$('.tema-arrow').click(function(){
    $(this).parent().next().slideToggle('active4');

    $(this).toggleClass('active');
    $(this).css('transform','rotate(90deg)');
    if($(this).hasClass('active')) $(this).css('transform','rotate(-90deg)');

    });

$('.sub-arrow').click(function(){
    $(this).parent().next().slideToggle('active5');

    $(this).toggleClass('active');
    $(this).css('transform','rotate(90deg)');
    if($(this).hasClass('active')) $(this).css('transform','rotate(-90deg)');
});

// 지역선택(광역시도)
$('.ul div:nth-of-type(1) li').on('click', function(){
    $('li').removeClass('active');
    $(this).addClass('active'); 
})
// function init(){
    


// }

// $(window).on('load',init);