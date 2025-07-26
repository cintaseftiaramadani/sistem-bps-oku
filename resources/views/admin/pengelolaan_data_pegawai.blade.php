@extends('layouts.user_type.auth')

@section('content')   

    {{-- Tombol kembali --}}
    <a href="{{ route('dashboard_admin') }}" class="btn p-2 mb-1" style="color: gray; font-size: 1.5rem;">
        <i class="fas fa-arrow-left"></i>
    </a>

    <h3 class="font-weight-bolder mb-4">PENGELOLAAN DATA PEGAWAI BPS KABUPATEN OKU</h3>

    <div class="mb-3">
        <a href="{{ route('pegawai.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Pegawai
        </a>
    </div>

    <table class="table table-bordered" style="border-collapse: collapse; font-size: 14px;">
        <thead>
            <tr>
                <th class="text-center px-2 py-1" style="border: 1px solid #ddd;">No</th>
                <th class="text-center px-2 py-1" style="border: 1px solid #ddd;">Nama Pegawai</th>
                <th class="text-center px-2 py-1" style="border: 1px solid #ddd;">NIP</th>
                <th class="text-center px-2 py-1" style="border: 1px solid #ddd;">Jabatan</th>
                <th class="text-center px-2 py-1" style="border: 1px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekap as $i => $r)
            <tr>
                <td class="text-center px-2 py-1" style="border: 1px solid #ddd;">{{ $i + 1 }}</td>
                <td class="px-2 py-1" style="border: 1px solid #ddd;">{{ $r['name'] }}</td>
                <td class="text-center px-2 py-1" style="border: 1px solid #ddd;">{{ $r['nip'] }}</td>
                <td class="text-center px-2 py-1" style="border: 1px solid #ddd;">{{ $r['jabatan'] }}</td>
                <td class="text-center px-2 py-1" style="border: 1px solid #ddd;">
                    <a href="{{ route('pegawai.edit', $r->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pegawai.destroy', $r->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" 
                        onclick="return confirm('Yakin ingin menghapus pegawai ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


@endsection