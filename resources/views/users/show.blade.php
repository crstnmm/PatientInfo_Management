
    <div class="flex flex-col gap-6 p-2 w-full">
        <div class="flex flex-col gap-1">
            <h1 class="text-lg font-semibold tracking-tight mt-2">{{ $user->full_name }}</h1>
            <p class="text-sm text-zinc-500">User details</p>
        </div>

        <div class="border border-zinc-200 rounded-xl overflow-hidden">
            <div class="divide-y divide-zinc-100">
                <div class="flex justify-between items-baseline px-5 py-3.5">
                    <span class="text-xs font-medium text-zinc-400 uppercase tracking-wide">Name</span>
                    <span class="text-sm text-zinc-900">{{ $user->full_name }}</span>
                </div>
                <div class="flex justify-between items-baseline px-5 py-3.5">
                    <span class="text-xs font-medium text-zinc-400 uppercase tracking-wide">Suffix</span>
                    <span class="text-sm text-zinc-900">{{ $user->suffix ?? '—' }}</span>
                </div>
                <div class="flex justify-between items-baseline px-5 py-3.5">
                    <span class="text-xs font-medium text-zinc-400 uppercase tracking-wide">Birthday</span>
                    <span class="text-sm text-zinc-900">{{ $user->date_of_birth }}</span>
                </div>

                <div class="flex justify-between items-baseline px-5 py-3.5">
                    <span class="text-xs font-medium text-zinc-400 uppercase tracking-wide">Age</span>
                    <span class="text-sm text-zinc-900">{{ $user->age }}</span>
                </div>
                <div class="flex justify-between items-baseline px-5 py-3.5">
                    <span class="text-xs font-medium text-zinc-400 uppercase tracking-wide">Email</span>
                    <span class="text-sm text-zinc-900">{{ $user->email }}</span>
                </div>
                <div class="flex justify-between items-baseline px-5 py-3.5">
                    <span class="text-xs font-medium text-zinc-400 uppercase tracking-wide">Address</span>
                    <span class="text-sm text-zinc-900 text-right">{{ $user->address }}</span>
                </div>
            </div>
        </div>
    </div>

