<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BankNameUser;
use Illuminate\Support\Str;
use DB;
use Auth;

class BankNameUserController extends Controller
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
        $menus = DB::table('bank_name_users')->where('iduser', Auth::user()->id)->count();
       
        if ($menus) {
            $data = DB::table('bank_name_users')->where('iduser', Auth::user()->id)->get();
         /*    $data = Address::find(Auth::user()->id); */
            return view('bank_nam_user.edit', ['data' => $data]);

        }else{
            return view('bank_nam_user.index');
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
        $member =  new BankNameUser;
        $member->iduser = Auth::user()->id;
        $member->bank_user = $request['bank_user'];
        $member->bank_numbar_user = $request['bank_numbar_user'];
        $member->bank = $request['bank'];
        $member->save();
        return redirect('bank_name_user')->with('message', "บันทึกสำเร็จ" );
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
/*         $table->string('id_user')->nullable();
        $table->string('bank_user')->nullable();
        $table->string('bank_numbar_user')->nullable();
        $table->string('bank')->nullable(); */
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
        $member =   BankNameUser::find($id);
        $member->bank_user = $request['bank_user'];
        $member->bank_numbar_user = $request['bank_numbar_user'];
        $member->bank = $request['bank'];
        $member->save();
        return redirect('bank_name_user')->with('message', "เเก้ไข สำเร็จ" );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}