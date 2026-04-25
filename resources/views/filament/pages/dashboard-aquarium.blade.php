@php use Illuminate\Support\Facades\Storage; @endphp

<x-filament::page>

    {{-- 🔥 TAMBAH STATE GLOBAL --}}
    <div class="w-full" x-data="{ selected: 'all' }">

        {{-- HEADER --}}
        <div class="mb-6">
            <h1 style="font-size:24px;font-weight:bold;">🐟 Dashboard Aquarium</h1>
        </div>

        {{-- 🔥 FILTER AQUARIUM --}}
        <div style="margin-bottom:20px; display:flex; gap:10px; flex-wrap:wrap;">

            <button 
                @click="selected = 'all'"
                style="padding:8px 14px; border-radius:8px; background:#4f46e5; color:white;"
            >
                Semua
            </button>

            @foreach ($aquariums as $aq)
                <button 
                    @click="selected = {{ $aq->id }}"
                    style="padding:8px 14px; border-radius:8px; background:#e5e7eb;"
                >
                    {{ $aq->nama_aquarium }}
                </button>
            @endforeach

        </div>

        {{-- CARD STATISTIK --}}
        <div style="display:grid; grid-template-columns: repeat(3,1fr); gap:20px; margin-bottom:20px;">

            <div style="background:linear-gradient(135deg,#4f46e5,#6366f1);color:white;padding:20px;border-radius:12px;">
                <h3>Total Ikan</h3>
                <h1 style="font-size:28px;">{{ $total }}</h1>
            </div>

            <div style="background:linear-gradient(135deg,#16a34a,#22c55e);color:white;padding:20px;border-radius:12px;">
                <h3>Air Tawar</h3>
                <h1 style="font-size:28px;">{{ $tawar }}</h1>
            </div>

            <div style="background:linear-gradient(135deg,#0284c7,#0ea5e9);color:white;padding:20px;border-radius:12px;">
                <h3>Air Laut</h3>
                <h1 style="font-size:28px;">{{ $laut }}</h1>
            </div>

        </div>

        {{-- INFO --}}
        <div style="margin-bottom:20px;">
            <div style="background:#fff;padding:20px;border-radius:10px;">
                <h2 style="font-weight:bold;margin-bottom:10px;">Info</h2>
                <p>Dashboard ini menampilkan data ikan berdasarkan aquarium.</p>
            </div>
        </div>

        {{-- GRID IKAN --}}
        <div style="display:grid; grid-template-columns: repeat(3,1fr); gap:20px;">

            @foreach ($ikans as $ikan)
                <div 
                    x-show="selected == 'all' || selected == {{ $ikan->aquarium_id ?? 'null' }}"
                    x-transition
                    x-data="{ open:false }"
                >

                    {{-- CARD --}}
                    <div 
                        @click="open = true"
                        style="
                            background:#fff;
                            border-radius:12px;
                            overflow:hidden;
                            border:1px solid #e5e7eb;
                            box-shadow:0 4px 15px rgba(0,0,0,0.08);
                            cursor:pointer;
                        "
                    >

                        {{-- GARIS --}}
                        <div style="height:4px;background:linear-gradient(90deg,#4f46e5,#06b6d4);"></div>

                        {{-- GAMBAR (FIX) --}}
                        @if ($ikan->gambar)
                            <img src="{{ Storage::url($ikan->gambar) }}" style="width:100%;height:150px;object-fit:cover;">
                        @endif

                        <div style="padding:12px;">
                            <h3 style="font-weight:bold">{{ $ikan->nama_ikan }}</h3>

                            <p style="color:gray;font-size:14px;">
                                {{ $ikan->jenis }}
                            </p>

                            {{-- 🔥 TAMBAH NAMA AQUARIUM --}}
                            <p style="font-size:13px;color:#6366f1;">
                                {{ $ikan->aquarium->nama_aquarium ?? 'Tidak ada aquarium' }}
                            </p>

                            <p>Jumlah: {{ $ikan->jumlah }}</p>
                        </div>

                    </div>

                    {{-- MODAL --}}
                    <div 
                        x-show="open"
                        x-transition.opacity
                        style="
                            position:fixed;
                            top:0;
                            left:0;
                            width:100vw;
                            height:100vh;
                            background:rgba(0,0,0,0.6);
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            z-index:9999;
                        "
                    >
                        <div 
                            @click.away="open=false"
                            style="background:white;padding:20px;border-radius:12px;width:350px;"
                        >

                            @if ($ikan->gambar)
                                <img src="{{ Storage::url($ikan->gambar) }}" style="width:100%;height:150px;object-fit:cover;">
                            @endif

                            <h2 style="font-weight:bold;font-size:18px;">
                                {{ $ikan->nama_ikan }}
                            </h2>

                            <p><b>Aquarium:</b> {{ $ikan->aquarium->nama_aquarium ?? '-' }}</p>
                            <p><b>Jenis:</b> {{ $ikan->jenis }}</p>
                            <p><b>Jumlah:</b> {{ $ikan->jumlah }}</p>

                            <p style="margin-top:10px;color:gray;">
                                {{ $ikan->deskripsi }}
                            </p>

                            <button 
                                @click="open=false"
                                style="margin-top:10px;background:#4f46e5;color:white;padding:8px 12px;border-radius:6px;border:none;"
                            >
                                Tutup
                            </button>

                        </div>
                    </div>

                </div>
            @endforeach

        </div>

    </div>

</x-filament::page>