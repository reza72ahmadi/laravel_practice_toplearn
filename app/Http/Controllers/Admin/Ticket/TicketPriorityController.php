<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket\TicketPriority;
use App\Http\Requests\Admin\Ticket\TicketPriorityRequest;

class TicketPriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticketpriorities = TicketPriority::all();
        return view('admin.ticket.priority.index', compact('ticketpriorities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ticket.priority.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketPriorityRequest $request)
    {

        TicketPriority::create($request->validated());
        return redirect()->route('admin.ticket.priority.index')
            ->with('swal-success', ' اولویت جدید شما با موفقیت ساخته شد');
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
    public function edit(TicketPriority $ticketpriority)
    {
        return view('admin.ticket.priority.edit', compact('ticketpriority'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketPriorityRequest $request, TicketPriority $ticketpriority)
    {
        $ticketpriority->update($request->all());
        return redirect()->route('admin.ticket.priority.index')
            ->with('swal-success', ' اولویت جدید شما با موفقیت ساخته شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketPriority $ticketpriority)
    {
        $ticketpriority->delete();
        return redirect()->route('admin.ticket.priority.index')
            ->with('swal-success', ' اولویت شما با موفقیت حذف شد');
    }
    // status
    public function status(TicketPriority $ticketpriority)
    {
        $ticketpriority->status = $ticketpriority->status == 0 ? 1 : 0;
        $result =  $ticketpriority->save();

        if ($result) {
            if ($ticketpriority->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
