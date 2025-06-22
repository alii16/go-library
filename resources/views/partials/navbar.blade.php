<nav class="bg-white shadow mb-6">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="/" class="text-xl font-bold">Go Library</a>
        <div class="space-x-4">
            <a href="{{ url('/buku') }}" class="text-gray-700 hover:text-indigo-600">Daftar Buku</a>
            @auth
                @if (auth()->user()->role === 'pustakawan')
                    <a href="{{ url('/admin/books') }}" class="text-gray-700 hover:text-indigo-600">Kelola Buku</a>
                    <a href="{{ url('/admin/loans') }}" class="text-gray-700 hover:text-indigo-600">Peminjaman</a>
                @endif
                <span class="text-gray-700">Halo, {{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="text-red-500 hover:underline ml-2">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600">Login</a>
                <a href="{{ route('register') }}" class="text-gray-700 hover:text-indigo-600">Register</a>
            @endauth
        </div>
    </div>
</nav>