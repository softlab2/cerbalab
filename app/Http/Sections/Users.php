<?php

namespace App\Http\Sections;

use AdminColumn;
use AdminColumnEditable;
use AdminColumnFilter;
use AdminDisplay;
use AdminDisplayFilter;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\DisplayInterface;
use SleepingOwl\Admin\Contracts\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;

/**
 * Class Categories
 *
 * @property \App\Category $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Users extends Section implements Initializable
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
    protected $title = "Пользователи";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-user');
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
                    $query->whereId(auth()->user()->id);
                }
                //$query->orderBy('name');
            });

    $columns = [
               AdminColumn::text('id', '#')->setWidth('30px'),
               AdminColumn::link('name', 'Имя'),
               AdminColumn::link('email', 'Email')
    ];
    
    if(auth()->user()->isAdmin())
        $columns[] = AdminColumnEditable::checkbox('verified', 'Включен')->setLabel('Включен');

    $columns[] = AdminColumn::lists('roles.title', 'Роли');
            
        $display->setColumns($columns);

        $display->setColumnFilters([
                null,
                AdminColumnFilter::text()->setPlaceholder('Имя'),
                AdminColumnFilter::text()->setPlaceholder('Email'),
                null,
                null,
            ]); 

        return $display;   
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $user = \App\User::find($id);
        $discount = $user->getDiscount();
        if( auth()->user()->isAdmin() || auth()->user()->id == $id){
            $elements = [
                AdminFormElement::text('name', 'Имя')->required(),
                AdminFormElement::text('email', 'Email')->required()->unique()->setReadOnly(!auth()->user()->isAdmin()),
                AdminFormElement::checkbox('verified', 'Включен')->setReadOnly(!auth()->user()->isAdmin()),
                AdminFormElement::multiselect('roles', 'Роли')->setLoadOptionsQueryPreparer(function( $item, $query){
                    return $query
                        ->orderBy('title');
                })->setModelForOptions(new \App\Role())->setDisplay('title')->setReadOnly(!auth()->user()->isAdmin()),
            ];

            if(auth()->user()->isAdmin()){
                $elements[] = AdminFormElement::text('discount', 'Скидка, %');
            }
            if($discount){
                $elements[] = AdminFormElement::html('<b>Итоговая скидка:</b> '.$discount. '%</br>');
            }
            $form =AdminForm::form()->setElements($elements);
           return $form;    
        }
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
