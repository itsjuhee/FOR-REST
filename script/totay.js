//카카오톡 로그인하기 

function login(){
    if(sessionStorage.name){//로그인 했을때
        $('.right a').eq(0).css('right','15%'); //LOGIN
        $('.right a').eq(1).css('display','none'); //LOGIN
        $('.right a').eq(2).show().css('right','8.5%'); //MY PAGE
        $('.right a').eq(3).show().css('right','2%');//LOGOUT

        $('.menu a').eq(1).css('display','none'); //LOGIN
        $('.menu a').eq(2).show(); //MY PAGE
        $('.menu a').eq(3).show(); //LOGOUT

        let bora = sessionStorage.thumbnail;

        $('.id').text(`${sessionStorage.name}`);
        $('.thumbnail-img').css('background-image', `url( ${bora} )`);

        $('.main-name').text(`${sessionStorage.name}`+`님,`); //모바일 메인
    }else{//로그인 안했을때 
        $('.right a').eq(0).css('right','8%'); //LOGIN
        $('.right a').eq(1).show(); //LOGIN
        $('.right a').eq(2).css('display','none'); //MA PAGE
        $('.right a').eq(3).css('display','none'); //LOGOUT
    }
}

login();               

window.Kakao.init('e7d9d90ebcf1a4d40b424301d24b5c77');

//로그인
function loginWithKakao() {
    Kakao.Auth.login({
    success: function(authObj) { //로그인 했을 때 성공 여부 불러옴 
        Kakao.API.request({
            url: '/v2/user/me',
            success: function(res) { //사용자 정보 가져오기 
                console.log(res)
                sessionStorage.thumbnail = res.properties.thumbnail_image;
                sessionStorage.name = res.properties.nickname;
                login();
            },
            fail: function(error) {
                alert(
                    'login success, but failed to request user information: ' +
                    JSON.stringify(error)
                )
            },
        })
    },
    fail: function(err) {
        alert(JSON.stringify(err))
    },
    })
}

//로그아웃 -> index 화면 이동 
function kakaoLogout() {
    if (!Kakao.Auth.getAccessToken()) {
        login(); 
        
    }

    Kakao.Auth.logout(function() {
        sessionStorage.thumbnail = '';
        sessionStorage.name = ''; //정보 지우기 

        location.href = './index.html'; 
    })
}

//뒤로 가기 
function goBack(){
    window.history.back();
}

function onLoadEvent(){
    autoback.click();
}
window.onload=onLoadEvent