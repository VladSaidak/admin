<?php

namespace App\Admin\Controllers;

use App\Models\Informations;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class InformationsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Informations';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Informations());
        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('content', __('Content'));
        $grid->column('thumbnail', __('Thumbnail'))->image();
        $grid->column('released', 'Released')->bool();
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
        $show = new Show(Informations::findOrFail($id));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Informations());

        $form->text('title', __('Title'))->creationRules('required|min:5|max:50');
        $form->number('order')->default(0);
        $form->text('content', __('Content'))->creationRules('required|min:5|max:250');
        $form->image('thumbnail', __('Thumbnail'));
        $states = [
            'on' => ['value'=>1, 'text'=>'publish'],
            'off' => ['value' => 0, 'text' => 'draft']
        ];
        $form->switch('released', __('Publish'))->states($states);
        return $form;
    }
}
