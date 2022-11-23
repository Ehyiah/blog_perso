<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class CurrentLinkExtension extends AbstractExtension
{
    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('actual_route', [$this, 'getActualRoute']),
        ];
    }

    public function getActualRoute(string $value, string $route): string
    {
        return $value === $route ? 'active' : '';
    }
}
