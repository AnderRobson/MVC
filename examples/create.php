<?php

    require __DIR__."/../vendor/autoload.php";

    /**@author : Ander Robson
     *
     * Description : Devemos importar as classes necessárias para gerar o registro no Banco de Dados.
     */
    use Source\Models\User;
    use Source\Models\Address;

    /**@author : Ander Robson
     *
     * Description : Devemos instanciar a classe, logo apos passamos todos os valores necessário para gerear o registro.
     */
    $user = new User();
    $user->frist_name = "Andrielle";
    $user->last_name = "Vitoria";
    $user->genre = "F";

    $user->save();

    /**@author : Ander Robson
     *
     * Description : Fornecendo as informações necessárias para gerar o registro na tabela de associação.
     */
//    $addr = new Address();
//    $addr->add($user, "Nome da rua", "22b");
//    $addr->save();

    var_dump($user);
