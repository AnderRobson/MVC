<?php

    require __DIR__."/../vendor/autoload.php";

    /**@author : Ander Robson
     *
     * Description : Devemos importar as classes necessárias para deleter o registro no Banco de Dados.
     */
    use Source\Models\User;
    use Source\Models\Address;

    /**@author : Ander Robson
     *
     * Description : Devemos instanciar a classe, logo apos passamos o id do registro cujo queremos deletar.
     *
     * @example
     * $varivavel = (new Classe())->findById($id_do_usuario)
     */
    $user = (new User())->findById(6);
    if ($user) {
        $user->destroy();
        echo "Registro deletado com sucesso!<br>";
    } else {
        echo "Ops.. Problemas ao deletado o registro!<br>";
    }

    /**@author : Ander Robson
     *
     * Description : Fornecendo o id do registro cujo queremos deletar na segunda tabela e pertence ao mesmo registro da tabela acima.
     */
    $addr = (new Address())->findById(5);
    if ($addr) {
        $addr->destroy();
        echo "Registro deletado com sucesso!<br>";
    } else {
        echo "Ops.. Problemas ao deletado o registro!<br>";
    }

//    var_dump($user);
