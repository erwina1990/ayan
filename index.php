<?php include('header.php') ?>
<style>
    @media (min-width: 768px) {


        .div1, #div1 {
            right: -50%;
        }

        .div2, #div2 {
            right: -70%;
        }

        .div3,#div3{
            left: -25%;
        }

        .div4,#div4 {
            left: -5%;
        }

        .dist, #part2 {
            opacity: 0;
        }

        #part3, #footer1 {
            display: none;
        }

        .first-body {
            background-color: #f3f3f3;
            -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
            -webkit-animation-duration: 1s; /* Safari 4.0 - 8.0 */
            animation-name: example;
            animation-duration: 1s;
        }

        /* Safari 4.0 - 8.0 */
        @-webkit-keyframes example {
            from {
                background-color: #403e3e;
            }
            to {
                background-color: #f3f3f3;
            }
        }

        /* Standard syntax */
        @keyframes example {
            from {
                background-color: #403e3e;
            }
            to {
                background-color: #f3f3f3;
            }
        }

        .fix-img {
            opacity: 1;
        }

        .header-menu {
            position: relative;
            top: -50px;
        }

        .search {
            top: -22px;
        }
    }
</style>
<!--<button id="c">button</button>-->
<div class="container-fluid  ">

    <div class="MainBody-copy  main-dis margin-div">
        <div class="row " id="part1">
            <div class="row   col-lg-8 col-xl-8 col-md-8 col-12 margin-div max-width-md" style="padding: 3px">
                <div class=" col-3 dist services div1" id="div1">
                    <div class="menu-main">
                        <div class="text-center animate-box">
                            <a href="views/contract.php">
                                <span class="icon">
                                    <img class="f-size" src="img/gharardad.png"
                                         alt="شفاف سازی و ارائه اطلاعات قراردادهای کلان و متوسط شهرداری اراک">
                                </span>
                                <div class="desc">
                                    <p> قرارداد ها </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=" col-3 dist services div2" id="div2">
                    <div class="menu-main">
                        <div class="text-center animate-box">
                            <a href="amlak/amlak.php">
                                <span class="icon">
                                    <img class="f-size" src="img/Amlak.svg"
                                         alt="شفاف سازی و ارائه اطلاعات املاک شهرداری اراک">
                                </span>
                                <div class="desc">
                                    <p>املاک شهرداری</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=" col-3 dist services div3" id="div3">
                    <div class="menu-main">
                        <div class="text-center animate-box">
                            <a href="shahrsazi/shahrsazi.php">
                                <span class="icon">
                                    <img class="f-size" src="img/shahrsazi1.png"
                                         alt="شفاف سازی و ارائه اطلاعات شهرسازی شهرداری اراک">
                                </span>
                                <div class="desc">
                                    <p>اطلاعات شهرسازی</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=" col-3 dist services div4" id="div4">
                    <div class="menu-main">
                        <div class="text-center animate-box">
                            <a href="views/boodjeh.php">
                                <span class="icon">
                                    <img class="f-size" src="img/boje_ek1.png"
                                         alt="شفاف سازی و ارائه اطلاعات بودجه شهرداری اراک">
                                </span>
                                <div class="desc">
                                    <p>بودجه</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=" col-3 dist services div1" id="div1">
                    <div class="menu-main">
                        <div class="text-center animate-box">
                            <a href="views/project.php">
                                <span class="icon">
                                    <img class="f-size" src="img/porojeomranipic.svg"
                                         alt="شفاف سازی و ارائه اطلاعات پروژه های عمرانی شهرداری اراک">
                                </span>
                                <div class="desc">
                                    <p>پروژه های عمرانی</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=" col-3 dist services div2" id="div2">
                    <div class="menu-main">
                        <div class="text-center animate-box">
                            <a href="views/auction-Bidding.php">
                                <span class="icon">
                                    <img class="f-size" src="img/monaghese.png"
                                         alt="شفاف سازی و ارائه اطلاعات مناقصات شهرداری ارارک">
                                </span>
                                <div class="desc">
                                    <p>مناقصه/مزایده ها</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=" col-3 dist services div3" id="div3">
                    <div class="menu-main">
                        <div class="text-center animate-box">
                            <a href="pdf/organizational-chart.pdf">
                                <div class="new-div-tag"><span> جدید</span></div><!--new-->
                                <span class="icon">
                                    <img class="f-size" src="img/playoff (1).svg"
                                         alt="شفاف سازی و ارائه اطلاعات مزایده شهرداری اراک">
                                </span>
                                <div class="desc">
                                    <p>نمودار سازمانی<br> شهرداری</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=" col-3 dist services div4" id="div4">
                    <div class="menu-main">
                        <div class="text-center animate-box">
                            <a href="http://arakinvest.ir/?cat=23">
                                <span class="icon">
                                    <img src="img/Recall.svg"
                                         alt="شفاف سازی و ارائه اطلاعات فراخوان سرمایه گذار شهرداری اراک">
                                </span>
                                <div class="desc">
                                    <p>فراخوان سرمایه گذار</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=" col-3 dist services div1" id="div1">
                    <div class="menu-main">
                        <div class="text-center animate-box">
                            <a href="views/baazaarche.php">
                                <span class="icon">
                                    <img src="img/Kanex.svg" class="f-size"
                                         alt="شفاف سازی و ارائه اطلاعات کانکس ها و بازارچه ها شهرداری اراک">
                                </span>
                                <div class="desc">
                                    <p style="margin-bottom:0 ">کانکس ها و بازارچه ها</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=" col-3 dist services div2" id="div2">
                    <div class="menu-main">
                        <div class="text-center animate-box">
                            <a href="mosavabat-shora/shoraha.php">
                                <span class="icon">
                                    <img src="img/shora.svg" class="f-size"
                                         alt="شفاف سازی و ارائه اطلاعات شورای شهر شهرداری اراک">
                                </span>
                                <div class="desc">
                                    <p style="margin-bottom:0 ">اطلاعات شورای شهر</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=" col-3 dist services div3" id="div3">
                    <div class="menu-main">
                        <div class="text-center animate-box">
                            <a
                                    href="http://www.arak.ir/%D8%A2%D9%85%D8%A7%D8%B1%D8%B9%D9%85%D9%84%DA%A9%D8%B1%D8%AF%D8%B4%D9%87%D8%B1%D8%AF%D8%A7%D8%B1%DB%8C%D9%88%D8%B3%D8%A7%D8%B2%D9%85%D8%A7%D9%86%D9%87%D8%A7%DB%8C%D8%AA%D8%A7%D8%A8%D8%B9%D9%87.aspx">
                                <span class="icon">
                                    <img src="img/amar2.png" class="f-size"
                                         alt="شفاف سازی و ارائه اطلاعات امار و عملکرد شهرداری اراک">
                                </span>
                                <div class="desc">
                                    <p class="md-p" style="margin-bottom:0 ">آمار و عملکرد شهرداری اراک</p>
                                    <p class="sm-p" style="margin-bottom:0 ">آمار و عملکرد</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=" col-3 dist services div4" id="div4">
                    <div class="menu-main">
                        <div class="text-center animate-box">
                            <a href="views/shahrdari.php ">
                                <div class="new-div-tag"><span> جدید</span></div><!--new-->
                                <span class="icon">
                                    <img src="img/admin.svg" class="f-size" style="width: 77px"
                                         alt="شفاف سازی و ارائه اطلاعات امار و عملکرد شهرداری اراک">
                                </span>
                                <div class="desc">
                                    <p class="md-p" style="margin-bottom:0 ">اطلاعات مدیران و<br> کارکنان شهرداری
                                    </p>
                                    <p class="sm-p" style="margin-bottom:0 ">اطلاعات کارکنان</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class=" col-3 dist services div1" id="div1" >
                    <div class="menu-main">
                        <div class="text-center animate-box">
                            <a href="shahrsazi/mostanadat.php">
                                <div class="new-div-tag"><span> جدید</span></div><!--new-->
                                <span class="icon">
                                    <img src="img/Mostanadat.svg" class="f-size"
                                         alt="شفاف سازی   شهرداری اراک , مستندات ">
                                </span>
                                <div class="desc">
                                    <p style="margin-bottom:0 ">مستندات</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="" id="part2">
            <div class="row  " style="border-bottom: 1px solid #ccc;">
                <div class="row  col-lg-8 col-xl-8 col-md-8 col-12 margin-div max-width-md box-bottom">
                    <div class="col-md-6">
                        <h3> قراردادها</h3>
                        <p class="item-desc">تمامی قراردادهای متوسط و کلان شهرداری اراک را در این قسمت مشاهده
                            کنید</p>
                        <a href="views/contract.php">بیشتر بدانید..</a>
                    </div>
                    <div class="col-md-6 text-md-left text-center box_img">
                        <img src="img/gharardad22.png" alt="قراردادهای متوسط و کلان شهرداری">
                    </div>
                </div>
            </div>
            <div class=" row  " style="border-bottom: 1px solid #ccc;">
                <div class="row  col-lg-8 col-xl-8 col-md-8 col-12 margin-div max-width-md box-bottom">
                    <div class="col-md-6 text-md-right text-center box_img display-pc">
                        <img src="img/amlak-sha.png" alt="کلیه اطلاعات املاکی که توسط شهرداری اراک تملک یافته">
                    </div>
                    <div class="col-md-6">
                        <h3> املاک شهرداری</h3>
                        <p class="item-desc">کلیه اطلاعات املاکی که توسط شهرداری اراک تملک یافته در این قسمت
                            منعکس
                            میگردد</p>
                        <a href="amlak/amlak.php">بیشتر بدانید..</a>
                    </div>
                    <div class="col-md-6 text-md-right text-center box_img display-tab">
                        <img src="img/amlak-sha.png" alt="کلیه اطلاعات املاکی که توسط شهرداری اراک تملک یافته">
                    </div>
                </div>
            </div>

            <div class=" row " style="border-bottom: 1px solid #ccc;">
                <div class="row  col-lg-8 col-xl-8 col-md-8 col-12 margin-div max-width-md box-bottom">
                    <div class="col-md-6 ">
                        <h3> اطلاعات شهرسازی</h3>
                        <p class="item-desc ">در این قسمت می توانید کلیه اطلاعات مربوط به ساخت و ساز ملک خود را
                            مشاهده فرمائید</p>
                        <a href="shahrsazi/shahrsazi.php">بیشتر بدانید..</a>
                    </div>
                    <div class="col-md-6 text-md-left text-center box_img">
                        <img src="img/architecture.png" alt=" اطلاعات شهرسازی">
                    </div>
                </div>
            </div>
        </div>
        <div class="  col-lg-8 col-xl-8 col-md-8 col-12 margin-div " id="part3">
            <div class="row max-width-md m-auto">
                <div class="col-md-4 text-center">
                    <div class="">
                        <img class="img-col-4" src="img/bodje.png" alt="">
                    </div>
                    <div class="desc-title">
                        <h4>بودجه</h4>
                        <p>بودجه فعلی و سال های گذشته شهرداری اراک را از این قسمت مشاهده فرمائید</p>
                        <a href="views/boodjeh.php">جزئیات بیشتر..</a>
                    </div>
                </div>
                <div class="col-md-4 text-center ">
                    <div class=" ">
                        <img class="img-col-4" src="img/omrani.png" alt="">
                    </div>
                    <div class="desc-title">
                        <h4>پروژه های عمرانی</h4>
                        <p>کلیه پروژه های شهرداری اراک را از این قسمت مشاهده کنید</p>
                        <a href="views/project.php">جزئیات بیشتر..</a>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="">
                        <img class="img-col-4" src="img/monaghese.png" alt="">
                    </div>
                    <div class="desc-title">
                        <h4>مناقصه / مزایده ها</h4>
                        <p>اطلاعات و مشخصات مناقصه های شهرداری اراک را از اینجا دنبال کنید</p>
                        <a href="views/auction-Bidding.php">جزئیات بیشتر..</a>
                    </div>
                </div>
            </div>

        </div>
        <!--row-->
    </div>
    <!--end of MainBody-->
