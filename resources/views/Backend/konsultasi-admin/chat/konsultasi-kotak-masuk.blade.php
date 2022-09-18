<div class="messaging">
    <div class="inbox_msg">
        <div class="inbox_people">
            <div class="headind_srch">
                <div class="recent_heading">
                    <h5>KONSULTASI</h5>
                </div>
                {{--  <div class="srch_bar">
                    <a class="add_konsultasi" href="/user/add-konsultasi">+</a>
                </div>  --}}
            </div>
            <div class="inbox_chat" id="inbox_chat">
                {{--  @if (!empty($konsultasiMasuk))
                    @foreach ($konsultasiMasuk as $data)
                        <a href="javascript:updateform({{ $data->id }});">
                            <div class="chat_list active_chat" id="chat{{ $data->id }}">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                            alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5> Admin<span
                                                class="chat_date">{{ isset($data->updated_at) ? $data->updated_at->format('d M Y') : ''}}</span></h5>
                                        <p>{{ Str::limit($data->title, 50, $end = ' ...') }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
                @if (!empty($konsultasiMasukRead))
                    @foreach ($konsultasiMasukRead as $data)
                        <a href="javascript:openDetailMessage({{ $data->id }});">
                            <div class="chat_list">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                            alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>Admin  <span
                                                class="chat_date">{{ isset($data->updated_at) ? $data->updated_at->format('d M Y') : ''}}</span></h5>
                                        <p>{{ Str::limit($data->title, 50, $end = ' ...') }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif  --}}
            </div>
        </div>
        <div class="mesgss" style="display: block" id="detailMessage" style="width: 20%; !important">
            <div class="container-title">
                <span class="judul"></span>
            </div>
            <div class="msg_history" id="msg_history" style="overflow: scroll; height:150px; ;!important">

            </div>
            <div class="type_msg" id="typeMsg" style="display: none">
                <form action="{{ url('/admin-add-konsultasi')}}" method="post">
                    @csrf
                    <div class="input_msg_write">
                        <input type="hidden" name="idRoom" id="idRoom">
                        <textarea name="messages" id="note" cols="1" class="write_msg" placeholder="Masukkan pesan Anda..."></textarea>
                    </div>
                    <button class="msg_send_btn" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('frontend/js/custom.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
</script>

<script>
    var interval = 15000;
    setInterval(function () {
        onGetListData();
    }, interval);

    $(document).ready(function() {
        onGetListData();

        //Runs immediately, waiting ten secs before setting flag to true
        setTimeout(function(){
        }, interval);

        //Starts immediately, but flag won't be true for first ten seconds
        setInterval(function () {
            onGetListData();
        }, interval);

    }); //END document.ready()
    function onGetListData() {
        $.ajax({
            url: '/konsultasi/listData',
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                $('#inbox_chat').empty();
                for(var i=0; i<res.listKonsultasi.length; i++){
                    if(res.listKonsultasi[i].status == 0) {
                        $('#inbox_chat').append(
                            ' <a href="javascript:openDetail('+res.listKonsultasi[i].id+');">'+
                                    '<div class="chat_list active_chat" id="chat'+res.listKonsultasi[i].id+'">'+
                                    ' <div class="chat_people">'+
                                            '<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>'+
                                            '<div class="chat_ib">'+
                                            ' <h5> '+res.listKonsultasi[i].name+'<span'+
                                                    ' class="chat_date">'+res.listKonsultasi[i].created_at+'</span></h5>'+
                                                //'<p>'+truncateWords(res.listKonsultasi[i].messages, 4, "...")+'</p>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</a>'
                            );
                    } else {
                        $('#inbox_chat').append(
                            ' <a href="javascript:openDetail('+res.listKonsultasi[i].id+');">'+
                                    '<div class="chat_list " id="chat'+res.listKonsultasi[i].id+'">'+
                                    ' <div class="chat_people">'+
                                            '<div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>'+
                                            '<div class="chat_ib">'+
                                            ' <h5> '+res.listKonsultasi[i].name+'<span'+
                                                    ' class="chat_date">'+res.listKonsultasi[i].created_at+'</span></h5>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</a>'
                        );
                    }

                }
            },
        });
    }

    function truncateWords(sentence, amount, tail) {
        var str = null || ' ';
        const words = sentence.split(str);
        if (amount >= words.length) {
            return sentence;
        }
        const truncated = words.slice(0, amount);
        return `${truncated.join(' ')}${tail}`;
    }

    function openDetail(id) {
        //Starts immediately, but flag won't be true for first ten seconds
        $('#msg_history').empty();
        getDetail(id);
        setInterval(function () {
            getDetail(id);
        }, interval);
        $("#chat"+id).removeClass("active_chat");
        document.getElementById("idRoom").value = id;
        document.getElementById("typeMsg").style.display =
        "block";

    }

    function getDetail(id){
        $('#msg_history').empty();
        $.ajax({
            url: '/konsultasi/detail/admin/'+id+'',
            type: 'GET',
            dataType: 'json',
            success: function (res) {
                console.log(res);
                for(var i=0; i<res.konsultasi.length; i++){
                    if(res.konsultasi[i].perawat_id == null) {
                    $('#msg_history').append(
                        '<div class="incoming_msg">'+
                            '<div class="incoming_msg_img">'+
                                    '<div class="badge badge-info">'+
                                        res.konsultasi[i].name+
                                    '</div>'+
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
                    } else {
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
                    }

                }
            },
            error: function (data) {
                // if error occured
            },
        });
        close();
    }
</script>

<script src="{{ asset('frontend/js/custom.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
</script>
