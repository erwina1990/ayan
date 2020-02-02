<?php
include_once "header.php";
if (isset($_GET['txt']))
    $_POST['filter']['cf_1520'] = $_GET['txt'];
if (isset($_POST['filter']))
    $tenders = get_tender($_POST['filter']);
else
    $tenders = get_tender();
if (isset($_GET['id']))
    $tenders = getTenderById($_GET['id']);
$typeList = getTenderDeposittypeList();
?>
    <ul class="SiteMap">
        <li><a href="/">صفحه اول</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li>مناقصات</li>
    </ul>
    <div class="BoxBody text-center" style="width: 100%;">
        <div style="padding: 0 8px;">
            <form method="post">
                <div class="table-responsive display-table-pc" style="max-height: 700px;">
                    <table class="table widefat table-tender table-bordered table-hover table-striped ">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th >عنوان مناقصه ومبلغ تضمین  </th>
                            <th class="hide-sm-table">نحوه تسلیم سپرده شرکت در مناقصه</th>
                            <th>محل انجام کار</th>
                            <th>  محل توزیع  اسناد مناقصه</th>
                            <th>زمان توزیع اسناد مناقصه ودریافت پیشنهادات </th>
                            <th>زمان تحویل سند</th>
                            <th>تاریخ اعلام و ابلاغ برنده</th>
                            <!--<th>ساعت اعلام وابلاغ برنده</th>-->
                            <th>محل تحویل سند</th>
                            <th>زمان بازگشایی پاکات</th>
                            <th>محل  بازگشایی پاکات</th>
                            <th>حداقل صلاحیت شرکت کنندگان </th>
                            <th >توضیحات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="trInputs">
                            <td>
                                <input type="submit" value="جستجو" class="btn btn-info" style="height: 30px;padding-top: 3px;font-size: 13px;" >
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1520]"
                                       value="<?php if(isset($_POST['filter']['cf_1520'])) echo $_POST['filter']['cf_1520']; ?>" >
                            </td>
                            <td class="hide-sm-table">
                                <select name="filter[cf_1498]">
                                    <option value=""></option>
                                    <?php
                                    if($typeList) {
                                        foreach ($typeList as $type):?>
                                            <option value="<?php echo $type['cf_1498']; ?>"
                                                <?php if (isset($_POST['filter']['cf_1498']) && $_POST['filter']['cf_1498'] == $type['cf_1498']) echo 'selected'; ?>
                                            ><?php echo $type['cf_1498']; ?></option>
                                        <?php endforeach;
                                    }?>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1490]"
                                       value="<?php if(isset($_POST['filter']['cf_1490'])) echo $_POST['filter']['cf_1490']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1492]"
                                       value="<?php if(isset($_POST['filter']['cf_1492'])) echo $_POST['filter']['cf_1492']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1494]"
                                       value="<?php if(isset($_POST['filter']['cf_1494'])) echo $_POST['filter']['cf_1494']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1496]"
                                       value="<?php if(isset($_POST['filter']['cf_1496'])) echo $_POST['filter']['cf_1496']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1500]"
                                       value="<?php if(isset($_POST['filter']['cf_1500'])) echo $_POST['filter']['cf_1500']; ?>">
                            </td>
                            <!--<td>
                            <input type="text" name="filter[cf_1504]"
                                   value="<?php /*if(isset($_POST['filter']['cf_1504'])) echo $_POST['filter']['cf_1504']; */?>">
                        </td>-->
                            <td>
                                <input type="text" name="filter[cf_1506]"
                                       value="<?php if(isset($_POST['filter']['cf_1506'])) echo $_POST['filter']['cf_1506']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1508]"
                                       value="<?php if(isset($_POST['filter']['cf_1508'])) echo $_POST['filter']['cf_1508']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1510]"
                                       value="<?php if(isset($_POST['filter']['cf_1510'])) echo $_POST['filter']['cf_1510']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1514]"
                                       value="<?php if(isset($_POST['filter']['cf_1514'])) echo $_POST['filter']['cf_1514']; ?>">
                            </td>
                            <td class="hide-sm-table">
                                <input type="text" name="filter[cf_1512]"
                                       value="<?php if(isset($_POST['filter']['cf_1512'])) echo $_POST['filter']['cf_1512']; ?>">
                            </td>
                        </tr>
                        <?php
                        if ($tenders){
                            $count = 1;
                            foreach( $tenders as $tender):

                                if ($tender['modifiedtime'] > $up)  $up = $tender['modifiedtime']; //Getting the latest update

                                //var_dump($tender);
                                $sdate = preg_split ("/\-/", $tender['cf_1494']);
                                $fdate = preg_split ("/\-/", $tender['cf_1496']);
                                $date = preg_split ("/\-/", $tender['cf_1500']);
                                $bdate = preg_split ("/\-/", $tender['cf_1508']);
                                ?>
                                <tr>
                                    <td><?php echo $count;?></td>
                                    <td><div class="sc-tab text-justify"><?php echo $tender['cf_1520'];  ?> </div></td>
                                    <td class="hide-sm-table "><?php echo $tender['cf_1498']; ?></td>
                                    <td><?php echo $tender['cf_1490']; ?></td>
                                    <td><div class="sc-tab"><?php echo $tender['cf_1492']; ?></div></td>
                                    <td><?php   echo gregorian_to_jalali($sdate[0],$sdate[1],$sdate[2]); ?></td>
                                    <td>
                                        <?php date_default_timezone_set("Asia/Tehran");
                                        $t=time();
                                        $dateEnglish = date("Y-m-d",$t);
                                        $date_update = preg_split ("/\-/", $dateEnglish);
                                        $dt_up = gregorian_to_jalali($date_update[0],$date_update[1],$date_update[2]);

                                        $fdat= gregorian_to_jalali($fdate[0],$fdate[1],$fdate[2]);

                                        if ($dateEnglish >$tender['cf_1496']){   ?>
                                            <?php if ( ($tender['cf_1496']==0)){  echo "--";}
                                            else echo " <span style='color: red;display: inline-block;font-weight: bold;font-size: 14px;text-align: center;'>مهلت تمام شد</span>"; }
                                        else echo $fdat; ?>
                                    </td>
                                    <td ><?php  echo gregorian_to_jalali($date[0],$date[1],$date[2]);  ?></td>
                                    <td><div class="sc-tab"><?php echo $tender['cf_1506']; ?></div></td>
                                    <td><?php echo gregorian_to_jalali($bdate[0],$bdate[1],$bdate[2]);?></td>
                                    <td><div class="sc-tab"><?php echo $tender['cf_1510']; ?></div></td>
                                    <td><div class="sc-tab text-justify"><?php echo $tender['cf_1512']; ?></div></td>
                                    <td class="hide-sm-table"><div class="sc-tab text-justify"><?php echo $tender['cf_1514']; ?></div></td>
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

                    <span style="font-size: 12px;color: #fff;">تعداد مناقصه ها: <?php echo $count-1 ; ?></span>
                </div>
                <table class="table widefat  table-tender1  table-bordered  table-striped" style="border: 2px solid #218838;margin:5px auto;background: white;">
                    <thead>
                    <div class="trInputsMob">
                        <div >
                            <input type="text" placeholder="عنوان مناقصه" name="filter[cf_1520]"
                                   value="<?php if(isset($_POST['filter']['cf_1520'])
                                       && !empty($_POST['filter']['cf_1520'])) echo $_POST['filter']['cf_1520']?>">
                        </div>
                        <div>
                            <select name="filter[cf_1498]">
                                <option value="0">انتخاب کنید...</option>
                                <?php
                                if($typeList) {
                                    foreach ($typeList as $type):?>
                                        <option value="<?php echo $type['cf_1498']; ?>"
                                            <?php if (isset($_POST['filter']['cf_1498']) && $_POST['filter']['cf_1498'] == $type['cf_1498']) echo 'selected'; ?>
                                        ><?php echo $type['cf_1498']; ?></option>
                                    <?php endforeach;
                                }?>
                            </select>
                        </div>
                        <div>
                            <input type="text" placeholder="محل انجام کار" name="filter[cf_1490]"
                                   value="<?php if(isset($_POST['filter']['cf_1490'])
                                       && !empty($_POST['filter']['cf_1490'])) echo $_POST['filter']['cf_1490']?>">
                        </div>
                        <div>
                            <input type="text" placeholder=" محل توزیع اسناد " name="filter[cf_1492]"
                                   value="<?php if(isset($_POST['filter']['cf_1492'])
                                       && !empty($_POST['filter']['cf_1492'])) echo $_POST['filter']['cf_1492']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="زمان توزیع اسناد" name="filter[cf_1494]"
                                   value="<?php if(isset($_POST['filter']['cf_1494'])
                                       && !empty($_POST['filter']['cf_1494'])) echo $_POST['filter']['cf_1494']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="زمان تحویل اسناد" name="filter[cf_1496]"
                                   value="<?php if(isset($_POST['filter']['cf_1496'])
                                       && !empty($_POST['filter']['cf_1496'])) echo $_POST['filter']['cf_1496']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="تاریخ اعلام و ابلاغ برنده" name="filter[cf_1500]"
                                   value="<?php if(isset($_POST['filter']['cf_1500'])
                                       && !empty($_POST['filter']['cf_1500'])) echo $_POST['filter']['cf_1500']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="محل تحویل سند" name="filter[cf_1506]"
                                   value="<?php if(isset($_POST['filter']['cf_1506'])
                                       && !empty($_POST['filter']['cf_1506'])) echo $_POST['filter']['cf_1506']?>">
                        </div>
                        <div>
                            <input type="text" placeholder=" زمان بازگشایی پاکات " name="filter[cf_1508]"
                                   value="<?php if(isset($_POST['filter']['cf_1508'])
                                       && !empty($_POST['filter']['cf_1508'])) echo $_POST['filter']['cf_1508']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="محل  بازگشایی پاکات" name="filter[cf_1510]"
                                   value="<?php if(isset($_POST['filter']['cf_1510'])
                                       && !empty($_POST['filter']['cf_1510'])) echo $_POST['filter']['cf_1510']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="توضیحات" name="filter[cf_1514]"
                                   value="<?php if(isset($_POST['filter']['cf_1514'])
                                       && !empty($_POST['filter']['cf_1514'])) echo $_POST['filter']['cf_1514']?>">
                        </div>
                        <div>
                            <input type="submit" class="btn btn-info btnSend_Serach" id="btnSend"  value="جستجو"  >
                        </div>
                    </div>
                    </thead>
                    <?php
                    if ($tenders){
                    $count = 1;
                    foreach( $tenders as $tender):
                    //var_dump($tender);
                    $sdate = preg_split ("/\-/", $tender['cf_1494']);
                    $fdate = preg_split ("/\-/", $tender['cf_1496']);
                    $date = preg_split ("/\-/", $tender['cf_1500']);
                    $bdate = preg_split ("/\-/", $tender['cf_1508']);
                    ?>
                    <tbody>
                    <tr >
                        <td COLSPAN="2" style="font-weight: bold;background: #218838;color: #fff;"  class="header-table">مناقصه شماره <?php echo $count ; ?></td>
                    </tr>
                    <tr >
                        <th >عنوان مناقصه ومبلغ تضمین  </th>
                        <td style="text-align: justify"><?php echo $tender['cf_1520'];  ?> </td>
                    </tr>
                    <tr>
                        <th>نحوه تسلیم سپرده شرکت در مناقصه</th>
                        <td><?php echo $tender['cf_1498'];  ?></td>
                    </tr>
                    <tr>
                        <th>محل انجام کار</th>
                        <td><?php echo  $tender['cf_1490']; ?></td>
                    </tr>
                    <tr>
                        <th>  محل توزیع  اسناد مناقصه</th>
                        <td><?php echo $tender['cf_1492']; ?></td>
                    </tr>
                    <tr>
                        <th>زمان توزیع اسناد مناقصه ودریافت پیشنهادات </th>
                        <td><?php echo gregorian_to_jalali($sdate[0],$sdate[1],$sdate[2]);?></td>
                    </tr>
                    <tr>
                        <th>زمان تحویل سند</th>
                        <td>
                            <?php date_default_timezone_set("Asia/Tehran");
                            $t=time();
                            $dateEnglish = date("Y-m-d",$t);
                            $date_update = preg_split ("/\-/", $dateEnglish);
                            $dt_up = gregorian_to_jalali($date_update[0],$date_update[1],$date_update[2]);
                            $fdat= gregorian_to_jalali($fdate[0],$fdate[1],$fdate[2]);
                            if ($dateEnglish >$tender['cf_1496']){   ?>
                                <?php if ( ($tender['cf_1496']==0)){  echo "--";} else echo " <span style='color: red;text-align: right;display: inline-block;font-weight: bold;font-size: 14px;'>مهلت تمام شد</span>"; }else echo $fdat; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>تاریخ اعلام و ابلاغ برنده </th>
                        <td > <?php echo gregorian_to_jalali($date[0],$date[1],$date[2]);  ?></td>
                    </tr>
                    <!--<tr>
                    <th> ساعت اعلام وابلاغ برنده </th>
                    <td ><?php /*echo $tender['cf_1504']; */?></td>
                </tr>-->
                    <tr>
                        <th> محل تحویل سند </th>
                        <td ><?php echo $tender['cf_1506']; ?></td>
                    </tr>
                    <tr>
                        <th>زمان بازگشایی پاکات  </th>
                        <td ><?php echo gregorian_to_jalali($bdate[0],$bdate[1],$bdate[2]); ?></td>
                    </tr>
                    <tr>
                        <th> محل  بازگشایی پاکات  </th>
                        <td ><?php echo $tender['cf_1510']; ?></td>
                    </tr>
                    <tr>
                        <th>حداقل صلاحیت شرکت کنندگان  </th>
                        <td ><?php echo $tender['cf_1512']; ?></td>
                    </tr>
                    <tr>
                        <th> توضیحات </th>
                        <td  style="text-align: justify"><?php echo $tender['cf_1514']; ?></td>
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
/*if (isset($_GET['last-time'])) $up=$_GET['last-time'];
var_dump($_GET['last-time']) ;*/
?>