//The side search
                 
function openSesame(){
    var target = $(".side-search");
    var elm = document.getElementsByClassName("side-search")[0];
    var overlay = document.getElementsByClassName("overlay")[0];
    var Xbutton = $("#col-search");
    if(!target.hasClass(".visibleS")){
        overlay.setAttribute('style','display:block');
        elm.setAttribute('style','transform:translateX(0em)');
        Xbutton.removeClass('glyphicon-search');
        Xbutton.addClass('glyphicon-remove');
        target.removeClass('.hiddenS');
        target.addClass('.visibleS');
       
    }else{
        overlay.setAttribute('style','display:none');
        elm.setAttribute('style','transform:translateX(-16em)');
        Xbutton.removeClass('glyphicon-remove');
        Xbutton.addClass('glyphicon-search');
        target.removeClass('.visibleS');
        target.addClass('.hiddenS');
    }
}

function overlayClick(){
    var target = $(".side-search");
    var elm = document.getElementsByClassName("side-search")[0];
    var elm2 = document.getElementsByClassName("pro-settings")[0];
    var overlay = document.getElementsByClassName("overlay")[0];
    var Xbutton = $("#col-search");
        overlay.setAttribute('style','display:none');
        elm.setAttribute('style','transform:translateX(-16em)');
        elm2.setAttribute('style','display:none;transform:translateX(20em)');
        Xbutton.removeClass('glyphicon-remove');
        Xbutton.addClass('glyphicon-search');
        target.removeClass('.visibleS');
        target.addClass('.hiddenS');
};


//Request tutor animation
function OpenReqTut(){
    var target = document.getElementsByClassName("info-cont")[0];
    if(target.getAttribute("style") === "display:none" || target.getAttribute("style") === null)
        target.setAttribute("style","display:block");
    else
        target.setAttribute("style","display:none");

}

//Showing the Profile edit
function profEdit(){
    
    var target = $(".pro-settings");
    var elm = document.getElementsByClassName("pro-settings")[0];
    var overlay = document.getElementsByClassName("overlay")[0];
    var Xbutton = $(".Xb");
    var scrn_width = screen.width;
    if(!target.hasClass(".visibleS")){
        if(scrn_width > 768)
            elm.setAttribute("style","display:block;transform:translateX(0em)");
        else
            elm.setAttribute("style","display:block;transform:translateX(-12em)");
        overlay.setAttribute('style','display:block');       
        target.removeClass('.hiddenS');
        target.addClass('.visibleS');
       
    }else{
        overlay.setAttribute('style','display:none');
        elm.setAttribute('style','transform:translateX(20em)');
        elm.setAttribute("style","display:none");
        target.removeClass('.visibleS');
        target.addClass('.hiddenS');
    }
}
function closePro() {
    var target = $(".pro-settings");
    var elm = document.getElementsByClassName("pro-settings")[0];
    var overlay = document.getElementsByClassName("overlay")[0];
    overlay.setAttribute('style','display:none');
    elm.setAttribute('style','transform:translateX(20em)');
    elm.setAttribute("style","display:none");
    target.removeClass('.visibleS');
    target.addClass('.hiddenS');
}

//Display path of selected pic
setInterval(function pather(obj){
    if($("#pic-update").val() != ""){
        
        var ext = $("#pic-update").val().split('.').pop();
        if(ext === 'png'||ext === 'jpg'||ext === 'jpeg')
            $("#path").text($("#pic-update").val());
        else
            $("#path").text("Please enter an image.");    
    }
},1000); 