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
                    // displaySuccessAlert(successMessage);
                    $('#messageText').html(successMessage);
                    $('#messageModal').modal('show');

                    $('.cart-count').addClass('cart-wishlist');
                    $('.cart-count').text(cart_count);
                  /*   $('#pd-details-cart').css('display','block'); */
                }else if(response.hasOwnProperty('error')){

                    var errorMessage = response.error;
                    $('#ErrorMessageText').html(errorMessage + `Go To <a href='cart.php' class='text-primary'>Cart</a>`);
                    $('#ErrorMessageModal').modal('show');
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
            console.log("Sorry cart id NOt found");
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
                    $('#sub-total').text(response.subTotal);
                    var delivery_charge = 69;
                    var qtyWiseCharge = cart_count * delivery_charge;
                    $('#delivery-charge').text(qtyWiseCharge);
                    var total = qtyWiseCharge + parseInt(response.subTotal);
                    $('#total').text(total);
                   

                    if(cart_count !== undefined){
                        if (cart_count === 0) {
                        $('.cart-count').removeClass('cart-wishlist');
                        }
                        if (cart_count <= 1) {
                            $('#coupon-li').remove();
                            $('.code-text').remove();
                            $('.applied-text').remove();
                            $('#coupon-charge').remove();
                            $('#coupon-message').empty();
                     // Assume you have received some new content from your AJAX request
                    var newContent = '<input type="text" name="new_coupon" id="new-coupon-code" placeholder="Enter your new coupon code">';
                    newContent += '<button type="submit" class="site-btn apply-coupon-btn">APPLY NEW COUPON</button>';

                    // Add the new content to the div
                    $('#coupon-input-id').html(newContent);
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
                    var rowCount = response.rowCount;
                   /*  var subTotal = response.subTotal; */
                    // Example: Update quantity input value
                    quantityInput.val(responseCount);

                    // Example: Update cart total
                    cartTotal.text(totalPrice);

                    // Sub Total of all Carts
                    $('#sub-total').text(response.subTotal);

                    /* Delivery Charge Here */
                    var delivery_charge = 69;
                    var qtyWiseCharge = rowCount * delivery_charge;
                    $('#delivery-charge').text(qtyWiseCharge);

                    /* Total Of all Carts and QUantity after coupon and delivery charge added */
                    var finalTotal = qtyWiseCharge + parseInt(response.subTotal);
                    $('#total').text(finalTotal);

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

                    var responseCount = parseInt(response.newQuantity);
                    var totalPrice = parseInt(response.total_price);
                    var rowCount = response.rowCount;

                  cartTotal.text(totalPrice);
                   quantityInput.val(responseCount);
                // Sub Total of all Carts
                $('#sub-total').text(response.subTotal);

                /* Delivery Charge Here */
                var delivery_charge = 69;
                var qtyWiseCharge = rowCount * delivery_charge;
                $('#delivery-charge').text(qtyWiseCharge);

                /* Total Of all Carts and QUantity after coupon and delivery charge added */
                var finalTotal = qtyWiseCharge + parseInt(response.subTotal);
                $('#total').text(finalTotal);

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

        var quantityInput = $("input[data-cart-id='" + cart_id + "']");
        var cartTotal = $("td.shoping__cart__total[data-cart-id='" + cart_id + "']");

        console.log(countValue);
        console.log(cart_id);
        // var countValue =  /^\d+$/.test(inputValue);
        // var countValue = inputValue;

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
         }  else if(!/^\d+$/.test(countValue)){
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
                    var responseCount = response.newQuantity;
                    var rowCount = response.rowCount;
                    

                  cartTotal.text(totalPrice);
                  quantityInput.val(responseCount);

                  // Sub Total of all Carts
                $('#sub-total').text(response.subTotal);

                /* Delivery Charge Here */
                var delivery_charge = 69;
                var qtyWiseCharge = rowCount * delivery_charge;
                $('#delivery-charge').text(qtyWiseCharge);

                /* Total Of all Carts and QUantity after coupon and delivery charge added */
                var finalTotal = qtyWiseCharge + parseInt(response.subTotal);
                $('#total').text(finalTotal);

                }
                else if(response.hasOwnProperty('error')){
                    var errorMsg = response.error;
                    
                    $('#ErrorMessageText').text(errorMsg);
                    $('#ErrorMessageModal').modal('show');
  
                }
              
            }

        })

    })

    /* User Coupon Apply Here */

    $('#apply-coupon').submit(function(e){
        e.preventDefault();
        $('.text-msg').hide()
        var coupon_code = $('#coupon-code').val();
         var hidden_code = $('#hidden_code').val();
        console.log(hidden_code);

        console.log(coupon_code);
        if (coupon_code.trim() == '') {
            $('.coupon-title').append(`<p class='text-msg text-danger'>Coupon Code is Empty</p>`)
        }
        else if(hidden_code.trim() == ''){
            $('.coupon-title').append(`<p class='text-msg text-danger'>Hidden Code is Empty</p>`)
        }

        else{
            // var form = $(this);
            var couponForm = new FormData(this);
            couponForm.append('applied','1');
            console.log(couponForm);
              var applyCouponBtn =    $('apply-coupon-btn');
              
        // Add a loading spinner to the button
        applyCouponBtn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');

            $.ajax({
                url:'php_files/user_action.php',
                method:"POST",
                processData:false,
                contentType:false,
                data:couponForm,
                dataType:"json",
                success:function(response){
                    $('.text-msg').hide();
                    console.log(response);
                    setTimeout(function () {
                        // Remove the form element
                        $('#coupon-input-id').empty();
                    if (response.hasOwnProperty('success')) {

                var rowCount = response.rowCount;

                /* Delivery Charge Here */
                var coupon_price=0;
                if(rowCount <= 1 ){
                    $('#coupon-message').html(`<p class='text-danger'><strong>Sorry!</strong> You are Invalid for Coupon Price!</p>`);
                    $('.code-text').remove();
                    $('#hidden_code').remove();
                    $('#coupon-charge').remove();
                    return;
                }
                else if(rowCount == 2){
                    coupon_price = response.silver_coupon; 
                }else if(rowCount == 3){
                coupon_price = response.gold_coupon;
                }else if(rowCount >= 4){
                    coupon_price = response.platinum_coupon;
                }

               var delivery_charge = 69;
                var qtyWiseCharge = rowCount * delivery_charge
                // $('#delivery-charge').text(qtyWiseCharge);

                /* Total Of all Carts and QUantity after coupon and delivery charge added */
                var finalTotal = qtyWiseCharge + parseInt(response.subTotal) - response.coupon_price;
                $('#total').text(finalTotal);

                if (rowCount > 1) {
                     $('#deliver_li').after(`<li id="coupon-li">Discount in Coupon : <span>${coupon_price}%</span></li>`);
                     $('#coupon-message').html(`<p class='text-success'><strong>Thanks!</strong> You Have applied Coupon!</p>`);
                }

                }else if(response.hasOwnProperty('error')){

                }
            },2000)

                },
                error: function(xhr, textStatus, errorThrown) {
                    displayErrorAlert('An error occurred: ' + errorThrown);
    
                }
            })
        }
    })


    /* Search Product By This Function */
    $('#search-product').on('keyup',function(){
        // ev.preventDefault();
        var searchValue = $(this).val();
        // console.log(searchValue);
        
        $.ajax({
                url:'php_files/search.php',
                type:"POST",
                data:{search_value:searchValue},
                dataType:"json",
                success:function(response){
                     console.log(response.error);
                    if(response.hasOwnProperty('products')){
                          console.log(response.products);
                          $('#search-results-container').empty();
                 // Display the search results in the #search-results-container

                 $.each(response.products,function(index,product){
                    
                    console.log(product);
                       var productHtml = `<div class="col-lg-4 col-md-4 col-sm-6 mix vegetables fastfood">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" data-setbg="./admin/product_images/${product.featured_image}" style="background-image: url('./admin/product_images/${product.featured_image}');">
                                    <ul class="featured__item__pic__hover">

                                    <li><a href="javascript:void()" class="add-to-wishlist" data-id="${product['product_id']}"><i class="fa fa-heart"></i></a></li>

                                    <li><a href="compare_product.php?pid=${product['product_id']}"><i class="fa fa-retweet"></i></a></li> 

                                    <li><a href="product_details.php?pid=${product['product_id']}"><i class="fa fa-eye"></i></a></li> 

                                    <li><a href="#" data-product-price="${product['product_price']}" data-product-id="${product['product_id']}" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li>

                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="#">${product.product_title}</a></h6>
                                    <h5>$${product.product_price}</h5>
                                </div>
                            </div>
                        </div>`;
                        $('#search-results-container').append(productHtml);
                 })
                // hide the contents
                $('.categories, .hero__item, .featured spad, .banner, .from-blog spad, .latest-product spad').hide();

                }else if(response.hasOwnProperty('error')){
                $('#search-results-container').empty();
                $('#search-results-container').append(`<p>${response.error}</p>`);
                $('.categories, .hero__item, .featured spad, .banner, .from-blog spad, .latest-product spad').hide();        
                }

                if (searchValue == '') {
                $('.categories, .hero__item, .featured spad, .banner, .from-blog spad, .latest-product spad').show();
                $('#search-results-container').empty();
                }
            }
        })
    })
    // Prevent the default form submission
    $('#search-form').on('submit',function (e) {
        e.preventDefault();
    });




    /* Shipping addrtess and billing address */
    $('#diff-shipping-address').on('click',function(){
        var isChecked = $(this);
        if(isChecked.prop('checked') == true){
            $('#shippingModal').modal('show')
        }
    })

    /* Shipping Form Here */

    $(".ship-close").click(function (e) {
        // Code to execute after the modal is hidden
        $('.ship-box').prop('checked', false);
    })

    $("#shippingForm").submit(function (e) {
        e.preventDefault(); // Prevent the default form submission
        var formData = new FormData(this);
        formData.append('shipping','1');
        $.ajax({
            type: "POST",
            url: "php_files/user_action.php",
            data:formData,
            dataType:'json',
            processData:false,
            contentType:false,
            success: function (response) {
                console.log(response);
            
                // alert("Shipping address saved successfully.");
                if(response.hasOwnProperty('success')){
                var successMessage = response.success;
                displaySuccessAlert(successMessage);
                }

                else if(response.hasOwnProperty('error')){
                var errorMessage = response.error;
                displayErrorAlert(errorMessage);
                }
                
            },
            error: function (error) {
                // Handle any errors here
                console.error("Error:", error.responseText);
                displayErrorAlert('Error: ,' + error.responseText);
            }
        });
    });


    // Billing address Here

    $("#billingForm").submit(function (e) {
        e.preventDefault(); // Prevent the default form submission
        var formData = new FormData(this);
        formData.append('billing','1');
        $.ajax({
            type: "POST",
            url: "php_files/user_action.php",
            data:formData,
            dataType:'json',
            processData:false,
            contentType:false,
            success: function (response) {
                console.log(response);
            
                // alert("Shipping address saved successfully.");
                if(response.hasOwnProperty('success')){
                var successMessage = response.success;
                displaySuccessAlert(successMessage);
                setTimeout(() => {
                    window.location.href = 'success-order.php'
                }, 2000);
                
                }
                
                else if(response.hasOwnProperty('error')){
                var errorMessage = response.error;
                  displayErrorAlert(errorMessage);
               
                }
                
            },
            error: function (error) {
                // Handle any errors here
                console.error("Error:", error.responseText);
                displayErrorAlert('Error: ,' + error.responseText);
              
            }
        });
    });

    // Payment Credit Cart System 
    $('#credit-cart-box').change(function(){
        if($(this).is(':checked')){
            $('#credit-cart').css('display','block');
        }else{
            $('#credit-cart').css('display','none');
        }
    })
    /*  Payment GateWay Handle System  */
    $('#Bkash').change(function() {
        if ($(this).is(':checked')) {
            // If the radio button is checked, display the <p> tag
            $('.bkash').css('display', 'block');
            $('.nagad').css('display','none');
        } else {
            // If the radio button is not checked, hide the <p> tag
            $('.bkash').css('display', 'none');
        }
      });

      $('#Nagad').change(function(){
        if($(this).is(':checked')){
            $('.nagad').css('display','block');
            $('.bkash').css('display', 'none');
        }else{
            $('.nagad').css('display','none');
        }
      })

      $('.payment-close').on('click',function(){

        $('#paypal').prop('checked',false);
      })

      $('#paypal').change(function(){

     

        $('#paymentModal').modal('show');

        if($(this).is(':checked')){
            $('.nagad').css('display','none');
            $('.bkash').css('display', 'none');
        }else{
            $('.nagad').css('display','none');
        }
      });

      $('#cashPayment').change(function(){
        if ($(this).is(':checked')) {
            $('.nagad').css('display','none');
            $('.bkash').css('display', 'none');
        }

      });

      /*  Order Tracking By Search Result  Here*/

      $('#searchInput').on('keyup',function(){
        var searchValue = $(this).val().toLowerCase();
        console.log(searchValue);

        $.ajax({
            url:"php_files/user_action.php",
            type:"POST",
            dataType:"json",
            data:{orderSerachText:searchValue},
            success:function(response){
                console.log(response);
                $('.search-result').empty();
               
                if(response.hasOwnProperty('success')){
                var order_products = response.success;
                var product_data1 = `<div>
                <h6>Order ID: ${order_products[0]['order_code']}</h6>
                <article class="tack-card">
                    <div class="row">
                        <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                        <div class="col"> <strong>Shipping BY:</strong> <br>  ${order_products[0]['vendor_name']}, | <i class="fa fa-phone"></i> ${order_products[0]['vendor_phone']} </div>
                        <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                        <div class="col"> <strong>Tracking #:</strong> <br> ${order_products[0]['tracking_id']} </div>
                    </div>
                </article>
                <div class="track">
                    <div class="step  active"> <span class="icon"> <i class="fa fa-clock-o" aria-hidden="true"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                    <div class="step "> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
                </div>
                <hr>
                <ul class="row"> `;

                    $('.search-result').prepend(product_data1);

                $.each(order_products,function(index,order_product){
                    $('.card-body').hide();
                    
             var    product_data2 = `
                       
                        <li class="col-md-4" style:"list-style:none">
                            <figure class="itemside mb-3">
                                <div class="aside"><img src="./admin/product_images/${order_product.featured_image}" class="img-sm border"></div>
                                <figcaption class="info align-self-center">
                                   
                                    <p class="track-title">${order_product['product_title']}</p> <span class="text-muted">$ ${order_product['product_price']} </span>
                                </figcaption>
                            </figure>
                        </li> `
                     $('.search-result').append(product_data2);
                })

             var   product_data3 = `
                </ul>
                <hr>
                <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
            </div>`
             console.log(product_data);
             
            $('.search-result').append(product_data3);
           
                } else if(response.hasOwnProperty('error')){
                var errorMessage = response.error;
                $('.search-result').empty();
                $('.search-result').append(`<p class="text-danger">${errorMessage}</p>`);
                $('.card-body').hide();
                }

            if(searchValue == ''){
                $('.search-result').empty();
                $('.card-body').show();
            }

            }
           
        })
      })

