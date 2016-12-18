<?php
/**
 *
 */
use Abraham\TwitterOAuth\TwitterOAuth;
class tweet_model extends Model
{


  function __construct()
  {
    parent::__construct();
  }

  public function insert($tweet)
  {

    //
		// $sth = $this->db->prepare('INSERT INTO data (text) VALUES (:text)');
		// $sth->execute(array(':text' => $text));
    //
		// $data = array('text' => $text, 'id' => $this->db->lastInsertId());
		// echo json_encode($data);

    $tweetdata = [];

    $url = explode('/', ltrim(parse_url($tweet->url, PHP_URL_PATH),'/'));
    $tweetdata['tweet_id'] =$url[2];
    $tweetdata['tweet_author_name'] = $url[0];
    $tweetdata['tweet_author_screen_name']=$tweet->author_name;
    $tweetdata['tweet_embed_html']=$tweet->html;

    // echo "<xmp>";
    // print_r($tweetdata);
    // echo "</xmp>";
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth=$this->db->prepare('INSERT INTO tweet (
      tweet_id,
      tweet_author_name,
      tweet_author_screen_name,
      tweet_embed_html
    ) VALUES
      (
        :tweet_id,
        :tweet_author_name,
        :tweet_author_screen_name,
        :tweet_embed_html
      )');
    $sth->execute(array(
      ':tweet_id'=>$tweetdata['tweet_id'],
      ':tweet_author_name'=>$tweetdata['tweet_author_name'],
      ':tweet_author_screen_name'=>$tweetdata['tweet_author_screen_name'],
      ':tweet_embed_html'=>base64_encode($tweetdata['tweet_embed_html'])
    ));
    return $tweetdata['tweet_author_name'] . '/status/'. $tweetdata['tweet_id'];
    // header('location: /'. );
    // if ($que->rowCount()>0) {
    //
    //
    // } else {
    //   header('location: /login');
    // }
  }

  public function get_tweet($id) {
    $res=$this->db->prepare('SELECT
      *
      FROM tweet
      WHERE tweet_id=:tweet_id;
    ');
    $res->execute(array(':tweet_id' => $id));
    return $res->fetchAll();
  }

  public function get_last_5()
  {
    $res=$this->db->prepare('
    select * from tweet order by date desc limit 5 ;
    ');
    $res->execute();
    return $res->fetchAll();
  }
}
 ?>
