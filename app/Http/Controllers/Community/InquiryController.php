<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Community;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Community::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Community $community)
    {
        $inquiries=$community->inquiries;
        // $inquiries=Inquiry::whereBelongsTo($community)
        //     ->whereLike(['title','content','response'],'語言')
        //     ->get();
        return Inertia::render('Community/Inquiries',[
            'community'=>$community,
            'inquiries'=>$community->inquiries
        ]);
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
    public function store(Community $community, Request $request)
    {
        $inquiry=new Inquiry();
        $inquiry->community_id=$request->community_id;
        $inquiry->parent_id=$request->parent_id;
        $inquiry->root_id=$request->root_id;
        $inquiry->email=$request->email;
        $inquiry->phone=$request->phone;
        //$inquiry->language=$request->language;
        //$inquiry->honorific=$request->honorific;
        $inquiry->name=$request->name;
        $inquiry->title=$request->title;
        $inquiry->content=$request->content;
        $inquiry->response=$request->response;
        $inquiry->admin_user_id=auth()->user()->id;
        $inquiry->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community, Inquiry $inquiry)
    {
        // $inquiry=Inquiry::where('id',1)->with('emails')->get();
        // dd($inquiry);

        $inquiries=Inquiry::where('id',$inquiry->root_id)->with('children')->with('adminUser')->with('emails')->get();
        return Inertia::render('Community/InquiryShow',[
            'community'=>$community,
            'inquiries'=>$inquiries,
            'inquiry'=>$inquiry
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Community $community, Inquiry $inquiry, Request $request)
    {
        $inquiry->response=$request->response;
        $inquiry->response_date=date('Y-m-d H:i:s');
        $inquiry->save();
        return redirect()->back();
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
