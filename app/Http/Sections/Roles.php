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
class Roles extends Section implements Initializable
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
    protected $title = "Роли";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-users');
    }

    /**
     * @return DisplayInterface
     */
/**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync()
           ->setHtmlAttribute('class', 'table-primary')
           ->setApply(function($query){
                $query->orderBy('name');
            });

        $display->setColumns([
               AdminColumn::text('id', '#')->setWidth('30px'),
               AdminColumn::link('title', 'Имя'),
               AdminColumn::link('name', 'Код'),
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
        $form =AdminForm::form()->setElements([
            AdminFormElement::text('title', 'Имя')->required(),
            AdminFormElement::text('name', 'Код')->required()->unique(),
            AdminFormElement::text('discount', 'Скидка, %'),                
        ]);
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
