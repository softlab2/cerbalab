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
class Pages extends Section implements Initializable
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
    protected $title = "Страницы";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-clone');
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::tree()->setValue('name')->setOrderField('position')->setView('tree_old');    

        $tabs = AdminDisplay::tabbed();
        
        $display = AdminDisplay::datatablesAsync();
        $display->setHtmlAttribute('class', 'table-primary')
           ->setColumns([
            AdminColumn::link('name', 'Название'),
            AdminColumn::link('slug', 'URL'),
            AdminColumnEditable::checkbox('enabled', 'ВКЛ', 'ВКЛ'),
        ])->paginate(20);    

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
                AdminFormElement::text('name', 'Название')->required(),
                AdminFormElement::text('slug', 'URL'),
                AdminFormElement::checkbox('enabled', 'Активен'),
                AdminFormElement::checkbox('main_menu', 'Главное меню'),
            ],
            [
                AdminFormElement::text('title', 'Title')->required(),
                AdminFormElement::text('h1', 'H1'),
                AdminFormElement::text('keywords', 'keywords'),
                AdminFormElement::text('description', 'description'),
            ]
        ]);
        $tabs->appendTab($columnsMain, 'Основноe');
        $tabs->appendTab(
            new  \SleepingOwl\Admin\Form\FormElements([
                AdminFormElement::textarea('content', ''),
            ]),            
            'Контент'
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
