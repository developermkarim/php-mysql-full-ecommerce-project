$(document).ready(function(){
    var domain = window.location.origin;
    var path = window.location.pathname.split('/');
    var URL = domain + '/' + path[1] + '/';
    console.log(URL);

    $('#full-form').submit(function(ev){
        ev.preventDefault()
        var username = $('.username').val();
        var password = $('.password').val();
        if (username == '' || password == '') {
            $('#full-form').append('<div class="alert alert-warning" role="alert">Username or Password must be filled!</div>')
        }
        else{
            $.ajax({
                url: './php_files/check_login.php',
                type:'POST',
                data:{login:'1',name:username,pass:password},
                success:function(response){
                    $('.alert').hide();
                    console.log(response);
                    var responseData = JSON.parse(response);
                    if (responseData.hasOwnProperty('success')) {
                        $('#full-form').append('<div class="alert alert-success" role="alert">logged in Successfull</div>');
                        setTimeout(()=>{window.location = URL+'admin/dashboard.php'}, 1000);
                    }
                    else if(responseData.hasOwnProperty('error')){
                        $('#full-form').append('<div class="alert alert-danger" role="alert">Sorry, Username or Password in incorrect</div>')
                    }
                }
            })
        }
       
    });
})