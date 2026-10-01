<x-layouts.app>
    <div class="flex flex-col gap-3 p-6 max-w-2xl mx-auto w-full">
        <div class="flex items-center justify-between">
            <h1 class="text-lg font-semibold tracking-tight">Patients</h1>
            <button type="button"
                onclick="document.getElementById('create-patient-modal').showModal()"
                class="inline-flex items-center rounded-lg bg-zinc-800 px-4 py-2 text-sm font-medium text-white">
                + Add Patient
            </button>
        </div>
        <dialog id="create-patient-modal"
            style="border: 0; border-radius: 12px; padding: 0; width: min(92vw, 540px);">
            <button type="button"
                onclick="document.getElementById('create-patient-modal').close()"
                aria-label="Close"
            style="float: right; margin: 12px;">
            Close
            </button>

            @include('users.create')
        </dialog>
        
         <form method="GET" action="{{ route('users.index') }}" class="flex h-12 items-stretch gap-1">
            <input type="search" name="search" value="{{ request('search') }}"
                placeholder="Search by patient name"
                class="w-full rounded-lg border border-zinc-500 px-5 py-10 text-sm">

        <select name="filter_by"
            onchange="this.form.requestSubmit()"
            class="rounded-lg border border-zinc-200 px-3 py-2.5 text-sm">
            <option value="">Filter by...</option>
            <option value="date_of_birth" @selected(request('filter_by') === 'date_of_birth')>Birth date</option>
            <option value="gender" @selected(request('filter_by') === 'gender')>Gender</option>
            <option value="address" @selected(request('filter_by') === 'address')>Address</option>
        </select>

        @if (request('filter_by') === 'date_of_birth')
            <input type="date" name="filter_value" value="{{ request('filter_value') }}"
            class="rounded-lg border border-zinc-200 px-3 py-2.5 text-sm">
        @elseif (request('filter_by') === 'gender')
            <select name="filter_value"
                class="rounded-lg border border-zinc-200 px-3 py-2.5 text-sm">
                <option value="">Choose gender</option>
                <option value="female" @selected(request('filter_value') === 'female')>Female</option>
                <option value="male" @selected(request('filter_value') === 'male')>Male</option>
            </select>
        @elseif (request('filter_by') === 'address')
                <input type="text" name="filter_value" value="{{ request('filter_value') }}"
                placeholder="Enter address"
                class="rounded-lg border border-zinc-200 px-3 py-2.5 text-sm">
        @endif

            <button type="submit"
                class="rounded-lg bg-zinc-800 px-4 py-2.5 text-sm font-medium text-white">
                Search
            </button>
            <a href="{{ route('users.index') }}"
                class="rounded-lg border border-zinc-200 px-4 py-2.5 text-sm">
                Clear
            </a>
        </form>

        <div class="border border-zinc-200 rounded-xl overflow-hidden p-4">
            <ul class="space-y-3">
                @forelse ($users as $user)
                    <li class="flex items-center justify-between px-5 pt-3.5 border-b border-zinc-300 last:border-b-0" style="padding-bottom: 15px;">
                        <button type="button"
                            onclick="document.getElementById('show-patient-modal-{{ $user->id }}').showModal()"
                            class="text-sm font-medium text-zinc-900 hover:text-zinc-500">
                            {{ $user->full_name }}
                        </button>
                        <div class="flex items-center gap-3">
                            <button type="button"
                                onclick="document.getElementById('edit-patient-modal-{{ $user->id }}').showModal()"
                                class="px-3 py-1.5 text-xs font-medium bg-zinc-100 text-zinc-800 rounded-md">
                                Edit
                            </button>
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Delete this user?')"
                                        class="px-3 py-1.5 text-xs font-medium text-red-500 border border-red-200 rounded-md hover:bg-red-50 transition">
                                    Delete
                                </button>
                            </form>
                        </div>

                    <dialog id="edit-patient-modal-{{ $user->id }}"
                        style="border: 0; border-radius: 12px; padding: 0; width: min(92vw, 540px);">
                        <button type="button"
                            onclick="document.getElementById('edit-patient-modal-{{ $user->id }}').close()"
                            style="float: right; margin: 12px;">
                            Close
                        </button>

                    @include('users.edit', ['user' => $user])
                    </dialog>
                    

                    <dialog id="show-patient-modal-{{ $user->id }}"
                        style="width: min(92vw, 640px); max-height: 85vh; padding: 0; border: 0; border-radius: 16px; box-shadow: 0 24px 70px rgba(0,0,0,.18);">
                        <div class="flex items-center justify-between border-b border-zinc-200 px-6 py-4">
                        <h2 class="text-base font-semibold text-zinc-900">Patient details</h2>
                        <button type="button"
                            onclick="this.closest('dialog').close()"
                            class="rounded-lg px-3 py-2 text-sm text-zinc-600 hover:bg-zinc-100">
                            Close
                        </button>
                        </div>

                        <div class="max-h-[calc(85vh-65px)] overflow-y-auto p-6 sm:p-8">
                        @include('users.show', ['user' => $user])
                        </div>
                    </dialog>
                    
                        </li>
                @empty
                    <li class="px-5 py-10 text-center text-sm text-zinc-400">No patients yet.</li>
                @endforelse
            </ul>
        </div>
    </div>
</x-layouts.app>
