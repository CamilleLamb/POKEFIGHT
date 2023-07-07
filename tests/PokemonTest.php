<?php 
// Déclaration du namespace
namespace Test;
// Importation du test et du provider de data de PHPUnit
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

// Classe de Test pour l'objet Pokemon, héritant de TestCase
final class PokemonTest extends TestCase
{
    // Différentes fonctions des tests
    public function testGreetsWithName(): void
    {
        $greeting = 'Hello, Alice!';

        // Test d'égalité de texte
        $this->assertSame('Hello, Alice!', $greeting);
    }

    // Fournit les données pour les tests d'addition :
    public static function additionProvider(): array
    {   // Retourne un tableau avec les différents résultats attendus
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 2],
        ];
    }
    // Attribut indiquant que testAdd utilise les données fournies par additionProvider
    #[DataProvider('additionProvider')]
    // Vérifie si a + b est correctement calculé
    public function testAdd(int $a, int $b, int $expected): void
    {   //assertSame compare les valeurs et les types. Si différence, le test échoue.  
        $this->assertSame($expected, $a + $b);
    }

    //Vérification de la bonne instanciation de l'objet Pokemon
    public function testInstanciate(): void{
        // Création de l'objet Pokemon de classe Eau
        $pokemon = new \Src\Pokemons\Eau('toto', 10, 10, 10, 2, '');
        // Récupère le nom du Pokemon
        $name = $pokemon->getName();
        // Vérifie si le nom et les PV du Pokemon correspondent aux valeurs attendues
        $this->assertSame('toto', $name);
        $this->assertEquals(10, $pokemon->getPv());
    }

    // Test pour savoir si l'objet comporte les propriétés voulues
    public function testIsPropertyExist(){
        // Instanciation de l'objet
        $pokemon = new \Src\Pokemons\Eau('toto', 10, 10, 10, 2, '');
        // assertObjectHasProperty vérifie si l'objet Pokemon a la propriété souhaitée
        $this->assertObjectHasProperty('name', $pokemon);
        $this->assertObjectHasProperty('pa', $pokemon);
        $this->assertObjectHasProperty('pv', $pokemon);
        $this->assertObjectHasProperty('pd', $pokemon);
        
    }
}