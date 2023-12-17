<style>
    /* Add this CSS to your existing stylesheet or in a new style tag */
    
    /* Set a common width for all form fields */
    .form-control {
        width: 100%;
    }
    
    /* Optionally, you can add some spacing between the form fields */
    .row {
        margin-bottom: 15px;
    }
    
    /* Style the submit button */
    .btn-primary {
        background-color: #007bff;
        color: #111;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }
    
    .btn-primary:hover {
        background-color: #0056b3;
    }
    
    </style>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Formulir isian Pendaftaran Mahasiswa Baru') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form method="POST" action="{{ route('form') }}">
                            @csrf
    
                                <div class="row mb-3">
                                    <!-- Nama Lengkap -->
                                    <div class="col-md-6">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap (sesuai ijazah disertai gelar)</label>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required>
                                    </div>
    
                                    <!-- Alamat KTP -->
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label for="alamat_KTP" class="form-label">Alamat KTP</label>
                                            <input type="text" name="alamat_ktp" placeholder="Alamat KTP" class="form-control" required>
                                        </div>
                                    <div class="col-md-6">
                                        <label for="alamat_lengkap" class="form-label">Alamat Lengkap Saat Ini</label>
                                        <input type="text" name="alamat_lengkap" placeholder="Alamat Lengkap" class="form-control" required>
                                        <div class="container">
                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="provinsi">Provinsi</label>
                                                <div class="col-md-9">
                                                    @php
                                                        $provinces = new App\Http\Controllers\DependentDropdownController;
                                                        $provinces= $provinces->provinces();
                                                    @endphp
                                                    <select class="form-control" name="provinsi" id="provinsi" required>
                                                        <option>==Pilih Salah Satu==</option>
                                                        @foreach ($provinces as $item)
                                                            <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="kota">Kabupaten / Kota</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="kota" id="kota" required>
                                                        <option>==Pilih Salah Satu==</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="kecamatan">Kecamatan</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="kecamatan" id="kecamatan" required>
                                                        <option>==Pilih Salah Satu==</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="desa">Desa</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="desa" id="desa" required>
                                                        <option>==Pilih Salah Satu==</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <script>
                                            function onChangeSelect(url, id, name) {
                                                // send ajax request to get the cities of the selected province and append to the select tag
                                                $.ajax({
                                                    url: url,
                                                    type: 'GET',
                                                    data: {
                                                        id: id
                                                    },
                                                    success: function (data) {
                                                        $('#' + name).empty();
                                                        $('#' + name).append('<option>==Pilih Salah Satu==</option>');
                                    
                                                        $.each(data, function (key, value) {
                                                            $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                                                        });
                                                    }
                                                });
                                            }
                                            $(function () {
                                                $('#provinsi').on('change', function () {
                                                    onChangeSelect('{{ route("cities") }}', $(this).val(), 'kota');
                                                });
                                                $('#kota').on('change', function () {
                                                    onChangeSelect('{{ route("districts") }}', $(this).val(), 'kecamatan');
                                                })
                                                $('#kecamatan').on('change', function () {
                                                    onChangeSelect('{{ route("villages") }}', $(this).val(), 'desa');
                                                })
                                            });
                                        </script>
                                    <div class="col-md-6">
                                        <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                        <input type="text" name="nomor_telepon" placeholder="Nomor Telepon" class="form-control" required>
                                        </div>
                                    <div class="col-md-6">
                                        <label for="nomor_hp" class="form-label">Nomor HP</label>
                                        <input type="text" name="nomor_hp" placeholder="Nomor HP" class="form-control" required>
                                        </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">E-Mail</label>
                                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                                    </div>
                                </div>
    
                                <div class="row mb-3">
                                    <!-- Kewarganegaraan -->
                                    <div class="col-md-6">
                                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                        <select name="kewarganegaraan" id="kewarganegaraan" class="form-select" required>
                                            <option value="wni_asli">WNI Asli</option>
                                            <option value="wni_keturunan">WNI Keturunan</option>
                                            <option value="wna">WNA</option>
                                        </select>
                                    </div>    
                                    <!-- Jenis Kelamin -->
                                    <div class="col-md-6">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                            <option value="pria">Pria</option>
                                            <option value="wanita">Wanita</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="row mb-3">
                                    <!-- Status Menikah -->
                                    <div class="col-md-6">
                                        <label for="status_menikah" class="form-label">Status Menikah</label>
                                        <select name="status_menikah" id="status_menikah" class="form-select" required>
                                            <option value="belum_menikah">Belum Menikah</option>
                                            <option value="menikah">Menikah</option>
                                            <option value="lain_lain">Lain-lain</option>
                                        </select>
                                    </div>
    
                                    <!-- Agama -->
                                    <div class="col-md-6">
                                        <label for="agama" class="form-label">Agama</label>
                                        <select name="agama" id="agama" class="form-select" required>
                                            <option value="islam">Islam</option>
                                            <option value="katolik">Katolik</option>
                                            <option value="kristen">Kristen</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="budha">Budha</option>
                                            <option value="lain_lain">Lain-lain</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    