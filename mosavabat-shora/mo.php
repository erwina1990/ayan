<?php include_once "../views/header.php";
$num=$_GET['session'];
$number_id=$_GET['number_id'];

    $mosavabat_sesstion = get_mo($num,$_POST['filter']);
$approvalsList_cf_1756 = getApprovalsList_cf_1756();
?>


<ul class="SiteMap">
    <li><a href="/">صفحه اول</a></li>
    <i class="mdi mdi-chevron-left"></i>
    <li><a href="/"> مصوبات شورا</a></li>
    <i class="mdi mdi-chevron-left"></i>
    <li>مشاهده مصوبات جلسه </li>
</ul>
<div class="BoxBody text-right clear" >
    <div style="padding: 0 10px">
        <form method="post">
            <div class="table-responsive display-table-pc" style="max-height: 700px" >

                   <!-- <?php /* $session = ''; $sum=1;
                    if ($mosavabat_sesstion) {
                        $count = 1; */?>
                        <h6>مصوبات جلسه "<?php /*echo $number_id; */?>" شورا :  </h6>
                        --><?php /*} */?>
                <form method="post">
                    <div class="table-responsive <!--display-table-pc-->" style="max-height: 700px" align="center">
                        <table class="table widefat table-gharardad-kalan table-bordered table-hover " dir="rtl" cellspacing="0"
                               cellpadding="0" border="1">
                            <thead>
                            <tr>
                                <th>شماره </th>
                                <th>عنوان مصوبه</th>
                                <th style="width: 40% ;"> متن مصوبه</th>
                                <th> کمیسیون مربوطه</th>
                                <th> تاریخ جلسه</th>
                                <th> افراد موافق</th>
                                <th>افراد مخالف</th>
                                <th>افراد ممتنع</th>
                                <th>وضعیت مصوبه</th>
                                <th>وضعیت تصویب </th>
                                <th>نیاز به مصوبه </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="trInputs">
                                <td>
                                    <input type="submit" value="جستجو" class="btn btn-info" style="height: 30px;padding-top: 3px;font-size: 13px;" >
                                </td>
                                <td>
                                    <input type="text" name="filter[approvals_tks_approvaltitle]"
                                           value="<?php if(isset($_POST['filter']['approvals_tks_approvaltitle'])) echo $_POST['filter']['approvals_tks_approvaltitle']; ?>" >
                                </td>
                                <td>
                                    <input placeholder=" جستجو..." type="text" name="filter[cf_1728]"
                                           value="<?php if(isset($_POST['filter']['cf_1728'])) echo $_POST['filter']['cf_1728']; ?>" >
                                </td>
                                <td>
                                    <input type="text" name="filter[cf_1734]"
                                           value="<?php if(isset($_POST['filter']['cf_1734'])) echo $_POST['filter']['cf_1734']; ?>" >
                                </td>
                                <td>
                                    <input type="text" id="" class="" name="filter[cf_1766]"
                                           value="<?php if(isset($_POST['filter']['cf_1766'])) echo $_POST['filter']['cf_1766']; ?>" >

                                </td>
                                <td>
                                    <input type="text" name="filter[cf_1744]"
                                           value="<?php if(isset($_POST['filter']['cf_1744'])) echo $_POST['filter']['cf_1744']; ?>" >
                                </td>
                                <td>
                                    <input type="text" name="filter[cf_1746]"
                                           value="<?php if(isset($_POST['filter']['cf_1746'])) echo $_POST['filter']['cf_1746']; ?>" >
                                </td>
                                <td>
                                    <input type="text" name="filter[cf_1748]"
                                           value="<?php if(isset($_POST['filter']['cf_1748'])) echo $_POST['filter']['cf_1748']; ?>" >
                                </td>
                                <td>
                                    <input type="text" name="filter[cf_1756]"
                                           value="<?php if(isset($_POST['filter']['cf_1756'])) echo $_POST['filter']['cf_1756']; ?>" >
                                </td>
                                <td>
                                    <input type="text" name="filter[cf_1738]"
                                           value="<?php if(isset($_POST['filter']['cf_1738'])) echo $_POST['filter']['cf_1738']; ?>" >
                                </td>
                                <td>
                                    <!--<input type="text" name="filter[cf_1742]"
                                           value="<?php /*if(isset($_POST['filter']['cf_1742'])) echo $_POST['filter']['cf_1742']; */?>" >-->
                                    <select name="filter[cf_1742]" id="">
                                        <option value=""></option>
                                        <option value="<?php if(isset($_POST['filter']['cf_1742'])) echo 'دارد'; ?>">دارد</option>
                                        <option value="<?php if(isset($_POST['filter']['cf_1742'])) echo 'ندارد'; ?>">ندارد</option>

                                    </select>
                                </td>

                            </tr>
                            <?php $count=1;
                            while($as=mysqli_fetch_array($mosavabat_sesstion)){
                                $sdate = preg_split("/\-/",$as['cf_1766']);
                                ?>

                                <tr>
                                    <td><?php echo  $count; ?></td>
                                    <td class="text-right"><?php echo $as['approvals_tks_approvaltitle']; ?></td>
                                    <td class="text-justify"><?php echo $as['cf_1728']; ?></td>
                                    <td class="text-justify"><?php echo $as['cf_1734']; ?></td>
                                    <td><?php echo gregorian_to_jalali($sdate[0],$sdate[1],$sdate[2]); ?></td>
                                    <td class="text-right"><?php echo str_replace("|##|", "-", $as['cf_1744']); ?></td>
                                    <td class="text-right"><?php echo str_replace("|##|", "-", $as['cf_1746']); ?></td>
                                    <td class="text-right"><?php echo str_replace("|##|", "-", $as['cf_1748']); ?></td>
                                    <td><?php echo $as['cf_1756']; ?></td>
                                    <td><?php echo $as['cf_1738']; ?></td>
                                    <td><?php echo $as['cf_1742']; ?></td>
                                </tr>
                                <?php
                                ++$count;   } ?>
                            </tbody>
                        </table>
                    </div>
                </form>
                <div id="dis-mos" style="float: left;width: 900px;min-height: 400px;background: #6f42c1;position: relative; top: -120px; left: 50px;display: none"></div>
            </div>
        </form>

    </div>
    <div class="display-table-mob">
        <form method="post">
            <div>
                <a class="btnSearch" id="btnSearch" style="color: #fff; ">برای جستجوی سریعتر کلیک کنید </a>
            </div>
            <div id="resultSearch" style="position: relative;top: 2px;left: 0;right: 0;background: #33D456;">
                <span style="font-size: 12px;color: #fff;">تعداد کل مصوبات جلسه: <?php echo $count - 1; ?></span>
            </div>
            <table class="table widefat  table-tender1  table-bordered  table-striped"
                   style="border: 2px solid #218838;margin:5px auto;background: white;">
                <thead>
                <div class="trInputsMob">
                    <div>
                        <input type="text" placeholder="عنوان مصوبه" name="filter[approvals_tks_approvaltitle]"
                               value="<?php if (isset($_POST['filter']['approvals_tks_approvaltitle'])
                                   && !empty($_POST['filter']['approvals_tks_approvaltitle'])) echo $_POST['filter']['approvals_tks_approvaltitle'] ?>">
                    </div>
                    <div>
                        <input type="text" placeholder="متن مصوبه" name="filter[cf_1728]"
                               value="<?php if (isset($_POST['filter']['cf_1728'])
                                   && !empty($_POST['filter']['cf_1728'])) echo $_POST['filter']['cf_1728'] ?>">
                    </div>
                    <div>
                        <input type="text" placeholder=" کمیسیون مربوطه" name="filter[cf_1734]"
                               value="<?php if (isset($_POST['filter']['cf_1734'])
                                   && !empty($_POST['filter']['cf_1734'])) echo $_POST['filter']['cf_1734'] ?>">
                    </div>
                    <div>
                        <input type="text" placeholder="افراد موافق " name="filter[cf_1744]"
                               value="<?php if (isset($_POST['filter']['cf_1744'])
                                   && !empty($_POST['filter']['cf_1744'])) echo $_POST['filter']['cf_1744'] ?>">
                    </div>
                    <div>
                        <input type="text" placeholder="افراد مخالف" name="filter[cf_1746]"
                               value="<?php if (isset($_POST['filter']['cf_1746'])
                                   && !empty($_POST['filter']['cf_1746'])) echo $_POST['filter']['cf_1746'] ?>">
                    </div>
                    <div>
                        <input type="text" placeholder="افراد ممتنع"
                               name="filter[cf_1748]"
                               value="<?php if (isset($_POST['filter']['cf_1748'])
                                   && !empty($_POST['filter']['cf_1748'])) echo $_POST['filter']['cf_1748'] ?>">
                    </div>
                    <div>
                        <select name="filter[cf_1756]">
                            <option value="">وضعیت مصوبه...</option>
                            <?php
                            foreach ($approvalsList_cf_1756  as $contractor): ?>
                                <option value="<?php echo $contractor['cf_1756']; ?>"
                                    <?php if (isset($_POST['filter']['cf_1756']) && $_POST['filter']['cf_1756'] == $contractor['cf_1756']) echo 'selected'; ?>
                                ><?php echo $contractor['cf_1756']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-info btnSend_Serach" id="btnSend" value="جستجو">
                    </div>
                </div>
                </thead>
                <?php
                if ($mosavabat_sesstion){
                $count = 1;
                foreach ($mosavabat_sesstion as $contract):
                if ($count==10 && $number_id==115 || $count==1 && $number_id==122 ){$count=1;  /*addddd*/
                /*$sdate = preg_split("/\-/", $contract['mediumcontract_tks_startdate']);
                $fdate = preg_split("/\-/", $contract['mediumcontract_tks_enddate']);*/
                ?>
                <tbody>
                <tr>
                    <td COLSPAN="2" style="font-weight: bold;background: #218838;color: #fff;" class="header-table">
                        مصوبه شماره <?php echo $count; ?></td>
                </tr>
                <tr>
                    <th>عنوان مصوبه</th>
                    <td><?php echo $contract['approvals_tks_approvaltitle']; ?></td>
                </tr>
                <tr>
                    <th>متن مصوبه</th>
                    <td style="text-align: justify"><?php echo $contract['cf_1728']; ?></td>
                </tr>
                <tr>
                    <th>کمیسیون مربوطه</th>
                    <td><?php echo $contract['cf_1734']; ?></td>
                </tr>
                <!--<tr>
                <th>تاریخ جلسه</th>
                <td><?php /*echo $contract['cf_1766']; */?></td>
            </tr> -->
                <tr>
                    <th> افراد موافق</th>
                    <td><?php echo str_replace("|##|", "-", $contract['cf_1744']); ?></td>
                </tr>
                <tr>
                    <th>افراد مخالف</th>
                    <td><?php echo str_replace("|##|", "-", $contract['cf_1746']); ?></td>
                </tr>
                <tr>
                    <th>افراد ممتنع</th>
                    <td><?php echo str_replace("|##|", "-", $contract['cf_1748']); ?></td>
                </tr>
                <tr>
                    <th>وضعیت مصوبه</th>
                    <td><?php echo $contract['cf_1756']; ?></td>
                </tr>
                <tr>
                    <th>وضعیت تصویب</th>
                    <td><?php echo $contract['cf_1738']; ?></td>
                </tr>
                <tr>
                    <th>نیاز به مصوبه</th>
                    <td><?php echo $contract['cf_1742']; ?></td>
                </tr>
                <?php }
                $count++;
                endforeach;
                } else {
                    echo '<tr><td colspan="6">اطلاعاتی برای نمایش وجود ندارد.</td></tr>';
                } ?>
                </tbody>
            </table>
        </form>
    </div>
</div>
    <?php include_once "../views/footer.php"; ?>
