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
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use Session;

/**
 * Class Categories
 *
 * @property \App\Category $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Products extends Section implements Initializable
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
    protected $title = "Услуги и тесты";

    /**
     * @var string
     */
    protected $alias;

    public function initialize()
    {
        $this->addToNavigation()->setIcon('fa fa-shopping-bag');
    }

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        if($_POST){
            if(isset($_POST['pk'])){
                $display = AdminDisplay::datatablesAsync()->setName('productsList')->setModelClass(\App\Product::class);
                $display->setHtmlAttribute('class', 'table-primary')
                   ->setColumns([
                    AdminColumn::link('sku', 'Артикул'),
                    AdminColumnEditable::checkbox('feature', 'Да', 'Нет')->setLabel('Популярный'),
                    AdminColumn::link('name', 'Название'),
                    AdminColumn::link('type.name', 'Тип'),
                ])->paginate(20);    
            }else{
                $display = AdminDisplay::tree(\SleepingOwl\Admin\Display\Tree\OrderTreeType::class)->setValue('name')->setModelClass(\App\Product::class)->setOrderField('position');    
            }
            return $display;
        }
        
        if(isset($_GET['generate'])){
                \MessagesStack::addInfo('Прайс сгенерирован. Ссылка для скачивания: <a href="/price.xls">price.xls</a>');
            //Excel::store(new ProductsExport, 'price.xlsx', 'public');
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('price_tpl.xls');
                $worksheet = $spreadsheet->getActiveSheet();

                $categories = [];
                $roots = \App\Category::defaultOrder()->whereIsRoot()->get();
                foreach ($roots as $root)
                {
                    $categories[] = makeCategory($root,0);
                        foreach ($root->children()->defaultOrder()->whereEnabled(1)->get() as $sub){
                        $categories[] = makeCategory($sub,1);
                        foreach($sub->children()->defaultOrder()->whereEnabled(1)->get() as $sub2){
                            $categories[] = makeCategory($sub2,2);
                                foreach($sub2->children()->defaultOrder()->whereEnabled(1)->get() as $sub3){
                                $categories[] = makeCategory($sub3,3);
                                foreach($sub3->children()->defaultOrder()->whereEnabled(1)->get() as $sub4){
                                    $categories[] = makeCategory($sub4,4);
                                }
                            }
                        }
                    }
                }

                $i=11;
                foreach ($categories as $c) {
                    $cStyles = $worksheet->getStyle('C'.($c->level+2));
                    $worksheet->duplicateStyle($cStyles, 'C'.$i);
                    $worksheet->getCell('A'.$i)->setValue('c');
                    $worksheet->getCell('B'.$i)->setValue($c->id);
                    $worksheet->getCell('C'.$i)->setValue($c->name);
                    $worksheet->mergeCells('C'.$i.':F'.$i);
                    $i++;
                    $itemType = 0;
                    $itemOffset = 6;

                    foreach ($c->products as $p) {
                        $line = $itemType + $itemOffset;
                        $worksheet->duplicateStyle($worksheet->getStyle('C'.$line), 'C'.$i);
                        $worksheet->duplicateStyle($worksheet->getStyle('D'.$line), 'D'.$i);
                        $worksheet->duplicateStyle($worksheet->getStyle('E'.$line), 'E'.$i);
                        $worksheet->duplicateStyle($worksheet->getStyle('F'.$line), 'F'.$i);
                        if($p->type_id == 1)
                            $worksheet->getCell('A'.$i)->setValue('t');
                        else
                            $worksheet->getCell('A'.$i)->setValue('u');
                        $worksheet->getCell('B'.$i)->setValue($p->id);
                        $worksheet->getCell('E'.$i)->setValue($p->sku);
                        $worksheet->getCell('C'.$i)->setValue($p->name);
                        $worksheet->getCell('F'.$i)->setValue($p->timelength);
                        $worksheet->getCell('D'.$i)->setValue($p->price);
                        $worksheet->getStyle('C'.($i))->getAlignment()->setWrapText(true);
                        $worksheet->getRowDimension($i)->setRowHeight(-1);
                        $i++;
                        if($p->annotation){
                            $worksheet->duplicateStyle($worksheet->getStyle('C'.($line+1)), 'C'.$i);
                            $worksheet->getStyle('C'.($i+1))->getAlignment()->setWrapText(true);
                            $worksheet->duplicateStyle($worksheet->getStyle('D'.($line+1)), 'D'.$i);
                            $worksheet->duplicateStyle($worksheet->getStyle('E'.($line+1)), 'E'.$i);
                            $worksheet->duplicateStyle($worksheet->getStyle('F'.($line+1)), 'F'.$i);
                            $worksheet->getCell('C'.$i)->setValue(strip_tags($p->annotation));
                            $worksheet->getCell('A'.$i)->setValue('d');
                            $worksheet->getStyle('C'.($i+1))->getAlignment()->setWrapText(true);
                            $worksheet->getRowDimension($i+1)->setRowHeight(-1);
                            $i++;
                        }
                        if($itemType == 0)
                            $itemType = 2;
                        else
                            $itemType = 0;
                    }
                }
                $worksheet->getColumnDimension('A')->setVisible(true);
                $worksheet->getColumnDimension('B')->setVisible(true);
                $worksheet->getRowDimension('1')->setVisible(true);
                $worksheet->getRowDimension('2')->setVisible(true);
                $worksheet->getRowDimension('3')->setVisible(true);
                $worksheet->getRowDimension('4')->setVisible(true);
                $worksheet->getRowDimension('5')->setVisible(true);
                $worksheet->getRowDimension('6')->setVisible(true);
                $worksheet->getRowDimension('7')->setVisible(true);
                $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
                $writer->save('price.xls');

        }

        if(isset($_GET['upload'])){
            // $form = AdminForm::form()->setElements([
            //     AdminFormElement::upload('price', 'Прайс'),
            // ]);
            // return $form;
            return view('admin.upload_price');
        }

        $tabs = AdminDisplay::tabbed();

            
        if(!empty($_GET['view']))
            $view = $_GET['view'];
        elseif(Session::get('view')){
            $view = Session::get('view');
        }else{
            $view = 'table';
        }

        Session::put('view', $view);
        $view = Session::get('view');

        $category_id = null;
        if(isset($_GET['category_id'])){
            $category_id = $_GET['category_id'];
        }

        if($view == 'tree'){
            $display = AdminDisplay::tree(\SleepingOwl\Admin\Display\Tree\OrderTreeType::class)->setValue('name')->setModelClass(\App\Product::class)->setOrderField('position');    
            if($category_id){
                $cat = \App\Category::find($_GET['category_id']);
                $ids = $cat->descendants()->pluck('id')->toArray();
                $ids[] = $cat->id;
                $display->setApply(function($query)use($ids){
                    return $query->whereHas('categories',function($q)use($ids){
                        $q->whereIn('category_id',$ids);
                    })->orderBy('feature')->orderBy('position')->orderBy('title');
                });
            }
        }else{
            $display = AdminDisplay::datatablesAsync()->setName('productsList')->setModelClass(\App\Product::class);

            if($category_id){
                $cat = \App\Category::find($_GET['category_id']);
                $ids = $cat->descendants()->pluck('id')->toArray();
                $ids[] = $cat->id;
                $display->setApply(function($query)use($ids){
                    return $query->whereHas('categories',function($q)use($ids){
                        $q->whereIn('category_id',$ids);
                    })->orderBy('feature')->orderBy('position')->orderBy('title');
                });
            }

            $display->setHtmlAttribute('class', 'table-primary')
               ->setColumns([
                AdminColumn::link('sku', 'Артикул'),
                AdminColumnEditable::checkbox('feature', 'Да', 'Нет')->setLabel('Популярный'),
                AdminColumn::link('name', 'Название'),
                AdminColumn::link('type.name', 'Тип'),
            ])->paginate(20);    
        }

        $display->getActions()->setView(view('admin.export_toolbar', ['view'=>$view, 'category_id'=>$category_id]))->setPlacement('panel.heading.actions');

        $columns = AdminFormElement::columns([
            [
                AdminSection::getModel(\App\Category::class)->fireDisplay([])   
            ],
            [
                $display
            ],
        ]);
        
        $tabs->appendTab(
            AdminFormElement::columns()
            ->addColumn(
                [
                    AdminDisplay::tree()->setValue('title')->setModelClass(\App\Category::class)->setView(view('admin.tree'))->setOrderField('position')   
                ],
                5
            )
            ->addColumn(
                [
                    $display
                ],
                7
            )
            ,
            //Название таба
            'Список'
        );

        return $tabs;
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
                AdminFormElement::text('sku', 'Артикул')->required(),
                AdminFormElement::select('type_id', 'Тип')->setLoadOptionsQueryPreparer(function( $item, $query){
                            return $query->orderBy('name');
                        })->setModelForOptions(new \App\Type)->setDisplay('name')->required(),
                AdminFormElement::checkbox('enabled', 'Активен'),
                AdminFormElement::checkbox('feature', 'Популярный'),
                AdminFormElement::multiselect('categories', 'Категории')->setLoadOptionsQueryPreparer(function( $item, $query){
                            return $query->orderBy('title');
                        })->setModelForOptions(new \App\Category)
            ],
            [
                AdminFormElement::text('price', 'Цена, руб'),
                AdminFormElement::text('old_price', 'Старая цена, руб'),
                AdminFormElement::text('timelength', 'Срок выполнения'),
            ]
        ]);
        $columnsSeo = AdminFormElement::columns([
            [
                AdminFormElement::text('slug', 'Url'),
                AdminFormElement::text('title', 'Title'),
                AdminFormElement::text('h1', 'H1'),  
                AdminFormElement::text('keywords', 'keywords')->setDefaultValue(' '),
                AdminFormElement::textarea('description', 'description')->setDefaultValue(''),
            ],
            [
            ]
        ]);

        if(settings('enable_products_editor', 0))
            $r = AdminFormElement::wysiwyg('annotation', 'Описание');
        else
            $r = AdminFormElement::textarea('annotation', 'Описание');

        $columnsDesc = AdminFormElement::columns([
            [
                $r
            ],
            [
            ]
        ]);
        $tabs->appendTab($columnsMain, 'Основноe');
        $tabs->appendTab($columnsSeo, 'SEO');
        $tabs->appendTab($columnsDesc, 'Описание');
        if($id){
            $p = \App\Product::find($id);
            if($p->type->items){
                $items = [];
                foreach ($p->type->items as $item) {
                    if(settings('enable_products_editor', 0))
                        $items[] = AdminFormElement::wysiwyg('items->'.$item->name, $item->title);
                    else
                        $items[] = AdminFormElement::textarea('items->'.$item->name, $item->title);
                }
                $columnsItems = AdminFormElement::columns([
                        $items,
                    [
                    ]
                ]);
                $tabs->appendTab($columnsItems, $p->type->desc_tab_title);
            }
            if($p->type->tabs){
                foreach ($p->type->tabs as $t) {
                    if(settings('enable_products_editor', 0))
                        $ts = [AdminFormElement::wysiwyg('tabs->'.$t->name, $t->title)];
                    else
                        $ts = [
                                AdminFormElement::file('pdfs->'.$t->name, 'pdf'),
                                AdminFormElement::textarea('tabs->'.$t->name, $t->title),

                            ];
                    $columnsTabs = AdminFormElement::columns([
                            $ts,
                        [
                        ]
                    ]);
                    $tabs->appendTab($columnsTabs, $t->title);
                }
            }
            $services = \App\Service::orderBy('name')->get();
            if($services){
                $ss = [];
                foreach ($services as $s) {
                    $ss[] = AdminFormElement::text('services->'.$s->id, $s->name);
                }
                $columnsServices = AdminFormElement::columns([
                        $ss,
                    [
                    ]
                ]);
                $tabs->appendTab($columnsServices, 'Доп. услуги');
            }
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
