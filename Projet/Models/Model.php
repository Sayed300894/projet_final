<?php
namespace App\Models;
use App\Core\Db;

class Model extends Db
{
 // table de la base de donnée
 protected $table;

 // Instance de db
 private $db;

 // Commencement de partie READ 

      public function findAll()
      {
         $query = $this->requete('SELECT * FROM '. $this->table);
         return $query->fetchAll();

      }

      public function findBy(array $criteres)
      {
         $champs = [];
         $valeurs = [];

         foreach ($criteres as $champ => $valeur) 
         {
            $champs[] = "$champ = ?";
            $valeurs[] = $valeur;
         }
         $list_champs = implode(' AND ', $champs);
         
         return $this->requete('SELECT * FROM '. $this->table .' WHERE '. $list_champs, $valeurs)->fetchAll();
      }

      public function find(int $id)
      {
         return  $this->requete('SELECT * FROM '. $this->table. ' WHERE id_'.$this->table. '=' .$id )->fetch();
      }
      // fin de partie READ
      // start partie CREATE
      
      public function create()
      {
         $champs = [];
         $inter = [];
         $valeurs = [];

         foreach ($this as $champ => $valeur) 
         {
            if($valeur != null && $champ != 'Db' && $champ != 'table')
            {
               $champs[] = $champ;
               $inter[] = "?";
               $valeurs[] = $valeur;
            }
         }

         $list_champs = implode(', ', $champs);
         $list_inter = implode(', ', $inter);

         return $this->requete('INSERT INTO '. $this->table .'('. $list_champs.') VALUES ('.$list_inter.')', $valeurs);
      
      }
      // fin de partie create

      // strat de partie update
    
      public function update($model)
      {
         $champs = [];
         $valeurs = [];

         foreach ($model as $champ => $valeur) 
         {
            if($valeur !== null && $champ != 'Db' && $champ != 'table')
            {
               $champs[] = "$champ = ?";
               $valeurs[] = $valeur;
            }
         }

         $valeurs[] = $this->id;

         $list_champs = implode(', ', $champs);

         return $this->requete('UPDATE '. $this->table .' SET '. $list_champs.' WHERE id = ?', $valeurs);
      
      }
      // fin de la partie update

      // start de la partie delete

      public function delete($id)
      {
         return $this->requete("DELETE FROM {$this->table} WHERE id = $id", [$id]);
      }
      // end de la partie delete

      public function requete(string $sql, array $attributs = null)
      {
         // on récupère l'instance de db
         $this->db = DB::getInstance();

         // on vérifie si on a des attributs
         if($attributs !== null){
            // requête préparée 
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;
         }else{
               // requête simple
               return $this->db->query($sql);

         }
      }

      public function hydrate($donnees)
      {
         foreach($donnees as $key => $value){

            $setter = 'set'.ucfirst($key);

            if(method_exists($this, $setter)){
               $this->$setter($value);
            }
         }
         return $this;
      }
}