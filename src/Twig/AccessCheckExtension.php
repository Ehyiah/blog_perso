<?php

namespace App\Twig;

use App\Service\Security\RoleCheckerService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

final class AccessCheckExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('has_role', [RoleCheckerService::class, 'checkRole']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('has_role', [RoleCheckerService::class, 'checkRole']),
        ];
    }
}
