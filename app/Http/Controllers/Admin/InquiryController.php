<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
use App\Models\Distributor;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    // Dealers list
    public function dealers()
    {
        $dealers = Dealer::orderBy('created_at', 'desc')->get();
        return view('admin.inquiries.dealers', compact('dealers'));
    }

    public function updateDealerStatus($id, $status)
    {
        $dealer = Dealer::findOrFail($id);
        if (in_array($status, ['Pending', 'Approved', 'Rejected'])) {
            $dealer->status = $status;
            $dealer->save();
            return redirect()->back()->with('success', 'Dealer status updated to ' . $status);
        }
        return redirect()->back()->with('error', 'Invalid status.');
    }

    // Distributors list
    public function distributors()
    {
        $distributors = Distributor::orderBy('created_at', 'desc')->get();
        return view('admin.inquiries.distributors', compact('distributors'));
    }

    public function updateDistributorStatus($id, $status)
    {
        $distributor = Distributor::findOrFail($id);
        if (in_array($status, ['Pending', 'Approved', 'Rejected'])) {
            $distributor->status = $status;
            $distributor->save();
            return redirect()->back()->with('success', 'Distributor status updated to ' . $status);
        }
        return redirect()->back()->with('error', 'Invalid status.');
    }

    // Contact inquiries list
    public function contact()
    {
        $contacts = ContactInquiry::orderBy('created_at', 'desc')->get();
        return view('admin.inquiries.contact', compact('contacts'));
    }

    public function markContactRead($id)
    {
        $contact = ContactInquiry::findOrFail($id);
        $contact->is_read = true;
        $contact->save();
        return redirect()->back()->with('success', 'Inquiry marked as read.');
    }
}
