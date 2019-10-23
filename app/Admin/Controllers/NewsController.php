<?php

namespace App\Admin\Controllers;

use App\Models\News;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;

class NewsController extends Controller
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
            ->header('新闻列表')
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
            ->header('新闻')
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
            ->header('编辑新闻')
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
            ->header('新增新闻')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new News);

        $grid->model()->orderBy('created_at', 'desc');
        $grid->id('ID')->sortable();
        $grid->titlezh('标题');
        $grid->iscompanynews('公司新闻/行业资讯')->display(function ($value) {
            return $value ? '公司新闻' : '行业资讯';
        });
        $grid->time('时间')->display(function ($value) {
            return substr($value,0,10);
        });;
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
        $show = new Show(News::findOrFail($id));

        $show->id('Id');
        $show->name('Name');
        $show->titlezh('Title');
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
            $form = new Form(new News);
            $form->display('id', 'ID');
            $form->text('titlezh', '标题内容(中文)')->rules('required');
            $form->ueditor('contentzh', '内容(中文)')->rules('required');
            $form->text('titleen', '标题内容(英文)')->rules('required');
            $form->ueditor('contenten', '内容(英文)')->rules('required');
            $form->text('titlede', '标题内容(徳文)')->rules('required');
            $form->ueditor('contentde', '内容(德文)')->rules('required');
            $form->radio('iscompanynews', '公司新闻/行业资讯')->options(['1' => '公司新闻', '0' => '行业资讯']);

            $form->date('time', '时间')->format('YYYY-MM-DD');
            //禁用按钮
            $form->tools(function (Form\Tools $tools) {
                $tools->disableView();
                $tools->disableDelete();
            });

            return $form;
//        });
    }
}
