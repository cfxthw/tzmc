<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;

class ProductController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('产品列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('产品')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑产品')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('新增产品')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product);

        $grid->model()->orderBy('created_at', 'desc');
        $grid->id('ID')->sortable();
        $grid->isproduct('模具/产品')->display(function ($value) {
            return $value ? '模具' : '产品';
        });
        $grid->product_name_zh('名字');
        $grid->actions(function ($actions) {
            $actions->disableView();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->id('Id');
        $show->product_name_zh('Name');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
            $form = new Form(new Product);
            $form->display('id', 'ID');
            $form->radio('isproduct', '模具/产品')->options(['1' => '模具', '0' => '产品']);
            $form->image('product_image', '图片')->rules('required|image');
            $form->text('product_name_zh', '名字(中文)')->rules('required');
            // $form->ueditor('product_content_zh', '内容(中文)')->rules('required');
            $form->text('product_name_en', '名字(英文)')->rules('required');
            // $form->ueditor('product_content_en', '内容(英文)')->rules('required');
            $form->text('product_name_de', '名字(徳文)')->rules('required');
            // $form->ueditor('product_content_de', '内容(徳文)')->rules('required');
            $form->saved(function (Form $form) {
                $image=$form->model()->product_image;
                $id=$form->model()->id;
                if(strpos($image,'laravel3')==0&&strpos($image,'laravel3')==0)
                {
                    $image="http://www.laravel3.com/upload/".$image;
                    Product::query()->where('id', $id)->update([
                        'product_image' => $image
                    ]);
                }
            });
            //禁用按钮
            $form->tools(function (Form\Tools $tools) {
                $tools->disableView();
                $tools->disableDelete();
            });

            return $form;
//        });
    }
}
