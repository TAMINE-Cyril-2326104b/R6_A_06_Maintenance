<?php

use Behat\Behat\Context\Context;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Behat\Step\Given;
use Behat\Step\Then;
use Symfony\Component\Dotenv\Dotenv;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private KernelBrowser $client;
    private $response;

    public function __construct()
    {
        // Charger les variables d'environnement du test
        if (file_exists(__DIR__.'/../../.env.test')) {
            $dotenv = new Dotenv();
            $dotenv->load(__DIR__.'/../../.env.test');
        }

        // On peut initialiser le client ici si besoin, mais pour chaque scénario on crée un client propre
    }

    #[Given('I am on :url')]
    public function iAmOn($url): void
    {
        // Créer le kernel pour le client Symfony
        $kernel = new \App\Kernel($_ENV['APP_ENV'] ?? 'test', true);
        $this->client = new KernelBrowser($kernel);

        // Préfixer l'URL si nécessaire avec DEFAULT_URI
        $fullUrl = ($_ENV['DEFAULT_URI'] ?? 'http://127.0.0.1:8000') . $url;

        $this->client->request('GET', $fullUrl);
        $this->response = $this->client->getResponse();
    }

    #[Then('the response status code should be :status')]
    public function theResponseStatusCodeShouldBe($status): void
    {
        $actualStatus = $this->response->getStatusCode();
        if ((int)$actualStatus !== (int)$status) {
            throw new \Exception("Expected status code $status but got $actualStatus");
        }
    }
}
