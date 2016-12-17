<?php

/**
 *
 */
use Abraham\TwitterOAuth\TwitterOAuth;
class auth extends session
{
  private $_auth = array();

  function __construct()
  {
    parent::__construct();
    parent::init();
  }

  public static function isauth()
  {
    if (session::get('auth')) {
      return true;
    } else {
      return false;
    }
  }

  public static function isadmin()
  {
    if ($this->isauth()) {
      return true;
    }
  }



  public function kill()
  {
    session::remove('auth');
    return false;
  }

  public static function getuser()
  {
    return session::get('auth')['user'];
  }

  public static function getTwitter()
  {
    return session::get('auth')['twitter'];
  }

  public static function setLogin($token, $isadmin=false)
  {
    $_auth['tw_token']=$token;
    $twitter=new TwitterOAuth(
      tw_consumer_key,
      tw_consumer_secret,
      $token['oauth_token'],
      $token['oauth_token_secret']
    );
    $response = $twitter->get('account/verify_credentials');
    $user = array(
      'id'=>$response->id,
      'name'=>$response->name,
      'screen_name'=>$response->screen_name,
      'location'=>$response->location,
      'time_zone'=>$response->time_zone,
      'verified'=>$response->verified,
      'profile_image_url'=>$response->profile_image_url
    );
    $_auth['user']=$user;
    $_auth['twitter']=$twitter;
    $_auth['isadmin']=$isadmin;
    session::set('auth',$_auth);
  }




}
 ?>
