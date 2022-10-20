
       <?php
        // $_POST['prenom'].' '.$_POST['nom'];
        // $message = null;
        // $prenom = null;

        // if(!empty($_POST)){
        //     $prenom = $_POST['prenom'].$_POST['nom'];
        //     if(!$prenom){
        //         $prenom = 'bounjour tout le monde';
        //     }else{
        //         $prenom = "Salut".' '.$prenom;
        //     };
        //     $date = $_POST['date'];
        //     if(empty($date)){
        //         $date = "veillez enter votre date de naissance";
        //     }else if($date<18){
        //         $date = "vous n'étes pas majeur";
        //     }else{
        //         $date = 'vous étes majeur';
        //     };
        //     $email = $_POST['email'];
        //     if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        //         $message = "l'adresse e-amil est valide";
        //     }else{
        //         $message = "veuillez entrer un mail valide ";
        //     }
            
        // }



       
            

        const FILENAME = 'subscribers.json';

        $error = null;
        $email = '';
// SI le formulaire est somi 
        if(!empty($_POST)){

            $json = file_get_contents('subscribers.json');
            $users = json_decode($json, true);
            if(!$users){
                $users = [];
            }
            $user = array("prenom" => $_POST['prenom'], "nom" => $_POST['nom'], "date" => $_POST['date'], "email" => $_POST['email']);
            $users[] = $user;
            
            $s_file = "subscribers.json";
            $email = trim($_POST['email']);

            if(!$email){
                $error = 'Le champ "Email" est obligatoire';
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error = 'Format email incorrect';
            }

            if(!file_exists(FILENAME)){
                $data = [];
            }else{
                $jsonData = file_get_contents(FILENAME);
            
            if(!$jsonData){
                $data = [];
            }else{
                $data = json_decode($jsonData);
            }
        }


        if(in_array($email, $data)){
            $error = 'Vous êtes déja abonné à notre newsletter';
        }
        var_dump($error);

        if($error == null){
            $data[] = $email;
            $jsonData = json_encode($data);
            file_put_contents(FILENAME, $jsonData);

            header('Location: form.phtml');
            exit;
        }
    }


       

        include 'form.phtml';
        ?>    