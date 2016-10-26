<?php

require __DIR__ . '\..\twitter_search\database.php';
require __DIR__ . '\..\twitter_search\main.php';

$tweets = "";
$db = new Database('twitter'); 
$db -> createTable('tweets');
$db -> insertTweets($tweets);
$query = "theflash"; //change the search query
$since_id = "0";
$twitter = new TwitterTest();
//$tweets = $twitter->search2array($query, $since_id);
//var_dump($tweets);

$second_elapsed=0;

ini_set('max_execution_time', 300); //change max execution time

while ( $second_elapsed < 45 ) { //change 45 to whatever value you want
    echo 'Database twitter now has ' . $db->select_without_markup('select count(*) from tweets') . ' records.<br>';
    $since_id = $db->select_without_markup('select max(cast(id as signed integer)) from tweets');
    
    echo 'since_id=' . $since_id . '<br>';
    $tweets = $twitter->search2array($query, $since_id);
    echo "Tweets found: " . count($tweets) . '<br>';
    $db->insertTweets($tweets);
    flush();
    ob_flush();

    sleep(5);    
    $second_elapsed += 5;

    echo $second_elapsed . ' seconds elapsed ...<br><br>';
}
echo 'Completed!<br>';
?>