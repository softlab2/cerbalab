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
class Contacts extends Section implements Initializable
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
    protected $title = "Контакты";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-vcard');
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
            AdminColumnEditable::checkbox('enabled', 'Активен'),
            AdminColumnEditable::text('position', 'Порядок'),
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
                AdminFormElement::text('address', 'Адрес')->required(),
                AdminFormElement::text('phone', 'Телефон')->required(),
                AdminFormElement::text('metro', 'Станции метро'),
                AdminFormElement::checkbox('enabled', 'Активен'),
                AdminFormElement::image('image', 'Изображение'),
                AdminFormElement::text('lat', 'Широта'),
                AdminFormElement::text('lng', 'Долгота'),
            ],
            [
                AdminFormElement::html('Режим работы:'),
                AdminFormElement::text('worktime->mon', 'Понедельник'),
                AdminFormElement::text('worktime->tue', 'Вторник'),
                AdminFormElement::text('worktime->wed', 'Среда'),
                AdminFormElement::text('worktime->thu', 'Четверг'),
                AdminFormElement::text('worktime->fri', 'Пятница'),
                AdminFormElement::text('worktime->sat', 'Суббота'),
                AdminFormElement::text('worktime->sun', 'Воскресенье'),
            ]
        ]);
        $tabs->appendTab($columnsMain, 'Контакт');

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
