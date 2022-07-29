function updateform(id) {
    var data = $("#" + id).serialize();
    let _token = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        type: "post",
        url: "/update-konsultasi",
        data: {
            id: id,
            _token: _token,
        },
        success: function (data) {
            let d = new Date(data.data.created_at);
            let d_respon = new Date(data.data.updated_at);
            let ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
            let mo = new Intl.DateTimeFormat('en', { month: 'short' }).format(d);
            let da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);
            let ye_respon = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d_respon);
            let mo_respon = new Intl.DateTimeFormat('en', { month: 'short' }).format(d_respon);
            let da_respon = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d_respon);
            console.log("#chat["+id+"]");
            if (data) {
                $(".success").text(data.success);
                document.getElementById("detailMessage").style.display =
                    "block";
                $(".keluhan").html(data.data.keluhan);
                $(".responKeluhan").html(data.data.balas);
                $("#time_date").html(da+' '+mo+' '+ye);
                $("#time_date_respon").html(da_respon+' '+mo_respon+' '+ye_respon);
                $(".judul").html(data.data.title);
                // var element = document.getElementById("#chat["+id+"]");
                $("#chat"+id).removeClass('active_chat');
            }
        },
        error: function (data) {
            // if error occured
            alert("Error occured, please try again");
        },
    });
}

function openDetailMessage(id) {
    var data = $("#" + id).serialize();
    let _token = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        type: "post",
        url: "/detail-konsultasi",
        data: {
            id: id,
            _token: _token,
        },
        success: function (data) {
            let d = new Date(data.data.created_at);
            let d_respon = new Date(data.data.updated_at);
            let ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
            let mo = new Intl.DateTimeFormat('en', { month: 'short' }).format(d);
            let da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);
            let ye_respon = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d_respon);
            let mo_respon = new Intl.DateTimeFormat('en', { month: 'short' }).format(d_respon);
            let da_respon = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d_respon);
            console.log(data.data);
            if (data.data) {
                $(".success").text(data.success);
                document.getElementById("detailMessage").style.display =
                    "block";
                $(".keluhan").html(data.data.keluhan);
                $(".responKeluhan").html(data.data.balas);
                $("#time_date").html(da+' '+mo+' '+ye);
                $("#time_date_respon").html(da_respon+' '+mo_respon+' '+ye_respon);
                $(".judul").html(data.data.title);
            }
        },
        error: function (data) {
            // if error occured
            alert("Error occured, please try again");
        },
    });
}

function openDetailMessageTerkirim(id) {
    var data = $("#" + id).serialize();
    let _token = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        type: "post",
        url: "/detail-konsultasi",
        data: {
            id: id,
            _token: _token,
        },
        success: function (data) {
            let d = new Date(data.data.created_at);
            let ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
            let mo = new Intl.DateTimeFormat('en', { month: 'short' }).format(d);
            let da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);
            console.log(data.data);
            if (data.data) {
                $(".success").text(data.success);
                document.getElementById("detailMessageTerkirim").style.display =
                    "block";
                $(".keluhan").html(data.data.keluhan);
                $(".time_date").html(da+' '+mo+' '+ye);
                $(".judul").html(data.data.title);
            }
        },
        error: function (data) {
            // if error occured
            alert("Error occured, please try again");
        },
    });
}


function openDetailHomecare(id) {
    let _token = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        type: "post",
        url: "/show-homecare",
        data: {
            id: id,
            _token: _token,
        },
        success: function(data) {
            let d = new Date(data.data.created_at);
            let ye = new Intl.DateTimeFormat('en', {
                year: 'numeric'
            }).format(d);
            let mo = new Intl.DateTimeFormat('en', {
                month: 'short'
            }).format(d);
            let da = new Intl.DateTimeFormat('en', {
                day: '2-digit'
            }).format(d);
            if (data.data) {
                $(".success").text(data.success);
                document.getElementById("inputHomecare").style.display =
                    "none";
                document.getElementById("detailHomecare").style.display =
                    "block";
                $(".judul").html(da+' '+mo+' '+ye);
                $("#noMedik").html(data.data.id_pasien);
                $("#diagnosa").html(data.data.diagnosa);
                $("#layanan").html(data.data.layanan);
                $("#kondisiPasien").html(data.data.kondisi_pasien);
                // $("#homecare"+id).addClass('active_chat');
            }
            console.log(data.data);
        },
        error: function(data) {
            // if error occured
            alert("Error occured, please try again");
        },
    });
}


function createHomecare() {
    document.getElementById("detailHomecare").style.display =
                    "none";
    document.getElementById("inputHomecare").style.display =
                    "block";
}

