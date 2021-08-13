<?php
require('connect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>BSMRSTU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesomeanimation.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet" type="text/css">
  <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
</head>

<body>
  <div class="container-fluid"> 
   
    <br>
    <center>


      <form name="form" onsubmit="return validation()" class="drop-shadow" method="POST">
        <div class="form-group">
        <input class="form-control" type="text" id="seat" name="seat" placeholder="seat">
          <input class="form-control" type="number" id="lower" name="lower" placeholder="lower ">
          <input class="form-control" type="number" id="upper" name="upper" placeholder="upper ">
        
        </div>
        

        </div>
        <p class="err" id="demo"></p>
        <div class="form-group">
          <input class="btn btn-primary btn-lg" type="submit" value="আসন বিন্যাস দেখুন" id="submit">
        </div>
      </form>
    </center>
<br>

<br>
<?php
if ($_SERVER["REQUEST_METHOD"] =="POST") {
  
  
    $lower=$_POST['lower'];
    $upper=$_POST['upper'];
    $seat="BSMRSTU Primary S chool Near VC`s Residence room : ".$_POST['seat'];
    echo $seat;
$query="INSERT INTO `unitg` (`lower`, `upper`, `seat`, `lat`, `longi`) VALUES ('$lower', '$upper', '$seat', '22.966096', '89.817135')";
$getdata = $conn->query($query);


     }
    
  

?>
    
    

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeoWS0NbQFx03C8CELLRXvwOqZh0NQOc4&callback=myMap"></script>

    <script>
      function validation() {

        var x = document.forms["form"]["roll"];
        var y = document.getElementById("demo");
        if (x.value == "") {
          alert("আপনি রোল নাম্বার প্রবেশ করেননি");
          x.style.border = "2px solid red";
          y.innerHTML = "আপনি রোল নাম্বার প্রবেশ করেননি";
          x.focus();
          return false;
        } else {
          x.style.outline = "2px solid green";

        }

      }
    </script>
  </div>
  <br>
  <footer>
  <p>Designed and built with <i class="fa fa-heart faa-pulse animated fa-2x" aria-hidden="true"></i> &amp; <b>by <a href="https://www.facebook.com/shoeb.hawlader">shoeb howlader</a></b></p>
  <footer>
</body>

</html>