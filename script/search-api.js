let data;
let doNm = new Set();

// function abc(e,d){
//     console.log(d);
// }

// $.ajax({
//     url: "http://api.visitkorea.or.kr/openapi/service/rest/GoCamping/basedList",
//     jsonp: "abc",
//      dataType: "jsonp",
//      data: {
//         ServiceKey: "qqWljV6cxHPr2tcjP5ckf1nfrLkMMrqXb8pHNUfmtPDzSBTVUgVD3M6xIMrE4j9vYjI3fUB5xUhhnM8Jl0AUdA%3D%3D",
//         numOfRows: "1000",
//         pageNo:1,
//         MobileOS:'WIN',
//         MobileApp:'forest',
//         _type:'json',
//         callback:'abc'
//     },
//     success:function(d){
//         console.log(d)
//     }
// });

$.ajax({
    method: "GET",
    // url: "http://api.visitkorea.or.kr/openapi/service/rest/GoCamping/basedList?ServiceKey=qqWljV6cxHPr2tcjP5ckf1nfrLkMMrqXb8pHNUfmtPDzSBTVUgVD3M6xIMrE4j9vYjI3fUB5xUhhnM8Jl0AUdA%3D%3D&numOfRows=1000&pageNo=1&MobileOS=WIN&MobileApp=forest&_type=json",
    url:'./script/data.json',
    beforeSend:function(){},
    complete:function(){},
    success:function(data){
        console.log(data)

        // filter
        $('.ul .main-title:nth-of-type(1) ul li').on('click', function(){
            let sigunguNm = new Set();
            let thisDo = $(this).html();
            
            $.each(data.response.body.items.item, function(a, b){
                if(b.doNm == thisDo && b.sigunguNm != undefined) {                    
                    sigunguNm.add(b.sigunguNm);
                }
            })
            
            let sigunguNmStr = '<li>전체선택</li>';
            for(let i of sigunguNm){
                sigunguNmStr += `<li>${i}</li>`;
            }
            $('.main-title:nth-of-type(2) ul').html( sigunguNmStr )

            // 지역선택(시군구)
            $('.main-title:nth-of-type(2) li').on('click', function(){
                $(this).toggleClass('active');
                // 전체선택 클릭 시 나머지 값 비활성화
                if($(this).index()==0){
                    $('.ul div:nth-of-type(2) li').not(":first").removeClass('active');
                }else if($(this).index()!=0){
                    $('.ul div:nth-of-type(2) li').eq(0).removeClass('active');
                }
            })
        })

        // 테마선택 (캠핑, 글램핑 ...)
        $('li p').on('click', function(){
            $('li p').removeClass('active');
            $(this).addClass('active');
        })

        // 주제선택 (산, 바다, 계곡 ...)
        $('.text p').on('click', function(){
            $('.text p').removeClass('active');
            $(this).addClass('active');
        })

        // thumnail
        function printFn(d){
            let thumnail = '';
            $.each(d, function(k,thum){
                if(thum.firstImageUrl != undefined){
                    thumnail += `<li data-code=${thum.contentId}>
                                    <div class="thum">
                                        <img src="${thum.firstImageUrl}" alt="thum-img">
                                    </div>
                                    <a class="heart">하투</a>
                                    <div class="text">
                                        <h3>${thum.facltNm}</h3>
                                        <span>${thum.addr1}</span>
                                    </div>
                                </li>`;
                }    
            })
            $('.thumnail').html(thumnail);
        }

        printFn(data.response.body.items.item);
        
        // 적용하기 버튼
        $('.main-wrap2 .filter .btn a:nth-of-type(1)').on('click', function(){
            let dd=[];
            
            // 지역 선택 결과 적용
            let thisSigungu;
            if(!$('.main-title:nth-of-type(2) li:first').hasClass('active')){
                thisSigungu = $('.main-title:nth-of-type(2) li.active');
            }else{
                thisSigungu = $('.main-title:nth-of-type(2) li');
            }

            // 테마 선택 결과 적용
            let thisTheme = null;
            if($('li:nth-of-type(1) p').hasClass('active')){
                thisTheme = '일반야영장';
            }else if($('li:nth-of-type(2) p').hasClass('active')){
                thisTheme = '글램핑';
            }else if($('li:nth-of-type(3) p').hasClass('active')){
                thisTheme = '카라반';
            }else if($('li:nth-of-type(4) p').hasClass('active')){
                thisTheme = '자동차야영장';
            }

            // 주제 선택 결과 적용
            let thisTag;    // lctCl(산, 숲, 계곡) themaEnvrnCl(일출, 일몰, 낚시)

            if($('.subject .text p:nth-of-type(1)').hasClass('active')){
                thisTag = '산';
            }
            if($('.subject .text p:nth-of-type(2)').hasClass('active')){
                thisTag = '숲';
            }
            if($('.subject .text p:nth-of-type(3)').hasClass('active')){
                thisTag = '계곡';
            }
            if($('.subject .text p:nth-of-type(4)').hasClass('active')){
                thisTag = '수상레저';
            }
            if($('.subject .text p:nth-of-type(5)').hasClass('active')){
                thisTag = '여름물놀이';
            }
            if($('.subject .text p:nth-of-type(6)').hasClass('active')){
                thisTag = '봄꽃여행';
            }
            if($('.subject .text p:nth-of-type(7)').hasClass('active')){
                thisTag = '가을단풍명소';
            }
            if($('.subject .text p:nth-of-type(8)').hasClass('active')){
                thisTag = '일출명소';
            }
            if($('.subject .text p:nth-of-type(9)').hasClass('active')){
                thisTag = '일몰명소';
            }
            if($('.subject .text p:nth-of-type(10)').hasClass('active')){
                thisTag = '걷기길';
            }

            thisSigungu.each(function(){       
                let _this = $(this);     
                    
                $.each(data.response.body.items.item, function(a, b){

                    try{
                        let e = b.sigunguNm == _this.text();
                        let f = b.induty == thisTheme && thisTheme;
                        let g = b.lctCl == thisTag || b.themaEnvrnCl == thisTag && thisTag;
                        
                        if(thisTheme || thisTag){
                            if(e && f && g) dd.push(b); 
                            else if(e && f ) dd.push(b); 
                            else if(e && g)  dd.push(b);  
                        }else{
                            if(e)  dd.push(b);  
                        }
                        
                    }catch{}
                })
            });
            
            // 총 검색 결과 n개
            if($('.main-wrap .title span').html(dd.length)) $('.main-wrap .title p').addClass('active')

            printFn(dd);

            // popup
            function popupSlide (idx){

                let code = $('.thumnail li').eq(idx).data('code');
                let pop = data.response.body.items.item.filter(num => num.contentId == code);
    
                let popup = `<div class="popup-all">
                                <div class="popup">
                                    <div class="close">닫기</div>
                                    
                                    <div class="popup-arrow">
                                        <p class="arrow">오른쪽</p>
                                        <p class="arrow">왼쪽</p>
                                    </div>
                                    <div class="m-img">
                                        <img src="./resource/img/main-img.jpg">
                                    </div>
                                
                                    <div class="p-main">
                                        <div class="popup-txt">
                                            <div class="popup-title">
                                                <h3>${pop[0].facltNm}</h3>
                                                <a class="heart1">하투</a>
                                            </div>
                                            <hr>
                                
                                            <div class="popup-main">
                                                <div class="popup-left">
                                                    <div class="popup-img">
                                                        <img src="${pop[0].firstImageUrl}">
                                                    </div>
                            
                                                    <div class="left-txt">
                                                        <h4>캠핑장소개</h4>
                                                        <p>- ${pop[0].lineIntro}</p>
                                                        <p>- 특징 : ${pop[0].featureNm}</p>
                                                        <p>- 예약 구분 : ${pop[0].resveCl}</p>
                                                        <p>- 반려동물 동반 가능 유무 : ${pop[0].animalCmgCl}</p>
                                                    </div>
                                                </div>
                                
                                                <div class="popup-right">
                            
                                                    <div class="right-txt">
                                                        <h4>기본정보</h4>
                                                        <div><p class="p">캠핑형태</p><span>${pop[0].induty}</span></div>
                                                        <div><p class="p">환경</p><span>${pop[0].lctCl}</span></div>
                                                        <div><p class="p">대표번호</p><span>${pop[0].tel}</span></div>
                                                        <div><p class="p">사이트</p><span>${pop[0].homepage}</span></div>
                                                        <div><p class="p">주소</p><span>${pop[0].addr1}</span></div>
                                                        <div id="map" style="width: 100%; height: 197px;"></div>
                                                    </div>
                            
                                                    <div class="right-txt">
                                                        <h4>시설 및 레저</h4>
                                                        <div class="inst">
                                                            <div>
                                                                <p class="p">기본시설</p>
                                                                <p class="inst-wrap">샤워실 <span>${pop[0].swrmCo}</span>개</p>
                                                                <p class="inst-wrap">화장실 <span>${pop[0].toiletCo}</span>개</p>
                                                                <p class="inst-wrap">개수대 <span>${pop[0].wtrplCo}</span>개</p>
                                                            </div>
                                                        </div>
                                                        <div><p class="p">부대시설</p><span>${pop[0].sbrsCl}</span></div>
                                                        <div><p class="p">인근레저</p><span>${pop[0].posblFcltyCl}</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
    
                // map 주소 변경
                let mapLocation = `${pop[0].addr1}`;
                
                $('.popup-shadow').html(popup);
                $('.popup-shadow').addClass('active');
    
                // map
                
                var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
                mapOption = {
                    center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
                    level: 3 // 지도의 확대 레벨
                };  
    
                // 지도를 생성합니다    
                var map = new kakao.maps.Map(mapContainer, mapOption); 
    
                // 주소-좌표 변환 객체를 생성합니다
                var geocoder = new kakao.maps.services.Geocoder();
    
                // 주소로 좌표를 검색합니다 !!! 여기 주소 변경 !!!
                geocoder.addressSearch(mapLocation, function(result, status) {
    
                    // 정상적으로 검색이 완료됐으면 
                    if (status === kakao.maps.services.Status.OK) {
    
                        var coords = new kakao.maps.LatLng(result[0].y, result[0].x);
    
                        // 결과값으로 받은 위치를 마커로 표시합니다
                        var marker = new kakao.maps.Marker({
                            map: map,
                            position: coords
                        });
    
                        kakao.maps.event.addListener(marker, 'click', function () {
                            var adress_name = result[0].road_address.address_name;
                            var url = `https://map.kakao.com/link/search/${adress_name}`;
                            window.open(url, '_blank');
                        });
                        // infowindow.open(map, marker);
    
                        // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
                        map.setCenter(coords);
                    } 
                });
                
                // popup arrow
                $('.popup-arrow .arrow').eq(0).on('click', function(){
                    if(idx>0) idx--;
                    popupSlide(idx)
                })
                $('.popup-arrow .arrow').eq(1).on('click', function(){
                    if(idx<8) idx++;
                    popupSlide(idx)
                })

                // popup close
                $('.close').on('click', function(){
                    $('.popup-shadow').removeClass('active');
                });
            }

            $('.thumnail li').on('click', function(){
                popupSlide($(this).index());
            });
        })
    }
});


