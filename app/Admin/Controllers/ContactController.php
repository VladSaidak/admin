<?php

namespace App\Admin\Controllers;

use App\Models\Contact;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ContactController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Contact';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Contact());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('subtitle', __('Subtitle'));
        $grid->column('name', __('Name'));
        $grid->column('number', __('Number'));
        $grid->column('email', __('Email'));




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
        $show = new Show(Contact::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('subtitle', __('Subtitle'));
        $show->field('name', __('Name'));
        $show->field('number', __('Number'));
        $show->field('email', __('Email'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Contact());

        $form->text('title', __('Title'))->creationRules('required|min:3');
        $form->text('subtitle', __('Subtitle'));
        $form->text('name', __('Name'));
        $form->text('number', __('Number'))->creationRules('required|integer|min:10');
        $form->email('email', __('Email'))
            ->creationRules(['required', "unique:contacts"])
            ->updateRules(['required', "unique:test_blog,email,{{id}}"]);
        return $form;
    }
}
