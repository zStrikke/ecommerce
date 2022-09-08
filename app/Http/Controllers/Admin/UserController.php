<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use PDO;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $usersChart = User::get(['created_at'])->map(function($item, $key){ return $item->created_at->month;});
        // // dd($usersChart);
        // //$gouped = $usersChart->groupBy(function($item, $key){return $item;});
        // // dd($gouped);
        // $u = $usersChart->groupBy(function($item, $key){return $item;})->map(function($item, $key){return $item->count();});
        // // dd($u->all());
        // $p = $u->sortKeys();
        // // dd($p->all());
        // $monthCollection = collect(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']);
        // $finalData = $monthCollection->combine($p);
        
        // // dd($finalData->toJson());


        $users = User::query();

        $request->whenFilled('word', function ($input) use ($users) {
            // The "name" value is filled...
            $users->where('first_name', 'like', '%'. $input .'%');
        }, function () {
            // The "name" value is not filled...
        });

        $request->whenFilled('sort', function($input) use ($users) {
            [$order, $field] = explode('-', $input);
            $users->orderBy($field, $order);
        });

        $finalUsersTable = $users->paginate(
            $request->perPage ?? 10, 
            ['id','first_name','last_name','username','email','created_at']
        );

        // dd($usersChart);

        return view('admin.pages.users.index')
            ->with(['users' => $finalUsersTable]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
