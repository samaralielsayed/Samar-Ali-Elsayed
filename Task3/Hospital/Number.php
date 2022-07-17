
<?php 
session_start();
if($_SERVER['REQUEST_METHOD']=="POST" && !empty($_POST)){
    // print_r($_POST);
    // die;
    $errors =[];
    if(empty($_POST['phone'])){
        $errors['phone']="<p class='text-danger font-weight-bold'>* Phone Is Requried </p>";

    }
    if(empty($errors)){
        $_SESSION['phone']= $_POST['phone'];
        header('location:re.php');
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
    <div class="row">
        <div class="col-12 text-center h1 text-dark mt-5">
            Login Now!
        </div>
        <div class="col-4 offset-4 mt-5" >
            <form action="" method="post">
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="number" value="<?=$_POST['phone'] ??""?>" name="phone" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                        <?=$errors['phone'] ??""?>
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-dark">Submit</button>
                </div>
            </form>

        </div>

    </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>