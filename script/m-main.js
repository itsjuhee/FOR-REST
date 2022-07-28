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