<?php

declare(strict_types=1);

namespace App\Form\Type;

use Sylius\Bundle\MoneyBundle\Form\Type\MoneyType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class PriceFormType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cooperative', TextType::class)
            ->add('price', MoneyType::class)
        ;
    }
}
