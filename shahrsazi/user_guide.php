<?php
include '../views/header.php';
?>

    <style>
        .date-today{display: none}
    </style>
    <ul class="SiteMap">
        <li><a href="/">صفحه اول</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li><a href="/shahrsazi/shahrsazi.php">اطلاعات شهرسازی</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li>سامانه ضوابط ملک من</li>
    </ul>
    <div style="clear: both"></div>
    <div class="BoxBodyDetails text-center">
        <div class="text-center" >

            <div class="Details-div">
                <div class="" style="">
                    <div class="text-center row">
                        <div class="col-12 div-visb-xs" >
                            <span class="details-span text-center" style="margin: 0 auto" > راهنمای استفاده </span>
                            <img  class="icon-help img-visb-xs" src="../img/help.svg" alt="">
                        </div>

                    </div>
                    <div class="text-center row">
                        <div class=" col-md-12" >
                            <div class="row text-justify">
                                <div class="col-xl-3 col-md-3 col-sm-3 col-5 ">
                                    <a  onclick="history.back();" title="مرحله قبل" id="stepNext" class="btn btn-primary btn-stepNext float-left" style="color: #fff">مرحله ی قبل</a>
                                </div>
                                <div class="col-xl-6 col-md-6 col-sm-6 col-2 " style="text-align: center">
                                    <span class="details-span text-center  hidden-xs" style="margin: 0 auto;" > راهنمای استفاده </span>
                                    <img  class="icon-help hidden-xs" src="../img/help.svg" alt="">
                                </div>
                                <div class="col-xl-3 col-md-3 col-sm-3 col-5">
                                    <a href="../shahrsazi/building_rules.php" title="مرحله بعد" id="stepNext" class="btn btn-primary  btn-stepNext float-right ">مرحله ی بعد</a>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="Details-box row" style="  background-color: #15AFE8;">
                    <div class="col-md-6 text-right">
                        <!-- <img  class="icon-details"  src="../img/search.svg" alt="">-->
                        <span style="color: #fff;">  اسم کوچه و یا خیابان خود را در نوار جستجو وارد کنید و از اسامی معرفی شده یکی را انتخاب نمائید</span>
                    </div>
                    <di class="col-md-6">
                        <img class="Details-div-img" src="../img/search-ditails4.png" alt=""><br>
                    </di>

                </div>
                <div class="Details-box row" style="  background-color: #238AFF;">
                    <div class="col-md-6 text-right">
                        <!--<img  class="icon-details" src="../img/select.svg" alt="">-->
                        <span style="color: #fff;"> ملک خود را روی نقشه علامت گذاری کنید</span>
                    </div>
                    <div class="col-md-6">
                        <img class="Details-div-img" src="../img/details-map1.png" alt="">
                    </div>

                </div>
                <div class="Details-box row" style="  background-color: #1540E8;">
                    <div class="col text-right"><span style="color: #fff">اطلاعات ذیل را مشاهده کنید:</span></div>
                    <div class="row col-md-12 m-auto details-button">
                        <!--<img  class="icon-details" src="../img/assets.svg" alt="">-->
                        <div class="col-md-4 col-6"><span>حداکثر تعداد  طبقات مجاز</span></div>
                        <div class="col-md-4 col-6"><span>گزیده ضوابط </span></div>
                        <div class="col-md-4 col-6"><span>قیمت منطقه ای  عرصه , عیان</span></div>
                        <div class="col-md-4 col-6"><span>ضوابط پارکینگ </span></div>
                        <div class="col-md-4 col-6"><span>ضوابط گذربندی </span></div>
                        <div class="col-md-4 col-6"><span>ضرایب محاسبه  عوارض q و k</span></div>

                    </div>
                    <div class="col-md-6">

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class=" col-md-8 text-justify" >
                        <div class="row">
                            <div class="col-4">
                                <a onclick="history.back();" title="مرحله قبل" id="stepNext" class="btn btn-primary btn-stepNext float-left " style="color: #fff">مرحله ی قبل</a>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-4">
                                <a href="building_rules.php" title="مرحله بعد" id="stepNext" class="btn btn-primary btn-stepNext float-right ">مرحله ی بعد</a>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-2"></div>
                </div>

            </div>
        </div>
    </div>
    </div>
<?php
include '../views/footer.php';
