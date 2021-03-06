@extends('home')

@section('container')

<div id="content" class="p-4 p-md-5 pt-5">
<div class="col-md-12 p-5 pt-2">
   <h3><i class="fas fa-paperclip mr-2"></i>SISWA</h3><hr>
   <a href="javascript:;" data-toggle="modal" data-target="#CreateModal" class="btn btn-primary mr-3"><i class= "fas fa-plus mr-2"></i></i>Tambah Data</a>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nisn</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Kelas</th>
      <th scope="col">Tingkat</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Alamat</th>
      <th colspan="2" scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>

    @foreach($siswa as $val)

    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $val->Nisn }}</td>
      <td>{{ $val->nama_siswa}}</td>
      <td>{{ $val->jk}}</td>
      <td>{{ $val->kelas}}</td>
      <td>{{ $val->tingkat}}</td>      
      <td>{{ $val->tanggal_lahir}}</td>
      <td>{{ $val->alamat}}</td>
        
          <td><a class="fas fa-edit bg-warning p-2 text-white rounded edit-modal-click" data-id="{{ $val->Nisn }}">EDIT</a></td>
         <td><a href="javascript:;" data-toggle="modal" onclick="deleteData({{$val->Nisn}})" data-target="#DeleteModal" class="fas fa-trash bg-danger p-2 text-white rounded">DELETE</td>

    </tr>
    @endforeach



  </tbody>
</table>

</div>

<div class="modal fade" id="CreateModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/siswa/tambah" method="post">
              @csrf
                <div class="form-group">
                  <label>Nisn</label>
                    <input type="text" name="Nisn" class="form-control">      
                  </div>

                 <div class="form-group">
                  <label>Nama Siswa</label>
            <input type="text" name="nama_siswa" class="form-control">      
          </div>
          <div class="form-group">
                  <label>Jenis Kelamin</label>
            <select class="form-control form-control-sm" name="jenis_kelamin">
              <option selected disabled value="">-- Please Select --</option>
              <option value="L">L</option>
              <option value="P">P</option>
            </select>  
          </div>
          <div class="form-group">
                  <label>Kelas</label>
            <input type="text" name="kelas" class="form-control">
                  
          </div>
          <div class="form-group">
                  <label>Tingkat</label>
            <input type="text" name="tingkat" class="form-control">      
          </div>
          <div class="form-group">
                  <label>Tanggal Lahir</label>
            <input type="text" name="tanggal_lahir" class="form-control">
          </div>
          <div class="form-group">
                  <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
          </div>
          <div class="modal-footer">  
        <button type="submit" class="btn btn-success" data-dissmis="modal">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form action="/siswa/update" method="post">
              @csrf
                <div class="form-group">
                  <label>Nisn</label>
                    <input type="text" name="Nisn" id="edit-Nisn" class="form-control" readonly>      
                  </div>

                 <div class="form-group">
                  <label>Nama Siswa</label>
            <input type="text" name="nama_siswa" id="edit-nama_siswa" class="form-control">      
          </div>
          <div class="form-group">
                  <label>Jenis Kelamin</label>
            <select class="form-control form-control-sm" name="jenis_kelamin" id="edit-jenis_kelamin">
              <option disabled value="">-- Please Select --</option>
              <option value="L">L</option>
              <option value="P">P</option>
            </select>  
          </div>
          <div class="form-group">
                  <label>Kelas</label>
            <input type="text" name="kelas" id="edit-kelas" class="form-control">
                  
          </div>
          <div class="form-group">
                  <label>Tingkat</label>
            <input type="text" name="tingkat" id="edit-tingkat" class="form-control">      
          </div>
          <div class="form-group">
                  <label>Tanggal Lahir</label>
            <input type="text" name="tanggal_lahir" id="edit-tanggal_lahir" class="form-control">
          </div>
          <div class="form-group">
                  <label>Alamat</label>
            <input type="text" name="alamat" id="edit-alamat" class="form-control">
          </div>
          <div class="modal-footer">  
        <button type="submit" class="btn btn-success" data-dissmis="modal">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>


<div id="DeleteModal" class="modal fade text-danger" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="deleteForm" method="get">
         <div class="modal-content">
             <div class="modal-header bg-danger">
                 <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
                 {{ csrf_field() }}
                 {{ method_field('GET') }}
                 <p class="text-center">Anda Yakin Ingin Menghapus User Ini? ?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
</div>

@endsection

@section('js')

<script type="text/javascript">
  $(document).on("click", ".edit-modal-click", function () {
    var id = $(this).attr('data-id');
    var rowCells = $(this).closest("tr").children(); 
    var nama = rowCells.eq(2).text();
    var jenis_kelamin = rowCells.eq(3).text();
    var kelas = rowCells.eq(4).text();
    var tingkat = rowCells.eq(5).text();
    var tanggal_lahir = rowCells.eq(6).text();
    var alamat = rowCells.eq(7).text();
     $("#edit-Nisn").val(id);
     $("#edit-nama_siswa").val(nama);
     $("#edit-jenis_kelamin").val(jenis_kelamin).change();     
     $("#edit-kelas").val(kelas);
     $("#edit-tingkat").val(tingkat);
     $("#edit-tanggal_lahir").val(tanggal_lahir);
     $("#edit-alamat").val(alamat);
     $('#EditModal').modal('show');
    });


  function deleteData(id)
     {
         var id = id;
         var url = "siswa/hapus/id";
         url = url.replace('id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>

@endsection