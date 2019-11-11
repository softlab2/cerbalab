<?php

namespace App\Http\Sections;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminColumn;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Form\FormElements;

/**
 * Class Categories
 *
 * @property \App\Category $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Themes extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = "Дизайн";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-sitemap');
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()
           ->setHtmlAttribute('class', 'table-primary')
           ->setColumns(
                AdminColumn::link('id', '#')->setWidth('30px'),
                AdminColumn::link('name', 'Название'),
                AdminColumn::boolean('active', 'Активна')
           )->paginate(20);    
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
    
        $tabs->appendTab(
                    new  FormElements([
                        AdminFormElement::text('name', 'Название')->required(),
                        AdminFormElement::checkbox('active', 'Активна'),
                        AdminFormElement::text('left_col_count', 'Количество элементов в левом столбце прайсов')->required(),
                    ]),
              'Основные данные'
        );
        $tabs->appendTab(
                    new  FormElements([
                        AdminFormElement::text('h1', 'H1')->required(),
                        AdminFormElement::text('title', 'Title')->required(),
                        AdminFormElement::text('keywords', 'Keywords'),
                        AdminFormElement::text('description', 'Description'),
                    ]),
              'Метатэги'
        );
        // $tabs->appendTab(
        //             new  FormElements([
        //                 AdminFormElement::textarea('template', 'Шаблон'),
        //             ]),
        //       'Шаблон'
        // );
        $tabs->appendTab(
                    new  FormElements([
                            AdminFormElement::image('image', 'Логотип'),
                            AdminFormElement::image('icon', 'fav-icon'),
                    ]),
              'Изображения'
        );
        $tabs->appendTab(
                    new  FormElements([
                        AdminFormElement::text('phone', 'Телефон'),
                        AdminFormElement::text('address', 'Адрес'),
                        AdminFormElement::text('email', 'Email'),
                    ]),
              'Контакты'
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
