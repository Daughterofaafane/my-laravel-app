<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableRequest;
use App\Models\Table;
use App\Services\TableService;

class TableController extends Controller
{
    protected $userRepo;
    function __construct(TableService $userService){

        $this->userRepo = $userService;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Table::paginate(5);
        return view('students.table', ['datas'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        return view('students.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableRequest $request)
    {
        $data = $request->all();
        $this->userRepo->storeUser($data);

        session()->flash('students.add', 'The user successfully added');
        return redirect()->route('resource.index');
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
        $user = Table::findOrFail($id);
        return view('students.edit', ['data'=>$user]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableRequest $request, string $id)
    {
        $this->userRepo->updateUser($request->all(), $id);
        session()->flash('update', 'Updated succesfully');

        return redirect()->route('resource.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userRepo->deleteUser($id);
        session()->flash('delete', 'User successfully deleted');
        return redirect()->back();
    }
}
