let data;
let doNm = new Set();
let sigunguNm = new Set();

$.ajax({
    method: "GET",
    url: "http://api.visitkorea.or.kr/openapi/service/rest/GoCamping/basedList?ServiceKey=qqWljV6cxHPr2tcjP5ckf1nfrLkMMrqXb8pHNUfmtPDzSBTVUgVD3M6xIMrE4j9vYjI3fUB5xUhhnM8Jl0AUdA%3D%3D&numOfRows=20&pageNo=1&MobileOS=WIN&MobileApp=forest&_type=json",
    // data: { },

    success:function(data){
        let thumnail = '';
        
        $.each(data.response.body.items.item, function(k,thum){
            thumnail = `<li data-code=${thum.contentId}>
                            <div class="thum">
                                <img src="${thum.firstImageUrl}" alt="thum-img">
                            </div>
                            <a class="heart">하투</a>
                            <div class="text">
                                <h3>${thum.facltNm}</h3>
                                <p>위치 <span>${thum.addr1}</span></p>
                                <p>태그 <span>${thum.themaEnvrnCl}</span></p>
                            </div>
                        </li>`;
            // 이미지, 태그 없으면 출력 x
            // if($(this).html('undefined')) !$('.thumnail').append(thumnail);
            if(thum.firstImageUrl != undefined) $('.thumnail').append(thumnail)
            console.log(data)
        })
        
        // popup
        $('.thumnail li').on('click', function(a,b){
            let code = $(this).data('code');
            console.log(code)
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
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50661.62728901353!2d127.03720195000001!3d37.476026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca13466bcacd1%3A0xb70bc7ff482af6ab!2z7ISc7Jq47Yq567OE7IucIOyEnOy0iOq1rA!5e0!3m2!1sko!2skr!4v1658282085452!5m2!1sko!2skr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
            $('.popup-shadow').html(popup);
            $('.popup-shadow').addClass('active');
            
            // popup close
            $('.close').on('click', function(){
                $('.popup-shadow').removeClass('active');
            });
        });
    }
});

    // .done(function (msg) {

    //     // sigunguNm
    //     msg.response.body.items.item.forEach(v => {
    //         doNm.add(v.doNm)
    //         sigunguNm.add(v.sigunguNm)
    //     });

    //     console.log(doNm)
    //     console.log(sigunguNm)
    //     console.log(msg)
    // });