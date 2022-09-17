<div class="messaging">
    <div class="inbox_msg">
        <div class="inbox_people">
            <div class="headind_srch">
                <div class="recent_heading">
                    <h5>PESAN MASUK</h5>
                </div>
                <div class="srch_bar">
                    <a class="add_konsultasi" href="/user/add-konsultasi">+</a>
                </div>
            </div>
            <div class="inbox_chat">
                @if (!empty($konsultasiMasuk))
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
                @endif
            </div>
        </div>
        <div class="mesgs" style="display: none" id="detailMessage">
            <div class="container-title">
                <span class="judul"></span>
            </div>
            <div class="msg_history">
                <div class="outgoing_msg">
                    <div class="sent_msg">
                        <p><span class="keluhan" id="keluhan"></span></p>
                        <span class="time_date" id="time_date"> </span>
                    </div>
                </div>
                <div class="incoming_msg">
                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                            alt="sunil"> </div>
                    <div class="received_msg">
                        <div class="received_withd_msg">
                            <p><span class="responKeluhan"></span></p>
                            <span class="time_date" id="time_date_respon">sasasa</span>
                        </div>
                    </div>
                </div>
            </div>
            {{--  <div class="type_msg">
                <div class="input_msg_write">
                    <input type="text" class="write_msg" placeholder="Type a message" />
                    <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o"
                            aria-hidden="true"></i></button>
                </div>
            </div>  --}}
        </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="{{ asset('frontend/js/custom.js')}}"></script>
