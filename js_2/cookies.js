

checkCookie("firstload");

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    //var expires = "expires="+d.toUTCString();
    //document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    document.cookie = cname + "=" + "ok";
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function checkCookie(cname) {
    var hasCookie = getCookie(cname);
    if (hasCookie != "") {

        //$(".move-right1").css("right", "25%");
        document.getElementById('part1').style.borderBottom = '1px solid #ccc';
        $('#part2').animate({'opacity': '1'}, 0);
        $('#part3').css({'display': 'block'});
        $('#footer1').css({'display': 'block'});
        $('.dist').animate({'opacity': '1'}, 0);
        document.getElementById('header1').style.top = '0';
        document.getElementById('move-search').style.top = '18px';
        document.getElementById('header1').style.transition = '1s';
        $('.fix-img').animate({'opacity': '0.38'}, 0); //logo shahrdari
        $(".div4,.div8,.div12").css({right: '0'});
        $(".div3,.div7,.div11").css({right: '0'});
        $(".div2,.div6,.div10,.div14").css({right: '0'});
        $(".div1,.div5,.div9,.div13").css({right: '0'});
    } else {
        setCookie(cname);
        //$(".move-right1").animate({"right": "25%"}, 900);


        document.getElementById('first-1').style.animationDuration = '2s';
            $('.fix-img').animate({'opacity': '0.38'}, 5000); //logo shahrdari
            $(".div4,.div8,.div12").animate({right: '0'}, 2000);
            $(".div3,.div7,.div11").animate({right: '0'}, 1000);
            $(".div2,.div6,.div10,.div14").animate({right: '0'}, 1000);
            $(".div1,.div5,.div9,.div13").animate({right: '0'}, 2000);
            $('.dist').animate({'opacity': '1'}, 100);
            // })
            setTimeout(head, 2000);
            function head() {
                document.getElementById('header1').style.top = '0';
                document.getElementById('move-search').style.top = '18px';
                document.getElementById('move-search').style.transition = '1s';
                document.getElementById('header1').style.transition = '1s';
            }
            setTimeout(fun, 2000);
            function fun() {
                document.getElementById('part1').style.borderBottom = '1px solid #ccc';
                $('#part2').animate({'opacity': '1'}, 2000);
                $('#part3').css({'display': 'block'});
                $('#footer1').css({'display': 'block'});
            }


    }
}

/*checkCookie("firstload");
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    document.cookie = cname + "=" + "ok";
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function checkCookie(cname) {
    var hasCookie = getCookie(cname);
    if (hasCookie != "") {
        $(".move-right1").css("right", "25%");
    } else {
        setCookie(cname);
        $(".move-right1").animate({ "right": "25%" }, 900);

    }
};*/