<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;

class TicketsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('tickets.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'fullname' => 'required',
            'email' => 'required|email',
            'category' => 'required',
            'level' => 'required',
            'description' => 'required',
        ]);

        $ticket = Ticket::create([
            'user_id' => auth()->id(),
            'uuid' => Str::uuid(),
            'ref' => "TK". date('YmdHis') . "/" . rand(1, 100),
            'title' => request('title'),
            'fullname' => request('fullname'),
            'email' => request('email'),
            'category' => request('category'),
            'level' => request('level'),
            'status' => "New",
            'description' => request('description'),
        ]);

        return redirect()->route('tickets.show', $ticket);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
