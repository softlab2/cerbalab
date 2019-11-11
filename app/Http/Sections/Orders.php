<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminSection;
use AdminColumn;
use AdminColumnEditable;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;

/**
 * Class Categories
 *
 * @property \App\Category $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Orders extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = true;

    /**
     * @var string
     */
    protected $title = "Заказы";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-shopping-basket');
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync()
           ->setHtmlAttribute('class', 'table-primary')
           ->setApply(function($query){
                if( !auth()->user()->isAdmin() ){
                    $query->where('user_id',auth()->user()->id);
                }
                //$query->orderBy('name');
            });

    $columns = [
               AdminColumn::text('id', '#')->setWidth('30px'),
               AdminColumn::link('name', 'Заказчик'),
               AdminColumn::link('user.name', 'Пользователь'),
               AdminColumn::link('email', 'Email'),
               AdminColumn::link('phone', 'Телефон'),
               AdminColumn::link('total', 'Сумма'),
               AdminColumn::boolean('paid', 'Оплачен')
    ];
    
        $display->setColumns($columns);

        // $display->setColumnFilters([
        //         null,
        //         AdminColumnFilter::text()->setPlaceholder('Имя'),
        //         AdminColumnFilter::text()->setPlaceholder('Email'),
        //         null,
        //         null,
        //     ]); 

        return $display;   
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $form = AdminForm::panel();
        $tabs = AdminDisplay::tabbed();
        $columnsMain = AdminFormElement::columns([
            [
                AdminFormElement::text('name', 'Заказчик')->required(),
                AdminFormElement::select('user_id', 'Пользователь')->setLoadOptionsQueryPreparer(function( $item, $query){
                    return $query
                        ->orderBy('email');
                })->setModelForOptions(new \App\User())->setDisplay('email')->setReadOnly(!auth()->user()->isAdmin()),
                AdminFormElement::text('email', 'Email'),
                AdminFormElement::text('phone', 'Телефон'),
                AdminFormElement::text('total', 'Сумма')->setReadOnly(!auth()->user()->isAdmin()),
                AdminFormElement::select('payment_id', 'Способ оплаты')->setLoadOptionsQueryPreparer(function( $item, $query){
                    return $query
                        ->orderBy('name');
                })->setModelForOptions(new \App\Payment())->setDisplay('name'),
                AdminFormElement::checkbox('paid', 'Оплачен')->setReadOnly(!auth()->user()->isAdmin()),
            ],
        ]);
        $tabs->appendTab($columnsMain, 'Заказ');
        $tabs->appendTab(
            new  \SleepingOwl\Admin\Form\FormElements([
                AdminDisplay::table()
                    ->setHtmlAttribute('class', 'table-primary')->setModelClass(\App\OrderItem::class)
                    ->setApply(function($query)use($id){
                        $query->where('order_id', $id);
                    })->setColumns([
                        AdminColumn::link('product_id', '#')->setWidth('30px'),
                        AdminColumn::link('product.name', 'Услуга'),
                    ]),
            ]),            
            'Состав'
        );

        $form->addElement($tabs);

        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
