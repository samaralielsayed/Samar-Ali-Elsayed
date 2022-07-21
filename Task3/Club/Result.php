<?php
session_start();
//echo  array_search(300,$_SESSION['arrayChooseOfGames']['GFU']);
$table = "<table class='table'>
 <thead>
   <tr>
     
     <th >Subcribes</th>
     <th >".$_SESSION['name']."</th>
     <th ></th>
     <th ></th>
     <th ></th>
   </tr>
 </thead>
 <tbody>";

 $df=array();
 //echo array_sum($_SESSION['arrayChooseOfGames']['gg']);
     foreach($_SESSION['arrayChooseOfGames'] as $nameMemberKey => $nameMemberValue){
        
        $table .=    "<tr>";
        $table .="<td>{$nameMemberKey}</td>";
        if(isset($nameMemberValue)){
        foreach($nameMemberValue AS $nameChooseOfGamesKey => $nameChooseOfGamesValue){

            if($nameChooseOfGamesValue==300){
                $table .="<td >Football</td>";
            }else if($nameChooseOfGamesValue==250){
                $table .="<td>Swimming</td>";
            }else if($nameChooseOfGamesValue==150){
                $table .="<td>Volleyball</td>";
            }else if($nameChooseOfGamesValue==100){
                $table .="<td>Others</td>";
            }
           // $df[$nameMemberKey]=array_search(300,$_SESSION['arrayChooseOfGames'][$nameChooseOfGamesValue]);

            }
            $table .="<td colspan=10 class='text-right'>".array_sum($_SESSION['arrayChooseOfGames'][$nameMemberKey]) ." EGP</td>";

            
        }
       

   
       // $table .="<td>".array_sum($_SESSION['arrayChooseOfGames']['hh'])."</td>";
        
        $table .=" </tr>";
       

     }
    
     
     
     $table .=   "</tbody>
                </table>";
                // print_r( $df);


$sport="<div class='row '>
<div class='col-12 text-center text-success h1 '>SPORTS</div>";

$sport.="<div  class='row alert alert-success text-center' > <div class=' col-6  '> Swimming</div></div>";
$sport.="<div  class='row alert alert-success text-center' > <div class=' col-6  '>fottoball</div></div>";
$sport.="<div  class='row alert alert-success text-center' > <div class=' col-6  '> Volleyball</div></div>";
$sport.="<div  class='row alert alert-success text-center' > <div class=' col-6  '> Others</div></div>";
$sport .="</div>";

                print_r($table);
                print_r($sport);

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