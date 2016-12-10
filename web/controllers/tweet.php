<?php
/**
 *
 */
class tweet extends Controller
{

  function __construct(argument)
  {
    parent::__construct();
  }

  function index()
  {
    $twitter = new TwitterOAuth(
      tw_consumer_key,
      tw_consumer_secret,
      $token['oauth_token'],
      $token['oauth_token_secret']
    );
  }
}
 ?>
