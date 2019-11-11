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
class Types extends Section implements Initializable
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
    protected $title = "Типы";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-list-ul');
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync();
        $display->setHtmlAttribute('class', 'table-primary')
           ->setColumns([
            AdminColumn::link('name', 'Название'),
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
                AdminFormElement::text('desc_tab_title', 'Название для таба с описанием'),
            ],
            [
            ]
        ]);


        $tabs->appendTab($columnsMain, 'Основноe');

        if($id){
            $columnsTabs = AdminFormElement::columns([
                [
                    AdminSection::getModel(\App\TypeTab::class)->fireDisplay(['type_id'=>$id]) 
                ],
                [
                ]
            ]);

            $tabs->appendTab($columnsTabs, 'Вкладки');

            $columnsItems = AdminFormElement::columns([
                [
                    AdminSection::getModel(\App\TypeItem::class)->fireDisplay(['type_id'=>$id]) 
                ],
                [
                ]
            ]);

            $tabs->appendTab($columnsItems, 'Поля');
        }

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
