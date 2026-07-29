<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\DepartmentService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DepartmentServiceConrtoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departmentInfos = DepartmentService::orderBy('id', 'desc')->get();
        return view('admin.departments.index', compact(['departmentInfos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ✅ Validation with custom messages
        $validator = Validator::make($request->all(), [
            'departmentName' => ['required', 'string', 'max:255'],
            'service' => ['required', 'string', 'max:500'],
        ], [
            'departmentName.required' => 'Please enter department name before submiting.',
            'departmentName.max' => 'Department name must not exceed 255 words.',
            'service.max' => 'Service must not exceed 500 words.',
            'service.required' => 'Please enter service before submiting',
        ]);

        // If validation fails, return JSON with field-specific errors
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'code' => 422
            ], 422);
        }

        $departmentInfos = new DepartmentService();
        $departmentInfos->departmentName = $request->input('departmentName');
        $departmentInfos->service = $request->input('service');
        
        $departmentInfos->save();

        if ($departmentInfos) {
            return response()->json([
                'message' => 'Successifully Service Info Saved',
                'code' => 200
            ], 200);
        }else{
            return response()->json([
                'message' => 'Interna Server Error',
                'code' => 500
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departmentInfos = DepartmentService::findOrFail($id);
        return response()->json([
            'departmentInfo' => $departmentInfos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departmentInfos = DepartmentService::findorFail($id);
        $departmentInfos->delete();
        return redirect()->back()->with('message', 'data successfull deleted');
    }
}
