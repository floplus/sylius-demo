<?php

declare(strict_types=1);

namespace App\EventListener;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addMenu(MenuBuilderEvent $menuBuilderEvent): void
    {
        $menu = $menuBuilderEvent->getMenu();

        $subMenu = $menu->getChild('catalog');

        $subMenu
            ->addChild('app_admin_prices', ['route' => 'app_admin_price_index'])
            ->setLabel('app.ui.prices')
            ->setLabelAttribute('icon', 'money') # Value should come from font awesome list
        ;
    }
}
