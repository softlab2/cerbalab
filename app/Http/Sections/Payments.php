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
class Payments extends Section implements Initializable
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
    protected $title = "Эквайринг и способы оплаты";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-cc-mastercard');
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
            AdminColumnEditable::checkbox('enabled', 'ВКЛ', 'ВКЛ'),
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
                AdminFormElement::checkbox('enabled', 'Активен'),
                AdminFormElement::checkbox('settings->online', 'Онлайн оплата'),
            ],
            [
            ]
        ]);
        $tabs->appendTab($columnsMain, 'Основноe');
        $tabs->appendTab(
            new  \SleepingOwl\Admin\Form\FormElements([
                AdminFormElement::text('settings->name', 'Контрагент'),
                AdminFormElement::checkbox('settings->test', 'Тестовый режим'),
                AdminFormElement::text('settings->merchant_id', 'merchantId'),
                AdminFormElement::text('settings->currency', 'Код валюты транзакции (643 – рубли)'),
                AdminFormElement::text('settings->create_order_url', 'Ссылка для соединения'),
                AdminFormElement::text('settings->payment_url', 'Ссылка на страницу для ввода данных карты'),
                AdminFormElement::text('settings->cert_path', 'Путь к файлу сертификата'),
                AdminFormElement::text('settings->key_path', 'Путь к файлу ключа'),
                AdminFormElement::text('settings->approve_url', 'URL, на который будет перенаправлен клиент после одобрения операции'),
                AdminFormElement::text('settings->cancel_url', 'URL, на который будет перенаправлен клиент после отказа'),
                AdminFormElement::text('settings->decline_url', 'URL, на который будет перенаправлен клиент в случае неуспешного проведения операции оплаты'),
            ]),            
            'Настройки соединения'
        );

        $tabs->appendTab(
            new  \SleepingOwl\Admin\Form\FormElements([
                AdminFormElement::textarea('settings->xml', 'XML запрос'),
            ]),            
            'Формат запроса'
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
