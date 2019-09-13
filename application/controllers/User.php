<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usermodel');
    }
    public function login()
    {
        $userData = json_decode(file_get_contents("php://input"));
        if (!empty($userData->email) && !empty($userData->password)) {
            if ($this->usermodel->isemail($userData->email)) {
                if ($users = $this->usermodel->signIn($userData)) {
                    http_response_code(200);
                    // make it json format
                    print json_encode(array('status' => '200', "message" => "login successful", "data" => $users));
                } else {
                    http_response_code(503);
                    // make it json format
                    print json_encode(array('status' => '400', "message" => "password mismatch"));
                }
            } else {
                http_response_code(503);
                // make it json format
                print json_encode(array('status' => '400', "message" => "email is not found"));
            }
        } else {
            http_response_code(503);
            // make it json format
            print json_encode(array('status' => '400', "message" => "invalid data"));
        }

    }

    public function register()
    {
        $data = json_decode(file_get_contents("php://input"));
        // make sure data is not empty
        if (
            !empty($data->firstname) &&
            !empty($data->lastname) &&
            !empty($data->email) &&
            !empty($data->password)
        ) {

            $data->password = md5($data->password);
            $data->created = date('Y-m-d H:i:s');
            $data->modified = date('Y-m-d H:i:s');
            // create the user
            if ($this->usermodel->signup($data)) {
                // set response code - 201 created
                http_response_code(201);
                // displays
                echo json_encode(array("message" => "user was created."));
            }
            // if unable to create the user,
            else {
                // set response code - 503 service unavailable
                http_response_code(503);
                // display message
                echo json_encode(array("message" => "Unable to create user."));
            }
        } else {
            // set response code - 400 bad request
            http_response_code(400);
            // tell the user
            echo json_encode(array("message" => "Unable to create user. Data is incomplete."));
        }
    }

}
