<div class="container">
  <h1><?php echo auth::getuser()['name']; ?></h1>
  <p>twitter'la irtibatlı hesabın</p>
  <br>
  <h1>keeps</h1>
  <pre><?php

  // print_r(twitter::gettwitter());
  // $twitter = twitter::gettwitter();
  // print_r($twitter->get('account/verify_credentials'));
   ?></pre>
   <hr>
   <pre>

     <?php print_r($_SESSION); ?>

   </pre>

</div>
