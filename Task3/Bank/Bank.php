<?php

   if ($_POST) {
    // $user=$_POST['users'];
    // $amount=$_POST['amounts'] ;
    // $year=$_POST['years'];

 $table="<table class='table'>
 <thead>
   <tr>
     
     <th scope='col'>User Name</th>
     <th scope='col'>Interest Rate</th>
     <th scope='col'>Lan After Rate</th>
     <th scope='col'>Monthly</th>
   </tr>
 </thead>
 <tbody>
   <tr>
     <td scope='row'>";
     $table.= "{$_POST['users']}</td>";
     $table.="<td>";
     if($_POST['years']<=3){
        $year=$_POST['amounts']*$_POST['years']*0.1;
        $table.=$year;
     }else{
        $year=$_POST['amounts']*$_POST['years']*0.15;
        $table.=$year;
     }
     
     $table.="</td>";
     $table.="<td>";
     $lanAfterRate=$year+$_POST['amounts'];
     $table.=$lanAfterRate;
     $table.="</td>";
     $table.="<td>";
     $monthly=$lanAfterRate/($_POST['years']*12);
     $table.=$monthly;
     $table.="</td>";
     $table.= "</tr>
 </tbody>
</table>";
   
       
      
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
        <div class="row  mt-5">
           <div class="col-12 text-center text-success h1 mt-5 "> BANK</div>
            <div class="col-6 offset-3">
                <form action=" " method="post">
                    <div class="form-group">
                      <label for="">User Name</label>
                      <input action=""  type="text" name="users" id="" class="form-control" placeholder="" aria-describedby="helpId" value="<?= $_POST['users'] ??""?>">
                    </div>
                    <div class="form-group">
                      <label for="">Loan Amount</label>
                      <input type="number" name="amounts" id="" class="form-control" placeholder="" aria-describedby="helpId"value="<?= $_POST['amounts'] ??""?>">
                    </div>
                    <div class="form-group">
                      <label for="">Loan Years</label>
                      <input type="number" name="years" id="" class="form-control" placeholder="" aria-describedby="helpId"value="<?= $_POST['years'] ??""?>">
                    </div>
                    <div class="form-group text-center mt-5">
                        <button class="btn btn-primary btn-lg ">Calculate!</button>
                    </div>
                </form>
            </div>
           

        </div>
        <?=$table ?? "";?>

  </div>
               
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>