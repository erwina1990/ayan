<?php
$message=''  ;
$error='';
$nameErr = $familyErr  = $addressErr =$mobileErr=$postcodeErr= "";
$id=$name = $family  = $address = $typeoftree = $quantityS = $quantityA = $quantityZ= $quantityN= $quantityAB= $quantitySi= $quantityB= $quantityH= $quantityZA =$mobile=$postcode='';
if(isset($_POST['submit']))
{
    if (empty($_POST["name"])) {
        $nameErr = "نام الزامی است";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        preg_match('/^[A-Za-z\s ]+$/', $name);
    }


    if (empty($_POST["family"])) {
        $familyErr = "نام خانوادگی الزامی است";
    } else {
        $family = test_input($_POST["family"]);
        // check if name only contains letters and whitespace

    }


    if (empty($_POST["address"])) {
        $addressErr = "آدرس الزامی است";
    } else {
        $address = test_input($_POST["address"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[ا ئ آ ب پ ت ث ج چ ح خ د ذ ر ز ژ س ش ص ض ط ظ ع غ ف ق ک ك گ ل م ن و ه ی ي]*$/",$address)) {
            $addressErr = " لطفا با دقت فیلد را پر کنید";
        }
    }

///////////////Tree type/////////
    if (isset($_POST['tree-type']) )
    {$typeoftree=  test_input($_POST["tree-type"]);

    }
    /*///////////////combobox/////////

        if (isset($_POST['typeoftree']) )
        {$typeoftree=  test_input($_POST["typeoftree"]);

      }
        else{
            $typeoftree= 0;}*/
    /*
    ///////////////////quantityChenar///////////////////
         $quantityC = test_input($_POST["quantityC"]);

    //////////////// quantitySarve ////////////

             $quantityS = test_input($_POST["quantityS"]);

    /////////////// quantityZaban anghosht ///////

                 $quantityA = test_input($_POST["quantityA"]);

    ////////////// quantityNarvan  ///////////

         $quantityN = test_input($_POST["quantityN"]);

    /////////////quantityAlbaloo  //////////////////

         $quantityAB= test_input($_POST["quantityAB"]);

    //////////// quantitySib ////////////////////

         $quantitySi= test_input($_POST["quantitySi"]);
    ///////////   quantityBeh /////////////////

         $quantityB= test_input($_POST["quantityB"]);

    ////////////// quantityH  /////////////////

         $quantityH= test_input($_POST["quantityH"]);

    //////////// quantityZardalo ///////////

         $quantityZA= test_input($_POST["quantityZA"]);

    /////////////////crmentity///////////////////////*/

    if (empty($_POST["mobile"])) {
        $mobileErr = "شماره همره الزامی است";
    } else {
        $mobile = test_input($_POST["mobile"]);
        // check if name only contains letters and whitespace

    }
    if (empty($_POST["postcode"])) {
        $postcodeErr = "شماره همره الزامی است";
    } else {
        $postcode = test_input($_POST["postcode"]);
        // check if name only contains letters and whitespace

    }



////////////////////////////////////////////////////

    /* if (register($name, $family, $address, $typeoftree, $quantityS, $quantityA, $quantityZ, $quantityN, $quantityAB, $quantitySi, $quantityB, $quantityH, $quantityZA, $mobile)) {*/
    if (register($name, $family, $address ,$mobile,$postcode,$typeoftree)) {


        $message = 'ثبت نام شما با موفقیت انجام شد.';
    }

    else {
        $error = 'مشکلی بوجود آمده است';


    }
}