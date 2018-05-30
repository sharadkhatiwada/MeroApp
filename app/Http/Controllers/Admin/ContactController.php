<?php

namespace App\Http\Controllers\Admin;
use App\Admin\ContactBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = ContactBook::paginate(10);
        return view ( 'admin.contact.index',compact('contacts') );
    }
    public function create()
    {
        return view('admin.contact.create');
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|max:20',
            'address' => 'required',
            'mobile' => 'required|max:10',
            'email' => 'required|email|unique:contact_book,email',
            //'status' => 'required',

        ]);

        ContactBook::create([
            'fullname' => $request->get('fullname'),
            'address' => $request->get('address'),
            'mobile' => $request->get('mobile'),
            'email' => $request->get('email'),
            'status' => ($request->get('status') == 'on' ? 1 : 0)
        ]);
        //ContactBook::create($request->all());

        return back()->with('success', 'You have just created one contact');
    }
    public function edit($id)
    {
        $contact = ContactBook::find($id);
        return view('admin.contact.edit',compact('contact'));
    }

    public function update(Request $request, $id)
    {
        //Validate
        $this->validate($request, [
            'fullname' => 'required|max:20',
            'address' => 'required',
            'mobile' => 'required|max:10',
            'email' => 'unique:contact_book,email,'.$request->id
            //'email' => 'required|email|unique:contact_book,email,:email',
            //'status' => 'required',

        ]);
        $data=([
            'fullname' => $request->get('fullname'),
            'address' => $request->get('address'),
            'mobile' => $request->get('mobile'),
            'email' => $request->get('email'),
            'status' => ($request->get('status') == 'on' ? 1 : 0)
        ]);
        ContactBook::find($id)->update($data);
        return redirect()->route('contact')->with('success','Contact updated successfully');
    }
    public function destroy1($id)
    {
        ContactBook::find($id)->delete();
        return redirect()->route('contact')
            ->with('success','Contact deleted successfully');
    }
    public function destroy(Request $request,$id)
    {
        //$id = $request->id;
        ContactBook::find($id)->delete();
        return redirect()->route('contact')
            ->with('success','Contact deleted successfully');
    }
}
