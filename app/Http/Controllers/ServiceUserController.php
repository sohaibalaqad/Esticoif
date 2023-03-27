<?php

namespace App\Http\Controllers;

use App\Models\ServiceUser;
use Illuminate\Http\Request;

/**
 * Class ServiceUserController
 * @package App\Http\Controllers
 */
class ServiceUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceUsers = ServiceUser::paginate();

        return view('service-user.index', compact('serviceUsers'))
            ->with('i', (request()->input('page', 1) - 1) * $serviceUsers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceUser = new ServiceUser();
        return view('service-user.create', compact('serviceUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ServiceUser::$rules);

        $serviceUser = ServiceUser::create($request->all());

        return redirect()->route('service-users.index')
            ->with('success', 'ServiceUser created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceUser = ServiceUser::find($id);

        return view('service-user.show', compact('serviceUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviceUser = ServiceUser::find($id);

        return view('service-user.edit', compact('serviceUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ServiceUser $serviceUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceUser $serviceUser)
    {
        request()->validate(ServiceUser::$rules);

        $serviceUser->update($request->all());

        return redirect()->route('service-users.index')
            ->with('success', 'ServiceUser updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $serviceUser = ServiceUser::find($id)->delete();

        return redirect()->route('service-users.index')
            ->with('success', 'ServiceUser deleted successfully');
    }
}
