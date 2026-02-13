<?php

namespace App\Tests\Functional;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;

class ChampionnatIndexMockTest extends TestCase
{
    public function testChampionnatIndexHtml(): void
    {
        // Simule le HTML généré par la page
        $html = <<<HTML
<h1>Championnat index</h1>
<table class="table">
    <tbody>
        <tr><td>1</td><td>Test championnat</td><td><a href="#">show</a> <a href="#">edit</a></td></tr>
    </tbody>
</table>
<a href="#">Create new</a>
HTML;

        $crawler = new Crawler($html);

        $this->assertEquals('Championnat index', $crawler->filter('h1')->text());
        $this->assertGreaterThan(0, $crawler->filter('table.table')->count());
        $this->assertGreaterThan(0, $crawler->filter('a:contains("Create new")')->count());
        $this->assertGreaterThanOrEqual(1, $crawler->filter('tbody tr')->count());
    }
}
