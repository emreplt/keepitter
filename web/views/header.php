<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <title></title>
    <link rel='stylesheet' href='/bower_components/bootstrap/dist/css/bootstrap.css'>
    <link rel='stylesheet' href='/bower_components/bootstrap-social/bootstrap-social.css'>
    <link rel='stylesheet' href='/bower_components/font-awesome/css/font-awesome.min.css'>
    <script src='/bower_components/jquery/dist/jquery.js'></script>
    <script src='/bower_components/bootstrap/dist/js/bootstrap.js'></script>
    <link rel='stylesheet' href='/public/css/app.css'>
    <style>
    a#profiler:before {
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      content: "";
      display: inline-block;
      height: 30px;
      margin-right: 10px;
      vertical-align: middle;
      width: 30px;
      margin-top: -6px;
      margin-bottom: -6px;
    }

    /*.navbar-default .navbar-nav>.active>a.home:before,*/
    a#profiler:before { background-image: url('<?php echo auth::getuser()['profile_image_url']; ?>'); }

    </style>
  </head>
  <body>
   <div role='navigation' class='navbar navbar-default'>
     <div class='container'>
       <div class='navbar-header'>
         <button type='button' data-toggle='collapse' data-target='.navbar-collapse' class='navbar-toggle'><span class='sr-only'>Toggle navigation</span><span class='icon-bar'></span><span class='icon-bar'></span><span class='icon-bar'></span></button>
         <a href='/' class='navbar-brand'>Keepitter</a></div>
       <div class='navbar-collapse collapse'>
         <ul class='nav navbar-nav'>
           <li><a href='/insert'>keep a tweet</a></li>
         </ul>
         <ul class='nav navbar-nav navbar-right'>
           <?php if (auth::isauth()): ?>
             <li class='dropdown'>
               <a href='#' data-toggle='dropdown' class='dropdown-toggle' id="profiler"><b><?php echo auth::getuser()['name']; ?></b> (@<?php echo auth::getuser()['screen_name']; ?>)
                 <span class='caret'></span></a>
               <ul role='menu' class='dropdown-menu'>
                 <li><a href='/me'>me</a></li>
                 <li class='divider'></li>
                 <li><a href='/profile/kill'>log out</a></li>
               </ul>
             </li>
             <?php else: ?>
               <li>
                 <p class="navbar-btn">
                   <a class="btn btn-social btn-block btn-twitter" href='/login/authorize'>
                    <span class="fa fa-twitter"></span> Sign in with Twitter
                  </a>
                </p>

               </li>
           <?php endif; ?>
         </ul>
       </div>
     </div>
   </div>
   <div class="page">
  <!-- opening page -->
