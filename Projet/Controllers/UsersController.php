<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\UsersModel;

class UsersController extends Controller
{
    public function login()
    {
        $form = new Form;

        // On vérifie si le formulaire est complet 
        if (Form::validate($_POST, ['email', 'password'])) {
            var_dump($_POST);

            // le formulaire est complet
            // On va chercher dans la base de données l'utilisateur avec l'email entré

            $usersModel = new UsersModel;

            $userArray = $usersModel->findOneByEmail(strip_tags($_POST['email']));

            // si l'utilisateur n'existe pas 
            if (!$userArray) {
                // On envoie un message de session
                var_dump($_POST);

                $_SESSION['flash']['erreur'] = 'L\adresse e-mail et/ou Mot de pass est incorrect';

                header('Location: login');
                exit;
            }

            // l'utilisateur existe

            if (password_verify($_POST['password'], $userArray['password'])) {
                // le mot de pass est bon
                $user = $usersModel->hydrate($userArray);
                $user->setSession();
                $id = $_SESSION['user']['id'];
                $_SESSION['flash']['success'] = 'vous étes bien connecté(e)';
                header('location: profil/' . $id);
                die;
            } else {
                $_SESSION['flash']['erreur'] = 'Mot de pass est incorrect';
                $user = $usersModel->hydrate($userArray);

                var_dump($user);

                // header('Location: login');
                // exit;
            }
        } else {
            if (!empty($_POST)) {

                $_SESSION['flash']['erreur'] = "Le formulaire est incomplet!! ";
            }
        }



        $form->Debutform('POST', '', ['class' => 'form'])
            ->ajoutLabelFor('email', 'Email :')
            ->ajoutInput('email', 'email', ['class' => 'form-control', 'id' => 'email'])
            ->ajoutLabelFor('pass', 'Mot de pass :')
            ->ajoutInput('password', 'password', ['class' => 'form-control', 'id' => 'pass'])
            ->ajoutBouton('Me connecter', ['class' => 'btn btn-primary'])
            ->finForm();

        $this->render('users/login', ['loginForm' => $form->create()]);
    }
    public function register()
    {

        if (Form::validate($_POST, array('prenom', 'nom', 'password', 'email'))) {
            //le formulaire est valide
            //On "netvoie" l'adresse email
            $prenom = strip_tags($_POST['prenom']);
            $nom = strip_tags($_POST['nom']);
            $email = strip_tags($_POST['email']);
            $user = new UsersModel;
            $userArray = $user->Findonebyemail($email);

            if (($userArray) && $userArray['email'] == $email) {

                $_SESSION['flash']['erreur'] = "cet email existe déjas ";
                // // On chiffre le mot de pass


                // // On hydrate l'utilisateur
                // $user = new UsersModel;

                // $user->setEmail($email)
                //     ->setPassword($password)
                //     ;

                // // On stocke l'utilisateur
                // $user->create();
            } else {
                // On "netvoie" l'adresse email


                // On chiffre le mot de pass
                $pass = password_hash($_POST['password'], PASSWORD_ARGON2I);

                // On hydrate l'utilisateur
                $user = new UsersModel;

                $user->setNom($nom)
                    ->setPrenom($prenom)
                    ->setEmail($email)
                    ->setPassword($pass)
                    ->setRole(0);


                // On stocke l'utilisateur
                $user->create();
            }
        }
        $form = new Form;

        $form->Debutform('POST', '', ['class' => 'form'])
            ->ajoutLabelFor('nom', 'nom*')
            ->ajoutInput('text', 'nom', ['class' => 'form-control', 'id' => 'nom'])
            ->ajoutLabelFor('prenom', 'prenom *')
            ->ajoutInput('text', 'prenom', ['class' => 'form-control', 'id' => 'prenom'])
            ->ajoutLabelFor('email', 'Email :')
            ->ajoutInput('email', 'email', ['class' => 'form-control', 'id' => 'email'])
            ->ajoutLabelFor('pass', 'Mot de pass :')
            ->ajoutInput('password', 'password', ['class' => 'form-control', 'id' => 'pass'])
            ->ajoutBouton('Me connecter', ['class' => 'btn btn-primary'])
            ->finForm();

        $this->render('users/register', ['loginForm' => $form->create()]);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('location: http://localhost/Projet/Public/');
        die;
    }

    public function profil($id)
    {
        $userModel = new UsersModel;
        $userArray = $userModel->find($id);
        $this->render('users/profil', ['userArray' => $userArray]);
    }
}
