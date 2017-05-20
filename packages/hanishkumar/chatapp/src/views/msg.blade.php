@section('msgContent')

    <div class="box-header with-border">
        <h3 data-widget="collapse" class="box-title text-capitalize">
            @if(!empty($chatDetail))
                {{$chatDetail[0]['name']}}
            @else
                Chat
        @endif
        </h3>

        <div class="box-tools pull-right">
            <span data-toggle="tooltip" title=""  class="badge bg-light-blue" data-original-title="3 New Messages">3</span>
           <!--<button type="button" onclick="loadDefault()" class="btn btn-box-tool"><i class="fa fa-users"></i></button>-->

            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                <i class="fa fa-comments"></i></button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
        </div>
    </div>


    <div  class="box-body">


    <div id="messages" class="direct-chat-messages">
        <div style="width: 10%;margin: auto" class="loading-image">

            <img src="{{URL('vendor/chatapp/assets/load.gif')}}" />
        </div>
        @if(!empty($result))
        @foreach($result as $item)

            @if($item['msgFrom'] == $msgfrm )
                <div class="direct-chat-msg right">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right text-capitalize">{{$item['name']}}</span>
                        <span class="direct-chat-timestamp pull-left">{{$item['created_at']}}</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="{{URL('vendor/chatapp/assets/chat_avatar.png')}}" alt="Message User Image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        {!!  $item['message']!!}
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
            @else
                <div class="direct-chat-msg">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left text-capitalize">{{$item['name']}}</span>
                        <span class="direct-chat-timestamp pull-right">{{$item['created_at']}}</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="{{URL('vendor/chatapp/assets/chat_avatar.png')}}" alt="Message User Image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        {!!  $item['message']!!}
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
            @endif
        @endforeach
                    @endif
        <!-- /.direct-chat-msg -->

    </div>

    <div class="direct-chat-contacts">
        <ul class="contacts-list">

            <!--<li>
                <a onclick="loadDefault()" href="#">
                    <img class="contacts-list-img" src="{{URL('vendor/chatapp/assets/chat_avatar.png')}}">

                    <div class="contacts-list-info">
                                <span class="contacts-list-name text-capitalize">
                                Group Chat
                                        <small class="contacts-list-date pull-right">2/28/2015</small>
                                </span>
                        <span class="contacts-list-msg">Online</span>
                    </div>

                </a>
            </li>-->

            @foreach($users as $item)
            <li>
                <a onclick="loadChatBox('{{$item['id']}}')" href="#">
                    <img class="contacts-list-img" src="{{URL('vendor/chatapp/assets/chat_avatar.png')}}">

                    <div class="contacts-list-info">
                                <span class="contacts-list-name text-capitalize">
                                 {{$item['name']}}
                                  <!--<small class="contacts-list-date pull-right">2/28/2015</small>-->
                                </span>
                       <span class="contacts-list-msg">Online</span>
                    </div>
                    <!-- /.contacts-list-info -->
                </a>
            </li>
                @endforeach
        </ul>
        <!-- /.contatcts-list -->
    </div>


        <div class="emobox">
           @foreach($emoji as $e)
               <a title="Send" onclick="addEmo('{{$e['code']}}')" href="#">{!! $e['code'] !!}</a>

            @endforeach
            </div>

</div>

    <div class="box-footer">
        <form id="sendmessages" action="#" method="post">
            <div class="input-group">
                <div id="msgToSend" data-text="Type Message ..." contenteditable="true"></div>
               <!-- <input type="text" id="msgToSend" name="message" placeholder="Type Message ..." class="form-control">-->

                @if(!empty($chatDetail))

                    <span class="input-group-btn">
                    <button type="button" onclick="sendMSGS('{{$chatDetail[0]['id']}}')" class="btn btn-primary btn-flat">Send</button>
                  </span>
                @else
                    <span class="input-group-btn">
                    <button type="button" onclick="" class="btn btn-primary btn-flat">Send</button>
                  </span>
                @endif



            </div>
            <div class="input-group">
                <i style="cursor: pointer;" onclick="showEmo()" class="em em-blush"></i>
            </div>
        </form>
    </div>

@endsection
