<x-filament::page>

    <div class="w-full">

        {{-- HEADER --}}
        <div class="mb-6">
            <h1 style="font-size:24px;font-weight:bold;">🐟 Dashboard Aquarium</h1>
            <p style="color:gray;"></p>
        </div>

        {{-- 🔥 CARD STATISTIK (DITAMBAH GARIS FUTURISTIK) --}}
        <div style="display:grid; grid-template-columns: repeat(3,1fr); gap:20px; margin-bottom:20px;">

            <div style="background:linear-gradient(135deg,#4f46e5,#6366f1);color:white;padding:20px;border-radius:12px; border:1px solid rgba(255,255,255,0.2); box-shadow:0 0 10px rgba(79,70,229,0.5);">
                <h3>Total Ikan</h3>
                <h1 style="font-size:28px;">{{ $total }}</h1>
            </div>

            <div style="background:linear-gradient(135deg,#16a34a,#22c55e);color:white;padding:20px;border-radius:12px; border:1px solid rgba(255,255,255,0.2); box-shadow:0 0 10px rgba(34,197,94,0.5);">
                <h3>Air Tawar</h3>
                <h1 style="font-size:28px;">{{ $tawar }}</h1>
            </div>

            <div style="background:linear-gradient(135deg,#0284c7,#0ea5e9);color:white;padding:20px;border-radius:12px; border:1px solid rgba(255,255,255,0.2); box-shadow:0 0 10px rgba(14,165,233,0.5);">
                <h3>Air Laut</h3>
                <h1 style="font-size:28px;">{{ $laut }}</h1>
            </div>

        </div>

        {{-- 🔥 INFO PINDAH KE ATAS --}}
        <div style="margin-bottom:20px;">
            <div style="
                background:#fff;
                padding:20px;
                border-radius:10px;
                border-left:4px solid #4f46e5;
                box-shadow:0 2px 10px rgba(0,0,0,0.1);
            ">
                <h2 style="font-weight:bold;margin-bottom:10px;">Info</h2>
                <p>Dashboard ini menampilkan data ikan secara lengkap sesuai dengan isi beberapa aquarium.</p>
            </div>
        </div>

        {{-- GRID UTAMA --}}
        <div style="display:grid; grid-template-columns: 1fr; gap:20px;">

            {{-- 🔥 IKAN JADI 3 KOLOM --}}
            <div style="display:grid; grid-template-columns: repeat(3,1fr); gap:20px;">

                @foreach ($ikans as $ikan)
                    <div x-data="{ open:false }">

                        {{-- CARD IKAN (DITAMBAH STYLE GARIS) --}}
                        <div 
                            @click="open = true"
                            style="
                                background:#fff;
                                border-radius:12px;
                                overflow:hidden;
                                border:1px solid #e5e7eb;
                                box-shadow:0 4px 15px rgba(0,0,0,0.08);
                                cursor:pointer;
                                transition:0.3s;
                                position:relative;
                            "
                            onmouseover="this.style.transform='translateY(-5px)'"
                            onmouseout="this.style.transform='translateY(0)'"
                        >

                            {{-- GARIS ATAS ESTETIK --}}
                            <div style="height:4px;background:linear-gradient(90deg,#4f46e5,#06b6d4);"></div>

                            @if ($ikan->gambar)
                                <img src="{{ asset('ikan/' . basename($ikan->gambar)) }}" style="width:100%;height:150px;object-fit:cover;">
                            @endif

                            <div style="padding:12px;">
                                <h3 style="font-weight:bold">{{ $ikan->nama_ikan }}</h3>
                                <p style="color:gray;font-size:14px;">{{ $ikan->jenis }}</p>
                                <p>Jumlah: {{ $ikan->jumlah }}</p>
                            </div>

                        </div>

                        {{-- MODAL (TETAP, CUMA DIBAGUSIN DIKIT) --}}
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
                                style="
                                    background:white;
                                    padding:20px;
                                    border-radius:12px;
                                    width:350px;
                                    box-shadow:0 10px 30px rgba(0,0,0,0.2);
                                "
                            >

                                @if ($ikan->gambar)
                                    <img src="{{ asset('ikan/' . basename($ikan->gambar)) }}" style="width:100%;height:150px;object-fit:cover;">
                                @endif

                                <h2 style="font-weight:bold;font-size:18px;">{{ $ikan->nama_ikan }}</h2>
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

    </div>

</x-filament::page>