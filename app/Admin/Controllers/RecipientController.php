<?php

namespace App\Admin\Controllers;

use App\Models\Recipient;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RecipientController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Recipient';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Recipient());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('subtitle', __('Subtitle'));
        $grid->column('name', __('Name'));
        $grid->column('number', __('Number'));
        $grid->column('thumbnail', __('Thumbnail'))->image('','60','60');
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
        $show = new Show(Recipient::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('subtitle', __('Subtitle'));
        $show->field('name', __('Name'));
        $show->field('number', __('Number'));
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
        $form = new Form(new Recipient());

        $form->text('title', __('Title'))->creationRules('required|min:3|max:50');
        $form->text('subtitle', __('Subtitle'));
        $form->text('name', __('Name'))->creationRules('min:3');
        $form->text('number', __('Number'));
        $form->image('thumbnail', __('Thumbnail'));
        $states = [
            'on' => ['value'=>1, 'text'=>'publish'],
            'off' => ['value' => 0, 'text' => 'draft']
        ];
        $form->switch('released', __('Publish'))->states($states);

        return $form;
    }
}
