<?php

 if($_POST&& !empty($_POST['productNume1'])&& !empty($_POST['price1']) && !empty($_POST['quntities1'])  ){
   
    for($y=1;$y<=$_POST['number'];$y++){
   @ $productNume.= $_POST["productNume".$y]."<br>";
   @ $price.=$_POST["price".$y]."<br>";
   @ $quntities.=$_POST["quntities".$y]."<br>";
   @$subTotal.=$_POST["quntities".$y]*$_POST["price".$y]."<br>";
   @$total.=$_POST["quntities".$y]*$_POST["price".$y]." ";
   
    }
    $c=explode(" ", $total);
    array_pop($c) ;
    $sumTotal=array_sum($c);
    if($sumTotal<=1000){
        $discount= 0;
    }elseif($sumTotal<=3000){
        $discount=$sumTotal*.1;

    }elseif($sumTotal<=4500){
        $discount=$sumTotal*.15;

    }elseif($sumTotal>4500){
        $discount=$sumTotal*.2;

    } 
    $totalafterDiscount=$sumTotal-$discount;

    if($_POST['city']=='cairo'){
        $delivery= 0;
    }elseif($_POST['city']=='giza'){
        $delivery= 30;

    }elseif($_POST['city']=='alex'){
        $delivery= 50;

    }elseif($_POST['city']=='other'){
        $delivery=100;

    }
    $netTotal=$totalafterDiscount+$delivery;
    $recipt="<div class='row'>
    <div class='col-3 text-center' >
    <p>product Name</p>
    <div class='alert' >{$productNume} </div>
    </div>
    <div class='col-3 text-center'>
    <p>Price</p>
    <div class='alert' >{$price}</div>
    </div>
    <div class='col-3 text-center'>
    <p>Quntities</p>
   <div class='alert '> {$quntities}</div>
    </div>
    <div class='col-3  text-center'>
    <p>Sub Total</p>
    <div class='alert '> {$subTotal}</div>
    </div>
    <div class='col-12  border-top border-bottom border-dark border-opacity-25'>
    <div class='alert '>Client Name :{$_POST['users']}</div>
    </div>
    <div class='col-12   border-bottom  border-dark border-opacity-25''>
    <div class='alert '>City :{$_POST['city']}</div>
    </div>
    <div class='col-12  border-bottom  border-dark border-opacity-25' '>
    <div class='alert '>Total :{$sumTotal}</div>
    </div>
    <div class='col-12  border-bottom  border-dark border-opacity-25''>
    <div class='alert '>Discount :{$discount}</div>
    </div>
    <div class='col-12 border-bottom  border-dark border-opacity-25''>
    <div class='alert '>Total After Discount :{$totalafterDiscount}</div>
    </div>
    <div class='col-12 border-bottom  border-dark border-opacity-25''>
    <div class='alert '>Delivery :{$delivery}</div>
    </div>
    <div class='col-12  '>
    <div class='alert '>Net Total:{$netTotal}</div>
    </div>
</div>

 ";
   
     }
?>
<!doctype html>
<html lang="en">

<head>
    <title>National ID</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container w-75 ">
        <div class="row ">
            <div class="col-12 text-center text-success h1 ">SUPERMARKET</div>
            <div class="col-6 offset-3">
                <form action=" " method="post">
                    <div class="form-group">
                        <label for="">User Name</label>
                        <input action="" type="text" name="users" id="" class="form-control" placeholder=""
                            aria-describedby="helpId" value="<?= $_POST['users'] ??""?>">
                    </div>
                    <div class="form-group">
                        <label for="">City</label>
                        <select class="form-select form-control" aria-label="Default select example" name="city">
                            <option <?=@ $_POST['city']=='cairo' ?'selected' :''?>  value="cairo" >cairo</option>
                            <option <?= @$_POST['city']=='giza' ?'selected' :''?> value="giza">Giza</option>
                            <option <?=@ $_POST['city']=='alex' ?'selected' :''?>  value="alex">Alex</option>
                            <option <?=@ $_POST['city']=='other' ?'selected' :''?>  value="other">Other</option>
                        </select>
                      
                    </div>
                    <div class="form-group">
                        <label for="">Number Of Varities</label>
                        <input type="number" name="number" id="" class="form-control" placeholder=""
                            aria-describedby="helpId" value="<?= $_POST['number'] ??""?>">
                    </div>
                    <div class="form-group text-center mt-2"> 
                        <button class="w-100 btn btn-primary btn-lg ">Enter Product</button>
                    </div>
                     <?php if($_POST && empty($_POST['productNume1'])&& empty($_POST['price1']) && empty($_POST['quntities1']) ){?>
                        <div class="row">
                        <div class="col-4">Product Nume</div>
                        <div class="col-4">Price</div>
                        <div class="col-4">Quntities</div>
                    </div>
                    <?php for($x=1;$x<=$_POST['number'];$x++){?> <div class="row">
                        <div class="col-4 ">
                        <input type="text" name="<?="productNume".$x?>" id="" class="form-control" placeholder=""
                            aria-describedby="helpId" value="<?= $_POST["productNume".$x] ??""?>">  
                        </div>
                        <div class="col-4 ">
                        <input type="number" name="<?="price".$x?>" id="" class="form-control" placeholder=""
                            aria-describedby="helpId" value="<?= $_POST["price".$x] ??""?>"> 
                        </div>
                        <div class="col-4">
                         <input type="number" name="<?="quntities".$x?>" id="" class="form-control" placeholder=""
                            aria-describedby="helpId" value="<?= $_POST["quntities".$x] ??""?>"> 
                        </div>
                    </div> 
                    <?php } ?>
                        <div class="form-group text-center mt-2"> 
                        <button class="w-100 btn btn-primary btn-lg " >Recipt</button>
                    </div>
                    <?php } ?>
                    <?=$recipt ??""?>
                   
                    
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