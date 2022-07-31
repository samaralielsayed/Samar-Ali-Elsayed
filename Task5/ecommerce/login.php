
<?php 
use App\Database\Models\User;
use App\Http\Requests\Validation;
$title="Log In";
include "layouts/header.php";
include "App/Http/Middlewares/Guest.php";
include "layouts/navbar.php";
include "layouts/breadcrumb.php";
$vaildation=new Validation;
if ($_SERVER['REQUEST_METHOD'] == "POST" &&  $_POST) {
    $vaildation->setInputName('Email')->setValue($_POST['email'])->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/', ' ');
    $vaildation->setInputName('Password')->setValue($_POST['password'])->required()->regex("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/"," <a class='text-primary font-weight-bold' href='register.php'> Create Account Here</a>");
   if(empty($vaildation->getErrors())){
   // chek
   $user = new User;
   $user->setEmail($_POST['email']);
   $result=$user->getUserByEmail();
   if($result->num_rows ==1){
    $userData=$result->fetch_object();
    if(password_verify($_POST['password'],$userData->password)){
        if(!is_null($userData->email_verified_at)){
            $_SESSION['user']=$userData;
             if(isset($_POST['remember-me'])){
                setcookie('user',$_POST['email'],time()+(86400*356),'/');

            }
            header('location:index.php');die;

        }else{
            $_SESSION['verification_email'] = $_POST['email'];
            header('location:verification-code.php?page=login');
        }
        
    }else{
        $error = "<p class='text-danger font-weight-bold'> Wrong Email Or Password. <a class='text-primary font-weight-bold' href='register.php'> Create Account Here</a> </p>";
    }
   }else{
    $error = "<p class='text-danger font-weight-bold'> Wrong Email Or Password. <a class='text-primary font-weight-bold' href='register.php'> Create Account Here</a> </p>";

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
                            <a class="active" data-toggle="tab" href="#lg1">
                                <h4> log In </h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="#" method="post">
                                            <input type="text" name="email" placeholder="Email">
                                            <?= $vaildation->getMessage('Email')?>
                                            <input type="password" name="password" placeholder="Password">
                                            <?= $vaildation->getMessage('Password')?>
                                            <?=$error ??""?>
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" name="remember-me">
                                                    <label>Remember me</label>
                                                    <a href="forget-password.php">Forgot Password?</a>
                                                </div>
                                                <button type="submit"><span>Log In</span></button>
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


