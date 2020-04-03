@extends('user.layouts.app')

@section('main-content')
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-30 mb-30 card-view">
                    <h4 class="p-title"><b>PENGADUAN</b></h4>
                    <form method="post" action="/pengaduan/store">
                        @csrf
                        <div class="form-row">
                            <div class="mb-30" style="Display:none;">
                                <label for=""></label>
                                <?php
                              $ran = str_random(6);
                            ?>
                                <input type="text" name="kode" value="#{{ $ran }}">
                            </div>

                            <div class="form-group">
                                <label class="mr-sm-2 sr-only" for="jenis_kasus">Preference</label>
                                <select class="custom-select mr-sm-2" id="jenis_kasus" name="jenis_kasus">
                                    @foreach ($jenis_kasus as $row)
                                    <option value="{{ $row->id }}">{{ $row->jenis_kasus }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Nama">Nama</label>
                                <input type="text" id="Nama" name="title" class="form-control" placeholder="Nama">
                            </div>

                            <div class="form-group">
                                <label for="Alamat">Kronologis</label>
                                <textarea id="Alamat" name="kronologi" class="form-control" placeholder="Alamat"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="nama_p">Nama Pelapor <span style="color:#800000">*</span></label>
                                <input class="form-control" type="text" name="nama_p" value="">
                            </div>

                            <div class="form-group">
                                <label for="kontak_p">Kontak <span style="color:#800000">*</span></label>
                                <input class="form-control" type="text" name="kontak_p" value="">
                            </div>

                            <table id="korban">
                                <tbody id="korban">

                                    <div class="form-group">
                                        <label>Nama Korban <span style="color:#800000">*</span></label>
                                        <input type="text" class="form-control" name="nama_k[]">
                                    </div>

                                    <div class="form-group" style="padding-left:25px">
                                        <label for="tambah" style="color:white;">Tambah</label>
                                        <a href="javascript:;" id="addRow" class="btn btn-primary"><i class="plus circle icon"></i>Tambah</a>
                                    </div>
                                </tbody>
                            </table>

                            <table id="terlapor">
                                <tbody id="terlapor">
                                    <div class="form-group">
                                        <label>Nama Terlapor</label>
                                        <input type="text" class="form-control" name="nama_t[]">
                                    </div>

                                    <div class="form-group" style="padding-left:25px">
                                        <label for="tambah" style="color:white;">Tambah</label>
                                        <a href="javascript:;" id="addRow_t" class="btn btn-primary"><i class="plus circle icon"></i>Tambah</a>
                                    </div>
                                </tbody>
                            </table>

                            <input type="submit" class="btn-fill-primary plr-20" value="Simpan">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer')
<script>
    $(document).ready(function() {
        var i = 0;
        // KORBAN
        $("#addRow").click(function() {
            i++;
            $("#korban").append('<span>' +
                '<tr>' +
                '<div id="row' + i + '">' +

                '<div class="form-group">' +
                '<input type="text" class="form-control" name="nama_k[]">' +
                '</div>' +

                '<a href="javascript:;" class="ui button remove" style="margin-left:25px"><i class="close icon"></i>Hapus</a>' +

                '</div>' +

                '</div>' +
                '</tr>' +
                '<span>');
        });
        // KORBAN

        // TERLAPOR
        $('#addRow_t').click(function() {
            i++;
            $('#terlapor').append('<span>' +
                '<tr>' +
                '<div id="row' + i + '">' +

                '<div class="form-group">' +
                '<label>Nama Lengkap</label>' +
                '<input type="text" class="form-control" name="nama_t[]">' +
                '</div>' +

                '<div class="form-group">' +
                '<a href="javascript:;" class="ui button remove"><i class="close icon"></i>Hapus</a>' +
                '</div>' +

                '</div>' +
                '</tr>' +
                '<span>');
        });
        // TERLAPOR

        $('.remove').live('click', function() {
            var last = $('tbody tr span').length;
            if (last == 1) {
                alert("you can not remove last row");
            } else {
                $(this).parent().parent().remove();
            }

        });
    });
</script>
@endsection
