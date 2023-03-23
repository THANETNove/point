<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WithdrawMoney;
use Illuminate\Support\Str;
use DB;
use Auth;


class WithdrawMoneyController extends Controller
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
    public function index()  {
       
        $data = DB::table('withdraw_money')->where('id_user', Auth::user()->id)->count();

        if ($data) {
            $data = DB::table('withdraw_money')->where('id_user', Auth::user()->id)
            ->leftJoin('bank_name_users', 'withdraw_money.id_user', '=', 'bank_name_users.iduser')
             ->select('withdraw_money.*', 'bank_name_users.id_user', 'bank_name_users.bank_user','bank_name_users.bank_numbar_user')
            ->orderBy('withdraw_money.id','DESC')->paginate(100);
            return view('withdraw_money.index',['data' => $data]);
        }else {
            $data2 = null;
            return view('withdraw_money.index',['data' => $data2]);
        }

}




/*     {
        $data = DB::table('withdraw_money')->where('id_user', Auth::user()->id)->get();
        return view('withdraw_money.index' ,['data' =>$data]);
    }
 */

    public function indexAdmin()
    {
        if (Auth::user()->status == "admin" ) {
        $data = DB::table('withdraw_money')->where('withdraw_money.status', 'null')
        ->leftJoin('users', 'withdraw_money.id_user', '=', 'users.id')
        ->leftJoin('bank_name_users', 'withdraw_money.id_user', '=', 'bank_name_users.iduser')
        ->select('withdraw_money.*', 'users.username','users.point','bank_name_users.bank_user','bank_name_users.bank_numbar_user','bank_name_users.bank')
        ->get();
        return view('withdraw_money_admin.index' ,['data' =>$data]);
        }else {
            return view('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('withdraw_money.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $pointUser =  Auth::user()->point;
        $pointInput =  intval($request['point']);


if ($pointInput >= $pointUser) {


        return redirect('create_withdraw_money')->with('error', "กรุณาตรวจสอบยอดเงิน ยอดเงินของคุณไม่เพียงพอ" );

   
}

        $member = new WithdrawMoney;
        $member->id_user =Auth::user()->id;
        $member->point_low = $pointInput;
        $member->status = 'null';

         $member->save();

         return redirect('withdraw_money_customers')->with('message', "บันทึกสำเร็จ" );
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
        //

        $member = WithdrawMoney::find($id);
        $member->status = $request['app_rej'];
      
        $member->save();
        
        if ($request['app_rej'] == 'approved') {
            $user = User::find($member->id_user);
            $ponit =  $user->point - (int)$request['add_point'];
            $user->point =  $ponit;
            $user->save();
        }
    
        if ($request['app_rej'] == 'approved') {
            $data = 'เติมเงินสำเร็จ';
        }else{
            $data = 'Reject สำเร็จ';
        }

        return redirect('admin-withdraw_money')->with('message', $data );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}