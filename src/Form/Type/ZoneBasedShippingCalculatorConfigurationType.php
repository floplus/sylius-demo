<?php

declare(strict_types=1);

namespace App\Form\Type;

use Sylius\Bundle\AddressingBundle\Form\Type\ZoneChoiceType;
use Sylius\Bundle\MoneyBundle\Form\Type\MoneyType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

final class ZoneBasedShippingCalculatorConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('defaultPrice', MoneyType::class)
            ->add('zone', ZoneChoiceType::class)
            ->add('zonePrice', MoneyType::class)
        ;
    }
}
