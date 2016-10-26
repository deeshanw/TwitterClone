<html>
<head>
<title>Twitter</title>
<link href='https://fonts.googleapis.com/css?family=Roboto:500' rel='stylesheet' type='text/css'>
<style> 
    
    body { background: #C0DEED; background-attachment: fixed;  font-family: "Roboto", sans-serif;  color: black;}
    a {color: black; text-decoration: underline;}
    
    img {
                -webkit-filter: drop-shadow(5px 5px 5px rgba(0,0,0,0.3));
        }

    .flat-table {
		margin-bottom: 20px;
		border-collapse:collapse;
		border: none;
                -webkit-border-radius: 20px;
                -moz-border-radius: 20px;
                 border-radius: 20px;
	}
	.flat-table th, .flat-table td {
		box-shadow: inset 0 -1px rgba(0,0,0,0.25), 
			inset 0 1px rgba(0,0,0,0.25);
	}
	.flat-table th {
		font-weight: normal;
		-webkit-font-smoothing: antialiased;
		padding: 1em;
		font-size: 1.5em;
	}
	.flat-table td {
                color: rgba(0,0,0,.6);
		padding: 0.7em 1em 0.7em 1.15em;
		text-shadow: 0 0 1px rgba(255,255,255,0.1);
		font-size: 1.18em;
                max-width: 1000px;
                cursor: pointer;
	}
	.flat-table tr {
		-webkit-transition: background 0.3s, box-shadow 0.3s;
		-moz-transition: background 0.3s, box-shadow 0.3s;
		transition: background 0.3s, box-shadow 0.3s;
	}
	.flat-table-1 {
                box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.10), 0 6px 10px 0 rgba(0, 0, 0, 0.10);
                /*background: #FFFFFF;*/
                background-color: #F0F0F0;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		/*background-color: rgba(0,0,0,0.4);*/
                padding: 0.5em;
	}
	.flat-table-1 tr:hover {
		background: rgba(0,0,0,0.1);
	}

        .hah { 			
			
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                text-align: center;
                width:1500px;
                height:500px;
                -webkit-border-radius: 20px;
                -moz-border-radius: 20px;
                 border-radius: 20px;
	}
                
        .cf:before, .cf:after{
                content:"";
                display:table;
        }   

        .cf:after{
                clear:both;
        }

        .cf{
                zoom:1;
        }    
                
        .form-wrapper {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                font-family: 'Roboto', sans-serif;
                text-align: center;
                width: 320px;
                padding: 15px;
                margin: 150px auto 50px auto;
                background: #F0F0F0;
                -webkit-border-radius: 20px;
                -moz-border-radius: 20px;
                border-radius: 20px;
        }

        input[type="submit"] {
  
            background: #55acee;
            color: white;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2), 0 3px 5px 0 rgba(0, 0, 0, 0.2);
            border-style: none;
            font-family: 'Roboto', sans-serif;
            /*color: #5eaade;*/
            font-size: 1em;
            cursor: pointer;
            cursor: hand;
            -webkit-border-radius: 7px;
            -moz-border-radius: 7px;
            border-radius: 7px;
        }
        

        input[type="text"] {
            background: #55acee;
            color:white;
            text-align: center;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2), 0 3px 5px 0 rgba(0, 0, 0, 0.2);
            border-style: none;
            /*color: #5eaade;*/
            font-size: 1.1em;
            font-family: 'Roboto', sans-serif;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }

        input:-webkit-autofill {
            -webkit-box-shadow: white;
            -webkit-text-fill-color: black !important
        }
        ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
            color: rgba(255,255,255,.8);
            font-style: italic;
            text-align: center;
            font-size: 0.9em;
        }
        
        :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
             color: rgba(255,255,255,.4)
        }
        ::-moz-placeholder { /* Mozilla Firefox 19+ */
             color: rgba(255,255,255,.4)
        }
        
        input:focus::-webkit-input-placeholder { color:transparent; }yes
        input:focus:-moz-placeholder { color:transparent; } /* FF 4-18 */
        input:focus::-moz-placeholder { color:transparent; } /* FF 19+ */
        input:focus:-ms-input-placeholder { color:transparent; } /* IE 10+ */

</style>

<?php

require __DIR__ . "\autoload.php"; 

$username = filter_input(INPUT_POST, 'name');

use Abraham\TwitterOAuth\TwitterOAuth; 

class TwitterTest {
    
    private $twitter; 
    public $bg; 
    public $banner;
            
