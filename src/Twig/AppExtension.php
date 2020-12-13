<?php

namespace App\Twig;

use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private $requestStack;
    public function __construct(RequestStack $requestStack)
    {
        
        $this->requestStack=$requestStack;
    }
   

    public function getFunctions(): array
    {
        return [
            new TwigFunction('set_active_route', [$this, 'setActiveRoute']),
            new TwigFunction('page_title', [$this, 'pageTitle']),
        ];
    }

    public function setActiveRoute(string $route): string
    {

        $currentRoute=$this->requestStack->getCurrentRequest()->attributes->get('_route');
        return $currentRoute == $route ? 'active' : '';
    }
    
    public function pageTitle(?string $title = null): string
    {
        $baseTitle= 'Welcome';
        return $title ?? $baseTitle;
    }
}
