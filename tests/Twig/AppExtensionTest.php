<?php

namespace App\Tests\Twig;

use App\Twig\AppExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class AppExtensionTest extends TestCase
{
    /** @test */
    public function setPageTitle()
    {
        $RequestStackDummy=$this->createMock(RequestStack::class);
        $appExtension = new AppExtension($RequestStackDummy);
        
        $this->assertSame('Welcome',$appExtension->pageTitle());
        $this->assertSame('About',$appExtension->pageTitle('About'));
    }
    /** @test */
    public function setActiveRoute()
    {
        $RequestStackStub=$this->createStub(RequestStack::class);
        $request= new Request([],[],['_route' => 'app_home']);
        $RequestStackStub->method('getCurrentRequest')->willReturn($request);
       


       
        $appExtension = new AppExtension($RequestStackStub);
        
        $this->assertSame('active',$appExtension->setActiveRoute('app_home'));
        $this->assertSame('',$appExtension->setActiveRoute('app_about'));
        $this->assertSame('',$appExtension->setActiveRoute('app_contact'));
    }
}
