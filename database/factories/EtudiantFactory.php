<?php

namespace Database\Factories;
use app\models\etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EtudiantFactory extends Factory
{
    
      protected $model = Etudiant::class;
     


/**
 *@return array<string, mixed> 
 */



      
     
    public function definition()
    {
        return [
            
            'nom' => fake()->lastName(),
            'prenom' => fake()->firstName(),
            'classe_id' =>rand(1,7),






        ];
    }
}
