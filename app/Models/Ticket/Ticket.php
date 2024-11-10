<?php

namespace App\Models\Ticket;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'subject',
        'description',
        'status',
        'seen',
        'reference_id',
        'user_id',
        'priority_id',
        'category_id',
        'ticket_id',
    ];

    /**
     * Get the user that owns the ticket.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the admin associated with the ticket.
     */
    public function admin()
    {
        return $this->belongsTo(TicketAdmin::class, 'reference_id');
    }

    /**
     * Get the priority of the ticket.
     */
    public function priority()
    {
        return $this->belongsTo(TicketPriority::class);
    }

    /**
     * Get the category of the ticket.
     */
    public function category()
    {
        return $this->belongsTo(TicketCategory::class);
    }

    /**
     * Get the parent ticket, if any.
     */
    public function parent()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id')->with('parent');
    }

    /**
     * Get the child tickets, if any.
     */
    public function children()
    {
        return $this->hasMany(Ticket::class, 'ticket_id')->with('parent');
    }
}
