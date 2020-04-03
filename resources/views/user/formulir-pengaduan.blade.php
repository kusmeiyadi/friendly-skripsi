@extends('user/app')

@section('head')

  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
  <script type="text/javascript">
  var HelloButton = function (context) {
  	var ui = $.summernote.ui;
  	// create button
  	var button = ui.button({
  		contents: '<i class="fa fa-child"/> Hello',
  		tooltip: 'hello',
  		click: function () {
  			// invoke insertText method with 'hello' on editor module.
  			context.invoke('editor.insertText', 'hello');
  		}
  	});

  	return button.render();   // return button as jquery object
  }

  jQuery(document).ready(function() {
    jQuery('#summernote').summernote({
      minHeight: 150,
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['mybutton', ['hello']]

  					],
      buttons: {
        hello: HelloButton
  	  }

    });
  });

  jQuery(document).ready(function() {
    jQuery('#alamat_pelapor').summernote({
      minHeight: 100,
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['mybutton', ['hello']]

  					],
      buttons: {
        hello: HelloButton
  	  }

    });
  });

  </script>

  <style media="screen">
    #dropicon::before {
      font-family: 'Icons';
      content: "\f054" !important;
     }
  </style>

@endsection

@section('main-content')

<div class="ui raised very padded container">
  @if(Session::has('success'))
  <div class="ui mini modal" style="text-align:center;">
    <div class="ui success message">
      <div class="header">
        {{ Session::get('success') }}
      </div>
    </div>
  </div>

  @endif
  <!-- PENGADUAN -->
  <form action="/orders" method="POST">
    {{csrf_field()}}
    <div class="ui raised very padded container piled yellow segment">
      <h2 class="ui header">Formulir Pengaduan</h2>
      <div class="ui hidden divider"></div>

      <div class="ui large form">
        <div class="inline fields">
          <div class="field" style="Display:none;">
            <label for=""></label>
            <?php
              $ran = str_random(6);
            ?>
            <input type="text" name="kode" value="#{{ $ran }}">
          </div>
          <div class="six wide field">
            <label>Provinsi<span style="color:#800000">*</span></label>
            <select class="ui dropdown" name="provinsi">
              <option selected value="Kalimantan Barat">Kalimantan Barat</option>
            </select>
          </div>
          <div class="seven wide field">
            <label>Kabupaten/Kota<span style="color:#800000">*</span></label>
            <select class="ui search dropdown" name="kabupaten">
              <option value="Kabupaten Bengkayang">KAB. BENGKAYANG</option>
              <option value="Kabupaten Kapuas Hulu">KAB. KAPUAS HULU</option>
              <option value="Kabupaten Kayong Utara">KAB. KAYONG UTARA</option>
              <option value="Kabupaten Ketapang">KAB. KETAPANG</option>
              <option value="Kabupaten Kubu Raya">KAB. KUBU RAYA</option>
              <option value="Kabupaten Landak">KAB. LANDAK</option>
              <option value="Kabupaten Melawi">KAB. MELAWI</option>
              <option value="Kabupaten Mempawah">KAB. MEMPAWAH</option>
              <option value="Kabupaten Sambas">KAB. SAMBAS</option>
              <option value="Kabupaten Saggau">KAB. SANGGAU</option>
              <option value="Kabupaten Sekadau">KAB. SEKADAU</option>
              <option value="Kabupaten Sintang">KAB. SINTANG</option>
              <option value="Kota Pontianak">KOTA PONTIANAK</option>
              <option value="Kota Singkawang">KOTA SINGKAWANG</option>
            </select>
          </div>
          <div class="three wide field">
            <label>Tanggal</label>
            <div class="ui transparent input">
              <input type="text" id="date" readonly="" value="{{ Carbon\carbon::now()->format('d/m/Y') }}">
            </div>
          </div>
        </div>

        <div class="nine wide field">
          <label>Jenis Kasus <span style="color:#800000">*</span></label>
          <select class="ui search dropdown" name="kasus">
            <option value="Kekerasan Fisik">1. Kekerasan Fisik</option>
            <option value="Kekerasa Psikis">2. Kekerasan Psikis</option>
            <option value="Kekerasan Seksual">3. Kekerasan Seksual</option>
            <option value="Anak Berhadapan Hukum (ABH)">4. Anak Berhadapan Hukum (ABH)</option>
            <option value="Traficking">5. Trafficking</option>
            <option value="Hak Kuasa Asuh dan Penelantaran">6. Hak Kuasa Asuh dan Penelantaran</option>
            <option value="Perlindungan">7. Perlindungan</option>
            <option value="Perlindungan Pendidikan">Perlindungan Pendidikan</option>
            <option value="Perlindungan Kesehatan">Perlindungan Kesehatan</option>
            <option value="Perlindungan Agama">Perlindungan Agama</option>
            <option value="Perlindungan Sosial">Perlindungan Sosial</option>
            <option value="Penculikan dan Anak Hilang">8. Penculikan dan Anak Hilang</option>
            <option value="Napza dan HIV/Aids">9. Napza dan HIV/Aids</option>
            <option value="Pekerja Anak">10. Pekerja Anak</option>
            <option value="Pornografi">11. Pornografi</option>
            <option value="Hak Sipil">12. Hak Sipil</option>
            <option value="ABK, Politik dan Perlindungan Khusus">13. ABK, Politik dan Perlindungan Khusus</option>
            <option selected value="Konsultasi dan lain-lain">14. Konsultasi dan lain-lain</option>
          </select>
        </div>
      </div>

      <br>

      <div class="ui fitted divider"></div>

      <div class="ui accordion">

        <!-- PELAPOR -->
        <div class="title" style="margin-bottom:-12.5px;">
          <h3 class="ui icon header yellow">
            PELAPOR
            <i id="dropicon" class="dropdown icon" style="color:black"></i>
          </h3>
        </div>
        <div class="content">
          <p class="transition visible">
            <section>
              <div class="ui large form">

                @if(Auth::guest())
                <div class="fields">
                  <div class="five wide field">
                    <label for="nama_pelapor">Nama Lengkap <span style="color:#800000">*</span></label>
                    <input type="text" name="nama_pelapor" value="">
                  </div>

                  <div class="five wide field">
                    <label for="">KTP/SIM/PASPOR <span style="color:#800000">*</span></label>
                    <input type="text" name="identitas" value="">
                  </div>
                </div>

                <div class="fields">
                  <div class="three wide field">
                    <label for="tanggallahir">Tempat/Tanggal Lahir</label>
                    <input type="text" name="" value="">
                  </div>
                  <div class="field">
                    <label for="tanggallahir" style="color:white;">Tanggal Lahir</label>
                    <select class="ui fluid dropdown">
                      <option value="">Tanggal</option>
                      <?php
                      for($a=1; $a<=31; $a+=1){
                        echo"<option value=$a> $a </option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="field">
                    <label for="tanggallahir" style="color:white;">Tanggal Lahir</label>
                    <select class="ui fluid dropdown">
                      <option value="">Bulan</option>
                      <?php
                      $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                      $jlh_bln=count($bulan);
                      for($c=0; $c<$jlh_bln; $c+=1){
                        echo"<option value=$bulan[$c]> $bulan[$c] </option>";
                      }
                      ?>
                    </select>
                  </div>
                  <div class="field">
                    <label for="tanggallahir" style="color:white;">Tanggal Lahir</label>
                    <?php
                    $now=date('Y');
                    echo "<select class='ui fluid dropdown' name='tahun'>";
                    for ($a=1950;$a<=$now;$a++)
                    {
                      echo "<option value='$a'>$a</option>";
                    }
                    echo "</select>";
                    ?>
                  </div>
                </div>

                <div class="fields">
                  <div class="three wide field">
                    <label>Jenis Kelamin <span style="color:#800000">*</span></label>
                    <div class="inline fields">
                      <div class="field">
                        <div class="ui radio checkbox">
                          <input type="radio" name="jenis_kelamin_pelapor" class="jenis_kelamin" value="Pria">
                          <label>Pria</label>
                        </div>
                      </div>
                      <div class="field">
                        <div class="ui radio checkbox">
                          <input type="radio" name="jenis_kelamin_pelapor" class="jenis_kelamin" value="Wanita">
                          <label>Wanita</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="inline fields four wide field" style="margin-left:-40px;">
                    <label>Agama<span style="color:#800000">*</span></label>
                    <select name="agama_pelapor" class="ui fluid dropdown">
                      <option>Pilihan</option>
                      <option value="Islam">Islam</option>
                      <option value="Kristen Katolik">Kristen Katolik</option>
                      <option value="Kristen Protestan">Kristen Protestan</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budha">Budha</option>
                      <option value="Konghucu">Konghucu</option>
                      <option value="Bahai">Bahai</option>
                      <option value="Kepercayaan Lainnya">Kepercayaan Lainnya</option>
                    </select>
                  </div>
                </div>

                <div class="fields">
                  <div class="field" style="width: 50%;">
                    <label for="">Alamat <span style="color:#800000">*</span></label>
                    <textarea id="alamat_pelapor" name="alamat_pelapor" rows="2" cols="150" style="min-height:150px;"></textarea>
                  </div>
                </div>

                <div class="inline fields">
                  <div class="four wide field">
                    <label>No.HP<span style="color:#800000">*</span></label>
                    <div class="ui input">
                      <input type="text" name="hp">
                    </div>
                  </div>

                  <div class="four wide field">
                    <label>Email<span style="color:#800000">*</span></label>
                    <div class="ui input">
                      <input type="text" name="email">
                    </div>
                  </div>
                </div>
                @else
                <span class="item">
                  {{ Auth::user()->name }}
                </span>
                @endif
              </div>
            </section>
          </p>
        </div>
        <!-- PELAPOR -->
        <div class="ui fitted divider"></div>

        <!-- KORBAN -->
        <div class="title" style="margin-bottom:-12.5px;">
          <h3 class="ui icon header yellow">
            KORBAN
            <i id="dropicon" class="dropdown icon" style="color:black"></i>
          </h3>
        </div>
        <div class="content">
          <p class="transition visible">
            <section>
              <div class="ui large form">
                <table class="ui very basic table" id="korban">
                  <tbody id="korban">
                    <tr>
                      <div class="fields">
                        <div class="two wide field">
                          <label>Nama Lengkap <span style="color:#800000">*</span></label>
                          <div class="ui input"><input type="text" name="nama_korban[]">
                          </div>
                        </div>
                      </div>

                      <div class="fields">
                        <div class="field">
                          <label>Usia <span style="color:#800000">*</span></label>
                          <select name="usia_korban[]" class="ui fluid dropdown">
                            <option>Pilihan</option>
                            <?php
                            for($a=0; $a<=17; $a+=1){
                              echo"<option value=$a> $a </option>";
                            }
                            ?>
                          </select>
                        </div>

                        <div class="three wide field" style="padding-left:50px">
                          <label>Jenis Kelamin <span style="color:#800000">*</span></label>
                          <div class="inline fields">
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="jenis_kelamin[]" class="jenis_kelamin" value="Pria">
                                <label>Pria</label>
                              </div>
                            </div>
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="jenis_kelamin[]" class="jenis_kelamin" value="Wanita">
                                <label>Wanita</label>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="three wide field">
                          <label>Agama <span style="color:#800000">*</span></label>
                          <select name="agama_korban[]" class="ui fluid dropdown">
                            <option>Pilihan</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen Katolik">Kristen Katolik</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Bahai">Bahai</option>
                            <option value="Kepercayaan Lainnya">Kepercayaan Lainnya</option>
                          </select>
                        </div>
                      </div>

                      <div class="fields">
                        <div class="two wide field">
                          <label>Kewarganegaraan</label>
                          <div class="ui input">
                            <input type="text" name="kewarganegaraan[]">
                          </div>
                        </div>

                        <div class="two wide field">
                          <label>Pedidikan <span style="color:#800000">*</span></label>
                          <select name="pendidikan[]" class="ui fluid dropdown">
                            <option>Pilihan</option>
                            <option value="Belum Sekolah">Belum Sekolah</option>
                            <option value="TK/PAUD/Sederajat">TK/PAUD/Sederajat</option>
                            <option value="SD Sederajat">SD Sederajat</option>
                            <option value="SMP Sederajat">SMP Sederajat</option>
                            <option value="SMA Sederajat">SMA Sederajat</option>
                          </select>
                        </div>

                        <div class="three wide field" style="padding-left:25px">
                          <label for="tambah" style="color:white;">Tambah</label>
                          <a href="javascript:;" class="addRow ui button"><i class="plus circle icon"></i>Tambah</a>
                        </div>
                      </div>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>
          </p>
        </div>
        <!-- KORBAN -->
        <div class="ui fitted divider"></div>

        <!-- TERLAPOR -->
        <div class="title" style="margin-bottom:-12.5px;">
          <h3 class="ui icon header yellow">
            TERLAPOR
            <i id="dropicon" class="dropdown icon" style="color:black"></i>
          </h3>
        </div>
        <div class="content">
          <p class="transition visible">
            <section>
              <div class="ui large form">
                <table class="ui very basic table" id="terlapor">
                  <tbody id="terlapor">
                    <tr>
                      <div class="fields">
                        <div class="four wide field">
                          <label>Nama Lengkap</label>
                          <div class="ui input"><input type="text" name="nama_terlapor[]">
                          </div>
                        </div>
                        <div class="field">
                          <label>Usia</label>
                          <div class="ui input">
                            <input type="number" name="usia_terlapor[]" min="1" max="99" style="width:80px;"><span style="padding-left:5px;padding-top:10px;">Tahun</span>
                          </div>
                        </div>
                      </div>

                      <div class="fields">
                        <div class="three wide field">
                          <label>Jenis Kelamin</label>
                          <div class="inline fields">
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="jenis_kelamin_terlapor[]" class="jenis_kelamin" value="Pria">
                                <label>Pria</label>
                              </div>
                            </div>
                            <div class="field">
                              <div class="ui radio checkbox">
                                <input type="radio" name="jenis_kelamin_terlapor[]" class="jenis_kelamin" value="Wanita">
                                <label>Wanita</label>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="inline fields four wide field" style="margin-left:-40px;">
                          <label>Agama</label>
                          <select name="agama_terlapor[]" class="ui fluid dropdown">
                            <option>Pilihan</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen Katolik">Kristen Katolik</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Bahai">Bahai</option>
                            <option value="Kepercayaan Lainnya">Kepercayaan Lainnya</option>
                          </select>
                        </div>
                      </div>

                      <div class="fields">
                        <div class="four wide field">
                          <label>Kewarganegaraan</label>
                          <div class="ui input">
                            <input type="text" name="kewarganegaraan_terlapor[]">
                          </div>
                        </div>
                      </div>

                      <div class="fields">
                        <div class="field" style="width: 100%;">
                          <label for="">Alamat</label>
                          <textarea id="summernote" name="alamat_terlapor[]" rows="2" cols="150" style="min-height:150px;"></textarea>
                        </div>
                      </div>

                      <div class="inline fields">
                        <div class="four wide field">
                          <label>Telp/Hp/Email</label>
                          <div class="ui input">
                            <input type="text" name="kontak[]">
                          </div>
                        </div>
                      </div>

                      <div class="fields">
                        <div class="three wide field">
                          <label for="tambah" style="color:white;">Tambah</label>
                          <a href="javascript:;" class="addRow_terlapor ui button"><i class="plus circle icon"></i>Tambah</a>
                        </div>
                      </div>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>
          </p>
        </div>
        <!-- TERLAPOR -->
      </div>

      <!-- KRONOLOGIS -->
      <div class="ui large form">
        <div class="fields">
          <div class="field">
            <label for="kronologi">Kronologis</label>
            <textarea id="kronologis" name="kronologi" rows="5" cols="110"></textarea>
          </div>
        </div>

        <div class="inline fields">
          <div class="field">
            <label for="">Unggah File</label>
            <input type="file" name="" value="" style="border:none;">
          </div>
        </div>
        <div class="field">
          <label for="">Audio</label>
          <input type="file" accept="audio/*" capture id="recorder">
            <audio id="player" controls></audio>
            <script>
              const recorder = document.getElementById('recorder');
              const player = document.getElementById('player');

              recorder.addEventListener('change', function(e) {
                const file = e.target.files[0];
                const url = URL.createObjectURL(file);
                // Do something with the audio file.
                player.src = url;
              });
            </script>
        </div>
      </div>
      <!-- KRONOLOGIS -->

      <div class="ui center aligned container">
        <input type="submit" name="" value="Selesai dan Kirim" class="ui button green">
      </div>

    </div>
  </form>

</div>

<br><br>

<script type="text/javascript">

$('.ui.mini.modal')
.modal('show')
;

  window.addEventListener("load", function(event) {
    $('.ui.accordion').accordion({
      exclusive: false
    });
  });

    var i=0;
    // KORBAN
    $('.addRow').on('click',function(){
        i++;
        $('#korban').append('<span>'+
        '<tr>'+
        '<div id="row'+i+'">'+

          '<div class="fields">'+
            '<div class="two wide field">'+
              '<div class="ui input">'+
              '<input type="text" name="nama_korban[]">'+
              '</div>'+
            '</div>'+
          '</div>'+

          '<div class="fields">'+
            '<div class="field">'+
              '<select name="usia_korban[]" class="ui fluid dropdown">'+
                '<option>Pilihan</option>'+
                '<option value="0">0</option>'+
                '<option value="1">1</option>'+
                '<option value="2">2</option>'+
                '<option value="3">3</option>'+
                '<option value="4">4</option>'+
                '<option value="5">5</option>'+
                '<option value="6">6</option>'+
                '<option value="7">7</option>'+
                '<option value="8">8</option>'+
                '<option value="9">9</option>'+
                '<option value="10">10</option>'+
                '<option value="11">11</option>'+
                '<option value="12">12</option>'+
                '<option value="13">13</option>'+
                '<option value="14">14</option>'+
                '<option value="15">15</option>'+
                '<option value="16">16</option>'+
                '<option value="17">17</option>'+
              '</select>'+
            '</div>'+

            '<div class="three wide field" style="padding-left:50px">'+


            '<div class="inline fields">'+
              '<div class="field">'+
                  '<div class="ui radio checkbox">'+
                    '<input type="radio" name="jenis_kelamin['+i+']" class="jenis_kelamin" value="Pria">'+
                    '<label>Pria</label>'+
                  '</div>'+
                '</div>'+
                '<div class="field">'+
                  '<div class="ui radio checkbox">'+
                    '<input type="radio" name="jenis_kelamin['+i+']" class="jenis_kelamin" value="Wanita">'+
                    '<label>Wanita</label>'+
                  '</div>'+
                '</div>'+
              '</div>'+

            '</div>'+

            '<div class="three wide field">'+
              '<select name="agama_korban[]" class="ui fluid dropdown">'+
                '<option>Pilihan</option>'+
                '<option value="Islam">Islam</option>'+
                '<option value="Kristen Katolik">Kristen Katolik</option>'+
                '<option value="Kristen Protestan">Kristen Protestan</option>'+
                '<option value="Hindu">Hindu</option>'+
                '<option value="Budha">Budha</option>'+
                '<option value="Konghucu">Konghucu</option>'+
                '<option value="Bahai">Bahai</option>'+
                '<option value="Kepercayaan Lainnya">Kepercayaan Lainnya</option>'+
              '</select>'+
            '</div>'+
          '</div>'+

          '<div class="fields">'+
            '<div class="two wide field">'+
              '<div class="ui input">'+
                '<input type="text" name="kewarganegaraan[]">'+
              '</div>'+
            '</div>'+

            '<div class="two wide field">'+
              '<select name="pendidikan[]" class="ui fluid dropdown">'+
                '<option>Pilihan</option>'+
                '<option value="Belum Sekolah">Belum Sekolah</option>'+
                '<option value="TK/PAUD/Sederajat">TK/PAUD/Sederajat</option>'+
                '<option value="SD Sederajat">SD Sederajat</option>'+
                '<option value="SMP Sederajat">SMP Sederajat</option>'+
                '<option value="SMA Sederajat">SMA Sederajat</option>'+
              '</select>'+
            '</div>'+

            '<a href="javascript:;" class="ui button remove" style="margin-left:25px"><i class="close icon"></i>Hapus</a>'+

          '</div>'+

        '</div>'+
        '</tr>'+
        '<span>');
    });
    // KORBAN

    // TERLAPOR
    $('.addRow_terlapor').on('click',function(){
        i++;
        $('#terlapor').append('<span>'+
        '<tr>'+
        '<div id="row'+i+'">'+

          '<div class="fields">'+
           '<div class="four wide field">'+
             '<label>Nama Lengkap</label>'+
             '<div class="ui input"><input type="text" name="nama_terlapor[]">'+
             '</div>'+
           '</div>'+
           '<div class="field">'+
             '<label>Usia</label>'+
             '<div class="ui input">'+
               '<input type="number" name="usia_terlapor[]" min="1" max="99" style="width:80px;"><span style="padding-left:5px;padding-top:10px;">Tahun</span>'+
             '</div>'+
           '</div>'+
          '</div>'+

          '<div class="fields">'+
            '<div class="three wide field">'+
              '<label>Jenis Kelamin</label>'+
              '<div class="inline fields">'+
                '<div class="field">'+
                  '<div class="ui radio checkbox">'+
                    '<input type="radio" name="jenis_kelamin_terlapor['+i+']" class="jenis_kelamin" value="Pria">'+
                    '<label>Pria</label>'+
                  '</div>'+
                '</div>'+
                '<div class="field">'+
                  '<div class="ui radio checkbox">'+
                    '<input type="radio" name="jenis_kelamin_terlapor['+i+']" class="jenis_kelamin" value="Wanita">'+
                    '<label>Wanita</label>'+
                  '</div>'+
                '</div>'+
              '</div>'+
            '</div>'+

            '<div class="inline fields four wide field" style="margin-left:-40px;">'+
                '<label>Agama</label>'+
                '<select name="agama_terlapor[]" class="ui fluid dropdown">'+
                  '<option>Pilihan</option>'+
                  '<option value="Islam">Islam</option>'+
                  '<option value="Kristen Katolik">Kristen Katolik</option>'+
                  '<option value="Kristen Protestan">Kristen Protestan</option>'+
                  '<option value="Hindu">Hindu</option>'+
                  '<option value="Budha">Budha</option>'+
                  '<option value="Konghucu">Konghucu</option>'+
                  '<option value="Bahai">Bahai</option>'+
                  '<option value="Kepercayaan Lainnya">Kepercayaan Lainnya</option>'+
                '</select>'+
            '</div>'+
          '</div>'+

          '<div class="fields">'+
            '<div class="four wide field">'+
              '<label>Kewarganegaraan</label>'+
              '<div class="ui input">'+
                '<input type="text" name="kewarganegaraan_terlapor[]">'+
              '</div>'+
            '</div>'+
          '</div>'+

          '<div class="fields">'+
            '<div class="field" style="width: 50%;">'+
              '<label for="">Alamat</label>'+
              '<textarea id="summernote" name="alamat_terlapor[]" rows="2" cols="150" style="min-height:150px;"></textarea>'+
            '</div>'+
          '</div>'+

          '<div class="inline fields">'+
            '<div class="four wide field">'+
                '<label>Telp/Hp/Email</label>'+
                '<div class="ui input">'+
                  '<input type="text" name="kontak[]">'+
                '</div>'+
            '</div>'+
          '</div>'+

          '<div class="fields">'+
            '<div class="field">'+
              '<a href="javascript:;" class="ui button remove"><i class="close icon"></i>Hapus</a>'+
            '</div>'+
          '</div>'+

        '</div>'+
        '</tr>'+
        '<span>');
    });
    // TERLAPOR


    $('.remove').live('click',function(){
        var last=$('tbody tr span').length;
        if(last==1){
            alert("you can not remove last row");
        }
        else{
             $(this).parent().parent().remove();
        }

    });

</script>

@endsection

@section('footer')

@endsection
