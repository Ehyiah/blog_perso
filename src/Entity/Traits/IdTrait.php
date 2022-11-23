<?php

namespace App\Entity\Traits;

use App\Service\UuidGenerator;
use Doctrine\ORM\Mapping as ORM;

trait IdTrait
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', nullable: false)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(UuidGenerator::class)]
    private ?string $id = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }
}
