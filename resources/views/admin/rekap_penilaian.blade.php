@extends('layouts.user_type.auth')

@section('content')   
   
    <div class="container-fluid pb-4">
        
          {{-- Tombol kembali --}}
        <a href="{{ route('dashboard_admin') }}" class="btn p-2 mb-1" style="color: gray; font-size: 1.5rem;">
            <i class="fas fa-arrow-left"></i>
        </a>
        
      <div class="d-flex flex-column h-100">
        <h3 class="font-weight-bolder mb-4">REKAPITULASI PENILAIAN PEGAWAI TERBAIK (TRIWULANAN)</h3>
      </div>

      <!-- table recap -->  
      <form method="GET" class="row mb-3">
          <div class="col-md-3">
              <select name="tahun" class="form-control">
                  @for ($y = date('Y'); $y >= 2020; $y--)
                      <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                  @endfor
              </select>
          </div>
          <div class="col-md-3">
              <select name="triwulan" class="form-control">
                  @for ($i = 1; $i <= 4; $i++)
                      <option value="{{ $i }}" {{ $triwulan == $i ? 'selected' : '' }}>Triwulan {{ $i }}</option>
                  @endfor
              </select>
          </div>
          <div class="col-md-3 d-flex gap-2">
              <button type="submit" class="btn" style="background-color: #68b92e; color: white; white-space: nowrap;">
                Tampilkan
            </button>
            <a href="{{ route('export_excel', ['tahun' => $tahun, 'triwulan' => $triwulan]) }}"  
               class="btn" style="background-color: #eb891b; color: white; white-space: nowrap;">
                Unduh Excel
            </a>
          </div>
      </form>

      <table class="table table-bordered" style="border-collapse: collapse;">
          <thead>
              <tr>
                  <th class="text-center" style="border: 1px solid #ddd;">No</th>
                  <th class="text-center" style="border: 1px solid #ddd;">Nama Pegawai</th>
                  <th class="text-center" style="border: 1px solid #ddd;">Jumlah Penilai</th>
                  <th class="text-center" style="border: 1px solid #ddd;">Total Poin</th>
                  <th class="text-center" style="border: 1px solid #ddd;">Nilai Akhir</th>
              </tr>
          </thead>
          <tbody>
              @foreach($rekap as $i => $r)
              <tr>
                  <td class="text-center" style="border: 1px solid #ddd;">{{ $i + 1 }}</td>
                  <td style="border: 1px solid #ddd;">{{ $r['name'] }}</td>
                  <td class="text-center" style="border: 1px solid #ddd;">{{ $r['jumlah_penilai'] }}</td>
                  <td class="text-center" style="border: 1px solid #ddd;">{{ $r['total_nilai'] ?? 0 }}</td>
                  <td class="text-center" style="border: 1px solid #ddd;">{{ $r['nilai_akhir'] ?? 0 }}</td>
              </tr>
              @endforeach
          </tbody>
      </table>
    </div>
      <!-- end table recap -->

@endsection