<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 24px; font-weight: bold; color: #111827;">
            Daily Handover - {{ $today }}
        </h2>
    </x-slot>

    <div style="padding: 30px;">
        <div style="max-width: 1200px; margin: auto;">

            <div style="margin-bottom: 20px;">
                <a href="{{ route('activities.index') }}"
                   style="background-color:#2563eb; color:white; padding:10px 16px; border-radius:6px; font-weight:bold; text-decoration:none;">
                    Back to Activities
                </a>

                <a href="{{ route('reports.index') }}"
                   style="background-color:#16a34a; color:white; padding:10px 16px; border-radius:6px; font-weight:bold; text-decoration:none; margin-left:10px;">
                    Reports
                </a>
            </div>

            <div style="background:white; padding:25px; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.08);">
                <h3 style="font-size:20px; font-weight:bold; margin-bottom:20px;">
                    Today’s Activity Updates
                </h3>

                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="background-color:#f3f4f6;">
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Activity</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Status</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Remark</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Updated By</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Date & Time Updated</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($activities as $activity)
                            @forelse($activity->updates as $update)
                                <tr>
                                    <td style="border:1px solid #d1d5db; padding:10px;">
                                        {{ $activity->activity_name }}
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
                                    <td style="border:1px solid #d1d5db; padding:10px;">
                                        {{ $activity->activity_name }}
                                    </td>

                                    <td colspan="4" style="border:1px solid #d1d5db; padding:10px; text-align:center; color:#6b7280;">
                                        No update made yet.
                                    </td>
                                </tr>
                            @endforelse
                        @empty
                            <tr>
                                <td colspan="5" style="border:1px solid #d1d5db; padding:15px; text-align:center;">
                                    No activities found for today.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>