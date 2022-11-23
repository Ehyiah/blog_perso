<?php

namespace App\Service\Security;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Role\RoleHierarchyInterface;
use Symfony\Component\Security\Core\User\UserInterface;

final class RoleCheckerService
{
    public function __construct(
        private readonly RoleHierarchyInterface $roleHierarchy,
        private readonly TokenStorageInterface $tokenStorage,
    ) {
    }

    public function checkRole(string $role, UserInterface $user = null): bool
    {
        if (null === $user) {
            $token = $this->tokenStorage->getToken();

            if (null === $token) {
                return false;
            }

            $user = $token->getUser();
        }

        return in_array($role, $this->roleHierarchy->getReachableRoleNames($user->getRoles()), true);
    }
}
