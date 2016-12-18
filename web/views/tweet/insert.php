<div class="jumbotron">
  <div class="container text-center">

    <h1 class="display-3">Lorem</h1>
    <p class="lead">Ipsum</p>
    <p class="lead">
      <form action="/insert" method="post">
        <div class="form-group text-left">
          <label for="permalink">paste tweet's permalink</label>
          <input type="text" class="form-control" name="permalink" id="permalink" value="<?php echo $this->permalink; ?>" placeholder="https://twitter.com/WhiteHouse/status/1670203165">
        </div>
        <?php if ($this->error): ?>
          <div class="alert alert-danger">
            <strong>hey!</strong> <?php echo $this->error; ?>
          </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary btn-lg">Keep it</button>
      </form>
      <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
    </p>
  </div>
</div>
<div class="container">
  <pre>
    <?php print_r($this->data); ?>
  </pre>
</div>
