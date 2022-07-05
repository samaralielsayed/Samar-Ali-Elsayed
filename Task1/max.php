<?php

   if ($_POST) {
    $numa=$_POST['num1'];
    $numb=$_POST['num2'] ;
    $numc=$_POST['num3'];
 
    if($numa>$numb && $numa>$numc){
        $message =  $numa;
    }
    else{
      if($numb>$numc && $numb>$numc){
          $message =  $numb;
      }else{

          $message = $numc;
      }
     
    }


    if($numa<$numb && $numa<$numc){
        $message2 =  $numa;
      }
      else{
        if($numb<$numc && $numb<$numc){
            $message2 =  $numb;
        }else{
  
            $message2 =  $numc;
        }
       
      }
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container w-75 ">
        <div class="row border border-warning  mt-5">
           <div class="col-12 text-center text-success h1 mt-5 "> MAX && MIN</div>
            <div class="col-6 offset-3">
                <form action=" " method="post">
                    <div class="form-group">
                      <label for="">Number 1</label>
                      <input action=""  type="number" name="num1" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Number 2</label>
                      <input type="number" name="num2" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Number 3</label>
                      <input type="number" name="num3" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-danger btn-sm">Check!</button>
                    </div>
                </form>
            </div>
            <div class="col-6 offset-3 mb-5 mt-5">
                <ul class="alert alert-success">
                    <li>MAX :<?php echo $message ?? ""; ?></li>
                    <li>MIN : <?php echo $message2 ?? ""; ?></li>
                    
                </ul>
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