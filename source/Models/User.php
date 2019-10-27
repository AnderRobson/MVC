<?php

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class User extends DataLayer
    {
        /**@author : Ander Robson
         *
         * Description : Método construtor da classe @param User.
         *
         * @example
         * parent::__construct("nome_tabela", ["compo_obrigatorio_da_tabela"], "nome_do_id", true = Tem os campos created_at && updated_at / false = Não tem os campos created_at && updated_at);
         */
        public function __construct()
        {
            parent::__construct("users", ["frist_name", "last_name"], "id", true);
        }

        /**@author : Ander Robson
         *
         * Description : Realiza a ligação da segunda tabela (INNER JOIN).
         *
         * @example
         * return (new NomeDaClass())->find("nome_segunda_tabela = :tabela_atual", "tabela_atual={tabela_atual_recebendo_id}")->fetch(true = Trazer todas as ocorencias);
         */
        public function addresses()
        {
            return (new Address())->find("user_id = :uid", "uid={$this->id}")->fetch(true);
        }
    }