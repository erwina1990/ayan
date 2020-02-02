<?php
include_once("../includes/functions.php");
include_once("../includes/date.php");
include_once "header.php";
if(isset($_GET['txt']))
    $_POST['filter']['hugecontract_tks_contractsubje'] = $_GET['txt'];
if (isset($_POST['filter']))
    $contracts = getHugeContract($_POST['filter']);
else
    $contracts = getHugeContract();
if(isset($_GET['id'])){
    $contracts = getHugeContractById($_GET['id']);
}


$contractorList = getContractorList();
?>
    <ul class="SiteMap">
        <li><a href="<?php echo URLhome ?>">صفحه اول</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li>قراردادهای کلان</li>
    </ul>
    <div class="BoxBody text-center" style="width: 100%;">
        <div class="" style="padding: 0 8px;">
            <form method="post">
                <div align="center" class="table-responsive display-table-pc" style="max-height: 700px">
                    <table class="table widefat table-gharardad-kalan table-bordered table-hover " dir="rtl" border="1"
                           cellspacing="0" cellpadding="0">
                        <thead>
                        <tr>
                            <th>ردیف </th>
                            <th class="hide-sm-table"> شماره قرارداد </th>
                            <th class="hide-sm-table"> تاریخ شروع</th>
                            <th> تاریخ پایان</th>
                            <th>موضوع قرارداد </th>
                            <th>پیمانکار </th>
                            <th>مبلغ قرارداد(میلیون ریال)</th>
                            <th class="hide-sm-table">مدت به ماه </th>
                            <th>نحوه انتخاب پیمانکار </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="trInputs">
                            <td>
                                <input type="submit" class="btn btn-info"
                                       style="height: 30px;padding-top: 3px;font-size: 13px;" value="جستجو">
                            </td>
                            <td class="hide-sm-table">
                                <input type="text" name="filter[mediumcontract_tks_mediumcontr]"
                                       value="<?php if(isset($_POST['filter']['mediumcontract_tks_mediumcontr'])
                                           && !empty($_POST['filter']['mediumcontract_tks_mediumcontr'])) echo $_POST['filter']['mediumcontract_tks_mediumcontr']?>">
                            </td>
                            <td class="hide-sm-table">
                                <input type="text" name="filter[mediumcontract_tks_startdate]"
                                       value="<?php if(isset($_POST['filter']['mediumcontract_tks_startdate'])
                                           && !empty($_POST['filter']['mediumcontract_tks_startdate'])) echo $_POST['filter']['mediumcontract_tks_startdate']?>">
                            </td>
                            <td>
                                <input type="text" name="filter[mediumcontract_tks_enddate]"
                                       value="<?php if(isset($_POST['filter']['mediumcontract_tks_enddate'])
                                           && !empty($_POST['filter']['mediumcontract_tks_enddate'])) echo $_POST['filter']['mediumcontract_tks_enddate']?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1410]" value="<?php if(isset($_POST['filter']['cf_1410'])
                                    && !empty($_POST['filter']['cf_1410'])) echo $_POST['filter']['cf_1410']?>">
                            </td>
                            <td>
                                <input type="text" name="filter[mediumcontract_tks_contractor]"
                                       value="<?php if(isset($_POST['filter']['mediumcontract_tks_contractor'])
                                           && !empty($_POST['filter']['mediumcontract_tks_contractor'])) echo $_POST['filter']['mediumcontract_tks_contractor']?>">
                            </td>
                            <td>
                                <input type="text" name="filter[mediumcontract_tks_amountcontr]"
                                       value="<?php if(isset($_POST['filter']['mediumcontract_tks_amountcontr'])
                                           && !empty($_POST['filter']['mediumcontract_tks_amountcontr'])) echo $_POST['filter']['mediumcontract_tks_amountcontr']?>">
                            </td>
                            <td class="hide-sm-table">
                                <input type="text" name="filter[mediumcontract_tks_durationtom]"
                                       value="<?php if(isset($_POST['filter']['mediumcontract_tks_durationtom'])
                                           && !empty($_POST['filter']['mediumcontract_tks_durationtom'])) echo $_POST['filter']['mediumcontract_tks_durationtom']?>">
                            </td>
                            <td>
                                <select name="filter[cf_1412]">
                                    <option value="">...</option>
                                    <?php
                                    foreach($contractorList as $contractor):?>
                                        <option value="<?php echo $contractor['cf_1412'];?>"
                                            <?php if(isset($_POST['filter']['cf_1412']) && $_POST['filter']['cf_1412'] == $contractor['cf_1412']) echo 'selected';?>>
                                            <?php echo $contractor['cf_1412'];?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <?php
                        if ($contracts){
                            $count = 1;
                            foreach( $contracts as $contract):
                                if ($contract['modifiedtime'] > $up)  $up = $contract['modifiedtime'];
                                $sdate = preg_split ("/\-/", $contract['mediumcontract_tks_startdate']);
                                $fdate = preg_split ("/\-/", $contract['mediumcontract_tks_enddate']);
                                ?>
                                <tr>
                                    <td><?php echo $count;?></td>
                                    <td class="hide-sm-table"><?php echo $contract['mediumcontract_tks_mediumcontr'];?></td>
                                    <td class="hide-sm-table"><?php echo gregorian_to_jalali($sdate[0],$sdate[1],$sdate[2]);?>
                                    </td>
                                    <td><?php echo gregorian_to_jalali($fdate[0],$fdate[1],$fdate[2]);?></td>
                                    <td><?php echo $contract['cf_1410'];?></td>
                                    <td><?php echo $contract['mediumcontract_tks_contractor'];?></td>

                                    <td><?php echo number_format($contract['mediumcontract_tks_amountcontr']/1000000); ?> میلیون
                                        ریال</td>
                                    <td class="hide-sm-table"><?php echo $contract['mediumcontract_tks_durationtom']; ?></td>
                                    <td><?php echo $contract['cf_1412'] ; ?></td>
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
                <div>
                    <a class="btnSearch" id="btnSearch" style="color: #fff; ">برای جستجوی سریعتر کلیک کنید </a>
                </div>
                <div id="resultSearch" style="position: relative;top: 2px;left: 0;right: 0;background: #33D456;">
                    <span style="font-size: 12px;color: #fff;">تعداد کل قراردادهای کلان: <?php echo $count-1 ; ?></span>
                </div>
                <table class="table widefat  table-tender1  table-bordered  table-striped"
                       style="border: 2px solid #218838;margin:5px auto;background: white;">
                    <thead>
                    <div class="trInputsMob">
                        <div>
                            <input type="text" placeholder="شماره قرارداد" name="filter[mediumcontract_tks_mediumcontr]"
                                   value="<?php if(isset($_POST['filter']['mediumcontract_tks_mediumcontr'])
                                       && !empty($_POST['filter']['mediumcontract_tks_mediumcontr'])) echo $_POST['filter']['mediumcontract_tks_mediumcontr']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="تاریخ شروع" name="filter[mediumcontract_tks_startdate]"
                                   value="<?php if(isset($_POST['filter']['mediumcontract_tks_startdate'])
                                       && !empty($_POST['filter']['mediumcontract_tks_startdate'])) echo $_POST['filter']['mediumcontract_tks_startdate']?>">
                        </div>
                        <div>
                            <input type="text" placeholder=" تاریخ پایان" name="filter[mediumcontract_tks_enddate]"
                                   value="<?php if(isset($_POST['filter']['mediumcontract_tks_enddate'])
                                       && !empty($_POST['filter']['mediumcontract_tks_enddate'])) echo $_POST['filter']['mediumcontract_tks_enddate']?>">
                        </div>
                        <div>
                            <input type="text" placeholder=" موضوع قرارداد " name="filter[cf_1410]" value="<?php if(isset($_POST['filter']['cf_1410'])
                                && !empty($_POST['filter']['cf_1410'])) echo $_POST['filter']['cf_1410']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="پیمانکار" name="filter[mediumcontract_tks_contractor]"
                                   value="<?php if(isset($_POST['filter']['mediumcontract_tks_contractor'])
                                       && !empty($_POST['filter']['mediumcontract_tks_contractor'])) echo $_POST['filter']['mediumcontract_tks_contractor']?>">
                        </div>
                        <div>
                            <input type="text" placeholder="مبلغ قرارداد(میلیون ریال)"
                                   name="filter[mediumcontract_tks_amountcontr]"
                                   value="<?php if(isset($_POST['filter']['mediumcontract_tks_amountcontr'])
                                       && !empty($_POST['filter']['mediumcontract_tks_amountcontr'])) echo $_POST['filter']['mediumcontract_tks_amountcontr']?>">
                        </div>
                        <div>
                            <input type="text" placeholder=" مدت به ماه" name="filter[mediumcontract_tks_durationtom]"
                                   value="<?php if(isset($_POST['filter']['mediumcontract_tks_durationtom'])
                                       && !empty($_POST['filter']['mediumcontract_tks_durationtom'])) echo $_POST['filter']['mediumcontract_tks_durationtom']?>">
                        </div>
                        <div>
                            <select name="filter[cf_1412]">
                                <option value="">انتخاب کنید...</option>
                                <?php
                                foreach($contractorList as $contractor): ?>
                                    <option value="<?php echo $contractor['cf_1412'];?>"
                                        <?php if(isset($_POST['filter']['cf_1412']) && $_POST['filter']['cf_1412'] == $contractor['cf_1412']) echo 'selected';?>>
                                        <?php echo $contractor['cf_1412'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-info btnSend_Serach" id="btnSend" value="جستجو">
                        </div>
                    </div>
                    </thead>
                    <?php
                    if ($contracts){
                    $count = 1;
                    foreach( $contracts as $contract):
                    $sdate = preg_split ("/\-/", $contract['mediumcontract_tks_startdate']);
                    $fdate = preg_split ("/\-/", $contract['mediumcontract_tks_enddate']);          ?>

                    <tbody>
                    <tr>
                        <td COLSPAN="2" style="font-weight: bold;background: #218838;color: #fff;" class="header-table">
                            قرارداد شماره <?php echo $count ; ?></td>
                    </tr>
                    <tr>
                        <th>شماره قرارداد</th>
                        <td><?php echo $contract['mediumcontract_tks_mediumcontr'];?></td>
                    </tr>
                    <tr>
                        <th>تاریخ شروع</th>
                        <td><?php echo gregorian_to_jalali($sdate[0],$sdate[1],$sdate[2]);?></td>
                    </tr>
                    <tr>
                        <th> تاریخ پایان</th>
                        <td><?php echo gregorian_to_jalali($fdate[0],$fdate[1],$fdate[2]);?></td>
                    </tr>
                    <tr>
                        <th>موضوع قرارداد</th>
                        <td><?php echo $contract['cf_1410'];?></td>
                    </tr>
                    <tr>
                        <th>پیمانکار</th>
                        <td><?php echo $contract['mediumcontract_tks_contractor'];?></td>
                    </tr>
                    <tr>
                        <th>مبلغ قرارداد(میلیون ریال)</th>
                        <td><?php echo number_format($contract['mediumcontract_tks_amountcontr']/1000000); ?> میلیون
                            ریال</td>
                    </tr>
                    <tr>
                        <th>مدت به ماه </th>
                        <td><?php echo $contract['mediumcontract_tks_durationtom']; ?></td>
                    </tr>
                    <tr>
                        <th>نحوه انتخاب پیمانکار </th>
                        <td><?php echo $contract['cf_1412'] ; ?></td>
                    </tr>
                    <?php
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
<?php
include_once "footer.php";
last_update($up);
