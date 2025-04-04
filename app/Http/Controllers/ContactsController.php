<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Models\Contact;

class ContactsController extends Controller
{

    public function ContactListAll(){
        $contacts = Contact::all();

        if (count($contacts) > 0) {
            return view('index', compact('contacts'));
        }
        return view('index', ['error' => 'Unable to find contacts.']);
    }

    public function CreateContact(){
        return view('create');
    }


    public function StoreContact(Request $request){

        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'contact' => 'required|string|digits:9',
            'email' => 'nullable|email|max:255',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact added successfully!');
    }

    public function ShowContact($id)
    {
        $contact = Contact::findOrFail($id);
        return view('show', compact('contact'));
    }

    public function EditContact($id)
    {
        $contact = Contact::findOrFail($id);
        return view('edit', compact('contact'));
    }

    public function UpdateContact(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'contact' => 'required|string|digits:9',
            'email' => 'nullable|email|max:255',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully!');
    }

    public function DestroyContact($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }
}