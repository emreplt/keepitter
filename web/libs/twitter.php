<?php
/**
 *
 */
use Abraham\TwitterOAuth\TwitterOAuth;
class twitter
{
  private $_twitter = null;
  function __construct()
  {
    if (auth::isauth()) {
      $_twitter = new TwitterOAuth(
        tw_consumer_key,
        tw_consumer_secret,
        auth::tw_token()['oauth_token'],
        auth::tw_token()['oauth_token_secret']
      );
    }

  }

  public static function gettwitter()
  {
    // return $_twitter;
    return new TwitterOAuth(
      tw_consumer_key,
      tw_consumer_secret,
      auth::tw_token()['oauth_token'],
      auth::tw_token()['oauth_token_secret']
    );
  }
}
 ?>
