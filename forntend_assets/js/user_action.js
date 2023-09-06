$(document).ready(function(){

    $('#register_sign_up').submit(function(ev){
         ev.preventDefault();
         $('.alert').hide();
/*          var f_name = $(".first_name").val();
         var l_name = $(".last_name").val();
         var username = $(".user_name").val();
         var password = $(".pass_word").val();
         var mobile = $(".mobile").val();
         var address = $(".address").val();
         var city = $(".city").val(); */
 
      /*    if (f_name == '' || l_name == '' || username == '' || password == '' || mobile == '' || address == '' || city == ''){
             $('#register_sign_up').append('<div class="alert alert-danger">Please Fill All The Fields</div>');
         } else{ */
            var formData = new FormData(this);
            formData.append('create','1');
            console.log(formData);
            $.ajax({
                url:'php_files/user_action.php',
                type:'POST',
                data: formData,
                processData:false,
                contentType:false,
                dataType:'json',
                success:(response)=>{
                    $('.alert').hide()
                    console.log(response);
                    var res = response;
                    if(res.hasOwnProperty('success')){
                        $('#register_sign_up').append('<div class="alert alert-success">'+res.success+'</div>');
                        setTimeout(()=>{
                           /*  window.location.href = '../user.profile.php' */
                           location.reload();
                        },1500);
                    }else if(res.hasOwnProperty('error')){
                        $('#register_sign_up').append('<div class="alert alert-danger">'+res.error+'</div>');
                    }
                }

            })
    })

    /* User Login  */

    $('#user_login_form').submit(function(ev){
        ev.preventDefault();
        $('.alert').hide();
        var username = $('.username').val();
        var password = $('.password').val();
        if(username == '' || password == ''){

            $("#user_login_form .modal-body").append('<div class="alert alert-danger">Please Fill All The Fields.</div>');
        }else{
            $.ajax({
                url: "./php_files/user_action.php",
                method:'POST',
                data:{login:'1',username:username,password:password},
                dataType:'json',
                success:function(response){
                    $('.alert').hide();
                    console.log(response);
                    if (response.hasOwnProperty('success')) {
                        
                        $("#user_login_form .modal-body").append('<div class="alert alert-success">User Logged In Successfully</div>');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                        
                    }else if(response.hasOwnProperty('errror')){
                        $("#user_login_form .modal-body").append(`<div class="alert alert-danger">${response.error}}</div>`);
                    }
                }
            })
        }

    })

    /* User Profile Data Update */
    $('#modify-user').submit(function(ev){
        ev.preventDefault();
        $('.alert').hide();
        var f_name = $(".first_name").val();
        var l_name = $(".last_name").val();
        var mobile = $(".mobile").val();
        var address = $(".address").val();
        var city = $(".city").val();

        if(f_name.trim() == '' || l_name.trim() == '' || mobile.trim() == '' || address.trim() == '' || city.trim() == ''){

            $('#modify-user').prepend(`<div class="alert alert-danger" role="alert"><strong>Pleaser Fill all Inputs</strong></div>`);

        }else{

            var update_user = new FormData(this);
            update_user.append('update','1');
            $.ajax({
                url:'php_files/user_action.php',
                method:'POST',
                data:update_user,
                dataType:'json',
                success:(response)=>{
                    console.log(response);

                }
            })

        }

    })

    /* Modify Password Here */

    $('#modify-password').submit(function(ev){
        ev.preventDefault()
       
        var old_password = $('.old_pass').val();
        var new_password = $('.new_pass').val();
        if(old_password.trim() == '' || new_password.trim() == ''){
            $('#modify-password').append('<div class="alert alert-danger">Please Fill All The Fields</div>');

        }else{

            $.ajax({
                url:'php_files/user_action.php',
                type:'POST',
                data:{ModifyPass:1,old_password:old_password,new_password:new_password},
                dataType:'json',
                success:(response)=>{
                    console.log(response);
                    if(response.hasOwnProperty('success')){
                    $('#modify-password').append('<div class="alert alert-success">Password Modified Successfully.</div>');
                    setTimeout(() => {
                        window.location.href = '../user_profile.php';
                    }, 1000);
                }
                else if(response.hasOwnProperty('error')){
                    $('#modify-password').append('<div class="alert alert-danger">'+res.error+'</div>');
                }
            }
            })
        }

    });

    /* Log out  */
    $('.user_logout').click(function(e){
        e.preventDefault();
        $.ajax({
            url:'php_files/user_action.php',
            type:"POST",
            data:{'logout':'1'},
            success:function(response){
                if (response == 'true') {
                    location.reload()
                }
            }
        })
    })

    $('.add-to-wishlist').click(function(e){
        e.preventDefault()
        var product_id = $(this).attr('data-id');
        $.ajax({
            url:'php_files/user_action.php',
            type:"POST",
            data:{wishlist_id:product_id},
            dataType: 'json', // Specify the data type as JSON
            success: function(response) {
                if (response.hasOwnProperty('success')) {
                    var message = response.success;
                    var wishlistCount = response.wishlist_count;

                    // Display success message and update wishlist count
                    displaySuccessAlert(message);
                    $('.wishlist-count').addClass('cart-wishlist');
                    updateWishlistCount(wishlistCount);
                } else if(response.hasOwnProperty('error')) {
                    var errorMessage = response.error;

                    // Display error message
                    displayErrorAlert(errorMessage);

                }

                else if(response.hasOwnProperty('showModal')){
                       
              $('#loginMessageText').html(`<span>Please Please login before add to Wishlist</span> <a href="#" data-toggle="modal" class="btn btn-outline-primary" data-dismiss="modal" data-target="#user_login_form">Login</a>`);
                    $('#loginMessageModal').modal('show');
                }

            },

            error: function(xhr, textStatus, errorThrown) {
                displayErrorAlert('An error occurred: ' + errorThrown);

            }

        });

    });

    function displaySuccessAlert(message) {
        $('#messageText').text(message);
            $('#messageModal').modal('show');
    }

    function displayErrorAlert(message) {
        $('#ErrorMessageText').text(message);
        $('#ErrorMessageModal').modal('show');
    }

    function updateWishlistCount(count) {
        $('.wishlist-count').text(count);
        
    }

    function updateCartCount(count) {
        $('.cart-count').text(count);
        
    }

    /* Add To Cart Option Here cart-count*/

    $('.add-to-cart').click(function(e){
        e.preventDefault();
        var product_id = $(this).attr('data-product-id');
        var product_price = $(this).attr('data-product-price');
        $.ajax({
            url:'php_files/user_action.php',
            type:'POST',
            data:{cart_product_id:product_id,product_price:product_price},
            dataType:'json',
            success:function(response){
                console.log(response);

                if(response.hasOwnProperty('success')){
                    var successMessage = response.success;
                    var cart_count = response.cart_count;

                    // Display success message and update wishlist count
                    displaySuccessAlert(successMessage);
                    $('.cart-count').addClass('cart-wishlist');
                    $('.cart-count').text(cart_count);

                }else if(response.hasOwnProperty('error')){

                    var errorMessage = response.error;
                    displayErrorAlert(errorMessage);

                }

                else if(response.hasOwnProperty('showModal')){

                   $('#loginMessageText').html(`<span>${response.message}</span> <a href="#" data-toggle="modal" class="btn btn-outline-primary" data-dismiss="modal" data-target="#user_login_form">Login</a>`);
                    $('#loginMessageModal').modal('show');

                }

            },
            error:function(xhr, textStatus, errorThrown){
                displayErrorAlert('an Error Occured : ' + errorThrown);
            }
        })
    })

    /* Cart Remove From Here */

    $('.icon_close').click(function(){
        var cart_id = $(this).attr('data-cart-id');
        var tr_elements = $(this).closest('tr'); // will  find parent tr tag
        console.log(cart_id);

        if(cart_id == ''){
            console.log("SOrry cart id NOt found");
        }

        $.ajax({
            url:"php_files/user_action.php",
            type:"POST",
            data:{cart_id:cart_id},
            dataType:'json',
            success:function(response){

                console.log(response);

                if(response.hasOwnProperty('success')){
                    var successMsg = response.success;
                    var cart_count = response.cart_count;
                    $('#messageText').text(successMsg);
                    $('#messageModal').modal('show');
                    $('.cart-count').text(cart_count);

                    if(cart_count !== undefined){
                        if (cart_count === 0) {
                        $('.cart-count').removeClass('cart-wishlist');
                        }
                    }
                    tr_elements.remove();

                    if (cart_count < 1) {
                        $('.table-row').remove();
                        $('.cart-row').remove();
                        $('.shoping-cart').html(`<div class="shoping__cart__btns text-center"><a href="#" class="primary-btn cart-btn">No Cart Is Available Here</a>
                    </div>`);
                    }

                }else if(response.hasOwnProperty('error')){
                    var errorMsg = response.error;


                   $('#ErrorMessageText').text(errorMsg);
                   $('#ErrorMessageModal').modal('show');

                }
            },

        error:function(xhr, textStatus, errorThrown){
            displayErrorAlert('an Error Occured : ' + errorThrown);
        }

        })

    })


    /* Cart Increment Count Here */

    $('.increment-count').on('click',function(){

        var countValue = $('.count-value').val();
        // var cart_id = $(this).prev('.count-value').data('cart-id');
        var cart_id = $(this).data('cart-id');

        var quantityInput = $("input[data-cart-id='" + cart_id + "']");
        var cartTotal = $("td.shoping__cart__total[data-cart-id='" + cart_id + "']");

        console.log(countValue);
        console.log(cart_id);
        var countValue = countValue < 0 ? 0 : countValue;

        $.ajax({
            url:"php_files/user_action.php",
            method:"POST",
            data:{action:'increment',increment_value:countValue,cart_inc_id:cart_id},
            dataType:'json',
            success:function(response){
                console.log(response);
                if(response.hasOwnProperty('success')){

                    var responseCount = response.newQuantity;
                    var totalPrice = response.total_price;
                    // Example: Update quantity input value
                    quantityInput.val(responseCount);

                    // Example: Update cart total
                    cartTotal.text(totalPrice);

                }
            }
        })

    })

    /* Decrement Value */
    $('.decrement-count').on('click',function(e){
        e.preventDefault()
        var countValue = $('.count-value').val();
        // var cart_id = $(this).next('.count-value').data('cart-id');
         var cart_id = $(this).data('cart-id');

         var quantityInput = $("input[data-cart-id='" + cart_id + "']");
         var cartTotal = $("td.shoping__cart__total[data-cart-id='" + cart_id + "']");

        console.log(countValue);
        console.log(cart_id);
        // var countValue = countValue < 0 ? 0 : countValue;

        $.ajax({
            url:"php_files/user_action.php",
            method:"POST",
            data:{action:'decrement',decrement_value:countValue,cart_dec_id:cart_id},
            dataType:'json',
            success:function(response){
                console.log(response);

                if(response.hasOwnProperty('success')){

                    var responseCount = response.newQuantity;
                    var totalPrice = response.total_price;

                  cartTotal.text(totalPrice);
                   quantityInput.val(responseCount);

                }else if (response.hasOwnProperty('error')) {

                    console.log(response.error);

                    var errorMsg = response.error;
                    $('#ErrorMessageText').text(errorMsg);
                    $('#ErrorMessageModal').modal('show');
                }
            }
        })

    })
    

    /* Live Count By Count Input */
    $('.count-value').on('keyup',function(){

        var countValue = $(this).val();
       
        var cart_id = $(this).attr('data-cart-id');
        var cart_price = $(this).data('cart-price');
        console.log(countValue);
        console.log(cart_id);
    //    var countValue =  countValue < 0 ? 0 : countValue;

       if(countValue < 1){
        $('#ErrorMessageText').text('Count Value Must be above 1');
        $('#ErrorMessageModal').modal('show');


        setTimeout(() => {
            location.reload();
            var cartPrice = 1 * cart_price;
            $('.shoping__cart__total').text(cartPrice);
            $('.count-value').val(1);
        }, 1000);
        return true;
         }else if(!Number.isNaN(countValue)){
            $('#ErrorMessageText').text('Tying to give String Value to Number');
            $('#ErrorMessageModal').modal('show');
    
            setTimeout(() => {
                location.reload();
                var cartPrice = 1 * cart_price;
                $('.shoping__cart__total').text(cartPrice);
                $('.count-value').val(1);
            }, 1000);
            return true;
         }
     

        $.ajax({
            url:"php_files/user_action.php",
            method:"POST",
            data:{action:'live_count',count_value:countValue,cart_count_id:cart_id},
            dataType:'json',
            success:function(response){
                console.log(response);

                if(response.hasOwnProperty('success')){

                    var totalPrice = response.total_price;

                  $('.shoping__cart__total').text(totalPrice);
                }
                else if(response.hasOwnProperty('error')){
                    var errorMsg = response.error;
                    
                    $('#ErrorMessageText').text(errorMsg);
                    $('#ErrorMessageModal').modal('show');
  
                }
              
            }

        })

    })

});