            public function __construct() {
                
                if (!defined('CONSUMER_KEY')) define('CONSUMER_KEY', 'consumer_key_goes_here'); //enter your consumer key here
                if (!defined('CONSUMER_SECRET')) define('CONSUMER_SECRET', 'consumer_secret_goes_here'); //enter your consumer secret here
                if (!defined('ACCESS_TOKEN')) define('ACCESS_TOKEN', 'access_token_goes_here');  //enter your access token here
                if (!defined('ACCESS_TOKEN_SECRET')) define('ACCESS_TOKEN_SECRET', 'access_token_secret_goes_here'); //enter your access token secret here
                
                $this->twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
            }
            
            public function getFormData() {
                
                global $username;
                
                $userT = filter_input(INPUT_POST, 'userTimeline');
                
                if(isset($userT)) {
                    
                    $this->getUserTimeline();
                }
                
                $mentionsT = filter_input(INPUT_POST, 'mentionsTimeline');
                
                if(isset($mentionsT)) {
                    
                    $this->getMentionsTimeLine();
                }
                
                $homeT = filter_input (INPUT_POST, 'homeTimeline');
                
                if(isset($homeT)) {
                    
                    $this->getHomeTimeLine();
                }
                
                if(isset($username)) {
                    
                    $this->getCustomUser($username);
                }
                
                $favorite = filter_input(INPUT_POST, 'favorite');
                
                if(isset($favorite)) {
                    
                    $this->favoritesCreate($favorite);
                }
            }
            
            public function getUserTimeLine() { 
                
                global $username;
                
                $username = '';
                
                $banner = $this->twitter->get('users/profile_banner');
                
                if($this->twitter->getLastHttpCode() == 404) {
                    
                   $banner = '';
                }
                    
                $result = $this->twitter->get('statuses/user_timeline', ['count'=>50]);
                
                if ($this->twitter->getLastHttpCode() == 200) { 
                    
                    $this->retrieveTweet($result, $banner);
                }
            } 
            
            public function getHomeTimeLine() { 
                
                global $username;
                
                $username = '';
                
                $banner = $this->twitter->get('users/profile_banner');
                
                if($this->twitter->getLastHttpCode() == 404) {
                    
                   $banner = '';
                }
                    
                $result = $this->twitter->get('statuses/home_timeline', ['count'=>50]);
                
                if ($this->twitter->getLastHttpCode() == 200) { 
                    
                    $this->retrieveTweet($result, "", "", 0, "#F58FA");
                }
            } 
            
            
            public function getMentionsTimeLine() {
                
                global $username;
                
                $username = '';
                    
                $banner = $this->twitter->get('users/profile_banner');
                
                
                
                if($this->twitter->getLastHttpCode() == 404) {
                    
                   $banner = '';
                }
                
                $result = $this->twitter->get('statuses/mentions_timeline', ['count'=>50]);
                
                if ($this->twitter->getLastHttpCode() == 200) { 
                    
                        $this->retrieveTweet($result,$banner,"","","#F58FA");
                }
                else {
                    var_dump($result);
                }
            } 
            
            public function getCustomUser($username) {
               
                $result = $this->twitter->get('statuses/user_timeline', ['screen_name'=> $username]);
                
                $banner = '';
         
                if ($this->twitter->getLastHttpCode() == 200) { 
                    
                    if(isset($result[0]->user->profile_banner_url)) { 
                        
                    $banner = $result[0]->user->profile_banner_url;
                    
                    }   
                    if($username!= '') {
                        
                        $this->retrieveTweet($result,$banner);
                    }
                }           
                
            }
            
            function search2array($query, $since_id) {
                
             $parameters =  array('q' => $query, 'since_id' => $since_id, 'count'=>10);   
             
             $result = $this->twitter->get('search/tweets', $parameters);
             
             return $result->statuses;
            
            }
            
