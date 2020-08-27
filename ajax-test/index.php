<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>

    <?php
    define( 'SITE_URL', 'https://test.com' );
     ?>

   <input type='button' id='download' value='Download'>

    <script>
    $(document).ready(function(){
     $('#download').click(function(){
       $.ajax({
         url: './process.php',
         type: 'POST',
         success: function(response){
           console.log(response);
           window.location = response;
         }
       });
     });
    });
    </script>

  </body>
</html>
