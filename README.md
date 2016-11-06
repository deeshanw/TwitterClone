# TwitterClone

Album of images: https://imgur.com/a/SLFbH

Twitter API implementation with a decent UI. Has the ability to retrieve User, Mentions and Home timelines, look up users and favorite tweets by ID.

Edit twitter_search/main.php and replace placeholders with API keys to get started. 

You must have xampp/software of your choice installed. Clone the repository into your htdocs directory and open localhost/twitter_search/main.php in a web browser. 

Additionally, you can set up a local mysql db and have the program query a keyword and store tweets that contain it in real time. 

To do so, edit the MYSQL_USER and MYSQL_PASS fields in the database class. 

You can also change the query and execution time here. Run database_test.php to start storing tweets. 
