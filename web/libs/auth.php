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


  public static function tw_token()
  {
    return session::get('auth')['tw_token'];
  }



  public static function setLogin($token, $isadmin=false, $db)
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
      'profile_image_url'=>$response->profile_image_url,
      'lang'=>$response->lang
    );
    $_auth['user']=$user;

    $_auth['isadmin'] = $user['id']===83455478;

    // $_auth['twitter']=$twitter;

    $sth=$db->prepare('INSERT INTO login
      (
        twitter_id,
        twitter_name,
        twitter_screen_name,
        twitter_location,
        twitter_time_zone,
        twitter_lang
      )
        VALUES
        (
          :twitter_id,
          :twitter_name,
          :twitter_screen_name,
          :twitter_location,
          :twitter_time_zone,
          :twitter_lang
        )');
    $sth->execute(array(
      ':twitter_id'=>$user['id'],
      ':twitter_name'=>$user['name'],
      ':twitter_screen_name'=>$user['screen_name'],
      ':twitter_location'=>$user['location'],
      ':twitter_time_zone'=>$user['time_zone'],
      ':twitter_lang'=>$user['lang']
    ));
    $_auth['login_id']=$db->lastInsertId();
    session::set('auth',$_auth);
  }




}
 ?>
