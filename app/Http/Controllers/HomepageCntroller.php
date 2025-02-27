<?php

namespace App\Http\Controllers;

use App\Mail\SampleEmailer;
use DB;
use Illuminate\Http\Request;
use Mail;

class HomepageCntroller extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function getData() {
        $data = DB::table('sample')->get();
        
        return view('dashboard', [
            'sample' => $data,
        ]);
    }

    public function addForm() {
        return view('addForm');
    }

    public function insertForm(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'gender' => 'required',
        ]);

        $insert[] = [
            'name' => $request->name,
            'gender' => $request->gender,
        ];
        
        if ($insert) {
            DB::table('sample')
                ->insert($insert);
            return redirect()->route('dashboard')->with('success', 'User Created');
        } else {
            return back()->withErrors()->with('error', 'An error found');
        }
    }

    public function editForm($id){

        $user = DB::table('sample')->find($id);

        return view('editForm', compact('user'));
    }

    public function updateForm(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required',
            'gender' => 'required',
        ]);
        $user = DB::table('sample')->find($id);
        if ($user->name == $request->name && $user->gender == $request->gender) {
            return back()->with('info', 'No Changes were made.');
        }
        $update = DB::table('sample')
                    ->where('id', $id)
                    ->update(
                        [
                            'name' => $request->name,
                            'gender' => $request->gender,
                        ]
                        );
        if ($update) {
            return redirect()->route('dashboard')->with('success', 'User Updated');
        } else {
            return back()->withErrors()->with(['error' => 'An error occured']);
        }
    }

    public function delete($id){
        $user = DB::table('sample')->where('id', $id);
        if ($user->exists()) {
            $user->delete();
            return redirect()->route('dashboard')->with('success', 'User Deleted');
        }
        return redirect()->route('dashboard')->with('error', 'User not found');
    }

    public function emailer(){
        return view('emailer');
    }

    public function emailerSubmit(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
        ]);

        Mail::to($request->email)->send(new SampleEmailer($request->all()));
        return redirect()->route('emailer')->with('success', 'Email Sent');

    }

}
