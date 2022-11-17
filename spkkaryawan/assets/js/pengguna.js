/**
 * Created by sankester on 14/05/2017.
 */
function edit_pengguna(id){

    $('#formPengguna')[0].reset();
    $('#errors').empty();
    $('#errors').removeClass("alert");

    $.ajax({
        url : base_url + "pengguna/" + "getById/" + id,
        type : "GET",
        dataType: "JSON",
        success : function(data){
            $('[name="user_id"]').val(data.user_id);
            $('[name="nama"]').val(data.user_nama);
            $('[name="username"]').val(data.user_username);
            $('[name="password"]').val(data.user_password);

            $('#form_pengguna').modal('show');
            $('.modal-title').text('Ubah Data Pengguna');

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
        }
    });
}

function save_pengguna() {
    var url;
    url =  base_url + "pengguna/"+ "updatePengguna";

    $('#errors').empty();
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#formPengguna').serialize(),
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

function hapus_pengguna(id){
    $.ajax({
        url :  base_url + "pengguna/" + "delete/"+id,
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
