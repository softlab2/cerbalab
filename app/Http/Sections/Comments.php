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
class Comments extends Section implements Initializable
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
    protected $title = "Комментарии";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-comments');
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        $display = AdminDisplay::table();
        $display->setHtmlAttribute('class', 'table-primary')
           ->setColumns([
            AdminColumn::link('created_at', 'Дата'),
            AdminColumn::link('text', 'Комментарий'),
            AdminColumn::link('name', 'Автор'),
            AdminColumn::boolean('approved', 'Одобрен'),
        ])->setApply(function($q){
            return $q->orderBy('created_at', 'desc');
        })->paginate(20);    

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
                AdminFormElement::text('name', 'Автор')->required(),
                AdminFormElement::textarea('text', 'Комментарий')->required(),
                AdminFormElement::checkbox('approved', 'Одобрен'),
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
        $setting = new \App\Setting;
        $setting->title = 'Новая настройка';
        $setting->name = 'new_setting';
        $setting->value = 'значение';
        $setting->save();
        return redirect('/admin/settings/'.$setting->id.'/edit');
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
