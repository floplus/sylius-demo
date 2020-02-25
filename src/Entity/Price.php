<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_price")
 */
class Price implements ResourceInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private $cooperative;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $status = 'submitted';

    /**
     * @var int|null
     * @ORM\Column(type="integer", options={"default": 0})
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRandomData(): int
    {
        return 4;
    }

    public function getCooperative(): ?string
    {
        return $this->cooperative;
    }

    public function setCooperative(?string $cooperative): void
    {
        $this->cooperative = $cooperative;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}
