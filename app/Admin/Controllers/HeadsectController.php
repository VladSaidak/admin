<?php

namespace App\Admin\Controllers;

use App\Models\Headsect;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class HeadsectController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Headsect';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Headsect());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('subtitle', __('Subtitle'));
        $grid->column('thumbnail', __('Thumbnail'))->image();

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
        $show = new Show(Headsect::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('subtitle', __('Subtitle'));
        $show->field('thumbnail', __('Thumbnail'))->image('','60','60');


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Headsect());

        $form->text('title', __('Title'))->creationRules('required|min:5|max:50');
        $form->text('subtitle', __('Subtitle'))->creationRules('required|min:5');
        $form->image('thumbnail', __('Thumbnail'));

        return $form;
    }
}
