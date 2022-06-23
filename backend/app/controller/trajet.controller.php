<?php

class trajet extends controller
{

    public function __construct()
    {
        $this->trajetModel = $this->model('trajets');
    }

    // public function index()
    // {
    //     $trajet = $this->trajetModel->getalltest();
    //     echo json_encode($trajet);
    // }

    public function get_trajet()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $recherche_trajet = json_decode(file_get_contents("php://input"));

            $data = [
                'depart' => $recherche_trajet->depart,
                'arrive' => $recherche_trajet->arrive,
                'date_depart' => $recherche_trajet->date_depart,
                'nbr_passager' => $recherche_trajet->nbr_passager,
            ];
            $trajet = $this->trajetModel->chercher_trajets($data);
        
            echo json_encode($trajet);
        }
    }

    public function prochaine_trajet()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $prochaine_trajet = json_decode(file_get_contents("php://input"));
            // die('ok');

            $data = [
                'today' => $prochaine_trajet->today,
                'chauffeurId' => $prochaine_trajet->chauffeurId,
            ];

            $trajet = $this->trajetModel->get_prochaine_trajet($data);
        
            echo json_encode($trajet);
        }
    }

    public function ancien_trajet()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ancien_trajet = json_decode(file_get_contents("php://input"));

            $data = [
                'today' => $ancien_trajet->today,
                'chauffeurId' => $ancien_trajet->chauffeurId,
            ];

            $trajet = $this->trajetModel->get_ancien_trajet($data);
        
            echo json_encode($trajet);
        }
    }




    public function addTrajet()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $info_trajet = json_decode(file_get_contents("php://input"));

            

            $data = [

                'depart' => $info_trajet->depart,
                'arrive' => $info_trajet->arrive,
                'date_depart' => $info_trajet->date_depart,
                'heur_depart' => $info_trajet->heur_depart,
                'am' => $info_trajet->am,
                'nbr_passager' => $info_trajet->nbr_passager,
                'prix' => $info_trajet->prix,
                'cigarette_autorisee' => $info_trajet->cigarette_autorisee,
                'chauffeurId' => $info_trajet->chauffeurId,
            ];

            

            if ($this->trajetModel->newTrajet($data)) {

                $retour_trajet['add_seccess'] = true;
                echo json_encode($retour_trajet);
            } else {
                die('trajet not added');
            }
        } else {
            //method != POST
            $retour_trajet['regester_seccess'] = false;
            echo json_encode($retour_trajet);
        }
    }
}
