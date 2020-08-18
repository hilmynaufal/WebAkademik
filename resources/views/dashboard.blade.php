@extends('home')


@section('container')

<div id="content" class="p-4 p-md-5 pt-5">
<div class="col-md-12 p-5 pt-2">
   <h3><i class="fas fa-paperclip mr-2"></i>Layanan</h3><hr>
   <a href="javascript:;" data-toggle="modal" data-target="#CreateModal" class="btn btn-primary mr-3"><i class= "fas fa-plus mr-2"></i></i>Tambah Data</a>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Jenis</th>
      <th scope="col">Harga</th>
      <th scope="col">Satuan</th>
      <th colspan="2" scope="col">AKSI</th>
    </tr>
  </thead>
  <!--  -->
</table>

</div>

@endsection