<script src="<?php echo base_url()."assets" ?>/js/md5.min.js"></script>
  <!-- content -->
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Data Lembar Kerja Dosen</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">This is</a>
                        </li>
                        <li class="active">
                            <strong>Breadcrumb</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <!-- <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal4"><i class="fa fa-plus"></i> Tambah Data</a> -->
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content">
              <div class="ibox-title">
                <div class="row">
                <div class=" col-md-2" style="margin-top:5px;margin-bottom:-10px;">
                  <label for="semester">Filter Bulan</label>
                  <div class="form-group">
                    <select id="bulan" class="form-control">
                      <?php
                      echo "<option value='0'>-- Pilih Semua --</option>";
                      foreach ($bulan->result() as $row){
                          echo "<option value='$row->kode'>$row->bulan</option>";
                      }
                      ?>

                    </select>

                  </div>
                </div>
                <div class=" col-md-2" style="margin-top:5px;margin-bottom:-10px;">
                  <label for="semester">Filter Periode</label>
                  <div class="form-group">
                    <select id="mingguan" class="form-control">
                      <?php
                      echo "<option value='0'>-- Pilih Semua --</option>";

                      ?>

                    </select>

                  </div>
                </div>
                <div class=" col-md-3" style="margin-top:5px;margin-bottom:-10px;">
                  <label for="semester">Filter Status Pengajuan</label>
                  <div class="form-group">
                    <select id="status" class="form-control">
                      <option value="-2">-- Pilih Semua --</option>
                      <option value="-1">Belum Mengajukan ACC</option>
                      <option value="0">Menunggu ACC</option>
                      <option value="1">Telah di-ACC</option>
                    </select>

                  </div>
                </div>
                <div class="col-md-4 pull-right">
                    <div class="col-md-5" style="margin-top:30px;">
                      <button type="button" class="btn btn-sm btn-info" onclick="exportPengajuan()"><i class="fa fa-print"></i> Export Bulanan</button>
                    </div>
                    <div class="col-md-7"  style="margin-top:30px;">
                      <button type="button" class="btn btn-sm btn-success" onclick="accSemua()"><i class="fa fa-check-circle"></i> ACC Semua Pengajuan</button>
                    </div>
                </div>
              </div>
              </div>
              <div class="ibox-content">
              <div class="table-responsive">
                <table id="mytable" class="table table-striped table-bordered table-hover" >
                <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Lengkap</th>
                    <th>Periode</th>
                    <th>Waktu Pengajuan</th>
                    <th>Status</th>
                    <th><center>Action</center></th>
                </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
                              <!-- <span id="accept" class="hidden">Telah di ACC</span> -->
                              <!-- <table>
                                <tr>
                                  <td style="width:150px;align:center;"></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td style="text-align:center;"></td>
                                  <td></td>
                                </tr>
                              </table> -->
                        </div>
                      </form>
                    </div>
                </div><br>
            <!-- </div> -->
            <style media="screen">
            .modal-body {
              max-height: calc(100vh - 260px);
              overflow-y: auto;
            }
            </style>
            <div class="modal inmodal fade" id="myModalEdit" tabindex="-1" role="dialog"  aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content animated fadeInDown">
                          <div class="modal-header">
                              <h4 class="modal-title">Detail Kegiatan</h4>
                              <!-- <small>Tanggal Pengajuan: 06/03/2018</small> -->
                          </div>
                          <form class="form-horizontal">
                          <div class="modal-body">
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th><center>No</center></th>
                                    <th><center>Tanggal</center></th>
                                    <th><center>Kegiatan</center></th>
                                    <th><center>Waktu</center></th>
                                    <?php foreach ($kategori as $row){
                                      echo "<th><center>$row->alias</center></th>";
                                    } ?>
                                    <th><center>Jmlh</center></th>
                                  </tr>
                                </thead>
                                <tbody id="body">

                                </tbody>
                              </table>
                            </div>
                              <center>
                                <button type="button" id="acc" class="btn btn-success" onclick="set(1)"><i class="fa fa-check-circle"></i> ACC Kegiatan</button>
                                <button type="button" id="reset" class="btn btn-danger" onclick="set(-1)"><i class="fa fa-refresh"></i> Reset Pengajuan</button>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-white" data-dismiss="modal">Kembali</button>
                              <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                          </div>
                        </form>
                      </div>
                  </div>
              </div>

      <script>
          var id_periode = 0,id_pengajuan,status,kode_bulan = 0,status_pengajuan=0;
          var check = 0;
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
              {
                  return {
                      "iStart": oSettings._iDisplayStart,
                      "iEnd": oSettings.fnDisplayEnd(),
                      "iLength": oSettings._iDisplayLength,
                      "iTotal": oSettings.fnRecordsTotal(),
                      "iFilteredTotal": oSettings.fnRecordsDisplay(),
                      "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                      "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                  };
              };
              $('#bulan').change(function(){
                kode_bulan = $(this).val();
                $.ajax({
                     url : "<?php echo site_url('dekan/Datalkd/getPeriode')?>",
                     type: "POST",
                     data: {"kode":kode_bulan},
                     dataType: "JSON",
                     success: function(data)
                     {
                       if (data.status=='berhasil') {
                         $('#mingguan').html(data.data);
                       }
                       id_periode=0;
                       loadData();
                     },
                         error: function (jqXHR, textStatus, errorThrown)
                         {
                           console.log(jqXHR);
                     console.log(textStatus);
                     console.log(errorThrown);
                         }
                   });

              });
              $('#mingguan').change(function(){

                loadData();
              });
              $('#status').change(function(){
                loadData();
              });
              loadData();
              function loadData(){
                id_periode=$("#mingguan").val();
                status_pengajuan=$("#status").val();
    $('#mytable').DataTable().destroy();
    $("#mytable").DataTable({
                  initComplete: function() {
                      var api = this.api();
                      $('#mytable_filter input')
                              .off('.DT')
                              .on('keyup.DT', function(e) {
                                  if (e.keyCode == 13) {
                                      api.search(this.value).draw();
                          }
                      });
                  },
                  oLanguage: {
                      sProcessing: "loading..."
                  },
                  processing: true,
                  serverSide: true,
                  ajax: {"url": "<?php echo base_url("dekan/Datalkd/json/");?>", "type": "POST","data":{

                  "id_periode":id_periode,
                  "kode":kode_bulan,
                  "status":status_pengajuan
                }},
                  "columnDefs": [
      {
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
      },
      ],

                  columns: [
                      {
                          "data": "id",
                          "orderable": false
                      },
                      {"data": "nip"},
                      {"data": "nama"},
                      {"data": "periode"},
                      {"data": "waktu_pengajuan"},
                      {"data": "status"},
                      {"data": "view"}
                  ],
                  order: [[1, 'asc']],
                  rowCallback: function(row, data, iDisplayIndex) {
                      var info = this.fnPagingInfo();
                      var page = info.iPage;
                      var length = info.iLength;
                      var index = page * length + (iDisplayIndex + 1);
                      $('td:eq(0)', row).html(index);
                  }
              });
  }


            var arrJam=[];
            var arrNilai=[];
            <?php
            foreach ($kategori as $row){
              $id = $row->id;
              echo "arrJam.push('$id');";
            }
             ?>
             function aksi(id){
               id_pengajuan = id;
               $.ajax({
                 url: '<?php echo base_url("dekan/Datalkd/getData");?>',
                 data: {'id_pengajuan':id_pengajuan},
                 type: 'POST',
                 // THIS MUST BE DONE FOR FILE UPLOADING

                 dataType: "JSON",
                 success: function(data){
                   console.log(data);
                   var html='',rowspan,td='',baris = 0;
                   var i = 1;

                   for(key in data.tanggal){
                     rowspan = data.tanggal[key].length;
                     html += '<tr>';

                     for(var j = 0; j < rowspan; j++){
                       td='';
                       baris=0;
                       for(var k=0; k < arrJam.length; k++){
                         if(data.tanggal[key][j].id_kategori == arrJam[k]){
                           td += '<td><center>'+data.tanggal[key][j].total+'</center></td>';
                           baris = data.tanggal[key][j].total;

                         }
                         else{
                           td += '<td><center>-</center></td>';
                         }

                       }
                       td += '<td>'+baris+'</td>';


           if(j==0){
             html+= '            <td rowspan="'+rowspan+'" style="text-align:center;vertical-align:middle;">'+(i++)+'</td>'+
           '            <td rowspan="'+rowspan+'" style="text-align:center;vertical-align:middle;">'+key+'</td>'+
           ''+
           '                <td>'+data.tanggal[key][j].kegiatan+'</td>'+
           '                <td>'+data.tanggal[key][j].jam_awal+'-'+data.tanggal[key][j].jam_akhir+'</td>'+td;
           }
           else{
           html+='              <tr>'+
           '                <td>'+data.tanggal[key][j].kegiatan+'</td>'+
           '                <td>'+data.tanggal[key][j].jam_awal+'-'+data.tanggal[key][j].jam_akhir+'</td>'+td+
           '              </tr>';
           }


           }
           html+='          </tr>';

                   }
                   if(data.tanggal.length == 0)
                     html='<tr><td colspan="'+(arrJam.length+6)+'"><center><b>Data Kosong<b></center></td></tr>">';
                   html+='<tr><td colspan="4" style="text-align:center;vertical-align:middle;"><b>Jumlah</b></td>';
                   var color;
                   var nilai,total=0;
                   for(var i=0; i<arrJam.length; i++){
                     if(data.jam[arrJam[i]] == null){
                       nilai = 0;
                     }
                     else {
                       nilai = data.jam[arrJam[i]];
                     }

                     total+=nilai;
                     html+='<td><center><b>'+nilai+'<b><center></td>';
                   }



                     html+='<td><center><b>'+total+'</b><center></td></tr>';

                     if(data.pengajuan.status_pengajuan == '-1'){
                       $('#acc').removeClass('btn-warning disable');
                       $('#acc').addClass('btn-success');
                       $('#acc').html('<i class="fa fa-check-circle"></i> ACC Kegiatan');
                       $('#reset').attr("disabled",true);
                     }
                     else if(data.pengajuan.status_pengajuan == '0'){
                       $('#acc').removeClass('btn-warning disabled');
                       $('#acc').addClass('btn-success');
                       $('#acc').html('<i class="fa fa-check-circle"></i> ACC Kegiatan');
                       $('#reset').attr("disabled",false);
                     }
                     else{
                         $('#reset').attr("disabled",false);
                         $('#acc').removeClass('btn-success');
                         $('#acc').addClass('btn-warning');
                         $('#acc').html('<i class="fa fa-minus-circle"></i> Telah di-ACC');
                     }


                   status = data.pengajuan.status_pengajuan;
                   url_print = data.pengajuan.id;

                   $('#body').html(html);
                   // $('#myModalEdit').show();
                   // data-toggle="modal" data-target="#myModalEdit"
                 },
               error: function(jqXHR, textStatus, errorThrown)
               {
                 console.log(jqXHR);
                 console.log(textStatus);
                 console.log(errorThrown);
               }
                     });
             }
      /*function aksi(id){
        id_pengajuan = id;
        $.ajax({
          url: '<?php echo base_url("dekan/Datalkd/getData");?>',
          data: {'id_pengajuan':id_pengajuan},
          type: 'POST',
          // THIS MUST BE DONE FOR FILE UPLOADING

          dataType: "JSON",
          success: function(data){
            console.log(data);
            var html='',rowspan,td='',baris = 0;
            var i = 1;

            for(key in data.tanggal){
              rowspan = data.tanggal[key].length;
              html += '<tr>';

              for(var j = 0; j < rowspan; j++){
                td='';
                baris=0;
                for(var k=0; k < arrJam.length; k++){
                  if(data.tanggal[key][j].id_kategori == arrJam[k]){
                    td += '<td><center>'+data.tanggal[key][j].total+'</center></td>';
                    baris = data.tanggal[key][j].total;

                  }
                  else{
                    td += '<td><center>-</center></td>';
                  }

                }
                td += '<td>'+baris+'</td>';


    if(j==0){
      html+= '            <td rowspan="'+rowspan+'" style="text-align:center;vertical-align:middle;">'+(i++)+'</td>'+
    '            <td rowspan="'+rowspan+'" style="text-align:center;vertical-align:middle;">'+key+'</td>'+
    ''+
    '                <td>'+data.tanggal[key][j].kegiatan+'</td>'+
    '                <td>'+data.tanggal[key][j].jam_awal+'-'+data.tanggal[key][j].jam_akhir+'</td>'+td;
    }
    else{
    html+='              <tr>'+
    '                <td>'+data.tanggal[key][j].kegiatan+'</td>'+
    '                <td>'+data.tanggal[key][j].jam_awal+'-'+data.tanggal[key][j].jam_akhir+'</td>'+td+
    '              </tr>';
    }


    }
    html+='          </tr>';

            }
            if(data.tanggal.length == 0)
              html='<tr><td colspan="'+(arrJam.length+6)+'"><center><b>Data Kosong<b></center></td></tr>">';
            html+='<tr><td colspan="4" style="text-align:center;vertical-align:middle;"><b>Jumlah</b></td>';
            var color;
            var nilai,total=0;
            for(var i=0; i<arrJam.length; i++){
              if(data.jam[arrJam[i]] == null){
                nilai = 0;
              }
              else {
                nilai = data.jam[arrJam[i]];
              }
              if(nilai >= data.config[arrJam[i]]){
                color = '#00cc33'
              }
              else {
                color = 'red';
              }
              total+=nilai;
              html+='<td><center><b style="color:'+color+'">'+nilai+' ('+data.config[arrJam[i]]+')<b><center></td>';
            }



              html+='<td><center><b>'+total+'</b><center></td></tr>';

              if(data.pengajuan.status_pengajuan == '-1'){
                $('#acc').removeClass('btn-warning disable');
                $('#acc').addClass('btn-success');
                $('#acc').html('<i class="fa fa-check-circle"></i> ACC Kegiatan');
                $('#reset').attr("disabled",true);
              }
              else if(data.pengajuan.status_pengajuan == '0'){
                $('#acc').removeClass('btn-warning disabled');
                $('#acc').addClass('btn-success');
                $('#acc').html('<i class="fa fa-check-circle"></i> ACC Kegiatan');
                $('#reset').attr("disabled",false);
              }
              else{
                  $('#reset').attr("disabled",false);
                  $('#acc').removeClass('btn-success');
                  $('#acc').addClass('btn-warning');
                  $('#acc').html('<i class="fa fa-minus-circle"></i> Telah di-ACC');
              }


            status = data.pengajuan.status_pengajuan;
            url_print = data.pengajuan.id;

            $('#body').html(html);
            // $('#myModalEdit').show();
            // data-toggle="modal" data-target="#myModalEdit"
          },
        error: function(jqXHR, textStatus, errorThrown)
        {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
        }
              });
      }*/
