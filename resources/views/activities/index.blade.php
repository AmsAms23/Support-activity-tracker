<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 24px; font-weight: bold; color: #111827;">
            Activities
        </h2>
    </x-slot>

    <div style="padding: 30px;">
        <div style="max-width: 1250px; margin: auto;">

            @if(session('success'))
                <div style="margin-bottom: 20px; padding: 15px; background-color: #dcfce7; color: #166534; border-radius: 8px; font-weight: bold;">
                    {{ session('success') }}
                </div>
            @endif

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                <div>
                    <h3 style="font-size: 22px; font-weight: bold; color: #111827; margin-bottom: 5px;">
                        Applications Support Activity Tracker
                    </h3>
                    <p style="color: #6b7280;">
                        Track daily activities, update status, add remarks, and support shift handover.
                    </p>
                </div>

                <div>
                    <a href="{{ route('activities.create') }}"
                       style="background-color:#2563eb; color:white; padding:11px 16px; border-radius:6px; font-weight:bold; text-decoration:none;">
                        Add New Activity
                    </a>

                    <a href="{{ route('daily.handover') }}"
                       style="background-color:#374151; color:white; padding:11px 16px; border-radius:6px; font-weight:bold; text-decoration:none; margin-left:8px;">
                        Daily Handover
                    </a>

                    <a href="{{ route('reports.index') }}"
                       style="background-color:#16a34a; color:white; padding:11px 16px; border-radius:6px; font-weight:bold; text-decoration:none; margin-left:8px;">
                        Reports
                    </a>
                </div>
            </div>

            <div style="background:white; padding:25px; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.08);">
                <h3 style="font-size:20px; font-weight:bold; margin-bottom:20px;">
                    All Activities
                </h3>

                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="background-color:#f3f4f6;">
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Activity</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Date</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Expected</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Actual</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Created By</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Latest Status</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Update Activity</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($activities as $activity)
                            @php
                                $latestUpdate = $activity->updates->sortByDesc('created_at')->first();
                            @endphp

                            <tr>
                                <td style="border:1px solid #d1d5db; padding:10px;">
                                    <a href="{{ route('activities.show', $activity) }}"
                                       style="color:#2563eb; font-weight:bold; text-decoration:underline;">
                                        {{ $activity->activity_name }}
                                    </a>

                                    @if($activity->description)
                                        <p style="font-size:13px; color:#6b7280; margin-top:5px;">
                                            {{ $activity->description }}
                                        </p>
                                    @endif
                                </td>

                                <td style="border:1px solid #d1d5db; padding:10px;">
                                    {{ $activity->activity_date }}
                                </td>

                                <td style="border:1px solid #d1d5db; padding:10px;">
                                    {{ $activity->expected_value ?? 'N/A' }}
                                </td>

                                <td style="border:1px solid #d1d5db; padding:10px;">
                                    {{ $activity->actual_value ?? 'N/A' }}
                                </td>

                                <td style="border:1px solid #d1d5db; padding:10px;">
                                    {{ $activity->creator->name ?? 'N/A' }}
                                </td>

                                <td style="border:1px solid #d1d5db; padding:10px;">
                                    @if($latestUpdate)
                                        @if($latestUpdate->status == 'done')
                                            <span style="background-color:#dcfce7; color:#166534; padding:5px 10px; border-radius:6px; font-weight:bold;">
                                                Done
                                            </span>
                                        @else
                                            <span style="background-color:#fef3c7; color:#92400e; padding:5px 10px; border-radius:6px; font-weight:bold;">
                                                Pending
                                            </span>
                                        @endif

                                        <p style="font-size:13px; color:#6b7280; margin-top:6px;">
                                            {{ $latestUpdate->created_at->format('Y-m-d h:i A') }}
                                        </p>
                                    @else
                                        <span style="background-color:#e5e7eb; color:#374151; padding:5px 10px; border-radius:6px; font-weight:bold;">
                                            Not Updated
                                        </span>
                                    @endif
                                </td>

                                <td style="border:1px solid #d1d5db; padding:10px;">
                                    <form method="POST" action="{{ route('activities.updateStatus', $activity) }}">
                                        @csrf

                                        <div style="margin-bottom:8px;">
                                            <label style="display:block; font-weight:bold; margin-bottom:4px;">Status</label>
                                            <select name="status"
                                                    style="width:100%; padding:8px; border:1px solid #9ca3af; border-radius:6px;">
                                                <option value="done">Done</option>
                                                <option value="pending">Pending</option>
                                            </select>
                                        </div>

                                        <div style="margin-bottom:8px;">
                                            <label style="display:block; font-weight:bold; margin-bottom:4px;">Remark</label>
                                            <input type="text"
                                                   name="remark"
                                                   placeholder="Enter update remark"
                                                   style="width:100%; padding:8px; border:1px solid #9ca3af; border-radius:6px;">
                                        </div>

                                        <button type="submit"
                                                style="background-color:#2563eb; color:white; padding:8px 14px; border-radius:6px; font-weight:bold; border:none; cursor:pointer;">
                                            Save Update
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="border:1px solid #d1d5db; padding:20px; text-align:center; color:#6b7280;">
                                    No activities found. Click “Add New Activity” to create your first activity.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>