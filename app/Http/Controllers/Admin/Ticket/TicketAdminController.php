<?php

namespace App\Http\Controllers\Admin\Ticket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticket\TicketAdmin;
use App\Models\User;

class TicketAdminController extends Controller

{
    public function index()
    {
        $admins = User::where('user_type', '1')->get();
        return view('admin.ticket.admin.index', compact('admins'));
    }

    public function set(User $admin)
    {
        
        // Check if the $admin object is valid and has a non-null id
        if (is_null($admin->id)) {
            return redirect()->route('admin.ticket.admin.index')
                ->with('swal-error', 'Invalid user specified.');
        }

        // Check if a TicketAdmin record exists for the given user
        $ticketAdmin = TicketAdmin::where('user_id', $admin->id)->first();

        if ($ticketAdmin) {
            // If a record exists, delete it
            $ticketAdmin->forceDelete();
            $message = 'حذف با موفقیت انجام شد'; // Delete success message
        } else {
            // If no record exists, create a new one
            TicketAdmin::create(['user_id' => $admin->id]);
            $message = 'اضافه کردن با موفقیت انجام شد'; // Add success message
        }

        // Redirect to the specified route with a success message
        return redirect()->route('admin.ticket.admin.index')
            ->with('swal-success', $message);
    }
}
