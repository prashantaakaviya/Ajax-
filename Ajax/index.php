<?php 
// require 'conn.php';
// require 'data.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/c063dd96ac.js" crossorigin="anonymous"></script>
    <!-- External CSS -->
        <link rel="stylesheet" type="text/css" href="style.css">
        
    <!-- end External CSS -->
    <!-- <script type="text/javascript" src="jquery/jquery-3.6.4.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
      <!-- <script type="text/javascript" src="ajax.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" 
                integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"crossorigin="anonymous"></script>
    <script type="text/javascript" src="validation.js"></script>
    <!-- Flag css -->

      <link rel="stylesheet" type="text/css" href="build/css/demo.css">
      <link rel="stylesheet" type="text/css" href="build/css/intlTelInput.css">

    <!-- End Flag css -->
    <!-- Flag js -->
      <script type="text/javascript" src="build/js/data.js"></script>
      <script type="text/javascript" src="build/js/intlTelInput-jquery.js"></script>
      <script type="text/javascript" src="build/js/intlTelInput.js"></script>
    <!-- end Flag js -->

    <script type="text/javascript">
      
      var  input = document.querySelector("#mobile");
      window.intlTelInput(input,{});
    </script>



</head>


  <body>
   

     <div class="container">

      <div class="bx">
        <form id="myForm" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">User Name</label>
            <input type="text" class="form-control" id="User_Name" name="User_Name" aria-describedby="">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <!-- <input type="text" class="form-control" id="address" name="address" aria-describedby=""> -->
            <textarea name="address" class="form-control" id="address" cols="30" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="MobileNumber" class="form-label">Mobile Number</label>
            <input type="number" class="form-control" id="mobile" name="mobile" aria-describedby="">
            <span id="phone_err"></span>
        </div>
       
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        
        </form>

      </div>


    </div>

<div class ="bx2" id="table-data">
         
       <!--  <table class="table table-success table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">User Name</th>
            <th scope="col">Option</th>
            
          </tr>
        </thead>
        <tbody >

          
      </tbody>
      </table>
 -->      
    </div>
    
      </div>
      
    </div>
    <div id="error-message"></div>
    <div id="success-message"></div>

    <div id="model">
      <div id="model-form">
        <h2>Edit Form</h2>
        <table cellpadding="10px" width="100%">
          
        </table>
        <div id="close-btn">X</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


    <!-- JQUERY Link -->
    
  <script type="text/javascript">
    $(document).ready(function(){
      // body...
      // Load Table
      function loadTable(){
          $.ajax({
            url:"ajax-load.php",
            type:"POST",
            success:function(data){
              
              $("#table-data").html(data);

            }
          });
      }
      loadTable();
      // insert data
         $("#submit").on("click",function(e){
           // e.preventDefault();
          var name = $("#User_Name").val();
          var add = $("#address").val();
          var mob = $("#mobile").val();
          $.ajax({
            url:"insert.php",
            type: "POST",
            data: {uname:name, address : add, mobile : mob},
            success: function(data){
              if (data == 1) {
                loadTable();
              }
              else{
                  $("#error-message").html("Can't Save Record.").slideDown();
            }
              }
          });
        });

          // mobile Number validation

          $(document).on("keypress",function(e) {
          


                // $mobileno = strlen ($_POST ["#mobile"]);  
                // $length = strlen ($mobileno);  
                  
                // if ( $length < 10 && $length > 10) { 

                //   echo 0; 
                //   $("#phone_err").html("Please put 10 digit mobile number");
                   
                // } 
                // else {  
                //    $("#phone_err").html("Valid");
                                       
                //   }
              var num = $("#mobile").val();

            if(!num.match('[0-9]{10}') || num.length > 10 )  {
                $("#phone_err").html("Please put 10 digit mobile number");
                return;
            } 

            else{
              $("#phone_err").html("Valid");
              return;
            }

        });

         // end mobile number validation



         // Delete Data
         $(document).on("click",".delete-btn", function(){
          var uid = $(this).data("id");
          var element = this;
          $.ajax({
            url:"delete.php",
            type:"POST",
            data:{userid : uid},
            success:function(data){
              if (data == 1) {
                loadTable();
                $(element).closest("tr").fadeOut();

              }
              else{
                
              }
              
            } 
          });

         });

         // Show Model Box
         $(document).on("click",".edit-btn", function(){

            $("#model").show();

            var uid = $(this).data("id");

            $.ajax({
              url: "update.php",
              type:"POST",
              data:{id : uid},
              success:function(data){
                $("#model-form table").html(data);
              }
            });

         });
         // hide model box
         $("#close-btn").on("click", function(){
            $("#model").hide();
         });

         // save update form

         $(document).on("click","#edit-sub",function(){

          var uid = $("#edit-id").val();
          var unm = $("#edit-unm").val();
          var add = $("#edit-add").val();
          var mo = $("#edit-mo").val();
          $.ajax({

            url: "update-form.php",
            type:"POST",
            data:{id : uid, name:unm, address :add, mobile:mo},
            success:function(data){

              if(data == 1){
              $("#model").hide();
              loadTable();
              }
            }

          });

         });


    });
  </script>
   
    

  </body>
</html>


