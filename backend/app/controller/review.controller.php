<?php

class review extends controller
{

    public function __construct()
    {
        $this->reviewModel = $this->model('reviews');
    }

    public function index()
    {
    
    }

    public function add_review(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $info_review = json_decode(file_get_contents("php://input"));

            

            $data = [

                'body' => $info_review->body,
                'rating' => $info_review->rating,
                'passagerId' => $info_review->passagerId,
                'chauffeurId' => $info_review->chauffeurId,
            ];


            if ($this->reviewModel->newReview($data)) {

                $retour_review['add_seccess'] = true;
                echo json_encode($retour_review);
            } else {
                die('review not added');
            }
        }
    }

    public function get_reviews()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $info_review = json_decode(file_get_contents("php://input"));

            $data = [
                'chauffeurId' => $info_review->chauffeurId,
            ];
            $review = $this->reviewModel->get_reviews_chauffeur($data);
        
            echo json_encode($review);
        }
    }
}