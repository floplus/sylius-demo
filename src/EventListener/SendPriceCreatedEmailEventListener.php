<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Entity\Price;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
use Sylius\Component\Mailer\Sender\SenderInterface;

final class SendPriceCreatedEmailEventListener
{
    /** @var SenderInterface */
    private $sender;

    public function __construct(SenderInterface $sender)
    {
        $this->sender = $sender;
    }

    public function send(ResourceControllerEvent $event): void
    {
        /** @var Price $price */
        $price = $event->getSubject();

        $this->sender->send('price_created', ['example@example.com'], ['price' => $price]);
    }
}
