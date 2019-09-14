<?php
/**********************************************************************************
 * @Execution : default node : cmd> Usermodel.php
 *
 *
 * @Purpose : to create loging and registration form
 *
 * @description : to create rest api using codeiniter and angular js
 *
 * @overview : fundoo application
 * @author : sandeep kumar maurya <sandeepkumaraj58@gmail.com>
 * @version : 1.0
 * @since : 11-sat-2019
 *
 **************************************************************************************/
defined('BASEPATH') or exit('No direct script access allowed');

class Usermodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    /**
     * @desc passing email and password values
     * @param passing email
     * @return boolean values
     */
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
    /**
     * @desc passing email and password values
     * @param passing email
     * @return boolean values
     */
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
    /**
     * @desc passing data
     * @param  data
     * @return boolean values
     */
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
