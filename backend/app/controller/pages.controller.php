<?php
class Pages extends controller
{
    public function __construct()
    {
    }
    public function index()
    {
        // echo "<h1>Wolcom to my MVC Framework</h1>";

        $info = json_decode(file_get_contents("php://input"));

        var_dump($info);

        // if($info->test === "S'inscrire"){
        //     die('ok');
        // }


    }
}
