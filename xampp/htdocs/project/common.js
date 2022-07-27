window.addEventListener('DOMContentLoaded',function(){
   
    var nav = document.querySelector('nav');
    nav.addEventListener('click',function(e){
        e.target.style.color = 'red';
        
        var target = e.target.textContent;
        localStorage.page = target;
    });
    
    
var idx = 0;    
switch(localStorage.page){
    case 'index': idx=0; break;
    case 'company':idx=1; break;
    case 'service':idx=2; service(); break;
    case 'mypage':idx=3; mypage(); break;
}
    
nav.children[idx].style.color = 'red';    
    
//FAVORITE
function service(){
    var fButton = document.querySelector('button');
    var favorites,imgSrc;

    fButton.addEventListener('click',function(){
        favorites = document.querySelectorAll('input:checked');
        var imgArry = [];
        for(var i=0;i<favorites.length;i++){
            imgArry.push(favorites[i].nextElementSibling.src);
        }
        localStorage.favorites = JSON.stringify(imgArry);
    });  
}   
    
//mypage 
function mypage(){
    var imgString = JSON.parse(localStorage.favorites);
        console.log(typeof imgString);

    var div = document.querySelector('.myf');

    for(var i in imgString){
        div.innerHTML += "<img src="+imgString[i]+">";
    }
}
    
    
    
   
/*
var imgString = localStorage.favorites;  
var myimg = imgString.split(',');
    
var div = document.querySelector('.myf');

for(var i in myimg){
    div.innerHTML += "<img src="+myimg[i]+">";
}

*/
    
    
  
/*
    
var aaa = "['img/img-01.jpg','img/img-03.jpg']";
var bb = eval(aaa);
console.log(bb);
    
    
var ccc = JSON.stringify(['img/img-01.jpg','img/img-03.jpg']);
    
var dd = JSON.parse(ccc);
console.log(dd);
*/




    
    
    
    
});




