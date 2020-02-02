<?php
function last_update($up)
{
    $day = $up[0] . $up[1] . $up[2] . $up[3] . $up[4] . $up[5] . $up[6] . $up[7] . $up[8] . $up[9];
    $last = preg_split("/\-/", $day);
    $hour = $up[11] . $up[12] ;
    $minute = $up[14] . $up[15];
    $seconds = $up[17] . $up[18];
    echo "<div  class='last-update'>" . " آخرین بروزرسانی در تاریخ " . gregorian_to_jalali($last[0], $last[1], $last[2]) ."</div>";
}

function date_today()
{
    date_default_timezone_set("Asia/Tehran");
    $dateEnglish = date("Y-m-d");

    $date_update = preg_split("/\-/", $dateEnglish);

    $dt_up = gregorian_to_jalali($date_update[0], $date_update[1], $date_update[2] );
    switch ($dt_up[5] . $dt_up[6]) {
        case '01' :
            $Month = ' فروردین ';
            break;
        case '02' :
            $Month = ' اردیبهشت ';
            break;
        case '03' :
            $Month = ' خرداد ';
            break;
        case '04' :
            $Month = ' تیر ';
            break;
        case '05' :
            $Month = ' مرداد ';
            break;
        case '06' :
            $Month = ' شهریور ';
            break;
        case '07' :
            $Month = ' مهر ';
            break;
        case '08' :
            $Month = ' آبان ';
            break;
        case '09' :
            $Month = ' آذر ';
            break;
        case '10' :
            $Month = ' دی ';
            break;
        case '11' :
            $Month = ' بهمن ';
            break;
        case '12' :
            $Month = ' اسفند ';
            break;
    }


    $day = date("l");
    switch ($day) {
        case 'Saturday' :
            $today = 'شنبه ';
            break;
        case 'Sunday' :
            $today = 'یکشنبه ';
            break;
        case 'Sunday' :
            $today = 'دو شنبه ';
            break;
        case 'Sunday' :
            $today = 'سه شنبه ';
            break;
        case 'Sunday' :
            $today = 'چهار شنبه ';
            break;
        case 'Sunday' :
            $today = 'پنج شنبه ';
            break;
        case 'Sunday' :
            $today = 'جمعه ';
            break;

    }
    if ($dt_up[8] == 0)
        $dt_up[8] = ' ';
    $date_today = ' ' . $today . $dt_up[8] . $dt_up[9] . $Month . $dt_up[0] . $dt_up[1] . $dt_up[2] . $dt_up[3];
    /*echo $dt_up[0].$dt_up[1].$dt_up[2].$dt_up[3];//سال
    echo '<br>'.$dt_up[5].'ماه';
    echo '<br>'.$dt_up[6];
    echo '<br>'.$dt_up[7].'روز';*/
    return $date_today;
}