<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketCategoryRequest;
use App\Models\Ticket\TicketCategory;
use Illuminate\Http\Request;

class TicketCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticketcategories = TicketCategory::all();
        return view('admin.ticket.category.index', compact('ticketcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ticket.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketCategoryRequest $request)
    {

        TicketCategory::create($request->validated());
        return redirect()->route('admin.category.ticket.index')
            ->with('swal-success', 'دسته بندی جدید شما با موفقیت ساخته شد');
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
    public function edit(TicketCategory $ticketcategory)
    {
        return view('admin.ticket.category.edit', compact('ticketcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketCategoryRequest $request, TicketCategory $ticketcategory)
    {
        $ticketcategory->update($request->validated());
        return redirect()->route('admin.category.ticket.index')
            ->with('swal-success', 'دسته بندی جدید شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketCategory $ticketcategory)
    {
        $ticketcategory->delete();
        return redirect()->route('admin.category.ticket.index')
            ->with('swal-success', 'دسته بندی جدید شما با موفقیت حذف شد');
    }
    // status
    public function status(TicketCategory $ticketcategory)
    {
        $ticketcategory->status = $ticketcategory->status == 0 ? 1 : 0;
        $result =  $ticketcategory->save();

        if ($result) {
            if ($ticketcategory->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
