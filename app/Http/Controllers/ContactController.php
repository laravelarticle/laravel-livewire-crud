<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;


class ContactController extends Controller

{

    public function __construct()

    {

        //$this->middleware('auth');

    }


    public function getIndex()

    {

        return view('admin.contacts');

    }


    public function getData()

    {

        return Contact::all();

    }


    public function postStore(Request $request)

    {

        return Contact::create($request->all());

    }


    public function postUpdate(Request $request)

    {

        if ($request->has('id')) {

            $record = Contact::find($request->input('id'));

            $record->update($request->all());

        }

    }


    public function postDelete(Request $request)

    {

        if ($request->has('id')) {
            $record = Contact::where('id', $request->input('id'));
            $record->delete();
        }
    }

}