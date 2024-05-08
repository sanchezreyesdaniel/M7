
<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => ""
);

echo '<br><br>';
$url = 'https://publish.twitter.com/oembed';
$getfield = '?url=https://twitter.com/Interior/status/507185938620219395';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();