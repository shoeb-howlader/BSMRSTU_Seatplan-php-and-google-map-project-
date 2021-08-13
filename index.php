<?php
require('connect.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>BSMRSTU SEAT PLAN</title>
  <link rel="icon" type="jpeg/png/gif" href="head.png">
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
  <link href="https://fonts.googleapis.com/css?family=Aladin|Dekko|Itim|Redressed" rel="stylesheet"> 
</head>

<body>
  <div class="container-fluid"> 
    <h3><span>welcome to</span><span>BSMRSTU</span></h3>
    <p style="
    font-family: 'Itim', cursive;
">Designed and built with <i class="fa fa-heart faa-pulse animated fa-2x" aria-hidden="true"></i> &amp; <b>by <a href="https://www.facebook.com/shoeb.hawlader">SHOEB HOWLADER</a></b></p>
    <br>
    <center>


      <form name="form" onsubmit="return validation()" class="drop-shadow" method="POST">
        <div class="form-group">
          <label for="roll" class="control-label">আপানার রোল নাম্বার প্রবেশ করুন  </label>
          <input class="form-control" type="text" id="roll" name="roll" placeholder="রোল নাম্বার ">
       
        </div>
        <div class="form-group">
        <label for="unit">ইউনিট নির্বাচন করুন</label> 
        <select class="form-control" id="unit" name="unit">
         
          <option value="D">D</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="G">G</option>

        </select>

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
 function multiexplode ($delimiters,$string) {
  
  $ready = str_replace($delimiters, $delimiters[0], $string);
  $launch = explode($delimiters[0], $ready);
  return  $launch;
}
if ($_SERVER["REQUEST_METHOD"] =="POST") {
  
  if($_POST['unit']=='A')
  {
    $unit="unita";
  }
  else if($_POST['unit']=='B')
{
  $unit="unitb";
}
else if($_POST['unit']=='C')
{
  $unit="unitc";
}
else if($_POST['unit']=='D')
{
  $unit="unitd";
}
else if($_POST['unit']=='E')
{
  $unit="unite";
}
else if($_POST['unit']=='F')
{
  $unit="unitf";
}
else if($_POST['unit']=='G')
{
  $unit="unitg";
}
else if($_POST['unit']=='H')
{
  $unit="unith";
}
$query="SELECT * FROM $unit";
$getdata = $conn->query($query);
$found=0;
if($getdata)
     {
while($result=$getdata->fetch_assoc())
     {
      
     
    
    
    
    $text = $_POST['roll'];
    $exploded[1]=0;
    $exploded = multiexplode(array("A","B","C","D","E","F","G","H"),$text);

    $rolltest=$exploded[0];
   if($rolltest=='A'||'B'||'C'||'D'||'E'||'F'||'G')
   {
    if(ctype_digit ($exploded[1]))
    {
      $roll=(int)$exploded[1];
    }
    else 
    {
      $roll="56765765675675656565656565656567575765675";
    }
   }
   else 
   {
     $roll="56765765675675656565656565656567575765675";
   }

    
    
   
    
      
      if($roll>=$result['lower'] &&  $roll<=$result['upper'])
      {
        echo '
        <div class="result bg-success drop-shadow" id="result">
        <h3>UNIT &nbsp;&nbsp;&nbsp; '. $_POST["unit"].'</h3><br>
        <p>আপনার রোল নাম্বারঃ '.$_POST["roll"].' </p>
        <p>আপনার আসন বিন্যাস</p>
        <p><b>'.$result["seat"].'</b></p>
  
      </div>
  
      </center>
      <br>
      <div class="drop-shadow map">
      <h2>গুগল ম্যাপ এ আপনার পরীক্ষার কেন্দ্র দেখুন </h2>
      <div id="googleMap"style="width:100%;height:500px;"></div>
    </div>
        
        ';

        echo "
        <script>
        function myMap() {
          myCenter = new google.maps.LatLng(".$result['lat'].", ".$result['longi'].");
          var mapProp = {
            mapTypeId: google.maps.MapTypeId.HYBRID,
            center: myCenter,
            zoom: 16,
          };
          var map = new google.maps.Map(document.getElementById('googleMap'), mapProp);
  
          var marker = new google.maps.Marker({
            position: myCenter,
            icon: 'redmarker.png',
            animation: google.maps.Animation.BOUNCE
          });
          marker.setMap(map);
          // Zoom to 9 when clicking on marker
          google.maps.event.addListener(marker, 'click', function () {
            map.setZoom(9);
            map.setCenter(marker.getPosition());
          });
          var infowindow = new google.maps.InfoWindow({
            content: 'আপনার পরীক্ষা কেন্দ্রঃ <br>".$result['seat']." '
          });
  
          infowindow.open(map, marker);
        }
      </script>
        
        ";
        $found=1;
            break;

           
      }
      
      
      

      

   

     }
    
    }

     
    if($found==0){
      echo '
      
      <div class="resulter bg-danger drop-shadow" id="result">
      <i class="fa fa-exclamation-triangle fa-4x  faa-flash animated" aria-hidden="true"></i>
      <p>দুঃখিত , আপনার প্রদান করা রোলটি সঠিক নয় । </p>
      <p><b>রোল ও  ইউনিট যাচাই করে পুনরায় প্রবেশ করুন </b></p>
      <p>আমাদের সাথে থাকার জন্য ধন্যবাদ </p>
 
    </div>
 
    </center>
    <br>
   
      
      
      ';
      }
  }

?>
    
    

    <script src="https://maps.googleapis.com/maps/api/js?key='your API key here'&callback=myMap"></script>

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
  
  <p class="about"style="
    font-family: 'Itim', cursive;
">Designed and built with <i class="fa fa-heart faa-pulse animated " aria-hidden="true"></i> &amp; <b>by <a href="https://www.facebook.com/shoeb.hawlader">SHOEB HOWLADER</a></b></p>
  <br>
  <br>

  <p class="disclaimer fa" style="
    font-family: cursive;
">this is unofficial , IF you have confusion &  want more accurate plaease visit <a href="https://www.bsmrstu.edu.bd/b/">BSMRSTU website</a></p>

  
  <footer>
  
</body>
<script>

$('html,body').animate({
  scrollTop: $("#result").offset().top},
  'slow');
//this is unofficial , you want more accurate plaease visit BSMRSTU website
</script>
</html>