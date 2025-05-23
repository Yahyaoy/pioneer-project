<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = ContactMessage::all();
        return view('contacts.index',compact('contacts'));
    }
    public function destroy($id)
    {
        $contact = ContactMessage::findOrFail($id);

        // File::delete(public_path('uploads/categories/'.$category->image));

        // $category->children()->update(['parent_id' => null]);

        $contact->delete();

        return redirect()->back()->with('success', 'Contact deleted successfully');
    }
}
