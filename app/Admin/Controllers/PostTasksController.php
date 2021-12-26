<?php

namespace App\Admin\Controllers;

use App\Models\PostTasks;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PostTasksController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PostTasks';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PostTasks());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('meta_keywords', __('Meta keywords'));
        $grid->column('meta_description', __('Meta description'));


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
        $show = new Show(PostTasks::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('meta_keywords', __('Meta keywords'));
        $show->field('meta_description', __('Meta description'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PostTasks());

        $form->text('title', __('Title'));
        $form->text('meta_keywords', __('Meta keywords'));
        $form->text('meta_description', __('Meta description'));

        return $form;
    }
}
