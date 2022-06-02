<?php

class passagers extends database
{

    public function __construct()
    {
        $this->db = new database;
    }


    //table_users
    public function get_passager_by_email($email)
    {

        $this->db->query("SELECT * from passagers WHERE email=:email");
        $this->db->bind(":email", $email);
        $this->db->execute();
        if ($this->db->rowCount()) return true;
        else return false;
    }


    public function register_passager($dataUser)
    {
        
        $this->db->query("INSERT INTO passagers (prenom, nom, userName, email, motPasse, hasCar) VALUES (:prenom, :nom, :userName, :email, :motPasse, :hasCar)");

        $this->db->bind(":prenom", $dataUser['nom']);
        $this->db->bind(":nom", $dataUser['prenom']);
        $this->db->bind(":userName", $dataUser['userName']);
        $this->db->bind(":email", $dataUser['email']);
        $this->db->bind(":motPasse", $dataUser['password']);
        $this->db->bind(":hasCar", $dataUser['hasCar']);

        if ($this->db->execute()) return true;
        else return false;
    }


    public function login_passager($dataUser)
    {

        $this->db->query("SELECT * FROM passagers WHERE email=:email");
        $this->db->bind(":email", $dataUser['email']);

        $row = $this->db->fetch();

        $hashed_psw = $row->motPasse;

        if (password_verify($dataUser['password'], $hashed_psw)) {

            return $row;
        } else {

            return false;
        }
    }



    //table_archives
    public function get_user_banished($email)
    {

        $this->db->query("SELECT * from archives WHERE email=:email");
        $this->db->bind(":email", $email);
        $this->db->execute();
        if ($this->db->rowCount()) return true;
        else return false;
    }
}
