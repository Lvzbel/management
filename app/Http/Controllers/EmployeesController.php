<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::where('role', 'employee')->get();

        return view('employees.index', compact('employees'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = User::with(['positions', 'availability'])->find($id);

        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::with('positions')->find($id);

        $positions = Position::all();

        return view('employees.edit', compact('employee', 'positions'));
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
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'position' => 'nullable|string'
        ]);

        $employee = User::with('positions')->find($id);

        $newValues = array();

        if ($employee->name !== $validated['name']) {
            $newValues['name'] = $validated['name'];
        }
        if ($employee->email !== $validated['email']) {
            $newValues['email'] = $validated['email'];
        }
        // if ($employee->phone !== $validated['phone']) {
        //     $newValues['phone'] = $validated['phone'];
        // }
        if ($employee->get_position()->id != $validated['position']) {
            $employee->positions()->detach();
            $employee->positions()->attach($validated['position']);
        }

        $employee->update($newValues);

        return redirect(route('employees.show', $employee));
    }
}
