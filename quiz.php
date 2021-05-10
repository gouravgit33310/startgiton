<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include "connection.php";

echo "Today is " . date("l");
echo "The time is " . date("sa");
$select = "SELECT * FROM quizoption";
$result = mysqli_query($con,$select);
$i=1;
$q=1;
 echo '<form name="submit" method="post">';
  while($row=mysqli_fetch_array($result)){
     echo "Q".$q.$row['question'].'<br>';
    echo '<input type="radio" name="quickcheck['.$i.']" value="'.$row['ans1'].'">'.$row['ans1'].'<br>';
    echo '<input type="radio" name="quickcheck['.$i.']" value="'.$row['ans2'].'">'.$row['ans2'].'<br>';
    echo '<input type="radio" name="quickcheck['.$i.']" value="'.$row['ans3'].'">'.$row['ans3'].'<br>';
    echo '<input type="radio" name="quickcheck['.$i.']" value="'.$row['ans4'].'">'.$row['ans4'].'<br><br>';
    $i++;
    $q++;
}
echo '<input type="submit" value="submit" name="submit" >';
echo '</form>';  

include "connection.php";
 if(isset($_POST['submit'])){
    if(!empty($_POST['quickcheck'])){
    $count =  count($_POST['quickcheck']);
     $optionsans = $_POST['quickcheck'];
    print_r($optionsans);
    //  echo "your attempted".$count;
     $ansselect = "SELECT rans FROM quizoption";
     $ansresult = mysqli_query($con,$ansselect);
     $score = 0;
     $k=1;
     while($ansrow =  mysqli_fetch_array($ansresult)){
    //   print_r($ansrow['rans']);

        $checked = $ansrow['rans'] == $optionsans[$k];  
        if($checked){
            $score++;
        }
       $k++;
    }
    echo "Your score".$score;   
   }
   else {
       echo "please choose options";
   }       
 }


?>
    
</body>
</html>
