<?php
/**
 * Created by PhpStorm.
 * User: michaelkantor
 * Date: 1/17/15
 * Time: 7:07 PM
 */
use Schema;

class DbController extends BaseController {


    public function create(){
        return View::make('db.create');
    }


    public function store(){
        $randInt = mt_rand(100,999);
        $randString = Str::random(5);
        $db = "wp_{$randInt}{$randString}";

        $servername  = "localhost";
        $username    = $_ENV["dbusername"];
        $password    = $_ENV["dbpassword"];

        $conn = new mysqli($servername, $username, $password);

        if ($conn->connect_error) {
            return "failed";
        }
        $sql = "CREATE DATABASE {$db}";

        if (!$conn->query($sql) === TRUE) {
            return "Failed";
        }
        $conn->close();

        return "Your New Db Is Called : {$db}";
    }
} 