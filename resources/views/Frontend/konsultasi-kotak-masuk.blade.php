<div class="messaging">
    <div class="inbox_msg" style="width: 80%; margin: auto; !important">
        <div class="mesgs" style="display: block" id="detailMessage">
            <div class="container-title">
                <span class="judul">Riwayat Konsultasi</span>
            </div>
            <div class="msg_history" id="msg_history" style="overflow: scroll; height:150px; ;!important">
            </div>
            <div class="type_msg">
                <form action="{{ url('/add-konsultasi')}}" method="post">
                    @csrf
                    <div class="input_msg_write">
                        <textarea name="messages" id="note" cols="1" class="write_msg" placeholder="Masukkan pesan Anda..."></textarea>
                        {{--  <input type="text" class="write_msg" placeholder="Type a message" />  --}}
                    </div>
                    <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o"
                            aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="{{ asset('frontend/js/custom.js')}}"></script>

<script>
    var interval = 60000;

    $(document).ready(function() {
        onGetData();

        //Runs immediately, waiting ten secs before setting flag to true
        setTimeout(function(){
        }, interval);

        //Starts immediately, but flag won't be true for first ten seconds
        setInterval(function () {
            onGetData();
        }, interval);

    }); //END document.ready()
    function onGetData() {
        $.ajax({
            url: '/user/konsultasi/getData',
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                $('#msg_history').empty();
                for(var i=0; i<res.konsultasi.length; i++){
                    if(res.konsultasi[i].perawat_id == null) {
                    $('#msg_history').append(
                            '<div class="outgoing_msg">'+
                                '<div class="sent_msg">'+
                                    '<p>'+
                                        '<span class="keluhan" id="keluhan">'+
                                            res.konsultasi[i].messages+
                                        '</span>'+
                                    '</p>'+
                                    '<span class="time_date" id="time_date">'+res.konsultasi[i].created_at+'</span>'+
                                ' </div>'+
                            '</div>'
                    );
                    } else {
                        $('#msg_history').append(
                        '<div class="incoming_msg">'+
                            '<div class="incoming_msg_img">'+
                                    '<div class="badge badge-info"> Admin </div>'+
                                '</div>'+
                            '<div class="received_msg">'+
                                '<div class="received_withd_msg">'+
                                    '<p><span class="responKeluhan">'+
                                    res.konsultasi[i].messages+
                                    '</span></p>'+
                                        '<span class="time_date_respon" id="time_date_respon">'+res.konsultasi[i].created_at+'</span>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                        );
                    }
                }
            }
        });

    }
</script>
