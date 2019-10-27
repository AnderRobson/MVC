<?php

    namespace Source\Models;

    use CoffeeCode\DataLayer\DataLayer;

    class Address extends DataLayer
    {
        /**@author : Ander Robson
         *
         * Description : Método construtor da classe @param Address.
         *
         * @example
         * parent::__construct("nome_tabela", ["compo_obrigatorio_da_tabela"], "nome_do_id", true = Tem os campos created_at && updated_at / false = Não tem os campos created_at && updated_at);
         */
        public function __construct()
        {
            parent::__construct("addresses", ["user_id"], "addr_id", false);
        }

        /**@author : Ander Robson
         *
         * Description : Adicionando registro ao Banco de Dados.
         *
         * @param User $user
         * @param string $street
         * @param string $number
         *
         * @return Address
         */
        public function add(User $user, string $street, string $number): Address
        {
            $this->user_id = $user->id;
            $this->street = $street;
            $this->number = $number;

            return $this;
        }
    }