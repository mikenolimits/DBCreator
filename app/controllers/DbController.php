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
        return View::make('home');
    }


    public function store(){
        $randInt = mt_rand(100,999);
        $randString = Str::random(5);
        $db = "wp_{$randInt}{$randString}";

        $servername  = "localhost";
        $username    = $_ENV["dbusername"];
        $password    = $_ENV["dbpassword"];

        $d = new mysqli($servername, $username, $password);

        if ($d->connect_error) {
            return "failed";
        }
        $create = "CREATE DATABASE {$db}";

        if (!$d->query($create)) {
            return "Failed";
        }
        $d->close();

        return "Your New Db Is Called : {$db}";
    }
} 