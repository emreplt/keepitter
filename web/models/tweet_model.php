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

  public function insert()
  {
    $url = explode('/', ltrim(parse_url($_POST['permalink'], PHP_URL_PATH),'/'));
    $tweet_author = $url[0];
    $tweet_id =$url[2];
    //
		// $sth = $this->db->prepare('INSERT INTO data (text) VALUES (:text)');
		// $sth->execute(array(':text' => $text));
    //
		// $data = array('text' => $text, 'id' => $this->db->lastInsertId());
		// echo json_encode($data);


    $sth=$this->db->prepare('INSERT INTO tweet (tweet_id,tweet_author) VALUES (:tweet_id, :tweet_author)');
    $sth->execute(array(
      ':tweet_id'=>$tweet_id,
      ':tweet_author'=>$tweet_author
    ));
    header('location: /'. $tweet_author . '/status/'. $tweet_id .'?id='.$this->db->lastInsertId());

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
}
 ?>
