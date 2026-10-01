    <div class="flex flex-col gap-3 p-6 w-full">
        <div class="flex flex-col gap-1">
            
            <h1 class="text-lg font-semibold tracking-tight mt-2">Edit User</h1>
            <p class="text-sm text-zinc-500">Update the details for {{ $user->full_name }}.</p>
        </div>

        <form action="{{ route('users.update', $user) }}" method="POST" class="flex flex-col gap-4">
            @csrf
            @method('PUT')

            <div class="flex flex-col gap-1.5">
                <label for="full_name" class="text-sm font-medium text-zinc-700">Full Name</label>
                <input id="full_name" type="text" name="full_name"
                       value="{{ old('full_name', $user->full_name) }}" required
                       class="w-full px-3 py-2 text-sm border border-zinc-200 rounded-lg outline-none focus:border-zinc-900 focus:ring-2 focus:ring-zinc-900/10 transition">
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="suffix" class="text-sm font-medium text-zinc-700">Suffix</label>
                <input id="suffix" type="text" name="suffix"
                       value="{{ old('suffix', $user->suffix) }}" placeholder="Optional"
                       class="w-full px-3 py-2 text-sm border border-zinc-200 rounded-lg outline-none focus:border-zinc-900 focus:ring-2 focus:ring-zinc-900/10 transition">
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="date_of_birth" class="text-sm font-medium text-zinc-700">Birth Date</label>
                <input id="date_of_birth" type="date" name="date_of_birth"
                    value="{{ old('date_of_birth', $user->date_of_birth) }}" required
                    class="w-full rounded-lg border border-zinc-200 px-3 py-2.5 text-sm">
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="gender" class="text-sm font-medium text-zinc-700">Gender</label>
                <select id="gender" name="gender" required
                    class="w-full rounded-lg border border-zinc-200 px-3 py-2.5 text-sm">
                    <option value="">Select gender</option>
                    <option value="female" @selected(old('gender', $user->gender) === 'female')>Female</option>
                    <option value="male" @selected(old('gender', $user->gender) === 'male')>Male</option>
                </select>
            </div>
            
            <div class="flex flex-col gap-1.5">
                <label for="email" class="text-sm font-medium text-zinc-700">Email</label>
                <input id="email" type="email" name="email"
                       value="{{ old('email', $user->email) }}" required
                       class="w-full px-3 py-2 text-sm border border-zinc-200 rounded-lg outline-none focus:border-zinc-900 focus:ring-2 focus:ring-zinc-900/10 transition">
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="address" class="text-sm font-medium text-zinc-700">Address</label>
                <textarea id="address" name="address" required
                          class="w-full px-3 py-2 text-sm border border-zinc-200 rounded-lg outline-none focus:border-zinc-900 focus:ring-2 focus:ring-zinc-900/10 transition min-h-[80px] resize-y">{{ old('address', $user->address) }}</textarea>
            </div>

            <button type="submit"
                    class=" self-end px-6 py-2.5 bg-zinc-800 text-white dark:bg-white dark:text-zinc-900 text-sm font-medium rounded-lg hover:opacity-85 transition mt-1">
                Update User
            </button>
        </form>
    </div>

