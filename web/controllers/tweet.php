<?php
/**
 *
 */
class tweet extends Controller
{
  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $this->view->render('tweet/index');
  }

  function get_insert(){
    $this->view->render('tweet/insert');
  }

  function post_insert()
  {
    $permalink = $_POST['permalink'];
    if (!$permalink) {
      $this->view->error='it\'s empty';
      $this->view->render('tweet/insert');
      die;
    }
    if (!preg_match('/^(http(?:s)?:\/\/)?((www\.twitter\.com)|(twitter\.com))\/([a-zA-Z0-9_]+)\/status\/([0-9]+)$/',$permalink)) {
      $this->view->error='this\'s not a twitter link';
      $this->view->permalink=$permalink;
      $this->view->render('tweet/insert');
      die;
    }
    //
    // if ($this->model->get_tweet()) {
    //
    // }

    $twitter=twitter::gettwitter();

    $result = $twitter->get('statuses/oembed', array('url'=>$permalink, 'align'=>'center'));
    if ($result->errors) {
      $this->view->error='twit bulunamadı';
      $this->view->permalink=$permalink;
      $this->view->render('tweet/insert');
      die;
    }

    $response=$this->model->insert($result);
    header('location: /'. $response);



    // $this->view->data=$result;
    // $this->view->render('tweet/insert');



    // $ch = curl_init();
    // $timeout = 5;
    //
    // curl_setopt($ch, CURLOPT_URL, $permalink);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_HEADER, false);
    // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    //
    // $data = curl_exec($ch);
    //
    // curl_close($ch);
    //
    // $dom=new DOMDocument;
    // $dom->validateOnParse=false;
    // $dom->standalone=true;
    // $dom->preserveWhiteSpace=true;
    // $dom->strictErrorChecking=false;
    // $dom->substituteEntities=false;
    // $dom->recover=true;
    // $dom->formatOutput=false;
    // /* Load the XML data */
    // libxml_use_internal_errors(true);
    // $dom->loadXML($data);
    // libxml_clear_errors();
    //
    // $this->view->data=$dom->getElementsByTagName('head')->getElementsByTagName("meta");
    // $this->view->render('tweet/insert');
    // die;
    //





    // $this->model->insert();
    // $url = explode('/', ltrim(parse_url($_POST['permalink'], PHP_URL_PATH),'/'));
    // $tweet_author = $url[0];
    // $tweet_id =$url[2];
  }

  function get_show($id)
  {
    $tweet = $this->model->get_tweet($id);
    // print_r($tweet);
    if ($tweet) {
      $this->view->tweet=$tweet[0];
      $this->view->render('tweet/show');
    } else {
      $this->view->render('tweet/not_found');
    }
  }
}
 ?>
