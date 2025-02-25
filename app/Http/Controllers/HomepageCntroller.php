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
            'data' => $data,
        ]);
    }

    public function addForm() {
        return view('form');
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
