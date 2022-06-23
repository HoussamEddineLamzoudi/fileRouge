<?php

class reviews extends database
{

    public function __construct()
    {
        $this->db = new database;
    }

    public function newReview($data)
    {
        $this->db->query("INSERT INTO reviews (body, rating, chauffeurId, passagerId) VALUES (:body, :rating, :chauffeurId, :passagerId)");
        
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':rating', $data['rating']);
        $this->db->bind(':chauffeurId', $data['chauffeurId']);
        $this->db->bind(':passagerId', $data['passagerId']);
        
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_reviews_chauffeur($data){
        // var_dump($data);
        // die('ok');
        $this->db->query("SELECT 
                                reviews.*,
                                passagers.passagerId,
                                passagers.userName
                                
                            FROM reviews

                            INNER JOIN
                                chauffeurs
                            ON
                                reviews.chauffeurId = chauffeurs.chauffeurId
                            INNER JOIN
                                passagers
                            ON
                                reviews.passagerId = passagers.passagerId

                            WHERE reviews.chauffeurId = :chauffeurId 
                        ");
        
        $this->db->bind(':chauffeurId', $data['chauffeurId']);

        $row = $this->db->fetchAll();
        return $row;
    }
}