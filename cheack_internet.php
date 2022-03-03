
<!DOCTYPE html>
<html>
  	<head>
    	<title>Toast Notification for Check Internet Connection with Bootstrap 4 & javascript</title>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  	</head>
  	<body>
  		<!-- <div class="container">
  			<br />
  			<br />
    		<h1 align="center">Toast Notification for Check Internet Connection with Bootstrap 4 & javascript</h1>
    		<br />    		
    	</div> -->
    	
  	</body>
</html>

<div class="toast" style="position: absolute; top: 25px; right: 25px; z-index:99;">
    <div class="toast-header">
        <i class="bi bi-wifi"></i>&nbsp;&nbsp;&nbsp;
        <strong class="mr-auto"><span class="text-success">You're online now</span></strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        Hurray! Internet is connected.
    </div>
</div>

<script>

var status = 'online';
var current_status = 'online';

function check_internet_connection()
{
    if(navigator.onLine)
    {
        status = 'online';
    }
    else
    {
        status = 'offline';
    }

    if(current_status != status)
    {
        if(status == 'online')
        {
            $('i.bi').addClass('bi-wifi');
            $('i.bi').removeClass('bi-wifi-off');
            $('.mr-auto').html("<span class='text-success'>You are online now</span>");
            $('.toast-body').text('Hurray! Internet is connected.');
        }
        else
        {
            $('i.bi').addClass('bi-wifi-off');
            $('i.bi').removeClass('bi-wifi');
            $('.mr-auto').html("<span class='text-danger'>You are offline now</span>");
            $('.toast-body').text('Opps! Internet is disconnected.')
        }

        current_status = status;

        $('.toast').toast({
            autohide:false
        });

        $('.toast').toast('show');
    }
}

check_internet_connection();

setInterval(function(){
    check_internet_connection();
}, 1000);

</script>
