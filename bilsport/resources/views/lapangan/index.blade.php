<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin Bilsport') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: #FDF5E6; min-h-screen;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                    <h2 style="color: maroon; font-weight: bold; font-size: 1.5rem;">Daftar Lapangan</h2>
                    <a href="{{ route('lapangan.create') }}" style="background: maroon; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px; font-weight: bold; font-size: 0.9rem;">
                        + Tambah Lapangan
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                        <thead style="background: maroon; color: white;">
                            <tr>
                                <th style="padding: 15px; text-align: left;">Kode</th>
                                <th style="padding: 15px; text-align: left;">Nama Lapangan</th>
                                <th style="padding: 15px; text-align: left;">Kategori</th>
                                <th style="padding: 15px; text-align: left;">Harga/Jam</th>
                                <th style="padding: 15px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($lapangans as $lp)
                            <tr style="border-bottom: 1px solid #eee;">
                                <td style="padding: 15px;">{{ $lp->kode_lapangan }}</td>
                                <td style="padding: 15px;">{{ $lp->nama_lapangan }}</td>
                                <td style="padding: 15px;">{{ $lp->kategori }}</td>
                                <td style="padding: 15px;">Rp {{ number_format($lp->harga_per_jam) }}</td>
                                <td style="padding: 15px; text-align: center;">
                                    <a href="{{ route('lapangan.show', $lp->id) }}" style="color: #3b82f6; text-decoration: none; font-weight: 500;">Detail</a> |
                                    <a href="{{ route('lapangan.edit', $lp->id) }}" style="color: #f59e0b; text-decoration: none; font-weight: 500;">Edit</a> |
                                    <form action="{{ route('lapangan.destroy', $lp->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus lapangan ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" style="color: #ef4444; background: none; border: none; cursor: pointer; font-weight: 500;">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="padding: 20px; text-align: center; color: gray;">Belum ada data lapangan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 20px;">
                    {{ $lapangans->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>