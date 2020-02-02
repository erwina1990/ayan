<?php
require_once "db.php";
/*$gets_typetree = get_typetree();*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> هر خانه یک درخت </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <link rel="stylesheet" href="css/materialdesignicons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
<style>
    .harkhane{
        max-width: 500px !important;
        width: auto;
        margin: 20px auto;
    }
    .p11{
        font-size: 17px;
    }
    .select11{
        border-radius: 3px;
        border: 1px solid  #ccc;
        width: 150px;
        padding: 3px;
    }
    @media (max-width:540px ) {
        .harkhane{
            margin: 20px;
        }
        input[type="text"], input[type="password"] {
            margin: 1px 0 15px 0;
        }
    }
</style>

</head>
<body dir="rtl">
<?php
if ($message) {
    ?>
    <div class="alert alert-success" style="text-align:center"><?php echo $message ?></div>
    <?php
}
if ($error) {
    ?>
    <div class="alert alert-danger" style="text-align:center"><?php echo $error ?></div>
    <?php
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-group">
    <div class="container harkhane" style="">
        <p class="p11 text-center">ثبت نام طرح هر خانه یک درخت</p>
        <hr>
        <div class="form-group">
            <label for="name"><b>نام</b></label>
            <input type="text" id="name" name="name" class="form-control" pattern="([A-Za-z]|[ا-ی]|\)*"
                   title="نام را به درستی وارد کنید" required/>
            </br>
            <label for="fimily"><b>نام خانوادگی </b></label>
            <input type="text" id="fimily" name="family" class="form-control" pattern="([A-Za-z]|[ا-ی]|\)*"
                   title=" نام خانوادگی را به درستی وارد کنید" required/>
            </br>
            <label for="mobile"><b>شماره همراه </b></label>
            <input name="mobile" type="text" id="mobile" class="form-control" title="شماره همراه را انگلیسی وارد کنید"
                   required pattern="[0-9]{11}"/>
            </br>

            <label for="address"><b>آدرس</b></label>
            <input name="address" type="text" id="address" pattern="([A-Za-z]|[ا-ی]|-|_|[0-9]|\)*"
                   title=" خیابان-کوچه-کدپستی" class="form-control" required/>
            </br>
            <label for="postcode"><b> کد پستی </b></label>
            <input name="postcode" type="text" id="postcode" class="form-control" title="کد پستی را انگلیسی وارد کنید"
                   required pattern="[0-9]{10}"/>

            <!-- <select name="typeoftree" id="typeoftree" class="form-control" required>
                <?php /*while ($typeoftree = mysqli_fetch_array($gets_typetree)) { */?>
                    <option value="<?php /*echo $typeoftree['cf_1851'] */?>"><?php /*echo $typeoftree['cf_1851'] */?></option>
                <?php /*} */?>

            </select>-->
            <span>انتخاب نوع درخت : </span>
            <select class="select11" required name="tree-type">
                <option value="">انتخاب درخت</option>
                <option value="چنار">چنار</option>
                <option value="سرو">سرو</option>
                <option value="اقاقیا">اقاقیا</option>
                <option value="زبان انگشت">زبان انگشت</option>
                <option value="نارون">نارون</option>
                <option value="آلبالو">آلبالو</option>
                <option value="سیب">سیب</option>
                <option value="به">به</option>
                <option value="هلو">هلو</option>
                <option value="زردالو">زردالو</option>
            </select>
            <!--  <label for="quantityC"><b> چنار</b></label>
              <input name="quantityC" type="checkbox" value="quantityC" id="quantityC"/>

              <label for="quantityS"><b> سرو</b></label>
              <input name="quantityS" type="checkbox" value="quantityS" id="quantityS"/>

              <label for="quantityA"><b> اقاقیا</b></label>
              <input name="quantityA" type="checkbox" value="quantityA" id="quantityA"/>

              <label for="quantityZ"><b> زبان انگشت</b></label>
              <input name="quantityZ" type="checkbox" value="quantityZ" id="quantityZ"/>

              <label for="quantityN"><b> نارون</b></label>
              <input name="quantityN" type="checkbox" value="quantityN" id="quantityN"/>
              </br>
              </br>
              </br>
              <label for="quantityAB"><b> آلبالو</b></label>
              <input name="quantityAB" type="checkbox" value="quantityAB" id="quantityAB"/>

              <label for="quantitySi"><b> سیب</b></label>
              <input name="quantitySi" type="checkbox" value="quantitySi" id="quantitySi"/>

              <label for="quantityB"><b> به</b></label>
              <input name="quantityB" type="checkbox" value="quantityB" id="quantityB"/>

              <label for="quantityH"><b> هلو</b></label>
              <input name="quantityH" type="checkbox" value="quantityS" id="quantityH"/>

              <label for="quantityZA"><b> زردآلو</b></label>
              <input name="quantityZA" type="checkbox" value="quantityZA" id="quantityZA"/>
              </br>
              </br>
              </br>-->
            <br>
            <br>
            <input type="submit" value="ثبت نام" name="submit" class="btn btn-success"/>
        </div>

</form>
</body>
</html>






