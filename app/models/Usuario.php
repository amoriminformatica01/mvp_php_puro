<?php

class Usuario {
    private $db;
    private $table = 'usuarios';
    
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM {$this->table}");
		return $this->db->resultSet();
    }

    public function store($data)
	{
        try{
            $this->db->query("INSERT INTO {$this->table} (LOGIN, SENHA, ATIVO, NOME_COMPLETO) VALUES (:login, :senha, :ativo, :nome)");
		
            $this->db->bind(':login', $data->login);
            $this->db->bind(':senha', $data->senha);
            $this->db->bind(':ativo', $data->ativo);
            $this->db->bind(':nome', $data->nome);
            
            return $this->db->execute();
        }catch (PDOException $e) {
			print_r($e->getMessage());
			die;
		}
		
    }
    
    public function login($data)
    {
        // return json_encode($data);
        $this->db->query("SELECT * from {$this->table} where LOGIN = :login and SENHA = :senha");
        
        $this->db->bind(':login', $data->login);
        $this->db->bind(':senha', $data->senha);

        return $this->db->resultSet();
    }
    
}