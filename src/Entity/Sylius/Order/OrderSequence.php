<?php

declare(strict_types=1);

namespace App\Entity\Sylius\Order;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\OrderSequence as BaseOrderSequence;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_order_sequence")
 */
class OrderSequence extends BaseOrderSequence
{
}
