<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 24px; font-weight: bold; color: #111827;">
            Activity Reports
        </h2>
    </x-slot>

    <div style="padding: 30px;">
        <div style="max-width: 1200px; margin: auto;">

            <div style="margin-bottom: 20px;">
                <a href="{{ route('activities.index') }}"
                   style="background-color:#2563eb; color:white; padding:10px 16px; border-radius:6px; font-weight:bold; text-decoration:none;">
                    Back to Activities
                </a>
            </div>

            <div style="background:white; padding:25px; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.08); margin-bottom:25px;">
                <h3 style="font-size:20px; font-weight:bold; margin-bottom:20px;">
                    Filter Activity History
                </h3>

                <form method="GET" action="{{ route('reports.index') }}">
                    <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:15px; align-items:end;">

                        <div>
                            <label style="display:block; font-weight:bold; margin-bottom:6px;">Start Date</label>
                            <input type="date" name="start_date" value="{{ request('start_date') }}"
                                   style="width:100%; padding:10px; border:1px solid #9ca3af; border-radius:6px;">
                        </div>

                        <div>
                            <label style="display:block; font-weight:bold; margin-bottom:6px;">End Date</label>
                            <input type="date" name="end_date" value="{{ request('end_date') }}"
                                   style="width:100%; padding:10px; border:1px solid #9ca3af; border-radius:6px;">
                        </div>

                        <div>
                            <label style="display:block; font-weight:bold; margin-bottom:6px;">Status</label>
                            <select name="status"
                                    style="width:100%; padding:10px; border:1px solid #9ca3af; border-radius:6px;">
                                <option value="">All</option>
                                <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                        </div>

                        <div>
                            <button type="submit"
                                    style="background-color:#16a34a; color:white; padding:11px 18px; border-radius:6px; font-weight:bold; border:none; cursor:pointer;">
                                Generate Report
                            </button>
                        </div>

                    </div>
                </form>
            </div>

            <div style="background:white; padding:25px; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.08);">
                <h3 style="font-size:20px; font-weight:bold; margin-bottom:20px;">
                    Report Results
                </h3>

                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="background-color:#f3f4f6;">
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Activity</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Status</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Remark</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Updated By</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Date & Time</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($updates as $update)
                            <tr>
                                <td style="border:1px solid #d1d5db; padding:10px;">
                                    {{ $update->activity->activity_name ?? 'N/A' }}
                                </td>

                                <td style="border:1px solid #d1d5db; padding:10px;">
                                    @if($update->status == 'done')
                                        <span style="background-color:#dcfce7; color:#166534; padding:5px 10px; border-radius:6px; font-weight:bold;">
                                            Done
                                        </span>
                                    @else
                                        <span style="background-color:#fef3c7; color:#92400e; padding:5px 10px; border-radius:6px; font-weight:bold;">
                                            Pending
                                        </span>
                                    @endif
                                </td>

                                <td style="border:1px solid #d1d5db; padding:10px;">
                                    {{ $update->remark ?? 'No remark entered' }}
                                </td>

                                <td style="border:1px solid #d1d5db; padding:10px;">
                                    {{ $update->user->name ?? 'N/A' }}
                                </td>

                                <td style="border:1px solid #d1d5db; padding:10px;">
                                    {{ $update->created_at->format('Y-m-d h:i A') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="border:1px solid #d1d5db; padding:15px; text-align:center;">
                                    No report records found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>