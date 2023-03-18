<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Http\Request;

/**
 * Class UserTypeController
 * @package App\Http\Controllers
 */
class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTypes = UserType::paginate();

        return view('user-type.index', compact('userTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $userTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userType = new UserType();
        return view('user-type.create', compact('userType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(UserType::$rules);

        $userType = UserType::create($request->all());

        return redirect()->route('user-types.index')
            ->with('success', 'UserType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userType = UserType::find($id);

        return view('user-type.show', compact('userType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userType = UserType::find($id);

        return view('user-type.edit', compact('userType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  UserType $userType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserType $userType)
    {
        request()->validate(UserType::$rules);

        $userType->update($request->all());

        return redirect()->route('user-types.index')
            ->with('success', 'UserType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $userType = UserType::find($id)->delete();

        return redirect()->route('user-types.index')
            ->with('success', 'UserType deleted successfully');
    }
}
