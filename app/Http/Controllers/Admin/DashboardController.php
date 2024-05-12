<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Comments;
use App\Models\Contact;
use App\Models\Enquiry;
use App\Models\Gym;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::get()->count('id');

        $gyms = Gym::get()->count('id');

        $services = Service::get()->count('id');

        return view('admin.modules.dashboard.index', [
            'users' => $users,
            'gyms' => $gyms,
            'services' => $services
        ]);
    }

    public function booking()
    {
        $bookings = Booking::join('gym as g', 'booking.gym_id', '=', 'g.id')
            ->where('status', 1)
            ->select('g.name as gym_name', 'g.address as gym_address', 'g.phone as gym_phone', 'booking.*')
            ->get();

        return view('Admin.modules.dashboard.booking', [
            'bookings' => $bookings
        ]);
    }

    public function handleAcceptBooking($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = 2;

        $booking->save();

        return redirect()->route('admin.dashboard.booking')->with('success', 'Accept SuccessFully');
    }

    public function handleRefuseBooking($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = 3;

        $booking->save();

        return redirect()->route('admin.dashboard.booking')->with('success', 'Refuse SuccessFully');
    }

    public function showAcceptBooking()
    {
        $bookings = Booking::join('gym as g', 'booking.gym_id', '=', 'g.id')
            ->where('status', 2)
            ->orderBy('booking.created_at', 'DESC')
            ->select('g.name as gym_name', 'g.address as gym_address', 'g.phone as gym_phone', 'booking.*')
            ->get();

        return view('Admin.modules.dashboard.showAcceptBooking', [
            'bookings' => $bookings
        ]);
    }

    public function showRefuseBooking()
    {
        $bookings = Booking::join('gym as g', 'booking.gym_id', '=', 'g.id')
            ->where('status', 3)
            ->orderBy('booking.created_at', 'DESC')
            ->select('g.name as gym_name', 'g.address as gym_address', 'g.phone as gym_phone', 'booking.*')
            ->get();

        return view('Admin.modules.dashboard.showRefuseBooking', [
            'bookings' => $bookings
        ]);
    }

    public function feedback()
    {
        $enquirys = Enquiry::get();

        $currentTime = now();

        foreach ($enquirys as $enquiry) {
            $daysDifference = $enquiry->created_at->diffInDays($currentTime);

            if ($daysDifference == 30) {
                $enquiry->delete();
            }
        }
        return view('Admin.modules.dashboard.feedback', [
            'enquirys' => $enquirys
        ]);
    }

    public function aboutUs()
    {
        $abouts = Contact::where('status', 1)->get();

        return view('Admin.modules.dashboard.aboutUs', [
            'abouts' => $abouts
        ]);
    }

    public function handleAccept($id)
    {
        $about = Contact::findOrFail($id);

        $about->status = 2;

        $about->save();

        return redirect()->route('admin.dashboard.aboutUs')->with('success', 'Accept SuccessFully');
    }

    public function handleRefuse($id)
    {
        $about = Contact::findOrFail($id);

        $about->delete();

        return redirect()->route('admin.dashboard.aboutUs')->with('success', 'Refuse SuccessFully');
    }

    public function comment()
    {
        $comments = Comments::join('gym as g', 'comments.gym_id', '=', 'g.id')
            ->where('status', 0)
            ->orderBy('comments.created_at', 'DESC')
            ->select('comments.*', 'comments.id as id_comment', 'g.*')
            ->get();

        return view('Admin.modules.dashboard.comment', [
            'comments' => $comments
        ]);
    }

    public function handleAcceptComment($id)
    {
        $comment = Comments::findOrFail($id);

        $comment->status = 1;

        $comment->save();

        return redirect()->route('admin.dashboard.comment')->with('success', 'Accept SuccessFully');
    }

    public function handleRefuseComment($id)
    {
        $comment = Comments::findOrFail($id);

        $comment->delete();

        return redirect()->route('admin.dashboard.comment')->with('success', 'Refuse SuccessFully');
    }

    public function handleAcceptAllComment()
    {
        Comments::where('status', 0)->update(['status' => 1]);

        return redirect()->route('admin.dashboard.comment')->with('success', 'Refuse All SuccessFully');
    }

    public function handleRefuseAllComment()
    {
        Comments::where('status', 0)->delete();

        return redirect()->route('admin.dashboard.comment')->with('success', 'Delete All SuccessFully');
    }
}
