<?php

class Database {
    
public function __construct($dbname) {
        define('MYSQL_USER', 'root');
        define('MYSQL_PASS', 'pass12');
        
        $dsn = 'mysql:host=localhost;dbname=' . $dbname;
        
        try {
            $this->connection = new PDO($dsn, MYSQL_USER, MYSQL_PASS);
            echo 'Successful.<br>';
        } catch (PDOException $e) {
            echo 'Exception encountered: ' . $e->getMessage() . '<br>';
            echo MYSQL_USER;
            echo MYSQL_PASS;
            echo 'Creating database ' . $dbname . ' ......<br>';
            $check = strpos($e->getMessage(), 'Unknown database');
            if ( $check != false ) {
                // The exception is due to unknown database
                // create the database and the table
                try {
                    $this->connection = new PDO('mysql:host=localhost', MYSQL_USER, MYSQL_PASS);
                    $this->connection->exec("create database " . $dbname);
                    echo $dbname . ' database has been created.<br>';
                } catch (PDOException $e) {
                    echo 'Exception encountered: ' . $e->getMessage() . '. Abort!<br>';
                    exit();
                }
            }
        }

    }
    
    public function createTable($table_name){
        $sql = "use twitter;
                create table " . $table_name . " (
                id VARCHAR(30) NOT NULL,
                date DateTime,
                name VARCHAR(30),
                screen_name VARCHAR(30),
                description VARCHAR(100),
                text VARCHAR(140),
                PRIMARY KEY (id)
                )";
        try {
            $this->connection->exec($sql);
            echo 'Table ' . $table_name . ' has been created successfully.<br><br>';
        } catch (PDOException $e) {
            echo 'Exception encountered: ' . $e->getMessage() . '<br>';
        }
    }
    
    public function insertTweets($array_tweets){
        $sql = "INSERT INTO tweets "
                . "(id, date, name, screen_name, description, text) "
                . "VALUES (:id, :date, :name, :screen_name, :description, :text)";
        try {
            $statement = $this->connection->prepare($sql);
            if(is_array($array_tweets))
            {
            foreach($array_tweets as $tweet) {
                //var_dump($tweet);
                
                $parameters = array(
                    ':id' => $tweet->id,
                    ':date' => date('Y-m-d H:i:s', strtotime($tweet->created_at)),
                    ':name' => $tweet->user->name,
                    ':screen_name' => $tweet->user->screen_name,
                    ':description' => $tweet->user->description,
                    ':text' => $tweet->text
                );
                $statement->execute($parameters);
            }
            }
        } catch (Exception $ex) {
            echo 'Exception encountered: ' .$ex->getMessage() . '<br>';
        }
    }
    
    public function select_without_markup($sql) {
        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            
            $output = '';
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                foreach($row as $key => $value) {
                    $output .= $value;
                }
            }
            return $output;
            
        } catch (Exception $ex) {
            return 'Something wrong: ' . $ex->getMessage() . '<br>';
        }
    }

}

