<?php

    require __DIR__."/../vendor/autoload.php";

    /**@author : Ander Robson
     *
     * Description : Devemos importar as classes necessárias para editar o registro no Banco de Dados.
     */
    use Source\Models\User;
    use Source\Models\Address;

    /**@author : Ander Robson
     *
     * Description : Devemos instanciar a classe, logo apos passamos todos os valores necessários para editar o registro.
     *
     * @example
     * $varivavel = (new Classe())->findById($id_do_usuario)
     */
    $user = (new User())->findById(5);
    $user->frist_name = "Andressa";
    $user->last_name = "Teixeira";

    $user->save();


    /**@author : Ander Robson
     *
     * Description : Fornecendo as informações necessárias para editar o registro na tabela de associação.
     *
     * @var $user User
     */
    $addr = (new Address())->findById(4);
    $addr->add($user, "Av. dos Prazeres", 1287);
    $addr->save();

    var_dump($user);
