<?php

namespace App\Admin\Controllers;

use App\Models\Homebanner;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;

class HomebannerController extends Controller
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
            ->header('首页轮播图列表')
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
            ->header('轮播图')
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
            ->header('编辑首页轮播图')
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
            ->header('新增首页轮播图')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Homebanner);

        $grid->model()->orderBy('created_at', 'desc');
        $grid->id('ID')->sortable();
         $grid->created_at('Created');
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
        $show = new Show(Homebanner::findOrFail($id));

        $show->id('Id');

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
            $form = new Form(new Homebanner);
            $form->display('id', 'ID');
            $form->image('banner', '图片')->rules('required|image');
            //禁用按钮
            $form->tools(function (Form\Tools $tools) {
                $tools->disableView();
                $tools->disableDelete();
            });
            $form->saved(function (Form $form) {
                $image=$form->model()->banner;
                $id=$form->model()->id;
                if(strpos($image,'laravel3')==0&&strpos($image,'laravel3')==0)
                {
                    $image="http://www.laravel3.com/upload/".$image;
                    Homebanner::query()->where('id', $id)->update([
                        'banner' => $image
                    ]);
                }
            });

            return $form;
//        });
    }
}
