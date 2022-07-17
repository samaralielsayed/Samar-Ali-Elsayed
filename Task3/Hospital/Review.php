<?php 

session_start();

$arrs=[
    'bad'=>0,'good'=>3, 'verygood'=>5,'excellent'=>10,
  
   
];

$value=[
   
        '0'=>'Are you satisfied with the level of cleanlines?',
        '1'=>'Are you satisfied with service prices?',
        '2'=>'Are you satisfied with the nursing service?',
        '3'=>'Are you satisfied with the level of the dector?',
        
   
];

$_SESSION['value']=$value;
$_SESSION['arrs']=$arrs;
if($_SERVER['REQUEST_METHOD']=="POST" && !empty($_POST)){
    $_SESSION['$_POST']=$_POST;
    $_SESSION['total'] =array_sum($_POST);
    print_r($_POST);
    header('location:Result.php');
     die;
    

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
            <div class="col-12 text-center h1 text-dark mt-5">
                REVIEW!
            </div>
            <div class="col-6 border-dark border-bottom pb-4">Questions?</div>
            <div class="col-6 border-dark border-bottom pb-4">
                <span>Bad </span>
                <span>Good </span>
                <span>Verygood </span>
                <span>Excesllent </span>
            </div>
            <div class="col-12 mt-5">
                <form action="" method="post">
                    <?php foreach($value AS $key=>$value){?>
                    <div class="row">
                        <div class="col-6">
                            <p><?=  $value?></p>
                        </div>
                        <div class="col-6">
                            <?php foreach($arrs AS $keys=>$arr){?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="<?=  $key?>" type="radio" id="inlineRadio1"
                                    value="<?php echo $arr?>">
                            </div>

                            <?php   }
                    ?>

                        </div>
                    </div>

                    <?php }?>
            </div>
            <div class="w-100">
                <button class="w-100 btn btn-primary">Result</button>
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