<?php
/**
 * Created by PhpStorm.
 * User: michaelkantor
 * Date: 1/17/15
 * Time: 7:07 PM
 */
use Schema;

class DbController extends BaseController {


    public function store(){
        $randInt = mt_rand(100,999);
        $randString = Str::random(5);
        $db = "wp_{$randInt}{$randString}";
        /*
      return DB::connection()->statement('CREATE DATABASE :schema', ['schema' => "wp_{$randString}{$randInt}"]);
      */
        $servername  = "localhost";
        $username    = $_ENV["dbusername"];
        $password    = $_ENV["dbpassword"];

        $conn = new mysqli($servername, $username, $password);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "CREATE DATABASE {$db}";
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }

        $conn->close();
    }
} 