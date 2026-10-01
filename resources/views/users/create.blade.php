
    <div class="flex flex-col gap-4 p-8 w-full">
        <div class="flex flex-col gap-1">
            <h1 class="text-lg font-semibold tracking-tight mt-2">Add User</h1>
            <p class="text-sm text-zinc-500">Fill in the details to create a new user.</p>
        </div>

        <form action="{{ route('users.store') }}" method="POST" class="flex flex-col gap-4">
            @csrf

            <div class="flex flex-col gap-1.5">
                <label for="full_name" class="text-sm font-medium text-zinc-700">Full Name</label>
                <input id="full_name" type="text" name="full_name" placeholder="Juan dela Cruz" required
                       class="w-full px-3 py-2 text-sm border border-zinc-200 rounded-lg outline-none focus:border-zinc-900 focus:ring-2 focus:ring-zinc-900/10 transition">
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="suffix" class="text-sm font-medium text-zinc-700">Suffix</label>
                <input id="suffix" type="text" name="suffix" placeholder="Jr., Sr., III (optional)"
                       class="w-full px-3 py-2 text-sm border border-zinc-200 rounded-lg outline-none focus:border-zinc-900 focus:ring-2 focus:ring-zinc-900/10 transition">
            </div>
            
            <div class="flex flex-col gap-1.5">
                <label for="date_of_birth" class="text-sm font-medium text-zinc-700">Birth Date</label>
                <input id="date_of_birth" type="date" name="date_of_birth"
                value="{{ old('date_of_birth') }}" required
                        class="w-full rounded-lg border border-zinc-200 px-3 py-2.5 text-sm">
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="gender" class="text-sm font-medium text-zinc-700">Gender</label>
                <select id="gender" name="gender" required
                    class="w-full rounded-lg border border-zinc-200 px-3 py-2.5 text-sm">
                <option value="">Select gender</option>
                <option value="female" @selected(old('gender') === 'female')>Female</option>
                <option value="male" @selected(old('gender') === 'male')>Male</option>
                </select>
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="email" class="text-sm font-medium text-zinc-700">Email</label>
                <input id="email" type="email" name="email" placeholder="email@example.com" required
                       class="w-full px-3 py-2 text-sm border border-zinc-200 rounded-lg outline-none focus:border-zinc-900 focus:ring-2 focus:ring-zinc-900/10 transition">
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="address" class="text-sm font-medium text-zinc-700">Address</label>
                <textarea id="address" name="address" placeholder="Street, City, Province" required
                          class="w-full px-3 py-2 text-sm border border-zinc-200 rounded-lg outline-none focus:border-zinc-900 focus:ring-2 focus:ring-zinc-900/10 transition min-h-[80px] resize-y"></textarea>
            </div>

            <button type="submit"
                    class="py-5.5 bg-zinc-800 text-white dark:bg-white dark:text-zinc-900 text-sm font-medium rounded-lg hover:opacity-85 transition mt-1">
                Save User
            </button>
        </form>
    </div>
