<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Warning;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class WarningController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('can:edit-admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request('warning_search');
        
        $loggedName = Auth::user()->name;

        if($search) {
            $warnings = Warning::where('title', 'like', '%'.$search.'%')
                        ->orWhere('body', 'like', '%'.$search.'%')
                        ->paginate(10);
        } else {
            $warnings = Warning::orderBy('id', 'desc')->paginate(10);
        }

        //$user = User::all();

        return view('warnings.index', [
            'warnings' => $warnings,
            'search' => $search,
            'loggedName' => $loggedName,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warnings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'body',
            'user_name',
        ]);

        $validator = Validator::make($data,[
            'title' => ['required', 'string', 'max:100'],
            'body' => ['required', 'string', 'max:255'],
        ]);

        if($validator->fails()) {
            return redirect()->route('warnings.create')
            ->withErrors($validator)
            ->withInput();
        }

        $warning = new Warning;
        $warning->title = $data['title'];
        $warning->body = $data['body'];
        $warning->user_name = Auth::user()->name;
        $warning->save();

        return redirect()->route('warnings.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warning = Warning::find($id);
        $loggedName = Auth::user()->name;
        
        if($loggedName === $warning->user_name) {
            if($warning) {
                return view('warnings.edit', [
                    'warning' => $warning,
                ]);
            }
        
        }
        return redirect()->route('warnings.index');

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
        $warning = Warning::find($id);
        if($warning) {
            $data = $request->only([
                'title',
                'body',
                'user_name',
            ]);

            $validator = Validator::make($data, [
                'title' => ['required', 'string', 'max:100'],
                'body' => ['required', 'string', 'max:255'],
            ]);

            $warning->title = $data['title'];
            $warning->body = $data['body'];

            if($validator->fails()) {
                return redirect()->route('warnings.edit', [
                    'warning' => $id
                ])->withErros($validator)
                ->withInput();
            }

            $warning->save();

            return redirect()->route('warnings.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warning =  Warning::find($id);
        $warning->delete();

        return redirect()->route('warnings.index');
    }
}
