<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\App;
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
        // if (App::environment('local')) {
            
        // }
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create(
            $request->only(
                ['first_name', 'last_name', 'username', 'email', 'password']
            ));
        // Ya tenemos el usuario creado, que es lo importante. Ahora vemos de guardar su imagen.
        // https://laracasts.com/discuss/channels/requests/how-to-hash-user-input-password-when-using-form-validation-in-form-request-laravel-5

        if($request->hasFile('file') && $request->file('file')->isValid()){
            
            $path = $request->file('file')->store('users/'. $user->id .'/profile', 'public');
    
            $user->image()->create([
                'guess_extension' => $request->file('file')->guessExtension(),
                'mime_type' => $request->file('file')->getMimeType(),
                'client_original_name' => $request->file('file')->getClientOriginalName(),
                'client_original_extension' => $request->file('file')->getClientOriginalExtension(),
                'client_mime_type' => $request->file('file')->getClientMimeType(),
                'guess_client_extension' => $request->file('file')->guessClientExtension(),
                'path' => $path,
            ]);
        }

        return redirect()->route('admin.users.show', [$user->username])->with('status','User Created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.pages.users.show')
                ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user->load('profile');
        return view('admin.pages.users.edit', ['user' => $user]);
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
