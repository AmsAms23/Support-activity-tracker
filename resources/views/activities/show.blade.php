<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 24px; font-weight: bold; color: #111827;">
            Activity Details
        </h2>
    </x-slot>

    <div style="padding: 30px;">
        <div style="max-width: 1100px; margin: auto;">
            <div style="background:white; padding:25px; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.08);">

                <h3 style="font-size:22px; font-weight:bold; margin-bottom:15px;">
                    {{ $activity->activity_name }}
                </h3>

                <p><strong>Date:</strong> {{ $activity->activity_date }}</p>
                <p><strong>Expected Value:</strong> {{ $activity->expected_value ?? 'N/A' }}</p>
                <p><strong>Actual Value:</strong> {{ $activity->actual_value ?? 'N/A' }}</p>
                <p><strong>Description:</strong> {{ $activity->description ?? 'No description' }}</p>
                <p><strong>Created By:</strong> {{ $activity->creator->name ?? 'N/A' }}</p>

                <hr style="margin:25px 0;">

                <h3 style="font-size:20px; font-weight:bold; margin-bottom:15px;">
                    Update History
                </h3>

                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="background-color:#f3f4f6;">
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Status</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Remark</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Updated By</th>
                            <th style="border:1px solid #d1d5db; padding:10px; text-align:left;">Date & Time</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($activity->updates as $update)
                            <tr>
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
                                <td colspan="4" style="border:1px solid #d1d5db; padding:15px; text-align:center;">
                                    No updates yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div style="margin-top:20px;">
                    <a href="{{ route('activities.index') }}"
                       style="background-color:#2563eb; color:white; padding:10px 16px; border-radius:6px; font-weight:bold; text-decoration:none;">
                        Back to Activities
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>