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
class Actions extends Section implements Initializable
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
    protected $title = "Акции";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-star');
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
            AdminColumn::image('image', 'Изображение')->setWidth('60px'),
            AdminColumn::link('name', 'Название'),
            AdminColumnEditable::checkbox('enabled', 'Активна'),
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
                AdminFormElement::text('name', 'Название')->required(),
                AdminFormElement::image('image', 'Изображение'),
                AdminFormElement::checkbox('enabled', 'Активен'),
                AdminFormElement::text('discount', 'Скидка,%'),
                AdminFormElement::multiselectajax('products', 'Акционные услуги')->setLoadOptionsQueryPreparer(function( $item, $query){
                    return $query
                        ->orderBy('name');
                })->setModelForOptions(new \App\Product())->setDisplay('name')
            ],
            [
            ]
        ]);
        $columnsDesc = AdminFormElement::columns([
            [
                //AdminFormElement::wysiwyg('annotation', 'Краткое описание'),
                AdminFormElement::textarea('description', 'Полное описание'),
            ],
            [
            ]
        ]);
        $tabs->appendTab($columnsMain, 'Акция');
        $tabs->appendTab($columnsDesc, 'Описание');

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
