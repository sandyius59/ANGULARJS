<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Userservies extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usermodel');
    }
    public function login($userData)
    {
        if ($data = $this->usermodel->signIn($userData)) {
            if (($data['password']) === md5($userData->password)) {
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
