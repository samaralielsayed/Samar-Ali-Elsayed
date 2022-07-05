<?php

   if ($_POST) {
   
    $Percent=($_POST['phy']+$_POST['chim']+$_POST['bio']+$_POST['math']+$_POST['comp'])/5.0;
    // $numb=$_POST['chim'] ;
    // $numc=$_POST['bio'];
    // $numb=$_POST['math'] ;
    // $numc=$_POST['comp'];
    
    
   if($Percent>=90 ){
        $message =  "Grade A";
    }elseif($Percent>=80){ 
        $message="Grade B";
        
     
    }elseif($Percent>=70){ 
        $message="Grade C";
        
     
      }elseif($Percent>=60){ 
        $message="Grade C";
        
     
      }elseif($Percent>=40){ 
        $message="Grade D";
        
     
      }elseif($Percent<40){ 
        $message="Grade F";
      
      }else{ 
        $message="Grade F";
        
     
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
           <div class="col-12 text-center text-success h1 mt-5 ">Calculate Percentage && Grade</div>
            <div class="col-6 offset-3">
                <form action=" " method="post">
                    <div class="form-group">
                      <label for="">Physics</label>
                      <input action=""  type="number" name="phy" id="" min="0" max="100" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Chemistry</label>
                      <input type="number" name="chim" id="" min="0" max="100"  class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Biology</label>
                      <input type="number" name="bio" id="" min="0" max="100"  class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Mathematics</label>
                      <input type="number" name="math" id="" min="0" max="100"  class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Computer</label>
                      <input type="number" name="comp" id="" min="0" max="100"  class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-danger btn-sm">Check!</button>
                    </div>
                </form>
            </div>
            <div class="col-6 offset-3 mb-5 mt-5">
                <ul class="alert alert-success">
                <li>Percentage :<?php echo $Percent ?? ""?>%</li>
                    <li>Grade:<?php echo $message ?? ""; ?></li>
                    
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