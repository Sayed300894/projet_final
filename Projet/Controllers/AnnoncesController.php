<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\AnnoncesMOdel;

class AnnoncesController extends Controller
{
    /**
       * Cette method affichera une page listant toutes les annonces dans la base de donnees 
       */

    public function index()
    {
      // on instancie le modèl corespondant à la table 'annonces'
        $annoncesModel = new AnnoncesMOdel;

        // on va chercher toutes les annonces

        // $annonces = $annoncesModel->findBy(['actif' => 1]);
        $annonces = $annoncesModel->findAll();
        //  var_dump($annonces);
        // on génère la vue 
        $this->render('annonces/index', ['annonces'=>$annonces]);
        
      
    }

        /**
         * cette method affiche 1 article
         * @param int $id Id de l'annonces
         * @return void
         */

        public function lire(int $id)
        {
            // on instancie le modèl
            $annoncesModel = new AnnoncesModel;
    
            // on va chercher 1 annonce
            $annonce = $annoncesModel->find($id);
    
            // on envoie à la vue 
            $this->render('Annonces/lire', ['annonce' => $annonce]);
        }

        public function ajouter()
        {
            $form = new Form;
            if(isset($_SESSION['user']) && !empty($_SESSION['user']['id'])){
                // l'utilisateur est connecté
                $form->debutForm()
                    ->ajoutLabelFor('titre', 'Titre de l\'annonce :')
                    ->ajoutInput('text', 'titre', ['id' => 'titre', 'class' => 'form-control'])
                    ->ajoutLabelFor('description', 'Text de l\annonce')
                    ->ajoutTextarea('description')
                    ->ajoutBouton('Ajouter', ['class' => 'btn btn-primary'])
                    ->finForm()
                    ;
                    
                    $this->render('annonces/ajouter', ['form' => $form->create()]);
            }else{
                $_SESSION['erreur'] = "vous devez être connecté pour accéder à cette page"; 
                header('Location: ../users/login');
                exit;
            }
        }
}


