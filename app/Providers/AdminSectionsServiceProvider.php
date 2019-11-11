<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;
use Meta;

class AdminSectionsServiceProvider extends ServiceProvider
{

    protected $policies = [
        //App\Http\Sections\Categories::class => App\Policies\CategoryPolicy::class,
    ];
    /**
     * @var array
     */
    protected $sections = [
        \App\Category::class => \App\Http\Sections\Categories::class,
        \App\Product::class => \App\Http\Sections\Products::class,
        \App\Page::class => \App\Http\Sections\Pages::class,
        \App\Menu::class => \App\Http\Sections\Menus::class,
        \App\MenuItem::class => \App\Http\Sections\MenuItems::class,
        \App\User::class => \App\Http\Sections\Users::class,
        \App\Role::class => \App\Http\Sections\Roles::class,
        \App\Action::class => \App\Http\Sections\Actions::class,
        \App\Personal::class => \App\Http\Sections\Personals::class,
        \App\Contact::class => \App\Http\Sections\Contacts::class,
        \App\Payment::class => \App\Http\Sections\Payments::class,
        \App\Type::class => \App\Http\Sections\Types::class,
        \App\TypeTab::class => \App\Http\Sections\TypeTabs::class,
        \App\TypeItem::class => \App\Http\Sections\TypeItems::class,
        \App\Reception::class => \App\Http\Sections\Receptions::class,
        \App\Slider::class => \App\Http\Sections\Sliders::class,
        \App\SliderItem::class => \App\Http\Sections\SliderItems::class,
        \App\Order::class => \App\Http\Sections\Orders::class,
        \App\Service::class => \App\Http\Sections\Services::class,
        \App\Setting::class => \App\Http\Sections\Settings::class,
        \App\Comment::class => \App\Http\Sections\Comments::class,
    ];

    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//
        $this->registerPolicies( 'App\\Policies\\' );
        parent::boot($admin);
    }
}
