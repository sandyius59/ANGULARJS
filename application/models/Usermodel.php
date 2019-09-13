<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usermodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function isemail($email)
    {
        $stmt = $this->db->conn_id->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->execute(["email" => $email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return true;
        } else {
            return false;
        }

    }
    public function signIn($userData)
    {
        $stmt = $this->db->conn_id->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->execute(["email" => $userData->email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            if (($data['password']) === md5($userData->password)) {
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }
    public function signup($data)
    {
        // $stmt = $this->db->conn_id->prepare("INSERT INTO user (firstname,lastname,email,password, created,modified) VALUES(:firstname ,:lastname ,:email,:password,:created,:modified)");
        // $stmt->execute();

        // $stm = "INSERT INTO user (firstname, lastname, email,password,created,modified) VALUES (:firstname, :lastname, :email,:password,:created,:modified)";
        // $stmt = $this->db->conn_id->prepare($stm);
        // $stmt->execute($data);

        // query to insert record
        $stmt = $this->db->insert('user', $data);
        if ($stmt) {
            return true;
        }
        return false;
    }

}
