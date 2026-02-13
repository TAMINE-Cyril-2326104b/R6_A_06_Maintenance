<?php

namespace App\Tests\Controller;

use App\Entity\Concerne;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ConcerneControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $concerneRepository;
    private string $path = '/concerne/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->concerneRepository = $this->manager->getRepository(Concerne::class);

        foreach ($this->concerneRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Concerne index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first()->text());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'concerne[competition]' => 'Testing',
            'concerne[epreuve]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->concerneRepository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Concerne();
        $fixture->setCompetition('My Title');
        $fixture->setEpreuve('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Concerne');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Concerne();
        $fixture->setCompetition('Value');
        $fixture->setEpreuve('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'concerne[competition]' => 'Something New',
            'concerne[epreuve]' => 'Something New',
        ]);

        self::assertResponseRedirects('/concerne/');

        $fixture = $this->concerneRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getCompetition());
        self::assertSame('Something New', $fixture[0]->getEpreuve());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Concerne();
        $fixture->setCompetition('Value');
        $fixture->setEpreuve('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/concerne/');
        self::assertSame(0, $this->concerneRepository->count([]));
    }
}
