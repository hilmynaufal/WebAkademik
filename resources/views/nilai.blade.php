@extends('home')



@section('container')

<div id="content" class="p-4 p-md-5 pt-5">
<div class="col-md-12 p-5 pt-2">
   <h3><i class="fas fa-paperclip mr-2"></i>Nilai</h3><hr>
   <label>Cari Siswa: </label>
    <select id="nama">
     <option selected disabled value="">-- Nama Siswa --</option>
      @foreach ($siswa as $val)
       <option value="{{$val->Nisn}}">{{$val->nama_siswa}}</option>
            
         @endforeach
     </select>
     <a href="/nilai" id="btnCari" class="btn btn-primary mr-3"><i class= "fas fa-plus mr-2"></i></i>Cari</a>
     <br>
     <br>
   <a href="javascript:;" data-toggle="modal" data-target="#CreateModal" class="btn btn-primary mr-3"><i class= "fas fa-plus mr-2"></i></i>Tambah Data</a>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Pelajaran</th>
      <th scope="col">UTS</th>
      <th scope="col">UAS</th>
      <th scope="col">Nilai Akhir</th>
      <th colspan="2" scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>

    @foreach($nilai as $val)

    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $val->nama_siswa }}</td>
      <td>{{ $val->nama_pelajaran }}</td>
      <td>{{ $val->uts}}</td>
      <td>{{ $val->uas}}</td>
      <td>{{ $val->na}}</td>

        
          <td><a class="fas fa-edit bg-warning p-2 text-white rounded edit-modal-click" data-id="">EDIT</a></td>
         <td><a href="javascript:;" data-toggle="modal" onclick="" data-target="#DeleteModal" class="fas fa-trash bg-danger p-2 text-white rounded">DELETE</a></td>

    </tr>
    @endforeach



  </tbody>
</table>

</div>



@endsection

@section('js')

<script type="text/javascript">

  var $id;

  $('#nama').on('change', function() {
    $id = this.value;
    $('#btnCari').prop("href", "/nilai/" + $id);
  })

  $(document).on("click", ".edit-modal-click", function () {
    var id = $(this).attr('data-id');
    var rowCells = $(this).closest("tr").children(); 
    var nama = rowCells.eq(2).text();
    var jenis_kelamin = rowCells.eq(3).text();
    var kelas = rowCells.eq(4).text();
    var tingkat = rowCells.eq(5).text();
    var tanggal_lahir = rowCells.eq(6).text();
    var alamat = rowCells.eq(7).text();
     $("#edit-Nip").val(id);
     $("#edit-nama_guru").val(nama);
     $("#edit-jenis_kelamin").val(jenis_kelamin).change();     
     $("#edit-kelas").val(kelas);
     $("#edit-tingkat").val(tingkat);
     $("#edit-tanggal_lahir").val(tanggal_lahir);
     $("#edit-alamat").val(alamat);
     $('#EditModal').modal('show');
    });


  function deleteData(id) {
         var id = id;
         var url = "siswa/hapus/id";
         url = url.replace('id', id);
         $("#deleteForm").attr('action', url);
  }

  function formSubmit() {
         $("#deleteForm").submit();
  }
</script>

@endsection