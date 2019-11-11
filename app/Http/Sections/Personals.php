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
class Personals extends Section implements Initializable
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
    protected $title = "Врачи";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-graduation-cap');
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
            AdminColumnEditable::text('groups', 'Группа'),
            AdminColumnEditable::text('position', 'Порядок'),
            AdminColumnEditable::checkbox('enabled', 'Активен'),
            AdminColumnEditable::checkbox('zapis', 'Запись')->setLabel('Запись'),
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
                AdminFormElement::text('name', 'Имя')->required(),
                AdminFormElement::image('image', 'Изображение'),
                AdminFormElement::checkbox('enabled', 'Активен'),
                AdminFormElement::checkbox('zapis', 'Запись'),
                AdminFormElement::text('slug', 'URL'),
                AdminFormElement::text('groups', 'Группа'),
                AdminFormElement::text('position', 'Порядок'),
            ],
            [
                AdminFormElement::multiselect('contacts', 'Клиники')->setLoadOptionsQueryPreparer(function( $item, $query){
                    return $query
                        ->orderBy('name');
                })->setModelForOptions(new \App\Contact())->setDisplay('name'),
                AdminFormElement::selectajax('user_id', 'Пользователь')->setLoadOptionsQueryPreparer(function( $item, $query){
                    return $query
                        ->orderBy('name');
                })->setModelForOptions(new \App\User())->setDisplay('name')
            ]
        ]);
        $columnsDesc = AdminFormElement::columns([
            [
                AdminFormElement::wysiwyg('annotation', 'Краткое описание'),
                AdminFormElement::wysiwyg('description', 'Полное описание'),
            ],
            [
            ]
        ]);
        $tabs->appendTab($columnsMain, 'Врач');
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
