@extends('dashboard')
@section('title', 'Data Karyawan') 
@section('body')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@if (session('success'))
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Data Berhasil Disimpan',
        showConfirmButton: false,
        timer: 2000
    }); 
</script>
@endif
@if (session('hapus'))
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Data Berhasil Dihapus',
        showConfirmButton: false,
        timer: 2000
    }); 
</script>
@endif
    <table id="datatable-buttons" class="table table-striped table-bordered data">
        <thead class="table-dark">
            <tr>
                <th>Nama Karyawan</th>
                <th>Alamat Karyawan</th>
                <th>Kota</th>
                <th>Email</th>
                <th>No Telfon</th>
                <th>Perusahaan</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($customer))
            @foreach($customer as $c => $val)
            <tr>
                <td>{{$val['nama']}}</td>
                <td>{{$val['alamat']}}</td>
                <td>{{$val['kota']}}</td>
                <td>{{$val['email']}}</td>
                <td>{{$val['hp']}}</td>
                <td>{{$val['perusahaan']}}</td>
                
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
        
<button type="button" id="tambah" class="btn btn-primary btn-sm tambah" data-toggle="modal" data-target=".tambahcustomer">Tambah Customer</button>

 <!-- Modal Tambah Customer Start -->
    <div class="modal tambahcustomer" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Tambah Customer</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                </div>
                <form action="/Tambah/Customer" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
                    <div class="modal-body">
                        {{ @csrf_field() }}
                        <div class="form-group">
                            <label for="namacustomer">Nama Customer</label>
                            <input type="text" class="form-control" id="nama_cus" name="nama_cus" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="Alamat">Alamat</label>
                            <input type="text"  placeholder="Masukkan Alamat" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="Alamat">Kota</label>
                            <select class="form-control form-select" aria-label="Default select example" name="kota">
                                <option selected>Pilih Kota ...</option>
                                <option value="Surabaya">Surabaya</option>
                                <option value="Mojokerto">Mojokerto</option>
                                <option value="Jombang">Jombang</option>
                                <option value="Lamongan">Lamongan</option>
                                <option value="Gresik">Gresik</option>
                                <option value="Sidoajo">Sidoajo</option>
                                <option value="Malang">Malang</option>
                                <option value="Kediri">Kediri</option>
                                <option value="Madiun">Madiun</option>
                                <option value="Ponorogo">Ponorogo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" placeholder="Masukkan Email" name="email" id="email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="form-group">
                            <label for="NoTelfon">No Telfon</label>
                            <input type="number" min="0" placeholder="Masukkan Nomor Telfon" name="telfon" class="form-control" id="telfon" required>
                        </div>
                        <div class="form-group">
                            <label for="NoTelfon">Perusahaan</label>
                            <input type="text"  placeholder="Masukkan Nomor Telfon" name="perusahaan" class="form-control" id="perusahaan" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- End Modal Tambah Customer -->

@endsection