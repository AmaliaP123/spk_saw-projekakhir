/**
 * Created by sankester on 14/05/2017.
 */
function edit_pelamar(id){

    $('#formPelamar')[0].reset();
    $('#errors').empty();
    $('#errors').removeClass("alert");

    $.ajax({
        url : base_url + "pelamar/" + "getById/" + id,
        type : "GET",
        dataType: "JSON",
        success : function(data){
            $('[name="kdPelamar"]').val(data.kdPelamar);
            $('[name="nik"]').val(data.nik);
            $('[name="nama"]').val(data.nama);
            $('[name="alamat"]').val(data.alamat);
            $('[name="notelp"]').val(data.notelp);

            $('#form_pelamar').modal('show');
            $('.modal-title').text('Ubah Data Pelamar');

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
        }
    });
}

function save_pelamar() {
    var url;
    url =  base_url + "pelamar/"+ "updatePelamar";

    $('#errors').empty();
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formPelamar').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            //if success close modal and reload ajax table
            if(data.valid == false){
                for (i in data) {
                    $('#errors').addClass("alert alert-danger alert-dismissable");
                    if(i !='valid'){
                        $('.alert').prepend("<p>"+data[i]+"</p>");
                    }
                }
            } else {
                $('#modal_form').modal('hide');
                location.reload();// for reload a page
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');

        }
    });
}

function hapus_pelamar(id){
    $.ajax({
        url :  base_url + "pelamar/" + "delete/"+id,
        type : "POST",
        dataType : "JSON",
        success : function(data){
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
        }
    });
}


function lihat_seleksi(id){
    $('.view-detail-kriteria').css('width', '50%');
    $('.view-detail-kriteria').css('margin', '100px auto 100px auto');

    $('#viewnik').text("");
    $('#viewnama').text("");
    $('#viewalamat').text("");
    $('#viewnotelp').text("");

    for(var i=1; i<=5; i++){
        var itemkriteria = 'viewItemKriteria' + i;
        var valueKriteria = 'viewValue' + i;

        $("#" + itemkriteria ).text("");
        $("#" + valueKriteria ).text("");
    }

    $.ajax({
        url: base_url + "seleksi/" + "detail/"+id,
        type : "POST",
        dataType : "JSON",
        success:  function(data){

            $('#viewnik').text(' : '+ data.pelamar.nik);
            $('#viewnama').text(' : '+data.pelamar.nama);
            $('#viewalamat').text(' : '+data.pelamar.alamat);
            $('#viewnotelp').text(' : '+data.pelamar.notelp);

            for(var item in data.seleksi){
                var index = parseInt(item) + 1;
                var itemkriteria = 'viewItemKriteria' + index;
                var valueKriteria = 'viewValue' + index;

                $("#" + itemkriteria ).text(' : '+data.seleksi[item].kriteria);
                $("#" + valueKriteria ).text(data.seleksi[item].subKriteria);


            }
            $('#view_kriteria').modal('show');
            $('#view_kriteria .modal-title').text('Detail Penilaian Seleksi');
        }
    });
}
