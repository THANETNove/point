<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\AddPoint;
use Illuminate\Support\Str;
use DB;
use Auth;



class AddPointController extends Controller
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
        $data = DB::table('add_points')->where('id_user', Auth::user()->id)->count();
        if ($data) {
            $data = DB::table('add_points')->where('id_user', Auth::user()->id)->orderBy('id', 'DESC')->get();
            return view('add_point.index', ['data' => $data]);
        } else {
            $data2 = null;
            return view('add_point.index', ['data' => $data2]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = DB::table('bank_names')->get();
        $dataqr = DB::table('qrcodes')->get();
        return view('add_point.create', ['data' => $data, 'dataQr' => $dataqr]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request['point_bank_name'] == "null") {

            return redirect('create_point')->with('error', "กรุณาเลือกช่องทางการชำระเงิน");
        }
        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg'],
        ]);

        $dateText = Str::random(12);

        $member = new AddPoint;
        $member->id_user = Auth::user()->id;
        $member->point = $request['point'];
        $member->date = $request['date'];
        $member->status = 'null';
        $member->point_bank_name = $request['point_bank_name'];
        $member->other = $request['other'];

        if ($request->hasFile('image')) {

            $imagefile = $request->file('image');
            $imagefile->move(public_path() . '/img/slip', $dateText . "" . $imagefile->getClientOriginalName());
            $dateImg =  $dateText . "" . $imagefile->getClientOriginalName();
            $member->images = $dateImg;
        }

        $member->save();

        return redirect('add_point')->with('message', "บันทึกสำเร็จ");
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

        $member = AddPoint::find($id);
        $member->status = $request['app_rej'];
        $member->save();

        if ($request['app_rej'] == 'approved') {
            $user = User::find($member->id_user);
            $ponit =  $user->point + $request['add_point'];
            $user->point =  $ponit;
            $user->save();
        }

        if ($request['app_rej'] == 'approved') {
            $data = 'เติมเงินสำเร็จ';
        } else {
            $data = 'Reject สำเร็จ';
        }
        return redirect('money-customers')->with('message', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}