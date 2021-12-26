<?php

namespace App\Http\Controllers;
use App\Models\Block;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Headsect;
use App\Models\Informations;
use App\Models\Logo;
use App\Models\Menu;
use App\Models\PostTasks;
use App\Models\Recipient;
use Illuminate\Http\Request;

class HomeController extends Controller
{
public function index(){
    $logos = Logo::all();
    $post_tasks = PostTasks::all();
    $recipients = Recipient::all();
    $events = Event::all();
    $headsects = Headsect::all();
    $contacts = Contact::all();
    $menus = Menu::all();
    $informations = Informations::all();
    $blocks  =  Block::allowed()->get();
    return view('home',[
        'headsects' => $headsects,
        'blocks' => $blocks,
        'events' => $events,
        'contacts' => $contacts,
        'recipients' => $recipients,
        'post_tasks' => $post_tasks,
        'logos'   =>  $logos,
        'menus'   =>  $menus,
        'informations'   =>  $informations,
    ]);

}
}