            public function favoritesCreate($favorites) {
            
                $result = $this->twitter->post('favorites/create', ['id' => $favorites]);
            
                if ($this->twitter->getLastHttpCode() == 403) {
                
                    $result->errors[0]->code;
                } 
            
                else {
                
                    $this->twitter->getLastHttpCode();
                }
                
            }
            
            
            public function retrieveTweet($result, $banner='', $bg='' ,$checkbg=1, $bc='') {
                if(is_array($result)) {
                    echo '<center><table border=0 class="flat-table flat-table-1">'; 
                    //echo '<th>Date</th><th>User Name</th><th>Image</th><th>Text</th><th>Link</th><th>Favorites</th><th>Retweets</th>'; 
                    $bg = $result[0]->user->profile_background_image_url;
                    if($bc!="#F58FA") {
                    $bc = $result[0]->user->profile_background_color;
                    }
                    $lc = $result[0]->user->profile_link_color;
                    $profilec = $result[0]->user->profile_text_color;
                    $checkbg = $result[0]->user->profile_use_background_image;
                    $date = '';
                    foreach($result as $tweet) {
                        $item = array(); 
                        $date = $tweet->created_at;
                        $item[] = '<span style="color:#' . $profilec . ';">' . date("D d M y H:i:s", strtotime($date)) . "</span>";
                        if (isset($tweet->retweeted_status)) {
                        $tweet = $tweet->retweeted_status;
                        }
                        $item[] = '<span style="color:#' . $profilec . ';">' . $tweet->user->name . "</span>";
                        $item[] = '<img src=' . $tweet->user->profile_image_url_https . '>';
                        $text = $tweet->text;
                        if (isset($tweet->entities->urls)) { 
                            foreach ($tweet->entities->urls as $url) {
                            $text = str_replace($url->url, "<a href='".$url->expanded_url."' style=color:#". $lc . ">" . $url->display_url."</a>", $text);
                            }
                        }
                        if (isset($tweet->entities->media)) { 
                            foreach ($tweet->entities->media as $url) {
                            $text = str_replace($url->url, "<a href='".$url->expanded_url."' style=color:#". $lc . ">" . $url->display_url."</a>", $text);
                            }
                        }
                        $item[] = $text;

                        //$item[] = '<a href=' . "https://twitter.com/" . $tweet->user->screen_name . "/status/" . $tweet->id . ' target="_blank">Link</a>';
                        $item[] = '<span style="color:#' . $profilec . ';">' . $tweet->favorite_count . "</span>";
                        $item[] = '<span style="color:#' . $profilec . ';">' . $tweet->retweet_count . "</span>"; 
                        echo  "<tr onclick='location.href=\" https://twitter.com/" . $tweet->user->screen_name . '/status/' . $tweet->id . "\"' target='_blank'/><td>" . implode("</td><td>", $item) . "</td></tr>";  
                    }
                    
                    if($banner!='') {
                    echo '<center><img src=' . $banner . ' alt="Banner" class="hah" ></center><br>';
                    }
                   
                    if($checkbg==1 AND $bc!="#F58FA") {
                        if($bg=="http://abs.twimg.com/images/themes/theme1/bg.png") {
                        echo '<style>body { background: url("' . $bg . '") top repeat-x;}</style>';
                        echo '<style>body { background-color: #C0DEED }</style>';
                        }
                        else {
                        echo '<style>body { background: url("' . $bg . '");}</style>';
                        }
                    }
                    else {
                    echo '<style>body { background-color: #' . $bc . '}</style>';
                    
            
                    }
                    echo '</table></center><br>';
                }      
            }
}

$t = new TwitterTest(); 
$t -> getFormData();

?>
</head>
<body>
    <div style="position:relative; margin-left: auto; margin-right: auto; height: 96px;">
    <img style ="position:relative; display:block; padding-left: 30px; margin-left: auto; margin-right: auto; width:304px;height:228px" src="https://g.twimg.com/Twitter_logo_blue.png" alt="Twitter Logo" >
    </div> 
    <div style="position:relative; margin-left: auto; margin-right: auto;">
    <form action="main.php" method="post" class="form-wrapper cf" >
	<p>
	<span style="font-size: 1.25em; color: rgba(0,0,0,.4);">Show Timelines<br /></span>
	<br />
    <input type="submit" value="User" name="userTimeline">&nbsp;
    <input type="submit" value="Mentions" name="mentionsTimeline">&nbsp;
    <input type="submit" value="Home" name="homeTimeline">
	</p>
	<p>
	<br />
    <span style="font-size: 1.25em; color: rgba(0,0,0,.4);">Search on Twitter<br /></span>
	<br />
    <input type="text" name="name" style="width:144px;" placeholder="Enter Username" onkeydown="if (event.keyCode === 13) { this.form.submit(); return false; }" >&nbsp;&nbsp;
    <input type="submit" value="Search" name="Search" style="width:64px;">
	</p>
	<p>
	<br />
    <span style="font-size: 1.25em; color: rgba(0,0,0,.4);">Favorite Tweet<br /></span>
	<br />
    <input type="text" name="favorite" style="width:144px;" placeholder="Enter Tweet ID"  onkeydown="if (event.keyCode === 13) { this.form.submit(); return false; }">&nbsp;&nbsp;
    <input type="submit" value="Go" style="width:64px;"><br><br>
    </p>
    </form>
    </div>
</body>
</html>