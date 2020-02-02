<?php


if($_GET['riid']!=-1){
    $ring='../views/ring.php?rid='.$_GET['rid'].'&riid='. $_GET['riid'].'&block='.$_GET['block'].'&posti='.$_GET['posti'];
    header("location:".$ring);}
$block=$_GET['block'];
$posti=$_GET['posti'];
$regions = array(
    "-1" => "گزیده ضوابط شهر اراک",
    "56" => "منطقه یک",
    "57" => "منطقه دو",
    "58" => "منطقه سه",
    "59" => "منطقه چهار",
    "60" => "منطقه پنج",
    "61" => "بافت تاریخی",
);
$rules = array(
    "-1" => "مطابق رینگ بندی",
    "1"  => "بافت مرکزی",
    "2"  => "کرهرود",
    "3"  => "کوی آماده سازی",
    "4"  => "بافت فرسوده رودکی",
    "5"  => "شهر صنعتی",
    "6"  => "طرح جامع سنجان",
    "7"  => "کوی کوثر",
    "8"  => "باغ خلج",
    "9"  => "رینگ دوم",
    "10" => "رینگ سوم ",
    "11" => "رینگ چهارم",
    "12" => "رینگ پنجم",

);
$pdfrules = array(
    "-1" => "gozideh.docx",
    "1"  => "zavabet_markazi.pdf",
    "2"  => "Bafte_Farsoode_KarahRood.pdf",
    "3"  => "zavabet_amadesazi.pdf",
    "4"  => "zavabet_rodaki.pdf",
    "5"  => "kooye_sanati.pdf",
    "6"  => "Shahrdari_Senejan.pdf",
    "8"  => "zavabet_baghkhalaj.pdf",
    "9"  => "",
    "10" => "",
    "11" => "",
    "12" => "",
);
$htmlrules = array(
    "1" => "baft_markazi.php",
    "2" => "",
    "3" => "koyhae_amadeh_sazi.php",
    "4" => "baft_farsode_rodaki.php",
    "5" => "",
    "6" => "shahrdari_senejan.php",
    "7" => "",
    "8" => "zavabet_baghkhalaj.php",
);
$maprules = array(
    "-1" => "gozideh.docx",
    "1"  => "zavabet_markazi.pdf",
    "2"  => "naghshe_karahrod.png",
    "3"  => "kohaye_amadeh_sazi.jpg",
    "4"  => "karbari_rodaki.jpg",
    "5"  => "kooye_sanati.jpg",
    "6"  => "tarh_jame_senjan.jpg",
    "7"  => "kooyekowsar.jpg",
    "8"  => "naghshe_baghkhalaj.jpg",
    "9"  => "",
    "10" => "",
    "11" => "",
    "12" => "",
);
$rings = array(
    "-1" => "",
    "1"  => "رینگ یک",
    "2"  => "رینگ دو",
    "3"  => "رینگ سه",
    "4"  => "رینگ چهار",
    "5"  => "رینگ پنج",
);
$block = array(
    "B1" => array(234000, 694000),
    "B2" => array(282000, 708600),
    "B3" => array(56400, 640920),
    "B4" => array(270000, 705000),
    "B5" => array(402000, 744600),
    "B6" => array(516000, 778800),
    "B7" => array(72000, 645600),
    "B8" => array(270000, 705000),
    "B9" => array(114000, 658200),
    "B10" => array(120000, 660000),
    "B11" => array(114000, 658200),
    "B12" => array(195000, 682500),
    "B13" => array(42000, 636600),
    "B14" => array(171000, 675300),
    "B15" => array(180000, 678000),
    "B16" => array(258000, 701400),
    "B17" => array(318000, 719400)
);
$num_block = $_GET['block'];
$block_arse = $block[$num_block][0];
$block_ayan = $block[$num_block][1];
include "../views/header.php";
?>
<style>
    .ribban{
        margin-bottom: 20px;

    }
</style>
        <div class="BoxBody text-center w-d" style="width: 100%">
            <div class="ribban text-right">
                <h6 class="p-1">
                انتخاب شما <?php echo $regions[$_GET['rid']] ?> شهرداری اراک و در محدوده <?php if(!empty($rules[$_GET['ruid']])) echo $rules[$_GET['ruid']]; else  echo $rings[$_GET['riid']];?> می باشد.</h6>
            </div>
            <?php if ($rules['7'] != $rules[$_GET['ruid']]){  ?>
            <div class="row">
                <div class="col-4"><?php if($rules[$_GET['ruid']]==$rules[3] || $rules[$_GET['ruid']]==$rules[4] || $rules[$_GET['ruid']]==$rules[1] || $rules[$_GET['ruid']]==$rules[6] || $rules[$_GET['ruid']]==$rules[8]){ ?>
                    <a href="<?php echo $htmlrules[$_GET['ruid']]; ?>" class="aBoxBody">
                        <img class="f-size" src="../img/zavabet.jpg" alt="">
                        <p>دریافت ضوابط</p>
                    </a>
                </div>
                    <?php }else{?>
                    <a href="<?php if(empty($pdfrules[$_GET['ruid']])) echo '#'; else echo '/pdf/zavabet/'.$pdfrules[$_GET['ruid']]; ?>" class="aBoxBody">
                        <img class="f-size" src="../img/zavabet.jpg" alt="">
                        <p>دریافت ضوابط</p>
                    </a>
                </div>
                <?php }} if(($rules['3'] )!= $rules[$_GET['ruid']]){  ?>
                <div class="col-4">
                    <a href="<?php if (($rules['1'] )== $rules[$_GET['ruid']]){echo '/shahrsazi/'.$maprules[$_GET['ruid']];}else if(empty($maprules[$_GET['ruid']])) echo '#'; else echo '/pdf/zavabet/'.$maprules[$_GET['ruid']]; ?>" class="aBoxBody">
                        <img class="f-size" src="../img/seperation_map.png" alt="">
                        <p>نقشه کاربری</p>
                    </a>
                </div>
                <?php } if(($rules['1'] == $rules[$_GET['ruid']]) || ($rules['3'] == $rules[$_GET['ruid']]) || ($rules['7'] == $rules[$_GET['ruid']])){?>
                <div class="col-4">
                    <a href="<?php if(empty($maprules[$_GET['ruid']])) echo '#'; else echo '/pdf/zavabet/'.$maprules[$_GET['ruid']]; ?>" class="aBoxBody"><a href="<?php if(empty($maprules[$_GET['ruid']])) echo '#'; else echo '/pdf/zavabet/'.$maprules[$_GET['ruid']]; ?>" class="aBoxBody">
                        <img class="f-size" src="../img/mosavab.png" alt="">
                            <p>نقشه مصوب</p>
                    </a>
                </div>
               <?php  } ?>
        </div>
    </div>
    <div class="BoxBody text-center w-d" style="width: 100%">

            <div class=" p-1">
                <div class="">


                <!--<img  src="../img/gasht-posti/<?php /*echo $posti */ ?>" class="img-block" >-->
                <?php include '../views/table-avarez.php' ?>
            </div>
        </div>
    </div>

<?php include "../views/footer.php";
