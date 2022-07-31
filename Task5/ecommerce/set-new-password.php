<?php

use App\Database\Models\User;
use App\Http\Requests\Validation;

$title="Set New Password";
include "layouts/header.php";
$vaildation=new Validation;
if ($_SERVER['REQUEST_METHOD'] == "POST" &&  $_POST) {
    $vaildation->setInputName('Password')->setValue($_POST['password'])->required()->regex("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/",'Minimum 8 and maximum 32 characters, at least one uppercase letter, one lowercase letter, one number and one special character')->confirmed($_POST['password_confirmation']);
    $vaildation->setInputName('Confirmation Password')->setValue($_POST['password_confirmation'])->required();
    if (empty($vaildation->getErrors())) {
        $user = new User;
        if($_GET['page']=="forget") {
            $user->setPassword($_POST['password'])->setEmail($_SESSION['verification_email']);
            if($user->changePassword() ){
            
                
                    unset($_SESSION['verification_email']);
                    header('location:login.php');die;
               
                
                    
              
            }
        }else if($_GET['page']=="profile") {
            $user->setPassword($_POST['password'])->setEmail($_SESSION['user']->email);
            if($user->changePassword() ){
                $_SESSION['user']->password= password_hash($_POST['password'],PASSWORD_BCRYPT);
                header('location:profile.php?page=changepassword');die;
            }
        }
        
        else{
            $error = "<p class='text-danger font-weight-bold' > Something Went Wrong </p>";
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
                            <h4> Chang Your Password </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                               <?= $success ?? "" ?>
                                    <form method="post">
                                        <input type="password"  name="password" placeholder="Password">
                                            <?= $vaildation->getMessage('Password')?>
                                            <input type="password"  name="password_confirmation" placeholder="Confirmation Password">
                                            <?= $vaildation->getMessage('Confirmation Password')?>
                                            <div class="button-box mt-5">
                                            <button type="submit"><span>Chiange</span></button>
                                        
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
include "layouts/scripts.php";

?>