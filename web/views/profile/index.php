<div class="container">
  <h1><?php echo auth::getuser()['name']; ?></h1>
  <p>twitter'la irtibatlı hesabın</p>
  <br>
  <?php
  // $twitter = auth::getTwitter();
  // $content = $twitter->get('account/verify_credentials');

   ?>
   <pre>

     <?php var_dump($_SESSION); ?>

   </pre>
  <pre>

    <?php //print_r($content); ?>

  </pre>
  <hr>
  <pre>
    <?php //print_r($twitter); ?>
  </pre>


</div>
