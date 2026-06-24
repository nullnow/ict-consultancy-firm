<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication Login // OPES Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0c0d1c] min-h-screen flex items-center justify-center p-4 sm:p-6">
    <div class="w-full max-w-md bg-[#111326] p-6 sm:p-8 rounded-xl shadow-2xl">
        <div class="text-center mb-6 sm:mb-8">
            <h1 class="text-xl sm:text-2xl font-black tracking-tight text-white uppercase font-sans">OPES TECHNOLOGIES</h1>
            <p class="text-[10px] sm:text-xs text-cyan-400 uppercase tracking-widest font-mono mt-1">Core Access Port</p>
        </div>

        <form action="{{ route('login.authenticate') }}" method="POST" class="space-y-5 sm:space-y-6">
            @csrf
            <div>
                <label class="block text-[10px] sm:text-xs uppercase font-bold text-gray-400 tracking-wider mb-2">Operational Identifier (Username)</label>
                <input type="text" name="username" value="{{ old('username') }}" required autofocus class="w-full p-3.5 sm:p-4 bg-black/40 border border-white/10 rounded text-white text-base sm:text-sm focus:outline-none focus:border-cyan-500 transition-colors">
                @error('username') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-[10px] sm:text-xs uppercase font-bold text-gray-400 tracking-wider mb-2">Cryptographic Key (Password)</label>

                <div class="relative flex items-center">
                    <input type="password" id="password" name="password" required
                           class="w-full p-3.5 sm:p-4 pr-12 bg-black/40 border border-white/10 rounded text-white text-base sm:text-sm focus:outline-none focus:border-cyan-500 transition-colors">

                    <button type="button" onclick="togglePasswordVisibility()" class="absolute right-4 text-gray-400 hover:text-cyan-400 transition-colors focus:outline-none">
                        <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 block">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 1-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="w-full py-3.5 sm:py-4 bg-gradient-to-r from-blue-700 to-indigo-700 hover:opacity-90 active:scale-[0.99] text-white text-sm font-bold uppercase tracking-wider rounded transition-all shadow-lg shadow-indigo-900/20">
                Authenticate Credentials
            </button>
        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeOpen = document.getElementById('eye-open');
            const eyeClosed = document.getElementById('eye-closed');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeOpen.classList.remove('block');
                eyeClosed.classList.add('block');
                eyeClosed.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeOpen.classList.add('block');
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
                eyeClosed.classList.remove('block');
            }
        }
    </script>
</body>
</html>
