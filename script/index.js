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







function mobileInit(){
    /*필터 나타나기*/
    $('.m-icon').click(function(){
        $('.m-filter').toggleClass('active');
        $(this).toggleClass('active');
    });

    /*필터 토글*/
    $('.area-arrow').click(function(){

        $(this).parent().next().slideToggle('active3').css('display','flex');

        $(this).toggleClass('active');
        $(this).css('transform','rotate(270deg)');
        if($(this).hasClass('active')) $(this).css('transform','rotate(90deg)');

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
    
    // 지역선택(시군구)
    $('.ul div:nth-of-type(2) li').on('click', function(){
        
        $(this).toggleClass('active');
        
        if($(this).index()==0){
            $('.ul div:nth-of-type(2) li').not(":first").removeClass('active');
        }else if($(this).index()!=0){
            $('.ul div:nth-of-type(2) li').eq(0).removeClass('active');
        }
    })
    
    // 테마선택
    $('li p').on('click', function(){
        $('li p').removeClass('active');
        $(this).addClass('active');
    })
    
    // 주제선택
    $('.text p').on('click', function(){
        $(this).toggleClass('active');
    })
    
    /*메인 토글*/
    $('.arrow1').click(function(){
    
        $(this).toggleClass('active2');
    
        $(this).parent().next().slideToggle('active1'); //클릭한 위치 찾아주기
    
        $(this).css('transform','rotate(-90deg)');
    
    //화살표 방향 변경
    if($(this).hasClass('arrow1 active2')){ 
        $(this).css('transform','rotate(90deg)');}
    })
}


$(window).on('load',mobileInit);