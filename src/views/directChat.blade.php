<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{URL('vendor/chatapp/style/style.css')}}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="{{URL('vendor/chatapp/emoji/emoji.css')}}" rel="stylesheet">


    <div class="row bootstrap snippets myChatBox">

        <!-- DIRECT CHAT PRIMARY -->
        <div  id="Loadmessages" class="box box-primary direct-chat direct-chat-primary chat-box-fixed">

                @yield('msgContent')

        </div>
        <!--/.direct-chat -->
</div>


<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="{{URL('vendor/chatapp/scripts/app.min.js')}}"></script>
<script>

    $(function() {
        $('#Loadmessages').addClass('direct-chat-contacts-open collapsed-box');

        loadDefault();
    });

    function loadDefault()
    {
        var URL = window.location.origin+'/';
        //var count = $('#TotalUsers').val();

        $.ajax({
            url: URL + "send_requests/chat/{{Auth::user()->id}}",
            type: 'get',
            success: function (response) {
                $('#Loadmessages').html(response);
                var objDiv = document.getElementById("messages");
                objDiv.scrollTop = objDiv.scrollHeight;
            },
            complete: function(){
               // $('#Loadmessages').removeClass('direct-chat-contacts-open');
                $('.loading-image').hide();
				 $('.emobox').hide();
               // var objDiv = document.getElementById("messages");
               // objDiv.scrollTop = objDiv.scrollHeight;

            },
        });
    }


    function loadChatBox(to)
    {
        $('.loading-image').show();
        var URL = window.location.origin+'/';
        //var count = $('#TotalUsers').val();

        $.ajax({
            url: URL + "send_requests/chat/{{Auth::user()->id}}/"+to,
            type: 'get',
            success: function (response) {
                $('#Loadmessages').html(response);
                var objDiv = document.getElementById("messages");
                objDiv.scrollTop = objDiv.scrollHeight;
                $('#Loadmessages').removeClass('direct-chat-contacts-open');
            },
            complete: function(){
                $('.loading-image').hide();
				 $('.emobox').hide();
                var objDiv = document.getElementById("messages");
                objDiv.scrollTop = objDiv.scrollHeight;
            },
        });
    }

    function showEmo()
    {
        $('.emobox').slideToggle();
    }


    function addEmo(code)
    {
        var currentVal = $('#msgToSend').html();
        var newVal = currentVal +" "+ code;
        $('#msgToSend').html(newVal);
    }


    function sendMSGS($to)
    {
        var URL = window.location.origin+'/';
        var token = $('meta[name="csrf-token"]').attr('content');
        var mssgg = $('#msgToSend').html();
        $.ajax({
            url: URL + "send_message/{{Auth::user()->id}}/"+$to,
            type: 'POST',
            async: true,
            data: {'_token': token ,'message':mssgg},
            success: function (response) {
                //console.log(response);
              loadChatBox(response);
            },
        });
    }

</script>
