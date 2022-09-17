<div class="messaging">
    <center>
    </center>
    <div class="inbox_msg" style="width: 80%; margin: auto; !important">
        <div class="mesgs" style="display: block" id="detailMessage">
            <div class="container-title">
                <span class="judul">Riwayat Konsultasi</span>
            </div>
            <div class="msg_history" id="msg_history">

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

<script>
    setInterval(onGetData, 1000);

    function onGetData() {
        $.ajax({
            url: '/user/konsultasi/getData',
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                console.log(res.konsultasi);
                $('#msg_history').empty();
                for(var i=0; i<res.konsultasi.length; i++){
                    $('#msg_history').append(
                        '<div class="outgoing_msg">'+
                            '<div class="sent_msg">'+
                                '<p>'+
                                    '<span class="keluhan" id="keluhan">'+
                                        ''+res.konsultasi[i].messages+''+
                                    '</span>'+
                           ' </div>'+
                        '</div>'+
                    );
                }
            }
        });

    }
</script>


<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="{{ asset('frontend/js/custom.js')}}"></script>
