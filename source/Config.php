<?php

    /** @author : Ander Robson
     *
     * Description : Estabelecendo a conexão com o Banco de Dados.
     */
    define("DATA_LAYER_CONFIG", [
        "driver" => "mysql",
        "host" => "localhost",
        "port" => "3306",
        "dbname" => "datalayer",
        "username" => "root",
        "passwd" => "",
        "options" => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]);

    /**@author : Ander Robson
     *
     * Description : PHPMailer
     * Desparo de e-mail
     * HOST SMTP
     */
    define("MAIL", [
       "host" => "smtp.sendgrid.net",
       "port" => "587",
       "user" => "apikey",
       "passwd" => "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",
       "from_name" => "Ander Robson",
       "from_email" => "ander.robson@mvc.com"
    ]);