<?php
namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Auth;
use App\Models\Owner;

class OwnerController extends Controller
{
    // Display the owner's revenue
    public function revenue()
    {
        $owner = Auth::user()->owner;
        $revenue = Rental::whereHas('book', function($query) use ($owner) {
            $query->where('owner_id', $owner->id);
        })->sum('price');

        return view('owner.revenue', compact('revenue'));
    }

    // Approve an owner (admin function)
    public function approve(Owner $owner)
    {
        $owner->is_approved = true;
        $owner->save();

        return redirect()->route('owners.index')->with('success', 'Owner approved successfully');
    }

    // Disable an owner (admin function)
    public function disable(Owner $owner)
    {
        $owner->is_approved = false;
        $owner->save();

        // Disable all books by this owner
        foreach ($owner->books as $book) {
            $book->is_approved = false;
            $book->save();
        }

        return redirect()->route('owners.index')->with('success', 'Owner disabled successfully');
    }
}
