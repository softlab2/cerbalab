<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
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
class Categories extends Section implements Initializable
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
    protected $title = "Категории";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-folder');
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::tree()->setValue('title')->setOrderField('position')->setView('tree_old');    
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::form()->setElements([
            AdminFormElement::text('title', 'Название')->required(),
            AdminFormElement::checkbox('enabled', 'Активен'),
            AdminFormElement::text('slug', 'Url'),
            AdminFormElement::text('h1', 'H1')->required(),  
            AdminFormElement::text('keywords', 'keywords')->setDefaultValue(' '),
            AdminFormElement::textarea('description', 'description')->setDefaultValue(''),
            AdminFormElement::select('parent_id', 'Родитель')->setModelForOptions(new \App\Category)->nullable()
                ->setLoadOptionsQueryPreparer(function( $item, $query){
                    return $query->orderBy('title');
                })->setDisplay('title'),
        ]);    
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
