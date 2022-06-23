<?php
// ini_set("display_errors",1);

class trajets extends database
{

    public function __construct()
    {
        $this->db = new database;
    }

    public function newTrajet($data)
    {

        $this->db->query("INSERT INTO trajets (depart, arrive, date_depart, heur_depart, am, nbr_passager, prix, cigarette_autorisee, chauffeurId) VALUES(:depart, :arrive, :date_depart, :heur_depart, :am, :nbr_passager, :prix, :cigarette_autorisee, :chauffeurId)");

        $this->db->bind(':depart', $data['depart']);
        $this->db->bind(':arrive', $data['arrive']);
        $this->db->bind(':date_depart', $data['date_depart']);
        $this->db->bind(':heur_depart', $data['heur_depart']);
        $this->db->bind(':am', $data['am']);
        $this->db->bind(':nbr_passager', $data['nbr_passager']);
        $this->db->bind(':prix', $data['prix']);
        $this->db->bind(':cigarette_autorisee', $data['cigarette_autorisee']);
        $this->db->bind(':chauffeurId', $data['chauffeurId']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function chercher_trajets($data){
        // $this->db->query("SELECT * FROM trajets WHERE depart = :depart and arrive = :arrive and date_depart = :date_depart and nbr_passager >= :nbr_passager ORDER BY am DESC, heur_depart ASC");
        $this->db->query("SELECT 
                                trajets.*, 
                                chauffeurs.chauffeurId, 
                                chauffeurs.userName
                            FROM
                                trajets
                            INNER JOIN
                                chauffeurs
                            ON
                                trajets.chauffeurId = chauffeurs.chauffeurId
                            WHERE depart = :depart and arrive = :arrive and date_depart = :date_depart and nbr_passager >= :nbr_passager ORDER BY am DESC, heur_depart ASC
                        ");
        

        $this->db->bind(':depart', $data['depart']);
        $this->db->bind(':arrive', $data['arrive']);
        $this->db->bind(':date_depart', $data['date_depart']);
        $this->db->bind(':nbr_passager', $data['nbr_passager']);

        $row = $this->db->fetchAll();
        return $row;
    }

    public function get_prochaine_trajet($data){

        $this->db->query("SELECT 
                                trajets.*, 
                                chauffeurs.chauffeurId, 
                                chauffeurs.userName
                            FROM
                                trajets
                            INNER JOIN
                                chauffeurs
                            ON
                                trajets.chauffeurId = chauffeurs.chauffeurId
                            WHERE trajets.chauffeurId = :chauffeurId and trajets.date_depart >= :today ORDER BY trajets.date_depart DESC
                        ");
        
        $this->db->bind(':chauffeurId', $data['chauffeurId']);
        $this->db->bind(':today', $data['today']);
        $row = $this->db->fetchAll();
        return $row;
    }

    public function get_ancien_trajet ($data){

        $this->db->query("SELECT 
                                trajets.*, 
                                chauffeurs.chauffeurId, 
                                chauffeurs.userName
                            FROM
                                trajets
                            INNER JOIN
                                chauffeurs
                            ON
                                trajets.chauffeurId = chauffeurs.chauffeurId
                            WHERE trajets.chauffeurId = :chauffeurId and trajets.date_depart <= :today ORDER BY trajets.date_depart DESC
                        ");
        
        $this->db->bind(':chauffeurId', $data['chauffeurId']);
        $this->db->bind(':today', $data['today']);
        $row = $this->db->fetchAll();
        return $row;
    }
}
