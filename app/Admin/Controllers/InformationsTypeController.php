<?php

namespace App\Admin\Controllers;

use App\Models\Informations;
use App\Models\InformationsType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class InformationsTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'InformationsType';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new InformationsType());

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
        $show = new Show(InformationsType::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new InformationsType());

        $form->select('parent_id')->options(Informations::all()->mapWithKeys(function (Informations $informations) {
            return [$informations->id => $informations->title];
        })->toArray());
        $form->text('title', __('Title'))->creationRules('required|min:5|max:100');
        $form->number('order')->default(0);

        return $form;
    }
}
