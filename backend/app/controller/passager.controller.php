<?php

class passager extends controller
{

    public function __construct()
    {
        $this->passagerModel = $this->model('passagers');
    }

    public function index()
    {
    
    }

    // -------------- Register --------------

    public function register_passager()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $info_passager = json_decode(file_get_contents("php://input"));

            $data = [

                'nom' => $info_passager->nom,
                'prenom' => $info_passager->prenom,
                'userName' => $info_passager->prenom . " " . $info_passager->nom,
                'email' => $info_passager->email,
                'password' => $info_passager->password,
                'numTel' => $info_passager->numTel,
                'numWhatsapp' => $info_passager->numWhatsapp,
                'hasCar' => $info_passager->hasCar
            ];


            //cheack if somme inpute is empty
            if (empty($data['nom'])) $retour_passager['nom_err'] = "merci de remplir votre Nom";
            if (empty($data['prenom'])) $retour_passager['prenom_err'] = "merci de remplir votre Prenom";
            if (empty($data['password'])) $retour_passager['password_err'] = "merci de remplir votre Password";

            //email check
            if (empty($data['email'])) {
                $retour_passager['email_err'] = "merci de remplir votre Email";
            } elseif ($this->passagerModel->get_passager_by_email($data['email']) || $this->passagerModel->get_user_banished($data['email'])) {

                $retour_passager['email_err'] = "vous pouvez pas utiliser ce email, veuillez le modifier";
            }

            if (empty($retour_passager['nom_err']) && empty($retour_passager['prenom_err']) && empty($retour_passager['password_err']) && empty($retour_passager['email_err'])) {

                //regester is seccess
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->passagerModel->register_passager($data)) {

                    $retour_passager['regester_seccess'] = true;
                    echo json_encode($retour_passager);
                }
            } else {

                //regester is not seccess
                $retour_passager['regester_seccess'] = false;
                echo json_encode($retour_passager);
            }
        } else {

            //method != POST
            $retour_passager['regester_seccess'] = false;
            echo json_encode($retour_passager);
        }
    }


    // -------------- Login --------------


    public function login_passager()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data_login_passager = json_decode(file_get_contents("php://input"));

            $data = [

                'email' => $data_login_passager->email,
                'password' => $data_login_passager->password,
            ];

            if (empty($data['password'])) $retour_passager['password_err'] = "merci de remplir votre Password";

            if (empty($data['email'])) {

                $retour_passager['email_err'] = "merci de remplir votre Email";
            } elseif (!$this->passagerModel->get_passager_by_email($data['email'])) {

                $retour_passager['email_err'] = "l'adresse email est introuvable";
            }

            if (empty($retour_passager['password_err']) && empty($retour_passager['email_err'])) {

                //login is seccess
                $passager = $this->passagerModel->login_passager($data);
                if ($passager) {

                    //~~~~session
                    $retour_passager['id'] = $passager->passagerId;
                    $retour_passager['userName'] = $passager->userName;
                    $retour_passager['typeUser'] = 'passager';
                    $retour_passager['login_seccess'] = true; 
                    echo json_encode($retour_passager);
                } else {

                    //password incorect
                    $retour_passager['password_err'] = "mot de passe incorrect";
                    echo json_encode($retour_passager);
                }
            } else {

                //login is not seccess
                $retour_passager['login_seccess'] = false;
                echo json_encode($retour_passager);
            }
        } else {

            //method != POST
            $retour_passager['login_seccess'] = false;
            echo json_encode($retour_passager);
        }
    }
}