</div>
<div id="demo"></div>
<!--<script>
        let w1=window.innerWidth|| document.documentElement.clientWidth||document.body.clientWidth;
        document.getElementById('demo').innerHTML= w1;
    </script>-->
<?php include_once 'views/footer.php';?>
<!--<script src="js_/cookies.js"></script>-->

<script>

    $(document).ready(function () {
        setTimeout(head, 0);
        function head() {
            document.getElementById('header1').style.top = '0';
            document.getElementById('move-search').style.top = '18px';
            document.getElementById('move-search').style.transition = '1s';
            document.getElementById('header1').style.transition = '1s';
        }

        $('.fix-img').animate({'opacity': '0.38'}, 100);//logo shahrdari
        $(".div4").animate({right: '0'}, 500);
        $(".div3").animate({right: '0'}, 100);
        $(".div2").animate({right: '0'}, 10);
        $(".div1").animate({right: '0'}, 500);
        $('.dist').animate({'opacity': '1'}, 100);
        // })

        setTimeout(fun, 500);
        function fun() {
            document.getElementById('part1').style.borderBottom = '1px solid #ccc';
            $('#part2').animate({'opacity': '1'}, 1000);
            $('#part3').css({'display': 'block'});
            $('#footer1').css({'display': 'block'});
        }
    });
</script>