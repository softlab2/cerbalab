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
class Sliders extends Section implements Initializable
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
    protected $title = "Слайдеры";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-sliders');
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
            AdminColumn::link('name', 'Название')->setWidth('100px'),
            AdminColumn::link('slug', 'Код'),
            AdminColumnEditable::checkbox('enabled', 'Включен')->setLabel('Включен'),
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
                AdminFormElement::text('slug', 'Код')->required(),
                AdminFormElement::checkbox('enabled', 'Включен'),
                AdminFormElement::text('width', 'Ширина изображений, px')->required(),
                AdminFormElement::text('height', 'Высота изображений, px')->required(),
            ],
            []
        ]);
        $tabs->appendTab($columnsMain, 'Слайдер');

        if($id){
            $columnsItems = AdminFormElement::columns([
                [
                    AdminSection::getModel(\App\SliderItem::class)->fireDisplay(['slider_id'=>$id])
                ],
                [
                ]
            ]);
            $tabs->appendTab($columnsItems, 'Изображения');
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
