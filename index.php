<?php
    require __DIR__."/vendor/autoload.php";
    
    use Source\Support\Email;

    $email = new Email();

    /**@author : Ander Robson
     *
     * Description : E-mail sem anexo;
     */
    $email->add("Olá Mundo",
                  "<h1>Estou apenas testando!</h1>Espero que tenha dado certo.",
           "Robson V. Leite",
          "ander.robson@hotmail.com")->send();

    if (!$email->error()) {
        var_dump(true);
    } else {
        echo $email->error()->getMessage();
    }

    /**@author : Ander Robson
     *
     * Description : E-mail com anexo.
     */
    $email->add("Olá Mundo",
        "<h1>Estou apenas testando!</h1>Espero que tenha dado certo.",
        "Robson V. Leite",
        "ander.robson@hotmail.com")->attach(
            "files/01.jpg",
           "PHPTips - Aula-003"
    )->send();

    if (!$email->error()) {
        var_dump(true);
    } else {
        echo $email->error()->getMessage();
    }