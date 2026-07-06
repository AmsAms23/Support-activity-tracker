<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityUpdate;
use Illuminate\Http\Request;

class ActivityUpdateController extends Controller
{
    public function store(Request $request, Activity $activity)
    {
        $request->validate([
            'status' => 'required|in:done,pending',
            'remark' => 'nullable|string|max:1000',
        ]);

        ActivityUpdate::create([
            'activity_id' => $activity->id,
            'user_id' => auth()->id(),
            'status' => $request->status,
            'remark' => $request->remark,
        ]);

        return redirect()->back()
            ->with('success', 'Activity status updated successfully.');
    }
}