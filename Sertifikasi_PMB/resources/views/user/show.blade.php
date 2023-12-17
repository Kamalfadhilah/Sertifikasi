@extends('layouts.layout')

@section('content')
<section id='detail'>
    <div class="container">
      @auth
                <h1 class='tambahh1'>{{ $pendaftaran->nama_lengkap }}</h1>
                <p class='tambahp'>Detail pendaftaran {{ $pendaftaran->nama_lengkap }}</p>
                <div class='d-flex justify-content-center align-items-start gap-5 mt-5'>
                  <form action='{{ route('admin.pendaftarans.updateStatus', [$pendaftaran->id]) }}' method="POST" enctype='multipart/form-data'>
                    @csrf
                    @method('POST')
                    <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" value='{{ $pendaftaran->nama_lengkap }}'>
        <label for="alamat_KTP">Alamat Lengkap Sesuai KTP</label>
        <input type="text" id="alamat_KTP" name="alamat_KTP" value='{{ $pendaftaran->alamat_KTP }}'>
        <label for="alamat_lengkap">Alamat Lengkap Sesuai Domisili</label>
        <input type="text" id="alamat_lengkap" name="alamat_lengkap" value='{{ $pendaftaran->alamat_lengkap }}'>
        <label for="provinsi">provinsi</label>
        <input type="text" id="provinsi" name="provinsi" value='{{ $pendaftaran->provinsi }}'>
        <label for="kabupaten">kabupaten</label>
        <input type="text" id="kabupaten" name="kabupaten" value='{{ $pendaftaran->kabupaten }}'>
        <label for="kecamatan">kecamatan</label>
        <input type="text" id="kecamatan" name="kecamatan" value='{{ $pendaftaran->kecamatan }}'>
        <label for="nomor_hp">Nomor HP</label>
        <input type="number" id="nomor_hp" name="nomor_hp" value='{{ $pendaftaran->nomor_hp }}'>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value='{{ $pendaftaran->email }}'>
        <label for="kewarganegaraan">Kewarganegaraan</label>
        <select id="kewarganegaraan" name="kewarganegaraan">
          <option value="WNI">WNI</option>
          <option value="WNI Keturanan">WNI Keturunan</option>
          <option value="WNA">WNA</option>
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select id="jenis_kelamin" name="jenis_kelamin">
          <option value="pria">Pria</option>
          <option value="wanita">Wanita</option>
          </select>
          <label for="status_menikah">Status Pernikahan</label>
          <select id="status_menikah" name="status_menikah">
              <option value="belum_menikah">Belum Menikah</option>
              <option value="menikah">Menikah</option>
              <option value="lain-lain">lain-lain</option>
          </select>          
        <label for="agama">agama</label>
        <select id="agama" name="agama">
          <option value="Islam">Islam</option>
          <option value="Catholic">Catholic</option>
          <option value="Christian">Christian</option>
          <option value="Hindu">Hindu</option>
          <option value="Buddha">Buddha</option>
          <option value="lain-lain">lain-lain</option>
      </select>
        <label for="inputGroupFile01">Document</label>
        <input type="file" class="form-control" id="inputGroupFile01" name="document" style="height: 40px;">
        <label for="status">Status Registrasi</label>
        <input type="text" id="status" name="status" value='{{ $pendaftaran->registration_status }}'>
                    <button type="submit" class='btn btn-primary' style='margin-top: 40px;'>Edit</button>
                  </form>
                </div>
        @endauth
    </div>
  </section>
  @if (session('success'))
  <script>
      alert("{{ session('success') }}");
  </script>
  @endif
@endsection