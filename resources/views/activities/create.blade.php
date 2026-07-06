<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 24px; font-weight: bold; color: #111827;">
            Add Activity
        </h2>
    </x-slot>

    <div style="padding: 30px;">
        <div style="max-width: 900px; margin: auto;">
            <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">

                @if ($errors->any())
                    <div style="margin-bottom: 20px; padding: 15px; background-color: #fee2e2; color: #991b1b; border-radius: 6px;">
                        <strong>Please fix the following errors:</strong>
                        <ul style="margin-top: 10px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('activities.store') }}">
                    @csrf

                    <div style="margin-bottom: 18px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 6px;">
                            Activity Name
                        </label>
                        <input 
                            type="text" 
                            name="activity_name" 
                            placeholder="Daily SMS count in comparison to SMS count from logs"
                            required
                            style="width: 100%; padding: 12px; border: 1px solid #9ca3af; border-radius: 6px; font-size: 16px;"
                        >
                    </div>

                    <div style="margin-bottom: 18px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 6px;">
                            Activity Date
                        </label>
                        <input 
                            type="date" 
                            name="activity_date" 
                            required
                            style="width: 100%; padding: 12px; border: 1px solid #9ca3af; border-radius: 6px; font-size: 16px;"
                        >
                    </div>

                    <div style="margin-bottom: 18px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 6px;">
                            Expected Value
                        </label>
                        <input 
                            type="number" 
                            name="expected_value"
                            placeholder="Example: 5000"
                            style="width: 100%; padding: 12px; border: 1px solid #9ca3af; border-radius: 6px; font-size: 16px;"
                        >
                    </div>

                    <div style="margin-bottom: 18px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 6px;">
                            Actual Value
                        </label>
                        <input 
                            type="number" 
                            name="actual_value"
                            placeholder="Example: 4975"
                            style="width: 100%; padding: 12px; border: 1px solid #9ca3af; border-radius: 6px; font-size: 16px;"
                        >
                    </div>

                    <div style="margin-bottom: 18px;">
                        <label style="display: block; font-weight: bold; margin-bottom: 6px;">
                            Description
                        </label>
                        <textarea 
                            name="description" 
                            rows="5"
                            placeholder="Describe the activity or what needs to be checked."
                            style="width: 100%; padding: 12px; border: 1px solid #9ca3af; border-radius: 6px; font-size: 16px;"
                        ></textarea>
                    </div>

                    <div style="margin-top: 25px;">
                        <button 
                            type="submit"
                            style="background-color: #2563eb; color: white; padding: 12px 20px; border-radius: 6px; font-weight: bold; border: none; cursor: pointer; font-size: 16px;"
                        >
                            Save Activity
                        </button>

                        <a 
                            href="{{ route('activities.index') }}"
                            style="margin-left: 15px; color: #2563eb; font-weight: bold; text-decoration: none;"
                        >
                            Back
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>