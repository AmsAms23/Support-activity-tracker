<?php

namespace App\Http\Controllers;

use App\Models\ActivityUpdate;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = ActivityUpdate::with(['activity', 'user']);

        if ($request->start_date && $request->end_date) {
            $query->whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ]);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $updates = $query->latest()->get();

        return view('reports.index', compact('updates'));
    }
}