<?php

use App\Database\Models\User;
use App\Http\Requests\Validation;
use App\Mails\VerificationCodeMail;

$title="Sing Up";
include "layouts/header.php";
include "App/Http/Middlewares/Guest.php";
include "layouts/navbar.php";
include "layouts/breadcrumb.php";
$vaildation=new Validation;
if ($_SERVER['REQUEST_METHOD'] == "POST" &&  $_POST) {

   $vaildation->setInputName('First Name')->setValue($_POST['first_name'])->required()->string()->max(32);
   $vaildation->setInputName('Last Name')->setValue($_POST['last_name'])->required()->string()->max(32);
   $vaildation->setInputName('Email')->setValue($_POST['email'])->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')->unique('users','email');
   $vaildation->setInputName('Phone')->setValue($_POST['phone'])->required()->regex('/^01[0125][0-9]{8}$/')->unique('users','phone');
   $vaildation->setInputName('Password')->setValue($_POST['password'])->required()->regex("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/",'Minimum 8 and maximum 32 characters, at least one uppercase letter, one lowercase letter, one number and one special character')->confirmed($_POST['password_confirmation']);
   $vaildation->setInputName('Password Confirmation')->setValue($_POST['password_confirmation'])->required();
$vaildation->setInputName('Gender')->setValue($_POST['gender'])->required()->in(['m','f']);
   if(empty($vaildation->getErrors())){
    $verification_code = rand(100000,999999);
    $user=new User;
    $user->setFirst_name($_POST['first_name'])->setLast_name($_POST['last_name'])->setPassword($_POST['password'])->setPhone($_POST['phone'])
    ->setGender($_POST['gender'])->setEmail($_POST['email'])->setVerification_code($verification_code);
    if($user->create()){
        $subject = "Verification Code";
        $body = "<p> Dear {$_POST['first_name']} {$_POST['last_name']}</p>
        <p>Your Verification Code:<b style='color:blue'>{$verification_code}</b></p>
        <p>Thank You</p>";
        $verificationCodeMail = new VerificationCodeMail($_POST['email'],$subject,$body);
        
        if($verificationCodeMail->send()){
        $_SESSION['verification_email'] = $_POST['email'];
        header('location:verification-code.php?page=singup');die;
        }else{
            $error = "<div class='alert alert-danger text-center'> Please Try Again Later </div>";
        }

    }else{
        $error="<div class='alert alert-danger text-center'> Something Went Wrong </div>";
    }

   }

}   

?>

<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> Sing Up </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?=$error ??""?>
                                    <form method="post">
                                        <input type="text" value="<?=$_POST['first_name']??''?>" name="first_name"
                                            placeholder="First Name">
                                        <?= $vaildation->getMessage('First Name')?>
                                        <input type="text" value="<?=$_POST['last_name']??''?>" name="last_name"
                                            placeholder="Last Name">
                                        <?= $vaildation->getMessage('Last Name')?>
                                        <input type="tel" value="<?=$_POST['phone']??''?>" name="phone"
                                            placeholder="Phone">
                                        <?= $vaildation->getMessage('Phone')?>
                                        <input value="<?=$_POST['email']??''?>" name="email" placeholder="Email"
                                            type="email">
                                        <?= $vaildation->getMessage('Email')?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?= $vaildation->getMessage('Password')?>
                                        <input type="password" name="password_confirmation"
                                            placeholder="Password Confirmation">
                                        <?= $vaildation->getMessage('Password Confirmation')?>
                                        <select name="gender" class="form-control">
                                            <option
                                                <?= isset($_POST['gender']) && $_POST['gender'] == 'm' ? 'selected' : '' ?>
                                                value="m">Male</option>
                                            <option
                                                <?= isset($_POST['gender']) && $_POST['gender'] == 'f' ? 'selected' : '' ?>
                                                value="f">Female</option>
                                        </select>
                                        <?= $vaildation->getMessage('Gender')?>
                                        <div class="button-box mt-5">
                                            <button type="submit"><span>Sing Up</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include "layouts/footer.php";
include "layouts/scripts.php";



?>