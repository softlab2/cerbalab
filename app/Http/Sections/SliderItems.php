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
class SliderItems extends Section implements Initializable
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
    protected $title = "Элементы слайдера";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        // /$this->addToNavigation()->setIcon('fa fa-sitemap');
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay($payload)
    {
        $display = AdminDisplay::datatablesAsync();

        // include(__DIR__.'/Items/'.env('CATALOG_ITEM_TYPE', 'org').'/display.php');

        $columns = [
            AdminColumn::text('id', '#')->setWidth('30px'),
            AdminColumn::image('image', 'Изображение')->setWidth('60px'),
            AdminColumn::link('title', 'Заголовок'),
            AdminColumnEditable::checkbox('enabled', 'Активна'),
        ];

        $display->setHtmlAttribute('class', 'table-primary')
            ->setApply(function($query)use($payload){
                return $query->where('slider_id', $payload['slider_id']);
            })
           ->setColumns($columns)->paginate(20)->setParameter('slider_id', $payload['slider_id']);    

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
        
        $slider_id = 0;
        if(isset($_GET['slider_id']))
            $slider_id = $_GET['slider_id'];
        if(isset($_POST['slider_id']))
            $slider_id = $_POST['slider_id'];

        $columnsMain = AdminFormElement::columns([
            [
                AdminFormElement::text('title', 'Заголовок')->required(),
                AdminFormElement::image('image', 'Изображение'),
                AdminFormElement::checkbox('enabled', 'Активен'),
                AdminFormElement::text('url', 'Ссылка'),
                AdminFormElement::hidden('slider_id', $slider_id),
                AdminFormElement::text('button_text', 'Текст кнопки'),
                AdminFormElement::textarea('text', 'Текст'),
            ],
            [
            ]
        ]);
        $tabs->appendTab($columnsMain, 'Изображения');

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
