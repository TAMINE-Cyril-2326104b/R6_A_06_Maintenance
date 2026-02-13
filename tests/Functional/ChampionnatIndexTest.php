<?php

namespace App\Tests\Functional;

use Symfony\Component\Panther\PantherTestCase;

class ChampionnatIndexTest extends PantherTestCase
{
    public function testChampionnatIndexPage(): void
    {
        // Chemin vers geckodriver
        $geckoPath = __DIR__ . '/../../vendor/bin/drivers/geckodriver';

        // Crée le client en mode headless et utilise le binaire local
        $client = static::createPantherClient([
            'browser' => static::FIREFOX,
            'firefoxDriverBinary' => $geckoPath,
            'headless' => true,
        ]);

        // Accède à la page des championnats
        $crawler = $client->request('GET', 'http://localhost:8000/championnat');

        // Vérifie que le titre h1 est correct
        $this->assertSelectorTextContains('h1', 'Championnat index');

        // Vérifie que la table est présente
        $this->assertSelectorExists('table.table');

        // Vérifie qu'au moins le lien "Create new" est présent
        $this->assertSelectorExists('a:contains("Create new")');

        // Vérifie qu'il y a au moins une ligne dans le tbody
        $rows = $crawler->filter('tbody tr');
        $this->assertGreaterThanOrEqual(1, $rows->count());
    }
}
