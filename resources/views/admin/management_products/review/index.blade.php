@extends('layouts.dashboard')
@section('title', 'Semua Ulasan')

@section('content')
<div x-data="{ selectedStar: 0 }" class="max-w-5xl mx-auto px-4 py-6 space-y-6">

    <h1 class="text-xl font-bold text-primary">Semua Ulasan</h1>

    <!-- Info Produk -->
    <div class="bg-white border p-4 rounded-xl shadow mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-4">
            <img src="https://via.placeholder.com/80x80?text=Matcha" class="w-20 h-20 rounded-lg object-cover" alt="Matcha Latte">
            <div>
                <h2 class="text-lg font-semibold">Matcha Latte</h2>
                <p class="text-sm text-gray-500">Minuman rasa matcha manis dan creamy</p>
                <p class="text-sm text-gray-500">Kategori: Minuman</p>
            </div>
        </div>
        <a href="#" class="btn btn-outline btn-sm sm:btn-md">← Kembali</a>
    </div>

    <!-- Rangkuman -->
    <div class="flex items-center gap-4 mb-4">
        <div class="text-2xl font-bold">4.2</div>
        <div class="flex items-center">
            ⭐⭐⭐⭐☆
        </div>
        <div class="text-sm text-gray-500">Dari 120 ulasan</div>
    </div>

    <!-- Filter Bintang -->
    <div class="flex flex-wrap gap-2 mb-6">
        <button @click="selectedStar = 0" :class="selectedStar === 0 ? 'btn-primary' : 'btn-outline'" class="btn btn-sm">
            Semua
        </button>
        @foreach([5, 4, 3, 2, 1] as $star)
        <button 
            @click="selectedStar = {{ $star }}" 
            :class="selectedStar === {{ $star }} ? 'btn-primary' : 'btn-outline'"
            class="btn btn-sm flex items-center gap-1"
        >
            @for($i = 0; $i < $star; $i++)
                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.966a1 1 0 00.95.69h4.211c.969 0 1.371 1.24.588 1.81l-3.405 2.472a1 1 0 00-.364 1.118l1.287 3.966c.3.921-.755 1.688-1.538 1.118L10 13.348l-3.405 2.472c-.783.57-1.838-.197-1.539-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.574 9.393c-.783-.57-.38-1.81.588-1.81h4.211a1 1 0 00.95-.69l1.286-3.966z" />
                </svg>
            @endfor
        </button>
        @endforeach
    </div>

    <!-- Daftar Ulasan -->
    <div class="space-y-4">
        @foreach(range(1, 10) as $i)
            @php
                $randomStar = rand(1, 5);
                $userName = 'User ' . $i;
                $userInitial = strtoupper(substr($userName, 0, 1));
                $comment = 'Produknya enak dan pengiriman cepat. Recommended!';
            @endphp
            <div 
                x-show="selectedStar === 0 || selectedStar === {{ $randomStar }}" 
                class="bg-white p-4 rounded-xl shadow-sm border"
            >
                <div class="flex justify-between items-start mb-2">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-blue-200 flex items-center justify-center text-sm font-bold text-blue-800">
                            {{ $userInitial }}
                        </div>
                        <span class="font-semibold text-gray-800 text-sm">{{ $userName }}</span>
                    </div>
                    <div class="flex items-center gap-1 text-yellow-400 text-sm">
                        @for($j = 0; $j < $randomStar; $j++)
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.966a1 1 0 00.95.69h4.211c.969 0 1.371 1.24.588 1.81l-3.405 2.472a1 1 0 00-.364 1.118l1.287 3.966c.3.921-.755 1.688-1.538 1.118L10 13.348l-3.405 2.472c-.783.57-1.838-.197-1.539-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.574 9.393c-.783-.57-.38-1.81.588-1.81h4.211a1 1 0 00.95-.69l1.286-3.966z" />
                            </svg>
                        @endfor
                    </div>
                </div>
                <p class="text-gray-700 text-sm leading-relaxed">
                    {{ $comment }}
                </p>
                <div class="mt-2 flex justify-between items-center">
                    <p class="text-xs text-gray-400">user{{ $i }} • {{ now()->subDays($i)->format('d M Y') }}</p>
                    <button class="btn btn-xs btn-outline btn-primary">Balas</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
