<?php
namespace App\Core;

class Form
{
    private $formCode = '';


    /**
     * Génère le formulaire HTML
     *
     * @return string
     */
    public function create()
    {
        return $this->formCode;
    }

    /**
     * valide si tous les champs proposées sont remplis
     * @param array $form Tableau issu de formulaire $_POST , $_GET
     * @param array $champs Tableau listant les champs obligatoires
     * @return boolean
     */

    public static function validate(array $form, array $champs)
    {
        // On parcours les champs
        if(($form)){

            foreach($champs as $champ){
              // Si le champ est absent ou vide dans le formulaire
               $champnonvide =trim($form[$champ]);
              if(!isset($champnonvide) || empty($champnonvide)){
                  // On sort en retournant false
            
                  return false;
              }
          }

          return true;
      
        }
    }

    public function ajoutAttributs(array $attributs): string
    {
        // On initialise une chaîne de caractèrs
        $str = '';

        // on liste les attributs "Courts"
        $courts = ['checked', 'disabled', 'readonly', 'multiple', 'required', 'autofocus', 'novalidate', 'formnovalidate'];

        // On boucle sur le tableau d'attributs
        foreach ($attributs as $attribut => $valeur)
        {
            // si l'attribut est dans la liste des attributs courts
            if(in_array($attribut, $courts) && $valeur == 'true'){
                $str .= " $attribut";
            }else{
                // on ajoute attribut ='valeur'
                $str .= " $attribut='$valeur'";
            }
        }
        return $str;
    }
    
    public function debutForm(string $methode = 'post', string $action = '#', array $attributs = []): self
    {
        // on crée la balise form
        $this->formCode .= "<form action='$action' method='$methode'";

        // On ajoute les attributs éventuels
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs).'>' : '>';

        return $this;
    }

    public function finForm(): self
    {

        $this->formCode .= '</form>';

        return $this;
    }

    public function ajoutLabelFor(string $for, string $texte, array $attributs = []): self
    {
        $this->formCode .= "<label for='$for'";
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';
        $this->formCode .= ">$texte</label>";

        return $this;
    }
    public function ajoutInput(string $type, string $nom, array $attributs = []): self
    {
        $this->formCode .= "<input type='$type' name='$nom'";
        
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs).'>' : '>';

        return $this;
    }
    public function ajoutTextarea(string $nom, string $valeur = '', array $attributs = []): self
    {
        $this->formCode .= "<textarea name='$nom'";
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';
        $this->formCode .= ">$valeur</textarea>";

        return $this;
    }

    public function ajoutBouton(string $texte, array $attributs = []): self
    {
        $this->formCode .= '<button ';

        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';
        $this->formCode .= ">$texte</button>";

        return $this;
    }
}