<?php
/**
 *
 */
use Abraham\TwitterOAuth\TwitterOAuth;
class login_model extends Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function run()
  {
    $que=$this->db->prepare("SELECT id FROM users WHERE username=:username AND password=:password");
    $que->execute(array(
      ':username'=>$_POST['username'],
      ':password'=>$_POST['password']
    ));
    if ($que->rowCount()>0) {
      session::set('loggedIn',true);
      header('location: /profile');
    } else {
      header('location: /login');
    }
  }

  public function authorize()
  {

    $twitteroauth = new TwitterOAuth(tw_consumer_key, tw_consumer_secret);

    $request_token = $twitteroauth->oauth('oauth/request_token', array('oauth_callback' => tw_url_callback));

    // if($twitteroauth->getLastHttpCode() != 200) {
    //   throw new \Exception('There was a problem performing this request');
    // }
    session::init();
    session::set('tw_oauth_token',$request_token['oauth_token']);
    session::set('tw_oauth_token_secret',$request_token['oauth_token_secret']);
    session::set('dede','sasdasd');

    $url = $twitteroauth->url(
      'oauth/authorize', array('oauth_token' => $request_token['oauth_token'])
    );

    // and redirect
    header('Location: '. $url);
  }

  public function callback()
  {
    // $oauth_verifier = filter_input(INPUT_GET, 'oauth_verifier');
    //
    // if (empty($oauth_verifier) || empty(session::get('tw_oauth_token')) || empty(session::get('tw_oauth_secret'))) {
    //     // something's missing, go and login again
    //     header('Location: ' . tw_url_login);
    // }
    session::init();
    $request_token = array();
    $request_token['oauth_token'] = session::get('tw_oauth_token');
    $request_token['oauth_token_secret'] = session::get('tw_oauth_token_secret');


    // connect with application token
    $connection = new TwitterOAuth(
      tw_consumer_key,
      tw_consumer_secret,
      $request_token['oauth_token'],
      $request_token['oauth_token_secret']
    );


    // request user token
    $token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));

    $twitter = new TwitterOAuth(
      tw_consumer_key,
      tw_consumer_secret,
      $token['oauth_token'],
      $token['oauth_token_secret']
    );

    print_r($token);
    //
    // $status = $twitter->post(
    //   "statuses/update", [
    //     "status" => "m2m dene".date("Y-m-d h:i:sa")
    //   ]
    // );
    //
    // echo ('Created new status with #' . $status->id . PHP_EOL);
  }

  public function create()
  {

  }
}
 ?>
