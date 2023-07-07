<?php
// Importation du TestCase de PHPUnit
use PHPUnit\Framework\TestCase;
// Déclaration de la classe NavigationTest qui hérite de TestCase
class NavigationTest extends TestCase
{
    // Méthode de vérification de la navigation sur la page d'accueil
    public function testIndex()
    {   // Instance à utiliser pour faire des requête HTTP
        $client = new \GuzzleHttp\Client();

        // Requête HTTP GET vers la page d'accueil
        $response = $client->request('GET', 'http://localhost/LA_PASSERELLE/POKEMON_POO/');

        // Vérifie si la réponse est OK (code 200)
        $this->assertEquals(200, $response->getStatusCode());

        // Vérifie si le titre de la page est correct
        $body = $response->getBody()->getContents();
        $this->assertStringContainsString('Pikachu', $body);
    }
}
