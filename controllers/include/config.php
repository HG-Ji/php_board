<?php
class init_Config
{
    public $title = '자유게시판';
    public $sub_title = '자유게시판';
    public $base_URL;
    public $root_path;
    public $error_message = 'on';

    public $host = 'localhost';
    public $userid = 'root';
    public $password = 'admin';
    public $dbname = 'php_board';


    function __construct()
    {
        $this->base_URL = ($_SERVER['SERVER_PORT'] != '80') ? $_SERVER['HTTP_HOST'] . ':' . $_SERVER['SERVER_PORT'] : $_SERVER['HTTP_HOST'];
        $this->root_path = $this->base_URL;
    }

}

