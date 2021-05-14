<?php
  if(array_key_exists('submit',$_GET)){

    if(!$_GET['city']){
      $error="sorry,your input field is empty";
    }

    if($_GET['city']) {
       $apiData = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&appid=cfaf3f6577cc7efcdd3d9d91cb7aea53");

         $weatherArray=json_decode($apiData,true);

         $tempCelsius = $weatherArray['main']['temp']-273;
        
         $weather= "<b>".$weatherArray['name'].",".$weatherArray['sys']['country']." : " .intval($tempCelsius)."&deg;C</b> <br>";

          $weather .="<b>Weather Condition :</b>".$weatherArray['weather']['0']['description']."<br>";

          $weather .="<b>Atmospheric Pressure:</b>".$weatherArray['main']['pressure']."hpa"."<br>";

          $weather .="<b>Wind Speed:</b>".$weatherArray['wind']['speed']."meter/sec"."<br>";

           $weather .="<b>Cloudyness:</b>".$weatherArray['clouds']['all']."% <br>";
     }
  }


?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Weather App</title>

        <style >
          
          body{
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            background-image: url(weather.jpg);
            color: white;
            font-family: poppin,'Times New Roman',Times,serif;
            font-size: large;
            background-size: cover;
            background-attachment: fixed;

          }
          .container{
            text-align: center;
            justify-content: center;
            align-items: center;
            width: 440px;

          }

          h1{
            color: black;
            font-weight: 700;
            margin-top: 150px;
          }

          input{
            width: 350px;
            padding: 5px;

          }
        





        </style>


  </head>
  <body>
      <div class="container">
        <h1>Search Global Weather</h1>
        <form action="" method="GET">
          <P><label for="city">Enter Your City</label></p>
          <p><input type="text" name="city" id="city" placeholder="City Name"></p>
          <button type="submit" name="submit" class="btn btn-success">Submit Now</button>



          <div class="output">

          <?php  

            if($weather){
            echo'<div class="alert alert-success" role="alert"> '.$weather.
              
                 '</div>';
              }

            elseif($error){
            echo'<div class="alert alert-success" role="alert"> '.$error.
              
                 '</div>';
              }
              
              


         ?>

            
          </div>
           
        </form>
        
      </div>  
      

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>