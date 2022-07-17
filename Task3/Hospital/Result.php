<?php
session_start();
// print_r($_SESSION['total']);
// print_r($_SESSION['total']);
// print_r($_SESSION['value'] );
// print_r($_SESSION['$_POST']);
 
// print_r($_SESSION['arrs']);
if($_SESSION['total']<25){
   $phone= "<div class='alert alert-danger text-center row'>Please contact the patient to find out the reason for the bad evalution  {$_SESSION['phone']}</div>";
   $total="bad";
    

} 
    else {
        $phone= "<div class='alert alert-success text-center '> thinks</div>";
        $total="good";
    }
    // print_r($_SESSION['arrs']);
    // print_r($_SESSION['$_POST']);
   

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
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center h1 text-dark mt-5">
                RESULT
            </div>
            <div class="col-12 mt-5">
            <div class="row alert  bg-dark text-white">
                    <div class="col-6 ">
                            QUESTION
                        </div>
                        <div class="col-6 ">
                            REVIEWS
                        </div>
                    </div>
                <form action="" method="post">

                    <div class="row">
                        <div class="col-6">
                            <?php foreach($_SESSION['value'] AS $key=>$value){?>
                            <p><?=  $value?></p>
                            <?php }?>
                        </div>
                        <div class="col-6">
                            <?php foreach($_SESSION['arrs'] AS $i){?>
                            <p><?php
                                if( $i =="0")
                                {echo array_search($_SESSION['$_POST'][0],$_SESSION['arrs']) ;}
                                elseif( $i =="3")
                                {echo array_search($_SESSION['$_POST'][1],$_SESSION['arrs']) ;}
                                elseif( $i =="5")
                                {echo array_search($_SESSION['$_POST'][2],$_SESSION['arrs']) ;}
                                elseif( $i =='10')
                               { echo array_search($_SESSION['$_POST'][3],$_SESSION['arrs']) ;}
                             ?></p>
                            <?php }?>

                        </div>

                    </div>



                </form>


            </div>

        </div>
        <div class="row alert  bg-dark text-white">
                    <div class="col-6 ">
                        Total Review
                        </div>
                        <div class="col-6 ">
                        <?=  $total??""?>
                        </div>
                    </div>
        <?= $phone ??""?>
        
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