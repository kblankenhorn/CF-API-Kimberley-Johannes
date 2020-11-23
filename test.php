<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-between">
        <h1>BBC</h1>
<?php
require_once 'RESTful.php';
$url = 'http://feeds.bbci.co.uk/news/technology/rss.xml';
$response = curl_get($url);
$xml = simplexml_load_string($response);
echo '
<div class="row" id="bbcnews">
    <div class="col-md-12 text-center mt-5">
        <img src="'.$xml->channel->image->url.'" alt="'.$xml->channel->title.'">
        <h4>'.$xml->channel->title.'</h4>
    </div>
</div>
';
?>

<?php
foreach ($xml->channel->item as $item) {
echo '
<div class="col-md-4">
<div class="border border-info rounded-lg m-2 p-3">
<p><sub>'.$item->pubDate.'</sub></p>
<h4><a class="text-info" href="'.$item->link.'" target="_blank">'.$item->title.'</a></h4>
<p>'.$item->description.'</p>
<p><a href="'.$item->link.'" target="_blank" class="btn btn-info btn-sm">Read more</a></p>
</div>
</div>';
}
?>

<h1>CNN</h1>
<?php
require_once 'RESTful.php';
$url = 'http://rss.cnn.com/rss/edition_technology.rss';
$response = curl_get($url);
$xml = simplexml_load_string($response);
foreach ($xml->channel->item as $item) {
    echo '
    <div class="col-md-4">
    <div class="border border-danger rounded-lg m-2 p-3">
    <p><sub>'.$item->pubDate.'</sub></p>
    <h4><a class="text-info" href="'.$item->link.'" target="_blank">'.$item->title.'</a></h4>
    <p>'.$item->description.'</p>
    <p><a href="'.$item->link.'" target="_blank" class="btn btn-info btn-sm">Read more</a></p>
    </div>
    </div>';
    }
?>

<?php
require_once 'RESTful.php';
$url = 'http://api.serri.codefactory.live/random/';
$response = curl_get($url);
$result = json_decode($response);
echo $result->joke;
?>
</div>
</div>
</body>
</html>
