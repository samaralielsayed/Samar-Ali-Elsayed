<?php 
session_start();
if($_SERVER['REQUEST_METHOD']=="POST" && !empty($_POST)){
    // print_r($_POST);
    // die;
    $errors =[];
    if(empty($_POST['name'])){
        $errors['name']="<p class='text-danger font-weight-bold'>* Name Is Requried </p>";

    }
    if(empty($_POST['member'])){
        $errors['member']="<p class='text-danger font-weight-bold'>* Number Member Is Requried </p>";

    }
    if(empty($errors)){
        $_SESSION['name']=$_POST['name'];
        $_SESSION['member']=$_POST['member'];
        header('location:hh.php');
                die;
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12  h1 text-dark mt-5">
                Login Now!
            </div>
            <div class="col-6  mt-5">
                <form action="" method="post">
                    <div class="form-group my-4">
                        <label class="text-primary fs-5">Member Name</label>
                        <input type="text" value="<?=$_POST['name'] ??""?>" name="name" id="" class="form-control"
                            placeholder="" aria-describedby="helpId">
                        <span id="passwordHelpInline" class="form-text fs-6">
                            Club Subscribe starts with 10.000 LE
                        </span>
                        <?=$errors['name'] ?? ""?>
                    </div>
                    <div class="form-group">
                        <label class="text-primary fs-5">Count Of Famaily Members</label>
                        <input type="number" value="<?=$_POST['member'] ??""?>" name="member" id="" class="form-control"
                            placeholder="" aria-describedby="helpId">
                        <span id="passwordHelpInline" class="form-text fs-6">
                            Cost Of each Member Is 2.500LEwith 10.000 LE
                        </span>
                        <?=$errors['member'] ?? ""?>
                    </div>
                    <div class="form-group">
                        <button class="w-100 btn btn-primary btn-lg ">Subscribe</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>