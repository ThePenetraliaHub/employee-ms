<?php

namespace App\Http\Controllers\Web;

use App\LeavePolicy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeavePolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.leave.policy');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.leave.create_policy');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LeavePolicy  $leavePolicy
     * @return \Illuminate\Http\Response
     */
    public function show(LeavePolicy $leavePolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LeavePolicy  $leavePolicy
     * @return \Illuminate\Http\Response
     */
    public function edit(LeavePolicy $leavePolicy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeavePolicy  $leavePolicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeavePolicy $leavePolicy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeavePolicy  $leavePolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeavePolicy $leavePolicy)
    {
        //
    }
}
