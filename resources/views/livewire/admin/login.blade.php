<div
    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-stone-900 md:text-2xl dark:text-white">
            Sign in to your account
        </h1>
        @error('credentials')
            <span class="error-input">{{ $message }}</span>
        @enderror
        <form wire:submit.prevent="login" class="space-y-4 md:space-y-6">
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    email</label>
                <input type="email" name="email" id="email" wire:model.lazy="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-stone-600 focus:border-stone-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@company.com" required="">
                @error('email')
                    <span class="error-input">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="password"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" name="password" id="password" wire:model.debounce.300ms="password"
                    placeholder="••••••••"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-stone-600 focus:border-stone-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required="">
                @error('password')
                    <span class="error-input">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center justify-end">
                <a href="#" class="text-sm font-medium text-stone-600 hover:underline dark:text-stone-500">Forgot
                    password?</a>
            </div>
            <button type="submit"
                class="w-full text-white bg-stone-600 hover:bg-stone-700 focus:ring-4 focus:outline-none focus:ring-stone-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-stone-600 dark:hover:bg-stone-700 dark:focus:ring-stone-800">Sign
                in</button>

        </form>
    </div>
</div>
