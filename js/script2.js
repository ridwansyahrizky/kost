$(function () {
    var judul = $('#judulmodal').data('id');

    console.log(judul);
    if(judul == "Kost")
    {
        $('.tambahData').on('click', function () {        
            $('#judulmodal').html('Tambah Data Kost');
            $('.modal-footer button[type=submit]').html('Simpan Data');
            $('.modal-body form').attr('action','http://localhost/kost/public/kost/tambah');
            $('#namaKost').val("");        
            $('#namaPemilik').val("");        
            $('#noKontak1').val("");        
            $('#noKontak2').val("");        
            // $('#alamatKost').val("");
            $('#tipeKost').val("0");                
        });

        $('.tampilModalUbah').on('click', function () {
            $('#judulmodal').html('Edit Data Kost');
            $('.modal-footer button[type=submit]').html('Edit Data');
            $('.modal-body form').attr('action','http://localhost/kost/public/kost/ubah');

            const sn = $(this).data('id');  

            $.ajax({
                url: 'http://localhost/kost/public/kost/getubah',
                data: {
                    id: sn
                },
                method: 'post',
                dataType: 'json',
                success: function (data) {
                    $('#namaKost').val(data.nama_kost);
                    $('#namaPemilik').val(data.nama_pemilik);        
                    $('#noKontak1').val(data.nokontak1);        
                    $('#noKontak2').val(data.nokontak2);        
                    // $('#alamatKost').val(data.alamat_kost);
                    $('#tipeKost').val(data.general);                
                    $('#id').val(data.id_kost);                
                }
            })

        });
    }
    else if(judul == "Fasilitas")
    {            
        $('.tambahData').on('click', function () {        
            $('#judulmodal').html('Tambah Data Fasilitas');
            $('.modal-footer button[type=submit]').html('Simpan Data');
            $('.modal-body form').attr('action','http://localhost/kost/public/fasilitas/tambah');
            $('#namaKost').val("0");        
            $('#namaFasilitas').val("");
            $('#tipeFasilitas').val("1");            
        });

        $('.tampilModalUbah').on('click', function () {
            $('#judulmodal').html('Edit Data Fasilitas');
            $('.modal-footer button[type=submit]').html('Edit Data');
            $('.modal-body form').attr('action','http://localhost/kost/public/fasilitas/ubah');
            $('#namaKost').attr('disabled','true');

            const sn = $(this).data('id');  

            $.ajax({
                url: 'http://localhost/kost/public/fasilitas/getubah',
                data: {
                    id: sn
                },
                method: 'post',
                dataType: 'json',
                success: function (data) {
                    $('#namaKost').val(data.id_kost);        
                    $('#idKost').val(data.id_kost);        
                    $('#namaFasilitas').val(data.nama_fasilitas);
                    $('#id').val(data.id_fasilitas);                
                    $('#tipeFasilitas').val(data.tipe_fasilitas);        
                }
            })

        });
    }    
    else if(judul == "Lokasi")
    {            
        $('.tambahData').on('click', function () {        
            $('#judulmodal').html('Tambah Data Lokasi');
            $('.modal-footer button[type=submit]').html('Simpan Data');
            $('.modal-body form').attr('action','http://localhost/kost/public/lokasi/tambah');
            $('#namaKost').val("0");        
            $('#namaLokasi').val("");
            $('#idLokasi').val("");            
            $('#Keterangan').val("");        
            $('#hargaSewa').val("");
            $('#ukuranKamar').val("");            
            $('#idLokasi').removeAttr('readonly');
            $('#namaKost').removeAttr('disabled');
            $('input[type=checkbox]').removeAttr('checked');
        });

        $('.tampilModalUbah').on('click', function () {
            $('#judulmodal').html('Edit Data Lokasi');
            $('.modal-footer button[type=submit]').html('Edit Data');
            $('.modal-body form').attr('action','http://localhost/kost/public/lokasi/ubah');
            $('#idLokasi').attr('readonly',true);
            $('#namaKost').attr('disabled','true');

            const sn = $(this).data('id');  

            $.ajax({
                url: 'http://localhost/kost/public/lokasi/getubah',
                data: {
                    id: sn
                },
                method: 'post',
                dataType: 'json',
                success: function (data) {
                    $('#idLokasi').val(data.id_lokasi);                    
                    $('#namaKost').val(data.id_kost);        
                    $('#namaLokasi').val(data.nama_lokasi);
                    $('#id').val(data.id_lokasi);                
                    $('#Keterangan').val(data.keteranganlainnya);        
                    $('#hargaSewa').val(data.harga);
                    $('#ukuranKamar').val(data.ukuran_kamar);            
                    //looping untuk ceklis si fasilitas dengan split pemisah ; nya.

                    var fasilitaskamar = data.fasilitas_kamar;
                    if(fasilitaskamar != "") {
                        var arr = fasilitaskamar.split(';');
                        $.each(arr,function (i,data) {
                            $('.fasilitaskamar:input[value="' + data + '"]').attr('checked',true);
                        })
                    }

                    var fasilitaskamarmandi = data.fasilitas_kmrmandi;
                    if(fasilitaskamarmandi != "") {
                        var arr = fasilitaskamarmandi.split(';');
                        $.each(arr,function (i,data) {
                            $('.fasilitaskamarmandi:input[value="' + data + '"]').attr('checked',true);
                        })
                    }

                    var fasilitasparkir = data.fasilitas_parkir;
                    if(fasilitasparkir != "") {
                        var arr = fasilitasparkir.split(';');
                        $.each(arr,function (i,data) {
                            $('.fasilitasparkir:input[value="' + data + '"]').attr('checked',true);
                        })
                    }

                    var fasilitasumum = data.fasilitas_umum;
                    if(fasilitasumum != "") {                        
                        var arr = fasilitasumum.split(';');                        
                        $.each(arr,function (i,data) {
                            $('.fasilitasumum:input[value="' + data + '"]').attr('checked',true);
                        })
                    }

                    var a = data.akses_lingkungan;
                    if(a != "") {
                        var arrfasakses = a.split(';');
                        $.each(arrfasakses,function (i,data) {
                            $('.akses:input[value="' + data + '"]').attr('checked',true);
                        })
                    }
                }
            })

        });
    }    
    else if(judul == "Stock")
    {            
        $('.tambahData').on('click', function () {        
            $('#namaLokasi').empty();//kosongkan dulu lokasinya
            var opt= "<option value=0>Pilih Lokasi </option>";    
            $('#namaLokasi').append(opt);                        
            $('#judulmodal').html('Tambah Data Unit');
            $('.modal-footer button[type=submit]').html('Simpan Data');
            $('.modal-body form').attr('action','http://localhost/kost/public/stock/tambah');            
            $('#namaKost').val("0");                    
            $('#namaLokasi').val("0");
            $('#noStock').val("");
            // $('#priceList').val("");
        });

        $('.tampilModalUbah').on('click', function () {
            $('#judulmodal').html('Edit Data Unit');
            $('.modal-footer button[type=submit]').html('Edit Data');
            $('.modal-body form').attr('action','http://localhost/kost/public/stock/ubah');            

            const sn = $(this).data('id');              
            $.ajax({
                url: 'http://localhost/kost/public/stock/getubah',
                data: {
                    id: sn
                },
                method: 'post',
                dataType: 'json',
                success: function (data) {                    
                    var opt= "<option value="+ data.id_lokasi +"> "+ data.id_lokasi + " - " + data.NamaLokasi + "</option>";    
                    $('#namaLokasi').append(opt);                    
                    $('#namaKost').val(data.id_kost);                    
                    $('#namaLokasi').val(data.id_lokasi);
                    $('#noStock').val(data.no_stock);
                    // $('#priceList').val(data.pricelist);
                    $('#id').val(data.sn);                
                    console.log(data.sn);
                }
            })
        });

        //filter untuk master display
        $('#listkost').change(function () {
            var id = $(this).children("option:selected").val();
            $('#listlokasi').empty();//kosongkan dulu lokasinya
            $.ajax({
                url: 'http://localhost/kost/public/stock/filterlokasi',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function (data) {      
                    if(data.length > 0)             
                    {
                        var opt1= "<option value=0>Semua Lokasi </option>";    
                        $('#listlokasi').append(opt1);                        
                        //perulangan sebanyak lokasi yang dimiliki si kost
                        for (var i = 0; i < data.length; i++) {                        
                            var opt= "<option value="+ data[i].id_lokasi +"> "+ data[i].id_lokasi + " - " + data[i].nama_lokasi + "</option>";    
                            $('#listlokasi').append(opt);
                        }
                    }
                    else
                    {
                        var opt= "<option value=0>Semua Lokasi </option>";    
                        $('#listlokasi').append(opt);                        
                    }
                }
            })            
        });

        //filter untuk modal
        $('#namaKost').change(function () {
            var id = $(this).children("option:selected").val();
            $('#namaLokasi').empty();//kosongkan dulu lokasinya
            $.ajax({
                url: 'http://localhost/kost/public/stock/filterlokasi',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function (data) {      
                    if(data.length > 0)             
                    {
                        //perulangan sebanyak lokasi yang dimiliki si kost
                        for (var i = 0; i < data.length; i++) {                        
                            var opt= "<option value="+ data[i].id_lokasi +"> "+ data[i].id_lokasi + " - " + data[i].nama_lokasi + "</option>";    
                            $('#namaLokasi').append(opt);
                        }
                    }
                    else
                    {
                        var opt= "<option value=0>Pilih Lokasi </option>";    
                        $('#namaLokasi').append(opt);                        
                    }
                }
            })            
        });
    }        
    else if(judul == "SetPass")
    {
        $('.tampilModalUbah').on('click', function () {                                    
            const sn = $(this).data('id');  

            $.ajax({
                url: 'http://localhost/kost/public/user/getubah',
                data: {
                    id: sn
                },
                method: 'post',
                dataType: 'json',
                success: function (data) {
                    $('#namaUser').val(data.nama_user);
                    $('#id').val(data.id_user);
                }
            })

        });
    }
    if(judul == "User")
    {
        $('.tambahData').on('click', function () {        
            $('#judulmodal').html('Tambah Data User');
            $('.modal-footer button[type=submit]').html('Simpan Data');
            $('.modal-body form').attr('action','http://localhost/kost/public/user/tambah');
            $('#idUser').val("");        
            $('#namaUser').val("");
            $('#password').val("");
            $('#konfirmpassword').val("");
            $('#secLev').val("0");
            $('#namaKost').val("0");                    
        });

        $('.tampilModalUbah').on('click', function () {
            $('#judulmodal').html('Edit Data User');
            $('.modal-footer button[type=submit]').html('Edit Data');
            $('.modal-body form').attr('action','http://localhost/kost/public/user/ubah');
            $('#idUser').attr('readonly',true);
            $('.Pwd').attr('style','display:none');            
            $('#password').removeAttr('required');
            $('#konfirmpassword').removeAttr('required');

            const sn = $(this).data('id');  

            $.ajax({
                url: 'http://localhost/kost/public/user/getubah',
                data: {
                    id: sn
                },
                method: 'post',
                dataType: 'json',
                success: function (data) {
                    $('#idUser').val(data.id_user);        
                    $('#namaUser').val(data.nama_user);
                    $('#secLev').val(data.seclev);
                    $('#id').val(data.id_user);        
                    $('#namaKost').val(data.id_kost);        
                }
            })

        });
    }
})