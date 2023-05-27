<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Models\Community;
use Inertia\Inertia;

class CommunityController extends Controller
{
    
    public function __construct()
    {
        //$this->authorizeResource(Community::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('admin')){
            $Communitys=Community::all();
        }else{
            $Communitys=AdminUser::find(Auth()->user()->id)->Communitys;
        }
        if($Communitys->count()==1){
            return redirect()->route('Communitys.show',$Communitys[0]->id);
        }elseif($Communitys->count()>1){
            return Inertia::render('Community/Selection',[
                'Communitys' => $Communitys
            ]);
        }else{
            echo '!!';
        }

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
    public function show(Community $Community)
    {
        return Inertia::render('Community/Dashboard',[
            'Community'=>$Community
        ]);
        return redirect(route('Community.certificates.index',[$Community->id]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $Community)
    {         

        //$this->authorize('update' , $Community);


        return Inertia::render('Community/CommunityEdit',[
            'Community'=>$Community,
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
        //
    }

}
