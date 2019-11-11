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
class Receptions extends Section implements Initializable
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
    protected $title = "Запись на прием";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-user-plus');
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::datatablesAsync();

        // include(__DIR__.'/Items/'.env('CATALOG_ITEM_TYPE', 'org').'/display.php');

        $columns = [
            AdminColumn::text('id', '#')->setWidth('30px'),
            AdminColumn::link('created_at', 'Дата')->setWidth('100px'),
            AdminColumn::link('phone', 'Телефон'),
            AdminColumn::link('personal.name', 'Врач'),
            AdminColumnEditable::checkbox('approwed', 'Обработана')->setLabel('Обработана'),
        ];

        $display->setHtmlAttribute('class', 'table-primary')
           ->setColumns($columns)->paginate(20);    

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
                AdminFormElement::text('name', 'Имя'),
                AdminFormElement::text('phone', 'Телефон')->required(),
                AdminFormElement::checkbox('approwed', 'Обработана'),
                AdminFormElement::select('personal_id', 'Врач')->setLoadOptionsQueryPreparer(function( $item, $query){
                    return $query
                        ->orderBy('name');
                })->setModelForOptions(new \App\Personal())->setDisplay('name'),
                AdminFormElement::text('reception_time', 'Время приема'),
                AdminFormElement::textarea('description', 'Сообщение'),
            ],
            [
            ]
        ]);
        $tabs->appendTab($columnsMain, 'Запись');

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
