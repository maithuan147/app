<?php

namespace App\Http\Controllers;

use App\role;
use Illuminate\Http\Request;
use App\Contracts\IRoleDbRepository;


class RoleController extends Controller
{
    protected $roleRepository;
    protected $fillData = [
        'name',
        'permissions',
    ];

    public function __construct(IRoleDbRepository $roleRepository){
        $this->roleRepository = $roleRepository;
    }


    public function index()
    {
        $roles = $this->roleRepository->getAll();
        $dataView = compact('roles');
        return view('roles.list',$dataView);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestpermissions = implode(',',$request->permissions) ;
        $dataRequest = $request->only($this->fillData);
        $dataRequest['permissions'] = $requestpermissions;
        $this->roleRepository->create($dataRequest);
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->find($id);
        $dataView = compact('role');
        return view('roles.edit',$dataView);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        $requestpermissions = implode(',',$request->permissions);
        $dataRequest = $request->only($this->fillData);
        $dataRequest['permissions'] = $requestpermissions;
        $this->roleRepository->update($id,$dataRequest);
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->roleRepository->delete($id);
        return redirect()->route('role.index');
    }
}
