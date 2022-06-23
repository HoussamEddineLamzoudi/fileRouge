<?php

class chauffeur extends controller
{

    public function __construct()
    {
        $this->chauffeurModel = $this->model('chauffeurs');
    }

    public function index()
    {
    
    }

    // -------------- Register --------------

    public function register_chauffeur()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $info_chauffeur = json_decode(file_get_contents("php://input"));

            $data = [

                'nom' => $info_chauffeur->nom,
                'prenom' => $info_chauffeur->prenom,
                'userName' => $info_chauffeur->prenom . " " . $info_chauffeur->nom,
                'email' => $info_chauffeur->email,
                'password' => $info_chauffeur->password,
                'numTel' => $info_chauffeur->numTel,
                'numWhatsapp' => $info_chauffeur->numWhatsapp,
                'hasCar' => $info_chauffeur->hasCar
            ];


            //cheack if somme inpute is empty
            if (empty($data['nom'])) $retour_chauffeur['nom_err'] = "merci de remplir votre Nom";
            if (empty($data['prenom'])) $retour_chauffeur['prenom_err'] = "merci de remplir votre Prenom";
            if (empty($data['password'])) $retour_chauffeur['password_err'] = "merci de remplir votre Password";
            if (empty($data['numTel'])) $retour_chauffeur['numTel_err'] = "merci de remplir votre numero du telephone";
            if (empty($data['numWhatsapp'])) $retour_chauffeur['numWhatsapp_err'] = "merci de remplir votre numero whatsapp";

            //email check
            if (empty($data['email'])) {
                $retour_chauffeur['email_err'] = "merci de remplir votre Email";
            } elseif ($this->chauffeurModel->get_chauffeur_by_email($data['email']) || $this->chauffeurModel->get_user_banished($data['email'])) {

                $retour_chauffeur['email_err'] = "vous pouvez pas utiliser ce email, veuillez le modifier";
            }

            if (empty($retour_chauffeur['nom_err']) && empty($retour_chauffeur['prenom_err']) && empty($retour_chauffeur['password_err']) && empty($retour_chauffeur['email_err'])) {

                //regester is seccess
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->chauffeurModel->register_chauffeur($data)) {

                    $retour_chauffeur['regester_seccess'] = true;
                    // echo json_encode(array(
                    //     'retour_chauffeur' => true
                    // ));
                    echo json_encode(array(
                        'regester_seccess' => true
                    ));
                }
            } else {

                //regester is not seccess
                $retour_chauffeur['regester_seccess'] = false;
                echo json_encode($retour_chauffeur);
            }
        } else {

            //method != POST
            $retour_chauffeur['regester_seccess'] = false;
            echo json_encode($retour_chauffeur);
        }
    }


    // -------------- Login --------------


    public function login_chauffeur()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data_login_chauffeur = json_decode(file_get_contents("php://input"));

            $data = [

                'email' => $data_login_chauffeur->email,
                'password' => $data_login_chauffeur->password,
            ];
            // die($data['password']);

            if (empty($data['password'])) $retour_chauffeur['password_err'] = "merci de remplir votre Password";

            if (empty($data['email'])) {

                $retour_chauffeur['email_err'] = "merci de remplir votre Email";
            } elseif (!$this->chauffeurModel->get_chauffeur_by_email($data['email'])) {

                $retour_chauffeur['email_err'] = "l'adresse email est introuvable";
            }

            if (empty($retour_chauffeur['password_err']) && empty($retour_chauffeur['email_err'])) {

                //login is seccess
                $chauffeur = $this->chauffeurModel->login_chauffeur($data);
                if ($chauffeur) {

                    
                    //~~~~session
                    $retour_chauffeur['login_seccess'] = true;
                    $retour_chauffeur['id'] = $chauffeur->chauffeurId;
                    $retour_chauffeur['userName'] = $chauffeur->userName;
                    $retour_chauffeur['typeUser'] = 'chauffeur';

                    echo json_encode($retour_chauffeur);
                } else {

                    //password incorect
                    $retour_chauffeur['password_err'] = "mot de passe incorrect";
                    echo json_encode($retour_chauffeur);
                }
            } else {

                //login is not seccess
                $retour_chauffeur['login_seccess'] = false;
                echo json_encode($retour_chauffeur);
            }
        } else {

            //method != POST
            $retour_chauffeur['login_seccess'] = false;
            echo json_encode($retour_chauffeur);
        }
    }
}
