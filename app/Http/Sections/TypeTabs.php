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
class TypeTabs extends Section implements Initializable
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
    protected $title = "Вкладки для типа";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
       // $this->addToNavigation()->setIcon('fa fa-sitemap');
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay($payload)
    {
        $display = AdminDisplay::datatablesAsync();
        $display->setHtmlAttribute('class', 'table-primary')
           ->setColumns([
            AdminColumn::link('title', 'Название'),
            AdminColumn::link('name', 'Код'),
            AdminColumnEditable::checkbox('enabled', 'Вкл')
        ])->paginate(20)
        ->setApply(function($query)use($payload){
            return $query->where('type_id', $payload['type_id']);
        })->setParameter('type_id', $payload['type_id']);    

        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $type_id = 0;
        if(isset($_GET['type_id']))
            $type_id = $_GET['type_id'];
        if(isset($_POST['type_id']))
            $type_id = $_POST['type_id'];

        $form = AdminForm::panel();
        $tabs = AdminDisplay::tabbed();
        $columnsMain = AdminFormElement::columns([
            [
                AdminFormElement::text('title', 'Название')->required(),
                AdminFormElement::text('name', 'Код')->required(),
                AdminFormElement::checkbox('enabled', 'Вкл'),
                AdminFormElement::hidden('type_id', $type_id),
            ],
            [
            ]
        ]);
        $tabs->appendTab($columnsMain, 'Основноe');

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
