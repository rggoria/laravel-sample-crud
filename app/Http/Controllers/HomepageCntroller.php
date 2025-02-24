<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

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
}
