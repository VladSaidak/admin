<?php

namespace App\Admin\Controllers;

use App\Models\Block;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BlockController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Block';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Block());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('text', __('Text'));
        $grid->column('thumbnail')->image('','60','60');
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
        $show = new Show(Block::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('text', __('Text'));
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
        $form = new Form(new Block());

        $form->text('title', __('Title'))->creationRules('required|min:3|max:50');
        $form->text('text', __('Text'));
        $form->image('thumbnail', __('Thumbnail'));
        $states = [
            'on' => ['value'=>1, 'text'=>'publish'],
            'off' => ['value' => 0, 'text' => 'draft']
        ];
        $form->switch('released', __('Publish'))->states($states);
        return $form;
    }
}
