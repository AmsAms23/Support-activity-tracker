<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function dashboard()
    {
        $today = now()->toDateString();

        $activitiesToday = Activity::whereDate('activity_date', $today)->count();

        $recentActivities = Activity::with(['updates.user'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('activitiesToday', 'recentActivities'));
    }

    public function index()
    {
        $activities = Activity::with(['creator', 'updates.user'])
            ->latest()
            ->get();

        return view('activities.index', compact('activities'));
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'activity_name' => 'required|string|max:255',
            'activity_date' => 'required|date',
            'expected_value' => 'nullable|integer',
            'actual_value' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);

        Activity::create([
            'activity_name' => $request->activity_name,
            'activity_date' => $request->activity_date,
            'expected_value' => $request->expected_value,
            'actual_value' => $request->actual_value,
            'description' => $request->description,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('activities.index')
            ->with('success', 'Activity created successfully.');
    }

    public function show(Activity $activity)
    {
        $activity->load(['creator', 'updates.user']);

        return view('activities.show', compact('activity'));
    }

    public function dailyHandover()
    {
        $today = now()->toDateString();

        $activities = Activity::with(['updates.user'])
            ->whereDate('activity_date', $today)
            ->latest()
            ->get();

        return view('daily-handover', compact('activities', 'today'));
    }
}