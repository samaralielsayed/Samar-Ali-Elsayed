<?php 
session_start();
$club=[
    '300'=>'Football (300 LE)','250'=>'Swimming (250 Le )', '150'=>'Volleyball (150 LE)','100'=>'Others (100 LE)',
  
   
];
if($_SERVER['REQUEST_METHOD']=="POST" && !empty($_POST)){
    
   header('location:Result.php');
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";die;
}

$arrpostbool=array();
$arrpostbool2=array();
print" <div class='container w-75 '>
<div class='row' >
    <div class='col-12 text-success h1' >GAMES</div>
    <div class='col-6 '> 
    <form  method=post>";
for($i=1;$i<=$_SESSION['member'];$i++){
    @$nameMember=$_POST['member'.$i] ??'';
    $arrd=array();
    print_r($nameMember);;
   print"  <div class='form-group'>
     <label class='fs-4 text-primary' >member $i</label>
     <input  type=text  name=member$i class='form-control' value='$nameMember' aria-describedby=helpId >
 </div>";
 foreach($club AS $key=>$value){
    // name='name[".$key."]'
   
    echo"<div class=form-check>
    <input class=form-check-input type=checkbox id=defaultCheck1 name='na$i.me[]' value='$key'>
    <label class=form-check-label >
    $value
    </label>
   </div>";


   
 }

}
 print" <div class='form-group text-center mt-2'> 
 <button class='w-100 btn btn-primary btn-lg '>Recipt</button>
</div>";
print"</form> </div></div></div>";
$arrNameOfMember=array();
$arrChooseOfGame=array();



   
    for($i=1;$i<=$_SESSION['member'];$i++){
        if(isset($_POST['member'.$i])){
            $arrayNameOfMember[$i]=$_POST['member'.$i];
        $_SESSION['arrayNameOfMember']=$arrayNameOfMember;

        }
        
        if(isset($_POST['member'.$i])){
        $arrayChooseOfGames[$_POST['member'.$i]]=$_POST["na".$i."_me"] ?? [];
        $_SESSION['arrayChooseOfGames']=$arrayChooseOfGames;
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