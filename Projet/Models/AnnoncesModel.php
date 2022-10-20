<?php 
namespace App\Models;

class AnnoncesModel extends Model
{

    protected $id_annonces;
    protected $titre;
    protected $description;
    protected $created_at;
    protected $actif;
    protected $users_id;

    public function __construct()
    {
        $this->table = 'annonces';
    }

    
    /**
     * Set the value of id
     *
     * @return  self
     */ 
 
    
    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
    
    
    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

     /**
     * Get the value of actif
     */ 
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set the value of actif
     *
     * @return  self
     */ 
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }


    /**
     * Get the value of id_annonces
     */ 
    public function getId_annonces()
    {
        return $this->id_annonces;
    }

    /**
     * Set the value of id_annonces
     *
     * @return  self
     */ 
    public function setId_annonces($id_annonces)
    {
        $this->id_annonces = $id_annonces;

        return $this;
    }
}