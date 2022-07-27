// header scroll
function pcInit(){
    let scrollState = {y:0, y2:0,state:'down'}

    function mainScroll(){
        scrollState.y=$(window).scrollTop();

        if(scrollState.y > scrollState.y2){
            scrollState.state=true;
        }else{
            scrollState.state=false;
        }
        scrollState.y2 = scrollState.y;
    }

    function headerScroll (){
        mainScroll();
        
        if(scrollState.state) {
            $('header').addClass('active');
        }else{
            $('header').removeClass('active');
        }
        
        if(scrollState.y == 0) {
            $('header').removeClass('white');
        }else{
            $('header').addClass('white');
        }
    }
    $(window).on('scroll', headerScroll);

    // hot click

    $('.hot li').on('click', function(){
        $('.hot li').removeClass('active');
        $(this).addClass('active');
    })

    // phone ani (interval translateX)

    let loop;
    let 
        num = 0,
        size = $('.community .slide > ul > li:eq(1)').position().left,
        aa = 0;


    function phone(){
        if(num == 0){
            aa = true;
        }else if(num == 4){
            aa = false;
        }

        if(aa){
            num++;
        }else{
            num--;
        }

        $('.community .slide > ul').css('left',`-${num * size}px`);
        $('.community .slide > ul > li').removeClass('active').eq(num).addClass('active');
        $('.community .slide > ul > li .txt').removeClass('active').eq(num).addClass('active');

    }
    phone();

    loop = setInterval(phone,2000);




    let mql = window.matchMedia('(max-width: 600px)');
    mql.addListener(function(e){
        console.log(e.matches)
    })



}
window.addEventListener('load',pcInit)