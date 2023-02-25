<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Mail\SimpanAdmin;
use Illuminate\Support\Facades\Mail;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::all();

        return view ('admin.index',[
            'admin'=>$admin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        // if (!empty($request->file('file_sistemagrotrade'))) {
        //    $file_sistemagrotrade = $request->file('file_sistemagrotrade');
        // }
        $admin = new Admin();

        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->password = $request->password;
        $admin->email = $request->email;
        // dd($kereta);
        $admin->save();

        // $email = Auth::user()->email;
        Mail::to('maisarahmusa1998@gmail.com')->send(new SimpanAdmin());

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin, $id)
    {
        $admin = Admin::find($id);
        return view('admin.show', [
            'admin' => $admin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin, $id)
    {
        $admin = Admin::find($id);
        return view('admin.edit', [
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin, $id)
    {
        //if (!empty($request->file('file_sistemagrotrade'))) {
            //$file_sistemagrotrade = $request->file('file_sistemagrotrade')->store('gambar');
        //}
        $admin = Admin::find($id);

        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->password = $request->password;
        $admin->email = $request->email;
        // dd($kereta);
        $admin->save();

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect('/admin');
    }
}
