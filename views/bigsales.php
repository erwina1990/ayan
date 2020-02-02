<?php
include_once "header.php";

if (isset($_GET['txt']))
    $_POST['filter']['cf_1572'] = $_GET['txt'];

if (isset($_POST['filter']))
    $sales = get_bigsales($_POST['filter']);
else
    $sales = get_bigsales();

if (isset($_GET['id']))
    $sales = getBigsaleById($_GET['id']);


$typeList = getDeposittypeList();

?>
    <style>
        .display-table-pc{
            padding 0 8px;
        }
    </style>
    <ul class="SiteMap">
        <li><a href="/">صفحه اول</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li>مزایده ها</li>
    </ul>

    <div class="BoxBody text-center" style="width: 100%;">

        <div class="table-responsive display-table-pc"  >
            <form method="post">
                <div style="overflow-x:auto;max-height: 700px">
                    <table class="table widefat table-tender  table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th >عنوان مزایده</th>
                            <th class="hide-sm-table">نوع تضمین شرکت در مزایده</th>
                            <th>محل انجام کار</th>
                            <th>  محل توزیع  اسناد مزایده</th>
                            <th>زمان توزیع اسناد مزایده ودریافت پیشنهادات </th>
                            <th>زمان تحویل سند</th>
                            <th>تاریخ اعلام وابلاغ برنده</th>
                            <!--<th>ساعت اعلام وابلاغ برنده</th>-->
                            <th>محل تحویل سند</th>
                            <th>زمان بازگشایی پاکات</th>
                            <th>محل  بازگشایی پاکات</th>
                            <th>حداقل صلاحیت شرکت کنندگان </th>
                            <th>برنده اول</th>
                            <th>برنده دوم</th>
                            <th>توضیحات</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr class="trInputs">
                            <td>
                                <input type="submit" value="جستجو" class="btn btn-info" style="height: 30px;padding-top: 3px;font-size: 13px;" >
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1572]"
                                       value="<?php if(isset($_POST['filter']['cf_1572'])) echo $_POST['filter']['cf_1572']; ?>" >
                            </td>
                            <td class="hide-sm-table">
                                <select name="filter[bigsales_tks_deposittype]">
                                    <option value=""></option>
                                    <?php
                                    foreach($typeList as $type):?>
                                        <option value="<?php echo $type['bigsales_tks_deposittype'];?>"
                                            <?php if(isset($_POST['filter']['bigsales_tks_deposittype']) && $_POST['filter']['bigsales_tks_deposittype'] == $type['bigsales_tks_deposittype']) echo 'selected';?>
                                        ><?php echo $type['bigsales_tks_deposittype'];?></option>

                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1554]"
                                       value="<?php if(isset($_POST['filter']['cf_1554'])) echo $_POST['filter']['cf_1554']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1556]"
                                       value="<?php if(isset($_POST['filter']['cf_1556'])) echo $_POST['filter']['cf_1556']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1558]"
                                       value="<?php if(isset($_POST['filter']['cf_1558'])) echo $_POST['filter']['cf_1558']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1574]"
                                       value="<?php if(isset($_POST['filter']['cf_1574'])) echo $_POST['filter']['cf_1574']; ?>">
                            </td>

                            <td>
                                <input type="text" name="filter[cf_1566]"
                                       value="<?php if(isset($_POST['filter']['cf_1566'])) echo $_POST['filter']['cf_1566']; ?>">
                            </td>
                            <!--<td>
                            <input type="text" name="filter[cf_1576]"
                                   value="<?php /*if(isset($_POST['filter']['cf_1576'])) echo $_POST['filter']['cf_1576']; */?>">
                        </td>-->
                            <td>
                                <input type="text" name="filter[cf_1560]"
                                       value="<?php if(isset($_POST['filter']['cf_1560'])) echo $_POST['filter']['cf_1560']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1562]"
                                       value="<?php if(isset($_POST['filter']['cf_1562'])) echo $_POST['filter']['cf_1562']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1564]"
                                       value="<?php if(isset($_POST['filter']['cf_1564'])) echo $_POST['filter']['cf_1564']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1568]"
                                       value="<?php if(isset($_POST['filter']['cf_1568'])) echo $_POST['filter']['cf_1568']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1606]"
                                       value="<?php if(isset($_POST['filter']['cf_1606'])) echo $_POST['filter']['cf_1606']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1608]"
                                       value="<?php if(isset($_POST['filter']['cf_1608'])) echo $_POST['filter']['cf_1608']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1570]"
                                       value="<?php if(isset($_POST['filter']['cf_1570'])) echo $_POST['filter']['cf_1570']; ?>">
                            </td>

                        </tr>
                        <?php
                        if ($sales){

                            $count = 1;
                            foreach( $sales as $sel):
                                $last_da = $sel['modifiedtime'];
                                if ($sel['modifiedtime'] > $up)  $up = $sel['modifiedtime']; //Getting the latest update
                                $sdate = preg_split ("/\-/", $sel['cf_1558']);
                                $fdate = preg_split ("/\-/", $sel['cf_1574']);
                                $date = preg_split ("/\-/", $sel['cf_1566']);
                                $bdate = preg_split ("/\-/", $sel['cf_1562']);
                                ?>
                                <tr>
                                    <td><?php echo $count ; ?></td>
                                    <td><div class="sc-tab text-justify"><?php echo $sel['cf_1572'];  ?> </div></td>
                                    <td class="hide-sm-table"><?php echo $sel['bigsales_tks_deposittype']; ?></td>
                                    <td><?php echo $sel['cf_1554']; ?></td>
                                    <td><div class="sc-tab"><?php echo $sel['cf_1556']; ?></div></td>
                                    <td><?php echo gregorian_to_jalali($sdate[0],$sdate[1],$sdate[2]);  ?></td>
                                    <td>
                                        <?php
                                        date_default_timezone_set("Asia/Tehran");
                                        $t=time();
                                        $dateEnglish = date("Y-m-d",$t);
                                        $date_update = preg_split ("/\-/", $dateEnglish);
                                        $dt_up= gregorian_to_jalali($date_update[0],$date_update[1],$date_update[2]);
                                        $da= gregorian_to_jalali($fdate[0],$fdate[1],$fdate[2]);
                                        if ($dateEnglish>$sel['cf_1574']){ ?>
                                            <?php if ( ($sel['cf_1574']==0)){  echo "--";} else{ echo "<span style='color: red;text-align: right;display: inline-block;font-weight: bold;font-size: 14px;text-align: center'>مهلت تمام شد<br><span class='date-exp'>".$da."</span></span>"; }}else { echo $da;} ?>

                                    </td>
                                    <td ><?php
                                        echo gregorian_to_jalali($date[0],$date[1],$date[2]);
                                        ?></td>
                                    <!--<td><?php /*echo $sel['cf_1576']; */?></td>-->
                                    <td><div class="sc-tab"><?php echo $sel['cf_1560']; ?></div></td>
                                    <td><?php echo gregorian_to_jalali($bdate[0],$bdate[1],$bdate[2]); ?></td>
                                    <td><div class="sc-tab"><?php echo $sel['cf_1564'] ; ?></div></td>
                                    <td><div class="sc-tab"><?php echo $sel['cf_1568']; ?></div></td>
                                    <td><div class="sc-tab"><?php echo $sel['cf_1606']; ?></div></td>
                                    <td><div class="sc-tab"><?php echo $sel['cf_1608']; ?></div></td>
                                    <td><div class="sc-tab text-justify"><?php echo $sel['cf_1570']; ?></div></td>
                                </tr>
                                <?php
                                $count++;
                            endforeach;
                        } else {
                            echo '<tr><td colspan="6">اطلاعاتی برای نمایش وجود ندارد.</td></tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <div class="display-table-mob">
            <form method="post">
                <div >
                    <a class="btnSearch" id="btnSearch" style="color: #fff; ">برای جستجوی سریعتر کلیک کنید  </a>
                </div>
                <div id="resultSearch" style="position: relative;top: 2px;left: 0;right: 0;background: #33D456;">
                    <span style="font-size: 12px;color: #fff;">تعداد مزایده ها: <?php echo $count-1 ; ?></span>
                </div>
                <table class="table widefat  table-tender1  table-bordered  table-striped" style="border: 2px solid #218838;margin:5px auto;background: white;">
                    <thead>
                    <div class="trInputsMob">
                        <div >
                            <input type="text" placeholder="عنوان مزایده" name="filter[cf_1572]"
                                   value="<?php if(isset($_POST['filter']['cf_1572'])
                                       && !empty($_POST['filter']['cf_1572'])) echo $_POST['filter']['cf_1572']?>">
                        </div>
                        <div>
                            <select name="filter[bigsales_tks_deposittype]">
                                <option value="0">انتخاب کنید...</option>
                                <?php
                                if($typeList) {
                                    foreach ($typeList as $type):?>
                                        <option value="<?php echo $type['bigsales_tks_deposittype']; ?>"
                                            <?php if (isset($_POST['filter']['bigsales_tks_deposittype']) && $_POST['filter']['bigsales_tks_deposittype'] == $type['bigsales_tks_deposittype']) echo 'selected'; ?>
                                        ><?php echo $type['bigsales_tks_deposittype']; ?></option>
                                    <?php endforeach;
                                }?>
                            </select>
                        </div>
                        <div>
                            <input type="text" placeholder="محل انجام کار" name="filter[cf_1554]"
                                   value="<?php if(isset($_POST['filter']['cf_1554'])
                                       && !empty($_POST['filter']['cf_1554'])) echo $_POST['filter']['cf_1554']?>">
                        </div>
                        <div>
                            <input type="text" placeholder=" محل توزیع اسناد " name="filter[cf_1556]"
                                   value="<?php if(isset($_POST['filter']['cf_1556'])
                                       && !empty($_POST['filter']['cf_1556'])) echo $_POST['filter']['cf_1556']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="زمان توزیع اسناد" name="filter[cf_1558]"
                                   value="<?php if(isset($_POST['filter']['cf_1494'])
                                       && !empty($_POST['filter']['cf_1494'])) echo $_POST['filter']['cf_1494']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="زمان تحویل اسناد" name="filter[cf_1574]"
                                   value="<?php if(isset($_POST['filter']['cf_1574'])
                                       && !empty($_POST['filter']['cf_1574'])) echo $_POST['filter']['cf_1574']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="تاریخ اعلام و ابلاغ برنده" name="filter[cf_1566]"
                                   value="<?php if(isset($_POST['filter']['cf_1566'])
                                       && !empty($_POST['filter']['cf_1566'])) echo $_POST['filter']['cf_1566']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="محل تحویل سند" name="filter[cf_1560]"
                                   value="<?php if(isset($_POST['filter']['cf_1560'])
                                       && !empty($_POST['filter']['cf_1560'])) echo $_POST['filter']['cf_1560']?>">
                        </div>
                        <!--<div>
                        <input type="text" placeholder=" زمان بازگشایی پاکات " name="filter[cf_1562]"
                               value="<?php /*if(isset($_POST['filter']['cf_1562'])
                                   && !empty($_POST['filter']['cf_1562'])) echo $_POST['filter']['cf_1562']*/?>">
                    </div>-->
                        <div>
                            <input type="text" placeholder="محل  بازگشایی پاکات" name="filter[cf_1564]"
                                   value="<?php if(isset($_POST['filter']['cf_1564'])
                                       && !empty($_POST['filter']['cf_1564'])) echo $_POST['filter']['cf_1564']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="حداقل صلاحیت شرکت کنندگان" name="filter[cf_1568]"
                                   value="<?php if(isset($_POST['filter']['cf_1568'])
                                       && !empty($_POST['filter']['cf_1568'])) echo $_POST['filter']['cf_1568']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="برنده اول" name="filter[cf_1606]"
                                   value="<?php if(isset($_POST['filter']['cf_1606'])
                                       && !empty($_POST['filter']['cf_1606'])) echo $_POST['filter']['cf_1606']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="برنده دوم" name="filter[cf_1608]"
                                   value="<?php if(isset($_POST['filter']['cf_1608'])
                                       && !empty($_POST['filter']['cf_1608'])) echo $_POST['filter']['cf_1608']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="توضیحات" name="filter[cf_1570]"
                                   value="<?php if(isset($_POST['filter']['cf_1570'])
                                       && !empty($_POST['filter']['cf_1570'])) echo $_POST['filter']['cf_1570']?>">
                        </div>
                        <div>
                            <input type="submit" class="btn btn-info btnSend_Serach" id="btnSend"  value="جستجو"  >
                        </div>
                    </div>
                    </thead>
                    <?php
                    if ($sales){
                    $count = 1;
                    foreach( $sales as $sel):
                    $sdate = preg_split ("/\-/", $sel['cf_1558']);
                    $fdate = preg_split ("/\-/", $sel['cf_1574']);
                    $date = preg_split ("/\-/", $sel['cf_1566']);
                    $bdate = preg_split ("/\-/", $sel['cf_1562']);
                    ?>
                    <tbody>
                    <tr >
                        <td COLSPAN="2" style="font-weight: bold;background: #218838;color: #fff;"  class="header-table"> مزایده شماره  <?php echo $count ; ?></td>
                    </tr>
                    <tr style=" background-color: rgba(0, 0, 0, 0.05);">
                        <th >عنوان مزایده</th>
                        <td><div class="sc-tab"><?php echo $sel['cf_1572'];  ?> </div></td>
                    </tr>
                    <tr>
                        <th class="hide-sm-table">نوع تضمین شرکت در مزایده</th>
                        <td class="hide-sm-table"><?php echo $sel['bigsales_tks_deposittype']; ?></td>
                    </tr>
                    <tr>
                        <th>محل انجام کار</th>
                        <td><?php echo $sel['cf_1554']; ?></td>
                    </tr>
                    <tr>
                        <th>  محل توزیع  اسناد مزایده</th>
                        <td><div class="sc-tab"><?php echo $sel['cf_1556']; ?></div></td>
                    </tr>
                    <tr>
                        <th>زمان توزیع اسناد مزایده ودریافت پیشنهادات </th>
                        <td><?php echo gregorian_to_jalali($sdate[0],$sdate[1],$sdate[2]);  ?></td>
                    </tr>
                    <tr>
                        <th>زمان تحویل سند</th>
                        <td>
                            <?php
                            date_default_timezone_set("Asia/Tehran");
                            $t=time();
                            $dateEnglish = date("Y-m-d",$t);
                            $date_update = preg_split ("/\-/", $dateEnglish);
                            $dt_up= gregorian_to_jalali($date_update[0],$date_update[1],$date_update[2]);
                            $da= gregorian_to_jalali($fdate[0],$fdate[1],$fdate[2]);
                            if ($dateEnglish>$sel['cf_1574']){ ?>
                                <?php if ( ($sel['cf_1574']==0)){  echo "--";} else{ echo "<span style='color: red;text-align: right;display: inline-block;font-weight: bold;font-size: 14px;'>مهلت تمام شد</span>"; }}else { echo $da;} ?>
                        </td>
                    </tr>
                    <tr>
                        <th>تاریخ اعلام وابلاغ برنده</th>
                        <td ><?php
                            echo gregorian_to_jalali($date[0],$date[1],$date[2]);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>ساعت اعلام وابلاغ برنده</th>
                        <td><?php echo $sel['cf_1576']; ?></td>
                    </tr>
                    <tr>
                        <th>محل تحویل سند</th>
                        <td><div class="sc-tab"><?php echo $sel['cf_1560']; ?></div></td>
                    </tr>
                    <!--<tr>
                    <th>زمان بازگشایی پاکات</th>
                    <td><?php /*echo gregorian_to_jalali($bdate[0],$bdate[1],$bdate[2]); */?></td>
                </tr>-->
                    <tr>
                        <th>محل  بازگشایی پاکات</th>
                        <td><div class="sc-tab"><?php echo $sel['cf_1564'] ; ?></div></td>
                    </tr>
                    <tr>
                        <th>حداقل صلاحیت شرکت کنندگان </th>
                        <td><div class="sc-tab"><?php echo $sel['cf_1568']; ?></div></td>
                    </tr>
                    <tr>
                        <th>برنده اول</th>
                        <td><div class="sc-tab"><?php echo $sel['cf_1606']; ?></div></td>
                    </tr>
                    <tr>
                        <th>برنده دوم</th>
                        <td><div class="sc-tab"><?php echo $sel['cf_1608']; ?></div></td>
                    </tr>
                    <tr>
                        <th>توضیحات</th>
                        <td><div class="sc-tab"><?php echo $sel['cf_1570']; ?></div></td>
                    </tr>
                    <?php
                    $count++;
                    endforeach;
                    } else {
                        echo '<tr><td colspan="6">اطلاعاتی برای نمایش وجود ندارد.</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </form>
        </div>

    </div>
<?php include_once "footer.php";
last_update($up);