function keluar(){
  $('#myModalEdit').hide();
}
function set(tipe){
  if(status!=tipe){
  $.ajax({
       url : "<?php echo site_url('dekan/Datalkd/update')?>",
       type: "POST",
       data: {'id_pengajuan':id_pengajuan,'action':tipe},
       dataType: "JSON",
       success: function(data)
       {
         if (data.status=='berhasil') {
           swal("Berhasil!", data.message, "success");
         }else {
           swal("Gagal!", data.message, "error");
         }
         if(tipe == '-1'){
           $('#acc').removeClass('btn-warning disable');
           $('#acc').addClass('btn-success');
           $('#acc').html('<i class="fa fa-check-circle"></i> ACC Kegiatan');
           $('#reset').attr("disabled",true);
         }
         else{
             $('#reset').attr("disabled",false);
             $('#acc').removeClass('btn-success');
             $('#acc').addClass('btn-warning');
             $('#acc').html('<i class="fa fa-minus-circle"></i> Telah di-ACC');
         }
         status = tipe;
         loadData();
       },
           error: function (jqXHR, textStatus, errorThrown)
           {
             console.log(jqXHR);
       console.log(textStatus);
       console.log(errorThrown);
           }
     });

   }
}
function accSemua(){
  swal({
          title: "Anda yakin?",
          text: "Semua pengajuan akan di-ACC",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#1ab394",
          confirmButtonText: "Ya, ajukan!",
          closeOnConfirm: false
      }, function () {
        $.ajax({
             url : "<?php echo site_url('dekan/Datalkd/accSemua')?>",
             type: "POST",
             data: {"id_periode":id_periode},
             dataType: "JSON",
             success: function(data)
             {
               if (data.status=='berhasil') {
                 swal("Berhasil!", data.message, "success");
               }else {
                 swal("Gagal!", data.message, "error");
               }
               loadData();
             },
                 error: function (jqXHR, textStatus, errorThrown)
                 {
                   console.log(jqXHR);
             console.log(textStatus);
             console.log(errorThrown);
                 }
           });

      });

}
function exportPengajuan(){
  if(kode_bulan==0){
    swal("", "Pilih bulan terlebih dahulu!", "error");
  }
  else{
    window.open("<?php echo base_url().'PrintLKD/dekan?bulan='?>"+kode_bulan, '_blank');
  }
}
      </script>
