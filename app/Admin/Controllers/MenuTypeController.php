<?php

namespace App\Admin\Controllers;

use App\Models\Menu;
use App\Models\MenuType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MenuTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'MenuType';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MenuType());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('order', __('Order'));


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
        $show = new Show(MenuType::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('parent_id', __('Parent id'));
        $show->field('order', __('Order'));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new MenuType());

        $form->select('parent_id')->options(Menu::all()->mapWithKeys(function (Menu $menu) {
            return [$menu->id => $menu->title];
        })->toArray());
        $form->text('title', __('Title'))->creationRules('required|min:3|max:50');
        $form->number('order')->default(0);

        return $form;
    }
}
