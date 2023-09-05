<?php

namespace App\Http\Controllers\Wedding;

use App\Http\Controllers\Controller;

use App\Models\Guest;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guest');
    }

    public function get()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|alpha_num',
            'notes' => 'required',
        ]);
        
        Guest::create([
            'v_name'    => $request->name,
            'v_address' => $request->address,
            'i_phone'   => $request->phone,
            'v_notes'   => $request->notes,
        ]);

        return response()->json([
            'message'   => 'Sucesss',
            'data'      => []
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartmentRequest  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $validated = $request->validated();

        $response = Http::post(config('app.api_url') . 'department/update', [
            'hash'                      => session()->get('auth')['hash'],
            'code'                      => $request->code,
            'department_category'       => $request->department_category,
            'name'                      => $request->name,
            'premi'                     => $request->premi,
            'can_overtime'              => $request->can_overtime,
            'can_paid_leave'            => $request->can_paid_leave,
            'is_different_calendar'     => $request->is_different_calendar,
            'is_not_need_attendance'    => $request->is_not_need_attendance,
        ])->json();

        return response()->json($response, $response['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyDepartmentRequest $request, Department $department)
    {
        $validated = $request->validated();

        $response = Http::post(config('app.api_url') . 'department/delete', [
            'hash' => session()->get('auth')['hash'],
            'code' => $request->code
        ])->json();

        return response()->json($response, $response['code']);
    }
}
