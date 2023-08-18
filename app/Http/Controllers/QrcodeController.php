<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Qrcode;
use Illuminate\Support\Str;


class QrcodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->status == "admin") {
            $qr = DB::table('qrcodes')->get();
            return view('qrcode.index', ['qrcode' => $qr]);
        } else {
            return view('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('qrcode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg'],
        ]);

        $dateText = Str::random(12);

        $member = new Qrcode;
        $member->name = $request['name'];
        if ($request->hasFile('image')) {

            $imagefile = $request->file('image');
            $imagefile->move(public_path() . '/img/qrcode', $dateText . "" . $imagefile->getClientOriginalName());
            $dateImg =  $dateText . "" . $imagefile->getClientOriginalName();
            $member->url_qrcode = $dateImg;
        }

        $member->save();

        return redirect('qrcode')->with('message', "บันทึกสำเร็จ");
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $flight = Qrcode::find($id);

        $image_path = public_path() . '/img/qrcode/' . $flight->url_qrcode;
        unlink($image_path);

        $flight->delete();
        return redirect('qrcode')->with('message', "ลบข้อมูลสำเร็จ");
    }
}
