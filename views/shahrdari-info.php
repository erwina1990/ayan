<?php
$url = 'http://10.45.49.62/modules/CustomerPortal/api.php';
$name = trim($_POST['filter']['FirstName']);
$family = trim($_POST['filter']['LastName']);
$father = trim($_POST['filter']['FatherName']);
$worklocation = trim($_POST['filter']['worklocation']);
$emptype = trim($_POST['filter']['emptype']);


    $number=120;

$data = array('_operation' => 'Employee', 'name' => $name, 'family' => $family, 'father' => $father, 'worklocation' => $worklocation, 'emptype' => $emptype);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);

$context = stream_context_create($options);


$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */
}

$list_shahrdari = json_decode($result, JSON_UNESCAPED_UNICODE);
/*$size_array = sizeof($list_shahrdari["result"]);*/

/*var_dump($list_shahrdari ["result"][0]);*/
/*for ($i=0;$i<$size_array;++$i){
    echo $i.':'.$list_shahrdari["result"][$i] ["FirstName"];
    echo '<br>';

      }*/


include_once("../includes/functions.php");
include_once("../includes/date.php");
include_once "header.php";

if (isset($_GET['txt']))
    $_POST['filter']['hugecontract_tks_contractsubje'] = $_GET['txt'];

?>


    <ul class="SiteMap">
        <li><a href="/">صفحه اول</a></li>
        <i class="mdi mdi-chevron-left"></i>
        <li>لیست کارکنان شهرداری</li>
    </ul>
    <div class="BoxBody text-center" style="width: 100%;">
        <div class="" style="padding: 0 8px;">


            <form method="post">
                <div align="center" class="table-responsive display-table-pc">
                    <table class="table widefat table-gharardad-kalan table-bordered table-hover " dir="rtl" border="1"
                           cellspacing="0" cellpadding="0">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th> نام</th>
                            <th> نام خانوادگی</th>
                            <th> نام پدر</th>
                            <th>محل خدمت</th>
                            <th>نوع قرارداد</th>
                            <th>تاریخ استخدام</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr class="trInputs">
                            <td>
                                <input type="submit" class="btn btn-info"
                                       style="height: 30px;padding-top: 3px;font-size: 13px;" value="جستجو">
                            </td>
                            <td class="">
                                <input type="text" id="search" name="filter[FirstName]"
                                       value="<?php if (isset($_POST['filter']['FirstName'])
                                           && !empty($_POST['filter']['FirstName'])) echo $_POST['filter']['FirstName'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[LastName]"
                                       value="<?php if (isset($_POST['filter']['LastName'])
                                           && !empty($_POST['filter']['LastName'])) echo $_POST['filter']['LastName'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[FatherName]"
                                       value="<?php if (isset($_POST['filter']['FatherName'])
                                           && !empty($_POST['filter']['FatherName'])) echo $_POST['filter']['FatherName'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[worklocation]"
                                       value="<?php if (isset($_POST['filter']['worklocation'])
                                           && !empty($_POST['filter']['worklocation'])) echo $_POST['filter']['worklocation'] ?>">
                            </td>
                            <td>
                                <input type="text" name="filter[emptype]"
                                       value="<?php if (isset($_POST['filter']['emptype'])
                                           && !empty($_POST['filter']['emptype'])) echo $_POST['filter']['emptype'] ?>">
                            </td>
                            <td>
                                <input disabled type="text" name="filter[EmploymentDate]"
                                       value="<?php if (isset($_POST['filter']['EmploymentDate'])
                                           && !empty($_POST['filter']['EmploymentDate'])) echo $_POST['filter']['EmploymentDate'] ?>">
                            </td>
                        </tr>
                        <?php
                        if ($list_shahrdari["result"]) {
                            $count = 1;
                            foreach ($list_shahrdari["result"] as $list):
                                /*if ($list['modifiedtime'] > $up)  $up = $list['modifiedtime'];*/

                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $list['FirstName']; ?></td>
                                    <td><?php echo $list['LastName']; ?>    </td>
                                    <td><?php echo $list['FatherName']; ?>    </td>
                                    <td><?php echo $list['worklocation']; ?></td>
                                    <td><?php echo $list['emptype']; ?></td>
                                    <td><?php  $sdate = preg_split ("/\-/", $list['EmploymentDate']);
                                        echo gregorian_to_jalali($sdate[0],$sdate[1],$sdate[2]);  ?></td>
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
               <!-- <div class="pagination">
                    <ul class="pagination">
                        <style>
                            .pagin-number input[type='submit']{
                                border: none;
                            }
                        </style>
                        <li class="pagin-number ">
                            <a ><input type="submit" value="صفحه قبلی" name="filter[page-number]"> </a>
                        </li>
                        <li class="pagin-number ">
                            <a ><input type="submit" value="صفحه بعد" name="filter[page-number]"></a>
                        </li>



                       <li><a class=""

                               title="پایان">پایان</a></li>
                    </ul>
                </div>-->
            </form>
        </div>

        <div class="display-table-mob">
            <form method="post">
                <div>
                    <a class="btnSearch" id="btnSearch" style="color: #fff; ">برای جستجوی سریعتر کلیک کنید </a>
                </div>
                <div id="resultSearch" style="position: relative;top: 2px;left: 0;right: 0;background: #33D456;">
                    <span style="font-size: 12px;color: #fff;">تعداد کل کارمندان و پرسنل : <?php echo $count - 1; ?></span>
                </div>
                <table class="table widefat  table-tender1  table-bordered  table-striped"
                       style="border: 2px solid #218838;margin:5px auto;background: white;">
                    <thead>
                    <div class="trInputsMob">
                        <div>
                            <input type="text" placeholder="نام " name="filter[FirstName]"
                                   value="<?php if (isset($_POST['filter']['FirstName'])
                                       && !empty($_POST['filter']['FirstName'])) echo $_POST['filter']['FirstName'] ?>">
                        </div>

                        <div>
                            <input type="text" placeholder=" نام خانوادگی " name="filter[LastName]"
                                   value="<?php if (isset($_POST['filter']['LastName'])
                                       && !empty($_POST['filter']['LastName'])) echo $_POST['filter']['LastName'] ?>">
                        </div>
                        <div>
                            <input type="text" placeholder=" نام پدر " name="filter[FatherName]"
                                   value="<?php if (isset($_POST['filter']['FatherName'])
                                       && !empty($_POST['filter']['FatherName'])) echo $_POST['filter']['FatherName'] ?>">
                        </div>
                        <div>
                            <input type="text" placeholder="محل خدمت" name="filter[worklocation]"
                                   value="<?php if (isset($_POST['filter']['worklocation'])
                                       && !empty($_POST['filter']['worklocation'])) echo $_POST['filter']['worklocation'] ?>">
                        </div>

                        <div>
                            <input disabled type="text" placeholder=" نوع استخدام"
                                   name="filter[mediumcontract_tks_durationtom]"
                                   value="<?php if (isset($_POST['filter']['mediumcontract_tks_durationtom'])
                                       && !empty($_POST['filter']['mediumcontract_tks_durationtom'])) echo $_POST['filter']['mediumcontract_tks_durationtom'] ?>">
                        </div>

                        <div>
                            <input type="submit" class="btn btn-info btnSend_Serach" id="btnSend" value="جستجو">
                        </div>
                    </div>
                    </thead>
                    <?php
                    if ($list_shahrdari["result"]){
                    $count = 1;
                    foreach ($list_shahrdari["result"] as $list): ?>

                    <tbody>
                    <tr>
                        <td COLSPAN="2" style="font-weight: bold;background: #218838;color: #fff;" class="header-table">
                            شماره <?php echo $count; ?></td>
                    </tr>
                    <tr>
                        <th>نام</th>
                        <td><?php echo $list['FirstName']; ?></td>
                    </tr>
                    <tr>
                    <tr>
                        <th>نام خانوادگی</th>
                        <td><?php echo $list['LastName']; ?></td>
                    </tr>
                    <tr>
                        <th>نام پدر</th>
                        <td><?php echo $list['FatherName']; ?></td>
                    </tr>
                    <tr>
                        <th>محل خدمت</th>
                        <td><?php echo $list['worklocation']; ?></td>
                    </tr>
                    <tr>
                        <th>نوع استخدام</th>
                        <td><?php echo $list['emptype']; ?></td>
                    </tr>
                    <tr>
                        <th>تاریخ استخدام</th>
                        <td><?php
                            $sdate = preg_split ("/\-/", $list['EmploymentDate']);
                            echo gregorian_to_jalali($sdate[0],$sdate[1],$sdate[2]); ?></td>
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


    <!--<script>
        function showResult(str) {
            if (str.length==0 ) {
                document.getElementById("livesearch").innerHTML="000";
                document.getElementById("livesearch").style.border="0px";
                return;
            }
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else {  // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.getElementById("livesearch").innerHTML=this.responseText;
                    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
                }
            }
            xmlhttp.open("POST","$result?name="+str,true);
            xmlhttp.send();
        }
    </script>-->

<?php
include_once "footer.php";
/*var_dump($list_shahrdari ["result"][0]);*/
/*last_update($up);*/


/*



echo '<br>';
echo($list_shahrdari["result"][0] ["FirstName"]);
echo '<br>';
echo($list_shahrdari ["result"][0] ["LastName"]);
echo '<br>';
echo($list_shahrdari ["result"][0] ["Code"]);
echo '<br>';
echo($list_shahrdari ["result"][0] ["post"]);
echo '<br>';
echo($list_shahrdari ["result"][0] ["emptype"]);
echo '<br>';



echo $res;*/