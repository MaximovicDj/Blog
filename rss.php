<?php

//php RSS FEED
require_once "admin/init.php";

$db = new Database();
$db->query("SELECT * FROM viewposts ORDER BY id DESC");
$posts = $db->resultSet();
$xml = new SimpleXMLElement("<?xml version='1.0' encoding='utf-8'?><root></root>");
foreach($posts as $post){
  $news = $xml->addChild("news");
  $news->addAttribute("id", $post->id);
  $news->addChild("title", $post->title);
  $news->addChild("author", $post->email);
  $news->addChild("category", $post->name);
  $news->addChild("link", "http://localhost/blog/post.php?id={$post->id}");
}
header("Content-type: text/xml");
echo $xml->asXML();

 ?>