/*      
  Review Click Star Here , It is For Clicked
      var selectedRating = 0;

    $('.fa-star-o').click(function() {
        var newRating = $(this).data('value');
        // If the same star is clicked again, deselect it
        if (newRating === selectedRating) {
            selectedRating = 0;
            $(this).removeClass('fa-star').addClass('fa-star-o');
        } else {
            selectedRating = newRating;
            $(this).removeClass('fa-star-o').addClass('fa-star');

            // Deselect all stars to the left of the clicked star
            $(this).prevAll().removeClass('fa-star-o').addClass('fa-star');
            // Deselect all stars to the right of the clicked star
            $(this).nextAll().removeClass('fa-star').addClass('fa-star-o');
        }

    }) */

    var starCount = 0; // Initialize star count

    // Click event for star icons
    $('ul li i').click(function() {
        // Get the data-value attribute of the clicked star
        var value = $(this).data('value');

        // Highlight the clicked star and stars before it
        for (var i = 1; i <= value; i++) {
            $('#star-' + i).removeClass('fa-star-o').addClass('fa-star'); // Add class
        }

        // Remove highlight from stars after the clicked star
        for (var j = value + 1; j <= 5; j++) {
            $('#star-' + j).removeClass('fa-star').addClass('fa-star-o');
        }

        // Update the star count
        starCount = value;
        console.log(starCount);
        // Send the starCount to the server using an AJAX request
        // Replace this with your actual AJAX request code
      
});

         // Handle form submission
    $('#review-form').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
      // Get the rating count (number of filled stars)
      // Get form data
      var product_id = $('#product_id').val();
      console.log(product_id);
      var name = $('#name').val();
      var email = $('#email').val();
      var message = $('#message').val();
      var rating = $(this).find('.fa-star').length; // Get the number of filled stars

      // Create an object to hold the data
      var formData = {
        product_id:product_id,
          name: name,
          email: email,
          message: message,
          rating: rating,
          isReview:true,
      };
        // console.log(selectedRating);
        $.ajax({
            url:'php_files/user_action.php',
            type:"POST",
            data:formData,
            dataType:"json",
            beforeSend : function(){
                // Show the preloader
            $('#preloader').show();
                
            },
            success:function(response){

                if(response.hasOwnProperty('success')){
                var successMessage = response.success;
                setTimeout(()=>{
                // Handle success
                showPopup(successMessage,true);
                $('#preloader').hide();
                },2000)

                $('#name').val('');
                 $('#email').val('');
                $('#message').val('');
                $('.star-icon li i.fa-star').removeClass('fa-star').addClass('fa-star-o');

                // Process the response data if needed

                var review_data = response.review_data;
                console.log(review_data);
                var review_star = review_data.rating;
                var starIcon = '';
                if(review_star > 0){
                    starIcon += ` <li><i class="fa fa-star fa-sm text-warning"></i></li>`
                }if(review_star >= 1){
                    starIcon += ` <li><i class="fa fa-star fa-sm text-warning"></i></li>`
                
                }if(review_star >= 2){
                    starIcon += ` <li><i class="fa fa-star fa-sm text-warning"></i></li>`
                
                }if(review_star >= 3){
                    starIcon += ` <li><i class="fa fa-star fa-sm text-warning"></i></li>`
                
                }if(review_star >= 4){
                    starIcon += ` <li><i class="fa fa-star fa-sm text-warning"></i></li>`
                }
                // console.log(starIcon);

                var reviewer = `<div class="row">
                <div class="col-sm-5">
                    <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image"
                        class="img-rounded" width="20" height="20">
                        <p class="text-muted m-0">${review_data['email']}?></p>
                           <div class="review-block-date">
                        <p class="text-muted">${response.review_time} </p>
                        <p class="text-muted">${response.review_date} </p>
                        </div>
                </div>
                <div class="col-sm-7">
                    <div class="review-block-rate">
                        <ul class="list-unstyled d-flex justify-content-left mb-0">
                       ${starIcon}
                        </ul>
                    </div>
                    <div class="review-block-description"><blockquote class="blockquote">
                    <p>${review_data['message']}</p>
                    <footer class="blockquote-footer">${review_data['name']}</footer>
                    </blockquote>
                    </div>
                </div>
            </div>`;

            $('.review-block').append(reviewer);
         }

                else if(response.hasOwnProperty('error')){
                var errorMessage = response.error;
                 // Handle success
                 showPopup(errorMessage,false);
                 // Process the response data if needed
                 $('#preloader').hide()
                }
                else if(response.hasOwnProperty('notLogin')){
                    $('#loginMessageText').html(`<span>Please Please login before add to Wishlist</span> <a href="#" data-toggle="modal" class="btn btn-outline-primary" data-dismiss="modal" data-target="#user_login_form">Login</a>`);
                    $('#loginMessageModal').modal('show');
                }
            },
            error: function(xhr, status, error) {
                // Handle error
                showPopup('Error sending data: ' + error, false);
                $('#preloader').hide();
            }

        })

});



 // Hover event for star icons (for visual feedback)
 $('ul li i').hover(function() {
    // Get the data-value attribute of the hovered star
    var value = $(this).data('value');

        // Add the star-scale class to apply the scale effect on hover
        $(this).addClass('star-scale');

    // Highlight the hovered star and stars before it (like in your original code)
    for (var i = 1; i <= value; i++) {
        $('#star-' + i).removeClass('fa-star-o').addClass('fa-star');
    }

    // Remove the hover effect when the mouse leaves the star (mouseleave)
    $(this).mouseleave(function() {

    // Remove the star-scale class to revert to the original size
    $(this).removeClass('star-scale');

        for (var i = 1; i <= 5; i++) {
            if (i > starCount) {
                $('#star-' + i).removeClass('fa-star').addClass('fa-star-o');
            }
        }
    });
});


