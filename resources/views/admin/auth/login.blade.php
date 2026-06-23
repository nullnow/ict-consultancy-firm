<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication Login // OPES Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0c0d1c] min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-md bg-[#111326] p-8 rounded-xl shadow-2xl">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-black tracking-tight text-white uppercase font-sans">OPES TECHNOLOGIES</h1>
            <p class="text-xs text-cyan-400 uppercase tracking-widest font-mono mt-1">Core Access Port</p>
        </div>

        <form action="{{ route('login.authenticate') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-xs uppercase font-bold text-gray-400 tracking-wider mb-2">Operational Identifier (Username)</label>
                <input type="text" name="username" value="{{ old('username') }}" required autofocus class="w-full p-4 bg-black/40 border border-white/10 rounded text-white text-sm focus:outline-none focus:border-cyan-500">
                @error('username') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs uppercase font-bold text-gray-400 tracking-wider mb-2">Cryptographic Key (Password)</label>
                <input type="password" name="password" required class="w-full p-4 bg-black/40 border border-white/10 rounded text-white text-sm focus:outline-none focus:border-cyan-500">
            </div>

            <button type="submit" class="w-full py-4 bg-gradient-to-r from-blue-700 to-indigo-700 hover:opacity-90 text-white text-sm font-bold uppercase tracking-wider rounded transition-all">
                Authenticate Credentials
            </button>
        </form>
    </div>
</body>
</html>
