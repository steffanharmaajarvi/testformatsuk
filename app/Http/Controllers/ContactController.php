<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddContactRequest;

class ContactController extends Controller
{

    /**
     * Показываем все контакты
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index ()
    {

        $contacts = Contact::all();

        $user = User::find(Auth::id());

        $userContacts = $user->contacts->toArray();

        $favoriteContacts = [];

        foreach ( $userContacts as $m ) {

           $favoriteContacts[] = $m['id'];

        }

        return view('dashboard', compact(['contacts', 'favoriteContacts']));

    }

    /**
     * Добавление контакта в БД
     *
     * @param AddContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add ( AddContactRequest $request )
    {

        $validated = $request->validated();

        $contact = new Contact();

        $contact->name = $validated['name'];
        $contact->phone = $validated['phone'];

        $result = $contact->save();

        if ( $result ) {

            return redirect()->route('dashboard')->with('success', 'Вы успешно добавили контакт!');

        }

    }

    /**
     * Находим все контакты пользователя
     *
     * @return array
     */
    public function findContact ()
    {

        $user = User::find(Auth::id());

        return $user->contacts();

    }

    /**
     * Добавление контракта в избранное
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function takeContact ( $id )
    {

        $this->findContact()->attach($id);

        return redirect()->route('dashboard')->with('success', 'Вы успешно добавили контакт в избранное!');


    }

    /**
     * Удаление контакта из избранного
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteContact ( $id )
    {

        $this->findContact()->detach($id);

        return redirect()->route('dashboard')->with('success', 'Вы успешно удалили контакт из избранного!');


    }

    /**
     * Выводим контакты пользователя
     *
     */
    public function myContacts ()
    {

        $user = User::find(Auth::id());

        $favoriteContacts = $user->contacts->toArray();

        return view('myContacts', compact(['favoriteContacts']));


    }

}
