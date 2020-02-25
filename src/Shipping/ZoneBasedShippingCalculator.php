<?php

declare(strict_types=1);

namespace App\Shipping;

use Sylius\Component\Addressing\Matcher\ZoneMatcherInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\ShipmentInterface as CoreShipmentInterface;
use Sylius\Component\Shipping\Calculator\CalculatorInterface;
use Sylius\Component\Shipping\Model\ShipmentInterface;
use Symfony\Component\VarDumper\VarDumper;
use Webmozart\Assert\Assert;

final class ZoneBasedShippingCalculator implements CalculatorInterface
{
    /**
     * @var ZoneMatcherInterface
     */
    private $zoneMatcher;

    public function __construct(ZoneMatcherInterface $zoneMatcher)
    {
        $this->zoneMatcher = $zoneMatcher;
    }

    public function calculate(ShipmentInterface $subject, array $configuration): int
    {
        /** @var $subject CoreShipmentInterface */
        Assert::isInstanceOf($subject, CoreShipmentInterface::class);

        VarDumper::dump($configuration);

        /** @var OrderInterface $order */
        $order = $subject->getOrder();

        $shippingAddress = $order->getShippingAddress();

        if (null === $shippingAddress) {
            return $configuration['defaultPrice'];
        }

        $zones = $this->zoneMatcher->matchAll($shippingAddress);

        if (empty($zones)) {
            return $configuration['defaultPrice'];
        }

        if (in_array($configuration['zone'], $zones)) {
            return $configuration['zonePrice'];
        }

        return $configuration['defaultPrice'];
    }

    public function getType(): string
    {
        return 'zone_based';
    }
}
