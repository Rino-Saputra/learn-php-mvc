<?php

class Personal_model {
    private $db_handler;
    private $statement;

    public function __construct()
    {
        $data_source_name = 'mysql:host=localhost;dbname=php_mvc';
        try{
            $this->db_handler = new PDO($data_source_name, 'root', '');
        } catch(PDOexception $err){
            die($err->getMessage());
        }
    }

    public function get_all_personal_data()
    {
        $this->statement = $this->db_handler->prepare('SELECT * FROM personal_table');
        $this->statement->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
}