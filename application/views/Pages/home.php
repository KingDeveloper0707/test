<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Healthcheck_Smile</title>

    
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/mdb.min.css">
    
    <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css">
    <!-- mystyle-->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/style.css">
    
    
  </head>

  <body>



    
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about">about</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="contact">contact</a>
          </li>
         </ul>
        
        
         <ul class="navbar-nav ml-auto">
            
            <li class="nav-item">
                <button type="button" class="btn btn-info btn_login" data-toggle="modal" data-target="#myModal">Login</button>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-none nav_profile" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i> Profile </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
               
                <a class="dropdown-item btn_logout" href="#">Log out</a>
                </div>
            </li>
        </ul>

      </div>
    </nav>

    <main role="main">


    <?php include 'login.php'; ?>
   


    




      <!--Navigation-->
      <div id="gtco-header" data-section="home" class="gtco-cover header-fixed" role="banner" >
        <!--<div class="overlay"></div>-->
        <div class="gtco-container">
          <div class="row">
            <div class="col-md-12 col-md-offset-0 text-center ">
                 <img  src="<?=base_url();?>assets/images/home_back.jpeg" style="width:100%" >
                 <div class="home_title animated fadeInDown">
                  <em>Energy as a Service</em>
                 </div>
            </div>
          </div>
        </div>
      </div>



    <main role="main">
	 
    </main>

    <footer class="container">
      <p><center>&copy; healthcheck-smile 2020</center></p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>

    <!-- jQuery -->
    <script src="<?=base_url();?>assets/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="<?=base_url();?>assets/js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="<?=base_url();?>assets/js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="<?=base_url();?>assets/js/owl.carousel.min.js"></script>
    <!-- countTo -->
    <script src="<?=base_url();?>assets/js/jquery.countTo.js"></script>
    <!-- Magnific Popup -->
    <script src="<?=base_url();?>assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?=base_url();?>assets/js/magnific-popup-options.js"></script>
    <!-- Main -->
   


    <script>
    
    $(document).on('click', '#login-btn', function(e){
      
        e.preventDefault();
        if($('[name="user_email"]').val() == ""){
            $('[name="user_email"]').focus();
            return;
        }

        if($('[name="user_password"]').val() == ""){
            $('[name="user_password"]').focus();
            return;
        }

        $.ajax({
            url: 'http://localhost:8088/healthcheck_smile/userdologin',
            type: 'post',
            data: {
                'user_email': $('[name="user_email"]').val(),
                'user_password': $('[name="user_password"]').val()
            },
            success: function(response){
                if(response != ''){
                  $('#myModal').modal('toggle');
                  $('.btn_login').removeClass("d-block");
                  $('.btn_login').addClass("d-none");
                  $('.nav_profile').removeClass("d-none");
                  $('.nav_profile').addClass("d-block");
                  $('.nav_profile').text(response);

                }
                else{
                    alert('Password or Email is invalid');
                    $('[name="user_email"]').focus();
                }
            }
        })
    });

    $(document).on('click', '#register-btn', function(e){
      
      e.preventDefault();

      if($('[name="user_name"]').val() == ""){
          $('[name="user_name"]').focus();
          return;
      }

      if($('[name="user_email_register"]').val() == ""){
          $('[name="user_email_register"]').focus();
          return;
      }

      if($('[name="user_password_register"]').val() == ""){
          $('[name="user_password_register"]').focus();
          return;
      }

      if($('[name="user_sex"]').val() == null ){
          $('[name="user_sex"]').focus();
          return;
      }

      if($('[name="user_age"]').val() == ""){
          $('[name="user_age"]').focus();
          return;
      }

      $.ajax({
          url: 'http://localhost:8088/healthcheck_smile/userdoregister_check',
          type: 'post',
          data: {
              'user_email': $('[name="user_email_register"]').val()
          },
          success: function(response){
            if(response == 1){

                    
                      $.ajax({
                          url: 'http://localhost:8088/healthcheck_smile/userdoregister',
                          type: 'post',
                          data: {
                            'user_name': $('[name="user_name"]').val(),
                            'user_email': $('[name="user_email_register"]').val(),
                            'user_password': $('[name="user_password_register"]').val(),
                            'user_sex': $('[name="user_sex"]').val(),
                            'user_age': $('[name="user_age"]').val()
                          },
                          success: function(response){
                              if(response == 1){
                                $('#myModal').modal('toggle');
                                $('.btn_login').removeClass("d-block");
                                $('.btn_login').addClass("d-none");
                                $('.nav_profile').removeClass("d-none");
                                $('.nav_profile').addClass("d-block");
                                $('.nav_profile').text($('[name="user_name"]').val());

                              }
                              else{
                                  alert('Please try again!----');
                                  
                              }
                          }
                      })

                }
                else{
                    alert('An email with the same name exists.');
                    $('[name="user_email_register"]').focus();
                }
          }
      })
  });

    $(document).on('click', '.btn_logout', function(e){
      
      e.preventDefault();

      $('.btn_login').removeClass("d-none");
      $('.btn_login').addClass("d-block");
      $('.nav_profile').removeClass("d-block");
      $('.nav_profile').addClass("d-none");

      
    });

    $(document).on('click', '.register_click', function(e){
      
      e.preventDefault();

      $('.modal-register').removeClass("d-none");
      $('.modal-register').addClass("d-block");
      $('.modal-login').removeClass("d-block");
      $('.modal-login').addClass("d-none");

      
    });


    $(document).on('click', '.login_click', function(e){
      
      e.preventDefault();

      $('.modal-login').removeClass("d-none");
      $('.modal-login').addClass("d-block");
      $('.modal-register').removeClass("d-block");
      $('.modal-register').addClass("d-none");

      
    });

    
    $(".animated").addClass("delay-1s");


  </script>
  </body>
</html>