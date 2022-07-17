<?php 
session_start();
$club=[
    '300'=>'Football (300 LE)','250'=>'wimming (250 Le )', '150'=>'Volley ball (150 LE)','100'=>'Others (100 LE)',
  
   
];
$arrpostbool=array();
$arrpostbool2=array();
print" <div class='container w-75 '>
<div class='row' >
    <div class='col-12 text-success h1' >GAMES</div>
    <div class='col-6 '> 
    <form  method=post>";
for($i=1;$i<=$_SESSION['member'];$i++){
    @$postMember=$_POST['member'.$i] ??'';
   print"  <div class='form-group'>
     <label class='fs-4 text-primary' >member $i</label>
     <input  type=text  name=member$i class='form-control' value='$postMember' aria-describedby=helpId >
 </div>";
 print_r($postMember);
 foreach($club AS $key=>$value){
    $name=$key.$i;
    $postbool=$_POST[$name] ??''; 
    print"<div class=form-check>
    <input class=form-check-input type=checkbox id=defaultCheck1 name='$name'value='$key'>
    <label class=form-check-label >
    $value
    </label>
   </div>";
   
   @$arrpostbool[$_POST['member'.$i]].=$postbool;

   
        
}


}
 print" <div class='form-group text-center mt-2'> 
 <button class='w-100 btn btn-primary btn-lg '>Recipt</button>
</div>";
print"</form> </div></div></div>";
$arr=array();
if(!empty($_POST['member0'])){

    for($i=1;$i<=$_SESSION['member'];$i++){
        $arr[$i]=$_POST['member'.$i];
        foreach($club AS $key=>$value){
            
        }

    }
   // $b= str_split($arrpostbool['samar'], 3);
   // $b= explode(" ",$arrpostbool['samar']);
    //print_r($b);
    print"<pre>";
    //print_r($arrpostbool);
    print"</pre>";
   print_r($_POST);
    print"<pre>";
    print_r($arr);
    print"</pre>";
    print"jhjkl;k";
   
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