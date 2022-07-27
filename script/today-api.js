let data;
let doNm = new Set();

$.ajax({
    method: "GET",
    // url: "http://api.visitkorea.or.kr/openapi/service/rest/GoCamping/basedList?ServiceKey=qqWljV6cxHPr2tcjP5ckf1nfrLkMMrqXb8pHNUfmtPDzSBTVUgVD3M6xIMrE4j9vYjI3fUB5xUhhnM8Jl0AUdA%3D%3D&numOfRows=1000&pageNo=1&MobileOS=WIN&MobileApp=forest&_type=json",
    url:'./script/data.json',
    beforeSend:function(){},
    complete:function(){},
    success:function(data){

        let dd=[];

        // 반려견 동반 가능 유무
        $.each(data.response.body.items.item, function(a, b){
            if(b.animalCmgCl == '가능') {                    
                dd.push(b);
            }
        })

        // thumnail
        function printFn(){
            
            let thumnail = '';
            $.each(dd, function(k,thum){
                if(thum.firstImageUrl != undefined && k < 8){
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

        printFn();
        
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
    }
});


