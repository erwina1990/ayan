<?php include_once "header.php";
if (isset($_GET['txt']))
    $_POST['filter']['commission_tks_title'] = $_GET['txt'];

if (isset($_POST['filter']))
    $baazaarches = get_baazaarche($_POST['filter']);
else
    $baazaarches = get_baazaarche();

if (isset($_GET['id']))
    $baazaarches = getBaazaarcheById($_GET['id']);

$BaazaarcheList = getBaazaarcheList();
$StructuresBa = StructuresBaazaarche();
$GuildBaazaarche = GuildBaazaarche();

?>


<script>
    $(document).ready(function () {
        $("#btnSearch").click(function () {
            $(".trInputsMob").toggle(800);
        });
    })
</script>
<ul class="SiteMap">
    <li><a href="<?php echo URLhome ?>">صفحه اول</a></li>
    <i class="mdi mdi-chevron-left"></i>
    <li>کانکس ها و بازارچه ها</li>
</ul>
<div class="BoxBody text-center">
    <div >
        <form method="post">
            <div class="table-responsive display-table-pc" style="max-height: 700px" align="center">
                <table class="table widefat table-gharardad-kalan table-bordered table-hover " dir="rtl" cellspacing="0"
                       cellpadding="0" border="1">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام و آدرس استقرار کانکس</th>
                        <th>شماره پلاک</th>
                        <th>منطقه</th>
                        <th>سازه</th>
                        <th>صنف</th>
                        <th>وضعیت قرارداد</th>
                        <th>نام و نام خانوادگی بهره بردار</th>
                        <th>حق بهره بردارای(ماهانه)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="trInputs">
                        <td>
                            <input type="submit" class="btn btn-info"
                                   style="height: 30px;padding-top: 3px;font-size: 13px;" value="جستجو">
                        </td>
                        <td>
                            <input type="text" name="filter[markets_tks_markettitle]"
                                   value="<?php if (isset($_POST['filter']['markets_tks_markettitle'])
                                       && !empty($_POST['filter']['markets_tks_markettitle'])) echo $_POST['filter']['markets_tks_markettitle'] ?>">
                        </td>
                        <td>
                            <input type="text" name="filter[booth_tks_plaquenumber]"
                                   value="<?php if (isset($_POST['filter']['booth_tks_plaquenumber'])
                                       && !empty($_POST['filter']['booth_tks_plaquenumber'])) echo $_POST['filter']['booth_tks_plaquenumber'] ?>">
                        </td>
                        <td>
                            <input type="text" name="filter[cf_1654]"
                                   value="<?php if (isset($_POST['filter']['cf_1654'])
                                       && !empty($_POST['filter']['cf_1654'])) echo $_POST['filter']['cf_1654'] ?>">
                        </td>
                        <td>
                            <select name="filter[cf_1652]">
                                <option value="0">انتخاب کنید...</option>
                                <?php foreach ($StructuresBa as $Structure): ?>
                                    <option value="<?php echo $Structure['cf_1652']; ?>" <?php if (isset($_POST['filter']['cf_1652']) && $_POST['filter']['cf_1652'] == $Structure['cf_1652']) echo 'selected'; ?>>
                                        <?php echo $Structure['cf_1652']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <select name="filter[cf_1672]">
                                <option value="0">انتخاب کنید...</option>
                                <?php foreach ($GuildBaazaarche as $Guild): ?>
                                    <option value="<?php echo $Guild['cf_1672']; ?>" <?php if (isset($_POST['filter']['cf_1672']) && $_POST['filter']['cf_1672'] == $Guild['cf_1672']) echo 'selected'; ?>>
                                        <?php echo $Guild['cf_1672']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <select name="filter[cf_1674]">
                                <option value="0">انتخاب کنید...</option>
                                <?php foreach ($BaazaarcheList as $Baazaar): ?>
                                    <option value="<?php echo $Baazaar['cf_1674']; ?>" <?php if (isset($_POST['filter']['cf_1674']) && $_POST['filter']['cf_1674'] == $Baazaar['cf_1674']) echo 'selected'; ?>>
                                        <?php echo $Baazaar['cf_1674']; ?>
                                    </option>
                                <?php endforeach;
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="filter[cf_1915]"
                                   value="<?php if (isset($_POST['filter']['cf_1915'])
                                       && !empty($_POST['filter']['cf_1915'])) echo $_POST['filter']['cf_1915'] ?>">
                        </td>
                        <td>
                            <input type="text" name="filter['cf_1913']"
                                   value="<?php if (isset($_POST['cf_1913'])
                                       && !empty($_POST['cf_1913'])) echo $_POST['filter']['cf_1913'] ?>">
                        </td>
                    </tr>
                    <?php
                    if ($baazaarches) {
                        $count = 1;
                        foreach ($baazaarches as $baazaarche):
                            if ($baazaarche['modifiedtime'] > $up) $up = $baazaarche['modifiedtime']; //Getting the latest update
                            ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $baazaarche['markets_tks_markettitle']; ?></td>
                                <td><?php echo $baazaarche['booth_tks_plaquenumber'] ?></td>
                                <td><?php echo $baazaarche['cf_1654']; ?></td>
                                <td> <?php echo $baazaarche['cf_1652']; ?></td>
                                <td> <?php echo $baazaarche['cf_1672']; ?></td><!-- صنف -->
                                <td> <?php echo $baazaarche['cf_1674']; ?></td><!-- وضعیت قرارداد -->
                                <td> <?php echo $baazaarche['cf_1915']; ?></td><!-- نام -->
                                <td><?php echo number_format($baazaarche['cf_1913']); ?></td><!-- حق بهره برداری -->
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
    <div style="" class="display-table-mob">
        <form method="post">
            <div>
                <a class="btnSearch" id="btnSearch" style="color: #fff; ">برای جستجوی سریعتر کلیک کنید </a>
            </div>
            <div id="resultSearch" style="position: relative;top: 2px;left: 0;right: 0;background: #33D456;">
                <span style="font-size: 12px;color: #fff;">تعداد بازارچه و کانکس: <?php echo $count - 1; ?></span>
            </div>
            <table class="table widefat  table-tender1  table-bordered  table-striped"
                   style="border: 2px solid #218838;margin:5px auto;background: white;">
                <thead>
                <div class="trInputsMob">
                    <div>
                        <input type="text" placeholder="نام و آدرس کانکس" name="filter[markets_tks_markettitle]"
                               value="<?php if (isset($_POST['filter']['markets_tks_markettitle'])
                                   && !empty($_POST['filter']['markets_tks_markettitle'])) echo $_POST['filter']['markets_tks_markettitle'] ?>">
                    </div>
                    <div>
                        <input type="text" placeholder="شماره پلاک" name="filter[booth_tks_plaquenumber]"
                               value="<?php if (isset($_POST['filter']['booth_tks_plaquenumber'])
                                   && !empty($_POST['filter']['booth_tks_plaquenumber'])) echo $_POST['filter']['booth_tks_plaquenumber'] ?>">
                    </div>
                    <div>
                        <input type="text" placeholder=" منطقه" name="filter[cf_1654]"
                               value="<?php if (isset($_POST['filter']['cf_1654'])
                                   && !empty($_POST['filter']['cf_1654'])) echo $_POST['filter']['cf_1654'] ?>">
                    </div>
                    <div>
                        <select name="filter[cf_1652]">
                            <option value="0">نوع سازه انتخاب کنید</option>
                            <?php foreach ($StructuresBa as $Structure): ?>
                                <option value="<?php echo $Structure['cf_1652']; ?>" <?php if (isset($_POST['filter']['cf_1652']) && $_POST['filter']['cf_1652'] == $Structure['cf_1652']) echo 'selected'; ?>>
                                    <?php echo $Structure['cf_1652']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <select name="filter[cf_1672]">
                            <option value="0">نوع صنف</option>
                            <?php foreach ($GuildBaazaarche as $Guild): ?>
                                <option value="<?php echo $Guild['cf_1672']; ?>" <?php if (isset($_POST['filter']['cf_1672']) && $_POST['filter']['cf_1672'] == $Guild['cf_1672']) echo 'selected'; ?>>
                                    <?php echo $Guild['cf_1672']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <select name="filter[cf_1674]">
                            <option value="0"> وضعیت قرارداد</option>
                            <?php foreach ($BaazaarcheList as $Baazaar): ?>
                                <option value="<?php echo $Baazaar['cf_1674']; ?>" <?php if (isset($_POST['filter']['cf_1674']) && $_POST['filter']['cf_1674'] == $Baazaar['cf_1674']) echo 'selected'; ?>>
                                    <?php echo $Baazaar['cf_1674']; ?>
                                </option>
                            <?php endforeach;
                            ?>
                        </select>
                    </div>
                    <div>
                        <input type="text" placeholder="نام و نام خانوادگی بهره بردار" name="filter[cf_1915]"
                               value="<?php if (isset($_POST['filter']['cf_1915'])
                                   && !empty($_POST['filter']['cf_1915'])) echo $_POST['filter']['cf_1915'] ?>">
                    </div>
                    <div>
                        <input type="text" placeholder=" حق بهره بردارای(ماهانه)(ریال)" name="filter[cf_1913]"
                               value="<?php if (isset($_POST['filter']['cf_1913'])
                                   && !empty($_POST['filter']['cf_1913'])) echo $_POST['filter']['cf_1913'] ?>">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-info btnSend_Serach" id="btnSend" value="جستجو">
                    </div>
                </div>
                </thead>
                <?php
                if ($baazaarches){
                $count = 1;
                foreach ($baazaarches

                as $baazaarche): ?>
                <tbody>
                <tr>
                    <td COLSPAN="2" style="font-weight: bold;background: #218838;color: #fff" class="header-table">کانکس
                        و بازارچه <?php echo $count; ?></td>
                </tr>
                <tr>
                    <th>نام و آدرس استقرار کانکس</th>
                    <td><?php echo $baazaarche['markets_tks_markettitle']; ?></td>
                </tr>
                <tr>
                    <th> شماره پلاک</th>
                    <td><?php echo $baazaarche['booth_tks_plaquenumber']; ?></td>
                </tr>
                <tr>
                    <th> منطقه</th>
                    <td><?php echo $baazaarche['cf_1654']; ?></td>
                </tr>
                <tr>
                    <th>سازه</th>
                    <td><?php echo $baazaarche['cf_1652']; ?></td>
                </tr>
                <tr>
                    <th> صنف</th>
                    <td><?php echo $baazaarche['cf_1672']; ?></td>
                </tr>
                <tr>
                    <th>وضعیت قرارداد</th>
                    <td><?php echo $baazaarche['cf_1674']; ?></td>
                </tr>
                <tr>
                    <th>نام و نام خانوادگی بهره بردار</th>
                    <td><?php echo $baazaarche['cf_1915']; ?></td>
                </tr>
                <tr>
                    <th>حق بهره بردارای(ماهانه)(ریال)</th>
                    <td><?php echo number_format($baazaarche['cf_1913']); ?></td>
                </tr>
                <?php
                $count++;
                endforeach;

                } else {
                    echo '<tr><td colspan="6">اطلاعاتی برای نمایش وجود ندارد.</td></tr>';
                } ?>
                <div id="resultSearch" style="display: none">
                    <span style="font-size: 12px">جستجو انجام شد. تعداد جستجو: <?php echo $count - 1; ?></span>
                </div>
                </tbody>
            </table>
        </form>
    </div>
</div>
<?php

include_once "footer.php";
last_update($up);


?>

