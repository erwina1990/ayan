<?php
include_once "header.php";

if (isset($_GET['txt']))
    $_POST['filter']['cf_1572'] = $_GET['txt'];

if (isset($_POST['filter']))
    $management = get_management($_POST['filter']);
else
    $management = get_management();


?>

    <ul class="SiteMap">
        <li><a href="<?php echo URLhome ?>">صفحه اول</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li>اطلاعات مدیران</li>
    </ul>
    <div class="BoxBody text-center" style="width: 100%;">
        <div style="padding: 0 8px;">
            <form method="post">
                <div class="table-responsive display-table-pc">
                    <table class="table widefat table-tender table-bordered table-hover table-striped" style="width: 99%">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام و نام خانوادگی</th>
                            <th>عنوان سمت</th>
                            <th>مدرک تحصیلی</th>
                            <th>دانشگاه محل تحصیل</th>
                            <th>حکم کارگزینی مدیران</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="trInputs">
                            <td>
                                <input type="submit" value="جستجو" class="btn btn-info"
                                       style="height: 30px;padding-top: 3px;font-size: 13px;">
                            </td>
                            <td>
                                <input type="text" name="filter[managers_tks_name]"
                                       value="<?php if (isset($_POST['filter']['managers_tks_name'])) echo $_POST['filter']['managers_tks_name']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1786]"
                                       value="<?php if (isset($_POST['filter']['cf_1786'])) echo $_POST['filter']['cf_1786']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1788]"
                                       value="<?php if (isset($_POST['filter']['cf_1788'])) echo $_POST['filter']['cf_1788']; ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[cf_1790]"
                                       value="<?php if (isset($_POST['filter']['cf_1790'])) echo $_POST['filter']['cf_1790']; ?>">
                            </td>
                            <td></td>
                        </tr>
                        <?php
                        if ($management) {
                            $count = 1;
                            foreach ($management as $manag):
                                if ($manag['modifiedtime'] > $up) $up = $manag['modifiedtime']; //Getting the latest update
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td class="text-right"><?php echo $manag['managers_tks_name']; ?> </td>
                                    <td class="text-right"><?php echo $manag['cf_1786']; ?></td>
                                    <td class="text-right"><?php echo $manag['cf_1788']; ?></td>
                                    <td class="text-right"><?php echo $manag['cf_1790']; ?></td>
                                    <td><a href="../pdf/manager/<?php echo $manag['managers_tks_name']; ?>.pdf">مشاهده
                                            حکم..</a></td>
                                </tr>
                                <?php
                                $count++;
                            endforeach;
                        } else {
                            echo '<tr><td colspan="6">اطلاعاتی برای نمایش وجود ندارد.</td></tr>';
                        }
                        ?>
                        <!--<script>
                            function myfun3() {
                                var txt= document.getElementById('mangager-shahrdari');
                                if (confirm("آیا میخواهید دانلود کنید؟")) {
    alert(txt);
                                }else{

                                    }

                            }
                        </script>-->
                        </tbody>
                    </table>
                </div>

                <div class="display-table-mob">

                    <div >
                        <a class="btnSearch" id="btnSearch" style="color: #fff; ">برای جستجوی سریعتر کلیک کنید  </a>
                    </div>
                    <div id="resultSearch" style="position: relative;top: 2px;left: 0;right: 0;background: #33D456;">
                        <span style="font-size: 12px;color: #fff;">تعداد کل مدیران: <?php echo $count - 1; ?></span>
                    </div>
                    <table class="table widefat  table-tender1  table-bordered  table-striped"
                           style="border: 2px solid #218838;margin:5px auto;background: white;">
                        <thead>
                        <div class="trInputsMob">
                            <div>
                                <input type="text" placeholder="نام مدیر" name="filter[managers_tks_name]"
                                       value="<?php if (isset($_POST['filter']['managers_tks_name'])
                                           && !empty($_POST['filter']['managers_tks_name'])) echo $_POST['filter']['managers_tks_name'] ?>">
                            </div>
                            <div>
                                <input type="text" placeholder="سمت" name="filter[cf_1786]"
                                       value="<?php if (isset($_POST['filter']['cf_1786'])
                                           && !empty($_POST['filter']['cf_1786'])) echo $_POST['filter']['cf_1786'] ?>">
                            </div>
                            <div>
                                <input type="text" placeholder="مدرک تحصیلی" name="filter[cf_1788]"
                                       value="<?php if (isset($_POST['filter']['cf_1788'])
                                           && !empty($_POST['filter']['cf_1788'])) echo $_POST['filter']['cf_1788'] ?>">
                            </div>
                            <div>
                                <input type="text" placeholder="دانشگاه محل تحصیل " name="filter[cf_1790]"
                                       value="<?php if (isset($_POST['filter']['cf_1790'])
                                           && !empty($_POST['filter']['cf_1790'])) echo $_POST['filter']['cf_1790'] ?>">
                            </div>
                            <div>
                                <input type="submit" class="btn btn-info btnSend_Serach" id="btnSend" value="جستجو">
                            </div>
                        </div>
                        </thead>
                        <?php
                        if ($management){
                        $count = 1;
                        foreach ($management

                        as $manag):
                        ?>
                        <tbody>
                        <tr>
                            <td COLSPAN="2" style="font-weight: bold;background: #218838;color: #fff;"
                                class="header-table">مدیر محترم شماره <?php echo $count; ?></td>
                        </tr>
                        <tr>
                            <th>نام مدیر</th>
                            <td><?php echo $manag['managers_tks_name']; ?> </td>
                        </tr>
                        <tr>
                            <th>سمت</th>
                            <td><?php echo $manag['cf_1786']; ?></td>
                        </tr>
                        <tr>
                            <th>مدرک تحصیلی</th>
                            <td><?php echo $manag['cf_1788'] ?></td>
                        </tr>
                        <tr>
                            <th>دانشگاه محل تحصیل</th>
                            <td><?php echo $manag['cf_1790']; ?></td>
                        </tr>
                        <tr>
                            <th>مشاهده حکم کارگزینی</th>
                            <td><a href="../pdf/manager/<?php echo $manag['managers_tks_name']; ?>.pdf">مشاهده حکم..</a>
                            </td>
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
    </div>
<?php include_once "footer.php";
last_update($up);
