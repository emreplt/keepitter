<div class="container">
  <h1>this is keepitter</h1>

    <?php
      $tolga = 3-1;
      // if ($tolga>4) {
      //   echo 'büyük';
      // } else {
      //   echo 'küçük';
      // }
      $dizi = [0,1,2,'emre',4,'tolga',6];

      // echo $dizi[5];
     ?>

     <?php foreach ($dizi as $key => $dizi_degeri): ?>
       <br>
       <?php echo $dizi_degeri; ?>
     <?php endforeach; ?>


  <div class="row">
    <div class="col-xs-6" style="background-color:red;">
      <?php foreach ($dizi as $key => $dizi_degeri): ?>
        <br>
        <?php echo $dizi_degeri; ?>
      <?php endforeach; ?>
      <?php foreach ($dizi as $key => $dizi_degeri): ?>
        <br>
        <?php echo $dizi_degeri; ?>
      <?php endforeach; ?>
      <?php foreach ($dizi as $key => $dizi_degeri): ?>
        <br>
        <?php echo $dizi_degeri; ?>
      <?php endforeach; ?>
    </div>
    <div class="col-xs-6" style="background-color:gray;">
      <div class="row">
        <?php foreach ($dizi as $key => $dizi_degeri): ?>
          <br>
          <?php echo $dizi_degeri; ?>
        <?php endforeach; ?>
      </div>
      <div class="row">
        <div class="col-xs-6" style="background-color:blue;">
          <?php foreach ($dizi as $key => $dizi_degeri): ?>
            <br>
            <?php echo $dizi_degeri; ?>
          <?php endforeach; ?>
        </div>
        <div class="col-xs-6" style="background-color:magenta;">
          <?php foreach ($dizi as $key => $dizi_degeri): ?>
            <br>
            <?php echo $dizi_degeri; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

  </div>

</div>