var isLoading = false;
var displayedCount = 3; // Number of reviews initially displayed
$('#load-more-btn').on('click', function() {
    if (isLoading) return; // Prevent multiple requests

    isLoading = true;

    var product_id = $(this).data('product-id');

    $.ajax({
        url: "php_files/user_action.php",
        type: "POST",
        data: {isClicked:'1',productId: product_id, displayedCount: displayedCount, limit: 3 },
        dataType: "json",
        success: function(response) {
            console.log(response.review_data);
            if (response.length === 0) {
                // No more reviews available
                $("#load-more-btn").hide().text("No More Data");
            } else {

                console.log(response.review_data);

                var loaderReviews = response.review_data;
                console.log(loaderReviews);

                each.each(loaderReviews,function(index,review){

                var reviewer = `<div class="row">
                <div class="col-sm-5">
                    <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image"
                        class="img-rounded" width="20" height="20">
                        <p class="text-muted m-0">${review.email}</p>
                           <div class="review-block-date">
                        <p class="text-muted">${review.review_time} </p>
                        <p class="text-muted">${review.review_date} </p>
                        </div>
                </div>
                <div class="col-sm-7">
                    <div class="review-block-rate">
                        <ul class="list-unstyled d-flex justify-content-left mb-0">

            <li>
                <i class="fa  ${review['rating'] >= 1  ? 'fa-star ': 'fa-star-o'}  fa-sm text-warning"></i>
            </li>
            <li>

            <i class="fa ${review['rating'] >= 2  ? 'fa-star ': 'fa-star-o'}  fa-sm text-warning"></i>

            </li>
            <li>

            <i class="fa ${review['rating'] >= 3  ? 'fa-star ': 'fa-star-o'}  fa-sm text-warning"></i>

            </li>
            <li>

            <i class="fa ${review['rating'] >= 4  ? 'fa-star ': 'fa-star-o'}  fa-sm text-warning"></i>

            </li>

            <li>
            
            <i class="fa ${review['rating'] >= 5  ? 'fa-star ': 'fa-star-o'}  fa-sm text-warning"></i>

            </li>

                        </ul>
                    </div>
                    <div class="review-block-description"><blockquote class="blockquote">
                    <p>${review['message']}</p>
                    <footer class="blockquote-footer">${review['name']}</footer>
                    </blockquote>
                    </div>
                </div>
            </div>`;

            $('.review-block').append(reviewer);
            
        })

                    // Update the count of displayed items
                    displayedCount += response.length;
        }

        isLoading = false;
    }

})
                            // Check if no more data is available
 })















// Function to show a success or error popup
function showPopup(message, isSuccess) {
    const popup = $('#popup');
    const popupMessage = $('.popup-message');

    popupMessage.text(message);

   /*  if (isSuccess) {
        popup.css('background-color', '#28a745'); // Green for success
    } else {
        popup.css('background-color', '#dc3545'); // Red for error
    } */

    if (isSuccess) {
        popup.css('background-color', '#4CAF50'); // Custom color for success (Green)
    } else {
        popup.css('background-color', '#FF5733'); // Custom color for danger (Reddish)
    }

    popup.fadeIn();
    setTimeout(function() {
        popup.fadeOut();
    }, 3000); // Hide the popup after 3 seconds (adjust as needed)
}


});
