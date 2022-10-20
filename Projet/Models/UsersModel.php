<?php
namespace App\Models;

class UsersModel extends Model
{
   protected $id_users;
   protected $nom;
   protected $prenom;
   protected $email;
   protected $password;
   protected $role;
   

   public function __construct()
   {
    $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    
    $this->table = strtolower(str_replace('Model', '', $class));
   }

   public function findOneByEmail(string $email)
   {
      return $this->requete("SELECT * FROM $this->table WHERE email = ?", [$email])->fetch();
   }

   /**
    * crée la sesstion de l'utilisateur
    *@return void
    */
    public function getId_users()
    {
       return $this->id_users;
    }
 
    /**
     * Set the value of id_users
     *
     * @return  self
     */ 
    public function setId_users($id_users)
    {
       $this->id_users = $id_users;
 
       return $this;
    }

   public function setSession(){
      $_SESSION['user'] = [
         'id' => $this->id_users,
         'email' => $this->email
      ];
   }

     /**
    * Get the value of id
    */ 
 
    
   /**
    * Get the value of email
    */ 
   public function getEmail()
   {
      return $this->email;
   }

   /**
    * Set the value of email
    *
    * @return  self
    */ 
   public function setEmail($email)
   {
      $this->email = $email;

      return $this;
   }

     /**
    * Get the value of password
    */ 
    public function getPassword()
    {
       return $this->password;
    }
 
    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
       $this->password = $password;
 
       return $this;
    }

   /**
    * Get the value of users_id
    */ 
   public function getUsers_id(): int
   {
      return $this->users_id;
   }

   /**
    * Set the value of users_id
    *
    * @return  self
    */ 
   public function setUsers_id(int $users_id)
   {
      $this->users_id = $users_id;

      return $this;
   }

   /**
    * Get the value of id_users
    */ 
  

   /**
    * Get the value of role
    */ 
   public function getRole()
   {
      return $this->role;
   }

   /**
    * Set the value of role
    *
    * @return  self
    */ 
   public function setRole($role)
   {
      $this->role = $role;

      return $this;
   }

   /**
    * Get the value of nom
    */ 
   public function getNom()
   {
      return $this->nom;
   }

   /**
    * Set the value of nom
    *
    * @return  self
    */ 
   public function setNom($nom)
   {
      $this->nom = $nom;

      return $this;
   }

   /**
    * Get the value of prenom
    */ 
   public function getPrenom()
   {
      return $this->prenom;
   }

   /**
    * Set the value of prenom
    *
    * @return  self
    */ 
   public function setPrenom($prenom)
   {
      $this->prenom = $prenom;

      return $this;
   }
}