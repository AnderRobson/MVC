<?php

    require __DIR__."/../vendor/autoload.php";

    /**@author : Ander Robson
     *
     * Description : Devemos importar as classes necessárias para buscar os registros no Banco de Dados.
     */
    use Source\Models\User;

    $user = new User();
    $list = $user->find()->fetch(true);

    /**@var  $userItem User */
    foreach ($list as $userItem) {
//        var_dump($userItem->data());

        foreach ($userItem->addresses() as $address) {
            var_dump($address->addr_id);
        }
    }

