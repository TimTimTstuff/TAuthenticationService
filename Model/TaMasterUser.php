<?php
namespace Model  ;

    class TaMasterUser extends DbMasterRecord  {
        /**
         * Primary Key
         *
         * @var int
         * @DBMapper {"index":"primary","auto_increment":true}
         */
        public $masterUserId;
        /**
         * main login / profile name
         *
         * @var string
         * @DBMapper {"size":100,"index":"UNIQUE"}
         */
        public $name;
        /**
         * main login / profile name
         *
         * @var string
         * @DBMapper {"size":255,"index":"UNIQUE"}
         */
        public $email;
        /**
         * main login / profile name
         *
         * @var string
         * @DBMapper {"size":512}
         */
         public $password;
    }