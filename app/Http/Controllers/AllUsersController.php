<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Auth;

class AllUsersController extends Controller
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
     * Display a listing of the resource.
     */
    public function index()
    {   
         if (Auth::user()->status == "admin" ) {
            $data = DB::table('users')->whereNULL('status')->get();
            return view('user_all.index',['data' => $data]);
        }else{
            return view('home');
        }
                
    }
    
    public function bonus()
    {   
         if (Auth::user()->status == "admin" ) {
            $data = DB::table('users')->whereNULL('status')->get();
            return view('user_all.bonus',['data' => $data]);
        }else{
            return view('home');
        }
                
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::find($id);
        
        $user->ststus_point =  $request['app_rej'];
        $user->save();

        if ($request['app_rej'] == 'on') {
            $data = 'ปิดการถอนเรียบร้อย';
        }else{
            $data = 'เปิดการถอนเรียบร้อย';
        }
        return redirect('all-user')->with('message', $data );
    }


    public function updatePonit(Request $request, string $id)
    {
        dd("asd",$id);
        $user = User::find($id);
        $point = $user->point;
        if ($point > 0) {
            $user->point = $point + $request['add_poit'];
        }else{
            
            $user->point =  $request['add_poit'];
        
        }

        
        $user->save();

        return redirect('bonus')->with('message', "เติมเงินโบนัสให้ $user->username เรียบร้อย" );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}