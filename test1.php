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
  
  $unit=$_POST['roll'];
  $unit=$unit[0];
  $unitprint=$unit;
  if($unit=='A')
  {
    $unitup="a_first";
    $unitdo="a_last";
  }
  else if($unit=='B')
{
  $unitup="b_first";
  $unitdo="b_last";
}
else if($unit=='C')
{
  $unitup="c_first";
  $unitdo="c_last";
}
else if($unit=='H')
{
  $unitup="h_first";
  $unitdo="h_last";
}
$query="SELECT * FROM table1";
$getdata = $conn->query($query);
$found=0;
echo $unitdo .$unitup;

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

    
    
   
    
      
      if($roll>=$result[$unitup] &&  $roll<=$result[$unitdo])
      {
        if($result['institution']=='BSMRSTU')
        {
          $lat=22.9660955;
          $long=89.8171352;
        }
        else if($result['institution']=='Govt. Bangabandhu College, Gopalganj')
        {
          
            $lat=23.00642;
            $long=89.827605;
          
        }
        else if($result['institution']=='Sheikh Hasina Govt. Girls High School, Gopalganj')
        {
          
            $lat=23.004241;
            $long=89.82523;
          
        }
        else if($result['institution']=='Sarnakoli High School, Gopalganj')
        {
          
            $lat=23.004241;
            $long=89.82523;
          
        }
        else if($result['institution']=='Technical College, Gopalganj')
        {
          
            $lat=22.9976368;
            $long=89.81602190000001;
          
        }
        else if($result['institution']=='S M Model Govt. High School, Gopalganj')
        {
          
            $lat=23.00454849999999;
            $long=89.82907320000004;
          
        }
        else if($result['institution']=='Hazi Lal Mia City College, Gopalganj')
        {
          
            $lat=23.0105011;
            $long=89.82625589999998;
          
        }
        else if($result['institution']=='Binapani Govt Girls High School, Gopalganj')
        {
          
            $lat=23.007688;
            $long=89.831207;
          
        }
        else if($result['institution']=='Sheikh Fazilatun-Nesa Govt. Mohila College, Gopalg')
        {
          
            $lat=23.007100;
            $long= 89.826413;
          
        }
        else if($result['institution']=='Mohila Madrasa, Gopalganj')
        {
          
            $lat=23.002243;
            $long=89.822881;
          
        }
        else if($result['institution']=='Jugoshekha School, Gopalganj')
        {
          
            $lat=23.014112;
            $long=89.833185;
          
        }
        else if($result['institution']=='Gopalganj Chalehia Kamil M A Madrasa (Alia Madrasa')
        {
          
            $lat=23.010135;
            $long=89.829633;
          
        }
        else if($result['institution']=='101 No. Uttar Gopalganj Govt. Primary School (Besi')
        {
          
            $lat=23.010135;
            $long=89.829633;
          
        }




        echo '
        <div class="result bg-success drop-shadow" id="result">
        <h3>UNIT &nbsp;&nbsp;&nbsp;'. $unitprint.'</h3><br>
        <p>আপনার রোল নাম্বারঃ '.$_POST["roll"].' </p>
        <p class="red"<b >আপনার পরীক্ষা কেন্দ্রঃ</b></p>
        <p><b>'.'Insttitution name : ' .$result["institution"].'</b></p>
        <p><b>'.'Building name  : ' .$result["building"].'</b></p>
        <p><b>'.'Room no:  ' .$result["room"].'</b></p>
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
          myCenter = new google.maps.LatLng(".$lat.", ".$long.");
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
            content: 'আপনার পরীক্ষা কেন্দ্রঃ <br><b>Room no </b>: ".$result['room'] ."<br><b>Building name  </b>: ".$result["building"]."<br><b>Insttitution name : </b>".$result["institution"]." '
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