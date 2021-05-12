<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <p id="demo" style="font-size:20px; color:orange;"></p>
  <span id="seondspan"></span>
<?php
include "connection.php";
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
<script>
//       var seconds = Date.getSeconds();
//         $("#seondspan").append(seconds);
//  var countDownDate = new Date("May 10, 2021 18:50:25").getTime();

// // Update the count down every 1 second
// var x = setInterval(function() {

//   // Get today's date and time
//   var now = new Date().getTime();

//   // Find the distance between now and the count down date
//   var distance = countDownDate - now;

//   // Time calculations for days, hours, minutes and seconds
// //   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
// //   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
// //   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//   var seconds = Math.floor((distance % (1000 * 60)) / 1000);

//   // Display the result in the element with id="demo"
//   document.getElementById("demo").innerHTML = seconds + "s ";
// //   document.getElementById("demo").innerHTML = days + "d " + hours + "h "
// //   + minutes + "m " + seconds + "s ";


//   // If the count down is finished, write some text
//   if (distance < 0) {
//     clearInterval(x);
//     document.getElementById("demo").innerHTML = "EXPIRED";
//   }
// }, 1000);
var totaltime  =  30;   
$("#seondspan").hide();
setInterval(function(){ 
     
  totaltime--;
    $("#seondspan").append(totaltime);
    
 }, 3000);

     
         
    </script>
</html>

