<?php

namespace App\Admin\Controllers;

use App\Models\Event;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EventController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Event';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Event());

        $grid->column('id', __('Id'));
        $grid->column('event_category', __('Event category'));
        $grid->column('event_title', __('Event title'));
        $grid->column('event_description', __('Event description'));
        $grid->column('date', __('Date'));

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
        $show = new Show(Event::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('event_category', __('Event category'));
        $show->field('event_title', __('Event title'));
        $show->field('event_description', __('Event description'));
        $show->field('date', __('Date'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Event());

        $form->text('event_category', __('Event category'));
        $form->text('event_title', __('Event title'));
        $form->text('event_description', __('Event description'));
        $form->date('date', __('Date'))->default(date('Y-m-d'));

        return $form;
    }
}
