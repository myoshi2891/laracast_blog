<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log in!</h1>
                <form action="/sessions" method="POST" class="mt-10">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username" />
                    <x-form.input name="password" type="password" autocomplete="new-password" />

                    <x-form.button>Log In</x-form.button>
                    {{-- <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>
                    <input type="email" class="border border-grey-400 p-2 w-full" value="{{ old('email') }}"
                        name="email" id="email" required autocomplete="username">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div> --}}

                    {{-- <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Password
                    </label>
                    <input type="password" class="border border-grey-400 p-2 w-full" name="password" id="password"
                        required autocomplete="current-password">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div> --}}

                    {{-- <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Log In
                    </button>
                </div> --}}
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
