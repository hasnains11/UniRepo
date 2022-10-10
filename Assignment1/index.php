<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Auto Load More Data on Page Scroll with Jquery & PHP</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


      <title>Countries Information</title>
</head>
<body>
<div class="container">
      <h2 align="center">Scroll Countries Cards</a></h2>

      <br />
      <br />

      <center>
         <div id="load_data"></div>
         <div id="load_data_message"></div>
      </center>

   </div>

   <script>
      $(document).ready(function() {
         var limit = 10;
         var start = 0;
         var action = 'inactive';

         function load_data(limit, start) {
            $.ajax({
               url: "getCountries.php",
               method: "POST",
               data: {
                  limit: limit,
                  start: start
               },
               cache: false,

               success: function(data) {
                  $('#load_data').append(data);
                  if (data == '') {
                     $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
                     action = 'active';
                  } else {
                     $('#load_data_message').html("<center><img height=100 width=100 src='images/loading.gif' /></center>");
                     action = "inactive";
                  }
               }
            });
         }
        if (action == 'inactive') {
           action = 'active';
            load_data(limit, start);
         }
         $(window).scroll(function() {
            if ($(window).scrollTop() +
             $(window).height() > $("#load_data").height() && action == 'inactive') {
               action = 'active';
               start = start + limit;
               setTimeout(function() {
                  load_data(limit, start);
               }, 1000);
            }

         });


      });
     
      </script>



</body>
</html>