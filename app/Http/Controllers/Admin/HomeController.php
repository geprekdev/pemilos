<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use YlsIdeas\FeatureFlags\Facades\Features;

class HomeController extends Controller
{
    public function index()
    {
        abort_if(!in_array(auth()->user()->role_id, [User::SUPER_ADMIN, User::ADMIN]), 404);

        $candidates = Candidate::query()
            ->select('name', 'label', 'number')
            ->withCount('votes')
            ->orderBy('number')
            ->get();

        $osis = $candidates->where('label', 'OSIS');
        $mpk = $candidates->where('label', 'MPK');

        return view('admin.dashboard', compact('osis', 'mpk'));
    }

    public function toggleVoting()
    {
        if (Features::accessible('voting')) {
            Features::turnOff('database', 'voting');
        } else {
            Features::turnOn('database', 'voting');
        }

        return redirect()->route('admin.dashboard')->with('success', 'Berhasil toggle fitur voting');
    }
}
