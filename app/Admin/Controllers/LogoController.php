<?php

namespace App\Admin\Controllers;

use App\Models\Logo;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;


class LogoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Logo';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Logo());

        $grid->column('id', __('Id'));

        $grid->column('logo')->image();
        $grid->column('logowrap', __('Logowrap'))->image('','60','60');
        $grid->column('logofooter', __('Logofooter'))->image('','60','60');
        $grid->column('copyright', __('Copyright'));

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
        $show = new Show(Logo::findOrFail($id));
        $show->field('logo')->image();
        $show->field('id', __('Id'));
        $show->field('logo', __('Logo'))->image('','60','60');
        $show->field('logowrap', __('Logowrap'))->image('','60','60');
        $show->field('logofooter', __('Logofooter'))->image('','60','60');
        $show->field('copyright', __('Copyright'));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Logo());
        $form->image('logo', __('Logo'));
        $form->image('logowrap', __('Logowrap'));
        $form->image('logofooter', __('Logofooter'));
        $form->text('copyright', __('Copyright'));

        return $form;
    }
}
