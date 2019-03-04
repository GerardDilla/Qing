<html>
<head>
    <title>BargePoller</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript" charset="utf-8"></script>

    <style type="text/css" media="screen">
      body{ background:#000;color:#fff;font-size:.9em; }
      .msg{ background:#aaa;padding:.2em; border-bottom:1px #000 solid}
      .old{ background-color:#246499;}
      .new{ background-color:#3B9957;}
    .error{ background-color:#992E36;}
    </style>

    <script type="text/javascript" charset="utf-8">
	var result_count = 0;
    function addmsg(type, msg){
        /* Simple helper to add a div.
        type is the name of a CSS class (old/new/error).
        msg is the contents of the div */
        $("#messages").append(
            "<div class='msg "+ type +"'>"+ msg +"</div>"
        );
    }

    function waitForMsg(){
        
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>index.php/Admin/msgsrv",
			data: {result_count: result_count},
            async: true,
            cache: false,
            timeout:300000,
            success: function(data){

				data = JSON.parse(data);
                result_count = data.count;
                //alert(result_count);

                $('#messages').html('');
                $.each(data.result, function(index, row){

                    $('#messages').append('\
                    <div class="msg old">\
                    <input id="session_id" value="'+row['session_id']+'">\
                    <input id="Counter" value="'+row['Counter']+'">\
                    <input id="Department" value="'+row['Department']+'">\
                    <input id="Count" value="'+row['Count']+'">\
                    </div>\
                    ');

                });

                setTimeout(
                    waitForMsg,
                    1000); 
                
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                //addmsg("", "Returned with no results.. Retrying");

                setTimeout(
                    waitForMsg,
                    1000); 
				
            }
        });
    };

    $(document).ready(function(){
		waitForMsg();
    });
    </script>
</head>
<body>
    <div id="messages">
        <div class="msg old">
           
        </div>
    </div>
</body>
</html>