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
                <input type="password" name="password" required class="w-full p-3.5 sm:p-4 bg-black/40 border border-white/10 rounded text-white text-base sm:text-sm focus:outline-none focus:border-cyan-500 transition-colors">
            </div>

            <button type="submit" class="w-full py-3.5 sm:py-4 bg-gradient-to-r from-blue-700 to-indigo-700 hover:opacity-90 active:scale-[0.99] text-white text-sm font-bold uppercase tracking-wider rounded transition-all shadow-lg shadow-indigo-900/20">
                Authenticate Credentials
            </button>
        </form>
    </div>
</body>
</html>
