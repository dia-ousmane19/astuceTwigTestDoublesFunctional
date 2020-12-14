<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    /** @test */
    public function home()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSame('app_home',$crawler->filter('body')->attr('class'));
     
    }
    /** @test */
    public function about()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/about');

        $this->assertResponseIsSuccessful();
        $this->assertSame('app_about',$crawler->filter('body')->attr('class'));

    }
    /** @test */
    public function contact()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');

        $this->assertResponseIsSuccessful();
        $this->assertSame('app_contact',$crawler->filter('body')->attr('class'));

    }
}
