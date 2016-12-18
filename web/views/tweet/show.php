<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <h1></h1>
      <script type="text/javascript">
      (function($){
        $(document).ready(function () {
          $.ajax({
              type: "GET",
              url: "https://publish.twitter.com/oembed?url=https://www.twitter.com/<?php echo $this->tweet['tweet_author_name']; ?>/status/<?php echo $this->tweet['tweet_id']; ?>&align=center",
              dataType: "jsonp"
          }).done(function (data) {
              console.log(data.html);
            //  $("#raw").html(data.html);
          });
        });
        })(jQuery);
      </script>

      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#raw">raw</a></li>
        <li><a data-toggle="tab" href="#image">image</a></li>
      </ul>
      <div class="tab-content">
        <div class="panel panel-default" style="background-color: gray;">
          <div class="panel-body">
          <div id="raw" class="tab-pane fade in active">
            <!-- <i class="fa fa-spinner fa-6 fa-spin" style="font-size:50px; margin:50px; color:white;"></i> -->
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <div class="panel panelerror">
                  <div class="row">
                    <div class="col-xs-4 text-right">
                      <h4>
                        <i class="fa fa-minus-circle fa-6" aria-hidden="true" style="font-size:70px;"></i>
                      </h4>
                    </div>
                    <div class="col-xs-8">
                      <h4>this tweet has been reported as deleted.</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="image" class="tab-pane fade">

          </div>
          </div>
          <div class="panel-footer">
            <a href="//twitter.com/<?php echo $this->tweet['tweet_author_name']; ?>" target="_blank"><?php echo $this->tweet['tweet_author_screen_name']; ?> (@<?php echo $this->tweet['tweet_author_name']; ?>)</a>
             tweeted on blah
          </div>
        </div>
      </div>




      <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#share">share</a></li>
        <li><a data-toggle="tab" href="#advanced">advanced</a></li>
        <li><a data-toggle="tab" href="#download">download</a></li>
      </ul>

      <div class="tab-content">
        <div class="panel panel-default" style="background-color: lightgray;">
          <div id="share" class="tab-pane fade in active">
            embed code
            paste code

          </div>
          <div id="advanced" class="tab-pane fade">

          </div>
          <div id="download" class="tab-pane fade">
            click to download

          </div>
        </div>


      </div>
      <!-- <div class="panel-body">
        <div class="btn-group btn-group-justified">
          <a href="#" class="btn btn-primary">Apple</a>
          <a href="#" class="btn btn-primary">Samsung</a>
          <a href="#" class="btn btn-primary">download as image</a>
        </div>
      </div> -->

      <pre>
        <?php print_r($this->tweet); ?>
      </pre>
    </div>
    <div class="col-sm-4">

    </div>

  </div>
</div>
