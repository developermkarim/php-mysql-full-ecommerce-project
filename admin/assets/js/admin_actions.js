$(document).ready(function () {
    var domain = window.location.origin;
    var path = window.location.pathname.split('/');
    var URL = domain + '/' + path[1] + '/';
    console.log(URL);

    $('#full-form').submit(function (ev) {
        ev.preventDefault()
        var username = $('.username').val();
        var password = $('.password').val();
        var phpFilePath = '../admin/php_files/check_login.php';
        if (username == '' || password == '') {
            $('#full-form').append('<div class="alert alert-warning" role="alert">Username or Password must be filled!</div>')
        } else {
            $.ajax({
                url: phpFilePath,
                type: 'POST',
                data: {
                    login: '1',
                    user: username,
                    pass: password
                },
                success: function (response) {
                    $('.alert').hide();
                    var responseData = JSON.parse(response);
                    console.log(responseData);
                    if (responseData.hasOwnProperty('success')) {
                        $('#full-form').append('<div class="alert alert-success" role="alert">logged in Successfull</div>');
                        setTimeout(function () {
                            window.location = URL + '/../admin/dashboard.php';
                        }, 1000);
                        console.log(responseData);
                    } else if (responseData.hasOwnProperty('error')) {
                        $('#full-form').append('<div class="alert alert-danger" role="alert">Sorry, Username or Password in incorrect</div>')
                    }
                }
            })
        }

    });


    //* Show Sub Category

    $('.product_category').change(function () {
        var id = $('.product_category option:selected').val()
        $.ajax({
            url: './php_files/products.php',
            type: 'POST',
            data: {
                cat_id: id
            },
            success: function (response) {
                var res = JSON.parse(response);

                if (res.hasOwnProperty('sub_category')) {
                    var sub_cat = '<option value="" selected disabled> Sub cat Category</option>'
                    var sub_cat_length = res.sub_category.length;
                    for (let i = 0; i < sub_cat_length; i++) {

                        sub_cat += '<option value="' + res.sub_category[i].sub_cat_id + '">' + res.sub_category[i].sub_cat_title + '</option>';

                    }

                    $('.product_sub_category').html(sub_cat);
                }

                if (res.hasOwnProperty('brands')) {
                    var brand_cat = '<option value="">Brand Category</option>';
                    var brand_length = res.brands.length;
                    if (brand_length > 0) {

                        for (let j = 0; j < brand_length; j++) {

                            brand_cat += '<option value="' + res.brands[j].brand_id + '">' + res.brands[j].brand_title + '</option>';
                        }
                    }

                    $('.product_brands').html(brand_cat);
                }
                $('#success').append('<div class="alert alert-primary" role="alert">Product added Successfully</div>')
            }
        })
    })


    /* Add Product Here */

    $('#createProduct').submit(function (ev) {
        ev.preventDefault();
        $('.alert').hide();
        var title = $('.product_title').val();
        var cat = $('.product_category option:selected').val();
        var sub_cat = $('.product_sub_category option:selected').val();
        var des = $('.product_description').val();
        var price = $('.product_price').val();
        var qty = $('.product_qty').val();
        var status = $('.product_status').val();
        var image = $('.product_image').val();
        var product_gallery_images = $('.product_gallery_images').val();
        if (title == '') {
            $('#createProduct').prepend('<div class="alert alert-danger">Title Field is Empty.</div>');
        } else if (cat == '') {
            $('#createProduct').prepend('<div class="alert alert-danger">Category Field is Empty.</div>');
        } else if (sub_cat == '') {
            $('#createProduct').prepend('<div class="alert alert-danger">Sub Category Field is Empty.</div>');
        } else if (des == '') {
            $('#createProduct').prepend('<div class="alert alert-danger">Description Field is Empty.</div>');
        } else if (price == '') {
            $('#createProduct').prepend('<div class="alert alert-danger">Price Field is Empty.</div>');
        } else if (qty == '') {
            $('#createProduct').prepend('<div class="alert alert-danger">Quantity Field is Empty.</div>');
        } else if (image == '') {
            $('#createProduct').prepend('<div class="alert alert-danger">Image Field is Empty.</div>');
        }else if (product_gallery_images == '') {
            $('#createProduct').prepend('<div class="alert alert-danger">Gallery Images Field is Empty.</div>');
        } else {
            var formdata = new FormData(this);
            formdata.append('create', 1);

            $.ajax({
                url: './php_files/products.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: (responseData) => {
                    $('.alert').hide();
                    console.log(responseData);

                    if (responseData.hasOwnProperty('success')) {
                        $('#createProduct').prepend('<div class="alert alert-success">Product Added Successfully.</div>');
                        setTimeout(() => {
                            window.location = URL + '/../admin/products.php';
                        }, 1000);
                    } else if (responseData.hasOwnProperty('error')) {
                        $('#createProduct').prepend('<div class="alert alert-danger">' + responseData.error + '</div>');

                    }
                }

            })
        }

    })

        // Function to show the preloader
        function showPreloader() {
            $('.preloader').fadeIn(300); // Display the preloader with a fade-in effect
        }

        // Function to hide the preloader
        function hidePreloader() {
            $('.preloader').fadeOut(300); // Hide the preloader with a fade-out effect
        }

    /* Update Product Here */
    $('#update_product').submit(function (ev) {
     ev.preventDefault();

    // Show the preloader
    showPreloader();
        $('.alert').hide();
        var title = $('.product_title').val();
        var cat = $('.product_category option:selected').val();
        var sub_cat = $('.product_sub_category option:selected').val();
        var des = $('.product_description').val();
        var price = $('.product_price').val();
        var qty = $('.product_qty').val();
        var status = $('.product_status').val();
       
        if (title.trim() == '') {
            $('#update_product').prepend('<div class="alert alert-danger">Title Field is Empty.</div>');
        } else if (cat.trim() == '') {
            $('#update_product').prepend('<div class="alert alert-danger">Category Field is Empty.</div>');
        } else if (sub_cat.trim() == '') {
            $('#update_product').prepend('<div class="alert alert-danger">Sub Category Field is Empty.</div>');
        } else if (des.trim() == '') {
            $('#update_product').prepend('<div class="alert alert-danger">Description Field is Empty.</div>');
        } else if (price.trim() == '') {
            $('#update_product').prepend('<div class="alert alert-danger">Price Field is Empty.</div>');
        } else if (qty.trim() == '') {
            $('#update_product').prepend('<div class="alert alert-danger">Quantity Field is Empty.</div>');
        
        } else {
            var update_formData = new FormData(this);
            update_formData.append('update', 1);
            $.ajax({
                url: './php_files/products.php',
                type: 'post',
                data: update_formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: (response) => {
                    var res = response;
                    console.log(res);
                    if (res.hasOwnProperty('success')) {

                     // Hide the preloader after a minimum time (e.g., 2 seconds)
                       setTimeout(function() {
                        hidePreloader();
                        }, 2000); // Adjust the time as needed

                        $('#update_product').prepend('<div class="alert alert-primary" role="alert"><strong>Product Updated is Successfully</strong></div>');
                        setTimeout(() => {
                            window.location =  URL + '/../admin/products.php';
                        }, 3000)

                    } else if (res.hasOwnProperty('error')) {
                        $('#update_product').prepend('<div class="alert alert-danger" role="alert"><strong>Sorry! Product not Updated</strong></div>');
                        showPreloader();
                    }
                }
            })
        }
    });

    /* Delete Product Here */
    $('.delete_product').click(function () {
        var tr = $(this);
        var delete_id = $(this).attr('data-id');
        var product_sub_cat = $(this).attr('data-subcat');
        if (confirm('Are you sure want to delete this product')) {
            $.ajax({
                url: './php_files/products.php',
                type: 'post',
                data: {
                    delete_id,
                    product_sub_cat
                },
                dataType: 'json',
                success: function (response) {
                    var res = response;
                    if (res.hasOwnProperty('success')) {
                        tr.parent().parent('tr').remove();
                        /*   $('#productsTable').prepend(`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <strong>${res.success}</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`); */
                        console.log(res.success);
                    } else if (res.hasOwnProperty('error')) {
                        /*  $('#product-container').prepend(`<div class="alert alert-danger" role="alert">
                             <strong>${res.error}</strong>
                         </div>`); */
                    }
                }
            })
        }
    })

    $('.featured_product').click(function(){
     
        var product_id = $(this).attr('data-id');
        // console.log(product_id);
        var status='';
        if($(this).prop('checked') == true){
            status='1';
        }
        else if($(this).prop('checked') == false){
            status='0';
        }
        $.ajax({
            url:'./php_files/products.php',
            type:'POST',
            data:{product_id:product_id,status:status},
            success:function(){

            }

        })

    })

    /* Add Category */
    $('#category_form').submit(function (ev) {
        ev.preventDefault();
        var category_name = $('#category_name').val();

        // console.log(category_url);
        // console.log(category_name);
        if (category_name == '') {
            $('#category_form').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!  &nbsp; &nbsp;</strong>Category Name must be filled.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {

            var category_form = new FormData(this);
            category_form.append('category', 1);
            var category_url = './php_files/' + 'category.php';
            // console.log(category_url);
            $.ajax({
                url: category_url,
                type: 'POST',
                data: category_form,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: (response) => {
                    $('.alert').hide()
                    console.log(response);

                    if (response.hasOwnProperty('success')) {
                        $('#category_form').prepend('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congrates!  &nbsp; &nbsp;</strong>Category Name is Successfully Inserted<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        setTimeout(() => {
                            window.location =  URL + '/../admin/category.php';
                        }, 1000)
                    } else if (response.hasOwnProperty('error')) {

                        $('#category_form').prepend(`<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!  &nbsp; &nbsp;</strong>${response.error}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                    }
                }
            })
        }
    });


    /* Update Category Here */

    $('#update_category_form').submit(function (ev) {
        ev.preventDefault();

        var category_name = $('#update_category_name').val();
        if (category_name == '') {
            $('#update_category_form').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!  &nbsp; &nbsp;</strong>Category Name must be filled.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {

            var category_form = new FormData(this);
            console.log(category_form);
            category_form.append('cate_update', 1);
            var category_url = './php_files/' + 'category.php';

            $.ajax({
                url: category_url,
                type: 'POST',
                data: category_form,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: (response) => {
                    $('.alert').hide()
                    console.log(response);

                    // console.log(categoryName['categoryName'].cat_title);
                    if (response.hasOwnProperty('success')) {

                        $('#update_category_form').prepend('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congrates!  &nbsp; &nbsp;</strong>Category Name is Successfully Inserted<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

                        setTimeout(() => {
                            window.location =  URL + '/../admin/category.php';
                        }, 1000)

                    } else if (response.hasOwnProperty('error')) {
                        $('#update_category_form').prepend(`<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!  &nbsp; &nbsp;</strong>${response.error}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                    }

                }
            })
        }
    })


    /* Delete Category */
    $('.delete_category').click(function () {
        var tr = $(this);
        var id = $(this).attr('data-id');

        if (confirm('are you sure want to delete this category')) {
            $.ajax({
                url: './php_files/category.php',
                type: "POST",
                data: {
                    delete_id: id
                },
                dataType: 'json',
                success: (response) => {
                    var res = response;
                    if (res.hasOwnProperty('success')) {
                        tr.parent().parent('tr').remove();
                    }
                    /*  else if(res.hasOwnProperty('error')){
                         alert('sorry, data not deleted');
                     } */
                }

            })
        }
    })

    /* add Sub_category */

    $('#createSubCategory').submit(function (ev) {
        ev.preventDefault();

        var sub_cat_name = $('#sub_cat_name').val();
        var cat_name = $('#parent_cat').val();

        if (sub_cat_name == '') {

            $('#createSubCategory').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!  &nbsp; &nbsp;</strong>Sub Category Name must be filled.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

        } else if (cat_name == '') {
            $('#createSubCategory').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!  &nbsp; &nbsp;</strong>Category title must be selected.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {

            var sub_cat_form = new FormData(this);
            sub_cat_form.append('sub_category', 1);
            var sub_cate_url = './php_files/sub_category.php';

            $.ajax({
                url: sub_cate_url,
                type: 'POST',
                data: sub_cat_form,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: (response) => {
                    $('.alert').hide();

                    var res = response;

                    if (res.hasOwnProperty('success')) {
                        $('#createSubCategory').prepend(`<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congrates!  &nbsp; &nbsp; Sub Category is successfully inserted</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);

                        setTimeout(() => {
                            window.location =  URL + '/../admin/sub_category.php';
                        }, 1000);
                    } else if (res.hasOwnProperty('error')) {
                        $('#createSubCategory').prepend(`<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sorry!  &nbsp; &nbsp;</strong>${res.error}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                    }

                }
            })
        }
    })

    /* Sub_category Update */
    $('#editSubCategory').submit(function (ev) {
        ev.preventDefault();

        // var sub_cat_id = $('#sub_cat_id').val();
        var sub_cat = $('#update_sub_category_name').val();
        var update_cat = $('#update_category_name option:selected').val();
        if (sub_cat == '') {

            $('#editSubCategory').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!  &nbsp; &nbsp;</strong>Sub Category Name must be filled.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

        } else if (update_cat == '') {
            $('#editSubCategory').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!  &nbsp; &nbsp;</strong>Category title must be selected.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            var form_data = new FormData(this);
            form_data.append('update_sub_cateogry', 1);
            console.log(form_data);

            $.ajax({
                url: './php_files/sub_category.php',
                type: "post",
                data: form_data,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: (response) => {
                    console.log(response);
                    if (response.hasOwnProperty('success')) {
                        $('#editSubCategory').prepend(`<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congrates!  &nbsp; &nbsp; Sub Category is successfully inserted</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                        setTimeout(() => {
                            window.location =  URL + '/../admin/sub_category.php'
                        }, 2000);
                    } else if (response.hasOwnProperty('error')) {
                        $('#editSubCategory').prepend(`<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congrates!  &nbsp; &nbsp; Sub Category is successfully inserted</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                    }
                }
            })
        }
    })

    /* Sub Category Delete Here */
    $('.delete_sub_cat').click(function () {
        var sub_cat_tr = $(this);
        var sub_cat_id = $(this).attr('data-id');
        if (confirm('Are You Sure Want to Delete')) {
            $.ajax({
                url: './php_files/sub_category.php',
                type: "POST",
                data: {
                    delete_id: sub_cat_id
                },
                dataType: 'json',
                success: (response) => {
                    var res = response;
                    console.log(res);
                    if (res.hasOwnProperty('success')) {
                        $('.alert').hide();
                        sub_cat_tr.parent().parent('tr').remove();
                        $('.delete_sub_cat').prepend(`<div class="alert alert-success" role="alert">
                            <strong>${res.success}</strong>
                        </div>`);
                    } else if (res.hasOwnProperty('error')) {
                        alert('You Don\'t Delete This');
                    }
                }
            })
        }
    })

    /* Active INactive async Operation for Show in Header */

    $('.showCat_Header').click(function () {
        var id = $(this).attr('data-id');
        var status = '';
        if ($(this).prop('checked') == true) {
            status = '1';
        } else if ($(this).prop('checked') == false) {
            status = '0';
        }
        $.ajax({
            url: './php_files/sub_category.php',
            type: 'post',
            data: {
                id: id,
                show_header: status
            },
            success: (response) => {

            }
        })
    })

    /* Active INactive async Operation for Show in Header */
    $('.showCat_Footer').click(function () {
        // var status = $(this).attr('data-id');
        var id = $(this).attr('data-id');
        var status = ''
        if ($(this).prop('checked') == true) {
            status = '1';

        } else if ($(this).prop('checked') == false) {
            status = '0';
        }
        $.ajax({
            url: './php_files/sub_category.php',
            type: 'post',
            data: {
                id: id,
                show_footer: status
            },
            success: (response) => {

            }
        })

    });

    /* Create New Brand Here */
    $('#create_brand').submit(function (e) {
        e.preventDefault();
        $('.alert').hide();
        var title = $('.brand_name').val();
        var parent = $('.brand_category option:selected').val();
        if (title.trim() == '') {
            $('#create_brand').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!  &nbsp; &nbsp;</strong>Brand Title must be filled.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else if (parent.trim() == '') {
            $('#create_brand').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Sorry! &nbsp; &nbsp; </strong> Brand Category must be filled <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        } else {
            var formData = new FormData(this);
            formData.append('create', 1);
            $.ajax({
                type: 'post',
                url: './php_files/brands.php',
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                success: (response) => {
                    $('.alert').hide();
                    console.log(response);
                    var res = response;
                    if (res.hasOwnProperty('success')) {
                        $('#create_brand').prepend('<div class="alert alert-success alert-dismissible fade show" role="alert">Brand Added Successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        setTimeout(() => {
                            window.location = URL + '/../admin/brands.php';
                        }, 1000);

                    } else if (res.hasOwnProperty('error')) {
                        $('#createBrand').prepend(`<div class='alert alert-danger'>${res.error}</div>`)
                    }
                }
            })
        }
    })

    /* Update Brand Here */
    $('#update_brand').submit(function (ev) {
        ev.preventDefault();
        $('.alert').hide();
        var title = $('.brand_name').val();
        var parent = $('.brand_category option:selected').val();
        if (title.trim() == '') {
            $('#update_brand').prepend('');
        } else if (parent.trim() == '') {
            $('#update_brand').prepend('');
        } else {
            var updateFormData = new FormData(this);
            updateFormData.append('update', 1);
            $.ajax({
                type: 'post',
                url: './php_files/brands.php',
                data: updateFormData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: (response) => {
                    var res = response;
                    console.log(res);
                    if (res.hasOwnProperty('success')) {
                        $('#update_brand').prepend('<div class="alert alert-success alert-dismissible fade show" role="alert">Brand Updated Successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        setTimeout(() => {
                            window.location = URL + '/../admin/brands.php';
                        }, 1000);
                    } else if (res.hasOwnProperty('error')) {
                        $('#update_brand').prepend(`<div class='alert alert-danger'> ${res.error}</div>`);

                    }


                }
            })
        }
    })

    /* Delete Brand Here */

    $('.delete_brand').click(function () {
        var tr = $(this);
        var delete_id = $(this).attr('data-id');
        if (confirm('are you sure want to delete the brand')) {
            $.ajax({
                url: './php_files/brands.php',
                type: 'post',
                data: {
                    delete_id: delete_id
                },
                dataType: 'json',
                success: (response) => {
                    var res = response;
                    console.log(res);
                    if (res.hasOwnProperty('success')) {
                        tr.parent().parent('tr').remove();
                    } else if (res.hasOwnProperty('error')) {
                        alert('brand is not deleted');
                    }
                }
            })
        }
    });

    /* User Data Show In Details By Model */
    $('.user_view').click(function (ev) {
        ev.preventDefault();
        var user_id = $(this).attr('data-id');

        $.ajax({
            url: './php_files/users.php',
            method: 'POST',
            data: {
                user_id: user_id
            },
            dataType: 'json',
            success: (response) => {
                // console.log(response.success[0].user_id);
                var mainData = response.success[0];
                var user_data = `<table class="table table-bordered">
               <tbody>
               <tr><td>First Name</td>
               <td>${mainData.f_name}</td>
               </tr>
               <tr>
               <td>Last Name</td><td>${mainData.l_name}</td>
               </tr>
               <tr>
               <td>Username</td><td>${mainData.username}</td>
               </tr>
               <tr>
               <td>Mobile</td><td>${mainData.mobile}</td>
               </tr>
               <tr>
               <td>Address</td><td>${mainData.address}</td></tr>
               <tr>
               <td>City</td><td>${mainData.city}</td>
               </tr>
               <tr>
               <td>User Status</td>`;

               if(mainData.user_role == '1')
           user_data +=   '<td>activated<td>';
            else{
            user_data +=    '<td>blocked<td>';
            }
           
           user_data +=  `</tr>
           </tbody>
           </table>`;
           $('#user-detail .modal-body').append(user_data);
            $('#user-detail').modal('show');
            
            
            }
           

       
        })
    })

    /* Usre Block Unblock Status Changing */
    $('.user_status').click(function (ev) {
        ev.preventDefault();
        var user_id = $(this).attr('data-id');
        var user_role = $(this).attr('data-status');

        $.ajax({
            url: './php_files/users.php',
            method: 'POST',
            data: { user_role: user_role,user_id: user_id },
            //  dataType:"json",
            success: (response) => {
                location.reload();
                 console.log(response);
            }

        })
    })

    /* User Data delete Here */

    $('.delete_user').click(function(e){
        e.preventDefault();
        var tr_link = $(this);
        var id = $(this).attr('data-id');

        if(confirm('Are You Sure Want to Delete The User')){ 
            $.ajax({
                url: './php_files/users.php',
                method: 'POST',
                data: { user_id: id },
                  dataType:"json",
                success: (response) => {
                    var res = response
                    if(res.hasOwnProperty('success')){
                        tr_link.parent().parent('tr').remove();
                    }else{
                        alert('Sorry, User Data not Deleted')
                    }
                }
            })
        }

    })
      
    /* Update Option Here */
    $('#updateOptions').submit(function(ev){
        ev.preventDefault();
        $('.alert').hide();
        var site_name = $('.site_name').val();
        var site_title = $('.site_title').val();
        var old_logo = $('.old_logo').val();
        var new_logo = $('.new_logo').val();
        var footer_text = $('.footer_text').val();
        var currency = $('.currency').val();
        var desc = $('.site_desc').val();
        var phone = $('.phone').val();
        var email = $('.email').val();
        var address = $('.address').val();

        if(site_name == ''){
            $('#updateOptions').prepend('<div class="alert alert-danger">Site Name Field is Empty.</div>');
        }if(site_title == ''){
            $('#updateOptions').prepend('<div class="alert alert-danger">Site Title Field is Empty.</div>');
        }else if(footer_text.trim() == ''){
            $('#updateOptions').prepend('<div class="alert alert-danger">Footer Text Field is Empty.</div>');
        }else if(currency == ''){
            $('#updateOptions').prepend('<div class="alert alert-danger">Currency Format Field is Empty.</div>');
        }else if(desc == ''){
            $('#updateOptions').prepend('<div class="alert alert-danger">Site Description is empty Field is Empty.</div>');
        }else if(phone == ''){
            $('#updateOptions').prepend('<div class="alert alert-danger">Phone Field is Empty.</div>');
        }else if(email == ''){
            $('#updateOptions').prepend('<div class="alert alert-danger">Email Field is Empty.</div>');
        }else if(address == ''){
            $('#updateOptions').prepend('<div class="alert alert-danger">Address Field is Empty.</div>');
        }else{

        var updateForm = new FormData(this);
        updateForm.append('update',1);
         
        $.ajax({
            url:'./php_files/options.php',
            type:'POST',
            data:updateForm,
            contentType:false,
            processData:false,
            dataType:'json',
            success:(response)=>{
                $('.alert').hide();
                console.log(response);
                if (response.hasOwnProperty('success')) {
                    $('#updateOptions').prepend(`<div class="alert alert-success" role="alert">
                        <strong>${response.msg}</strong>
                    </div>`);
                    setimeout(()=>{

                        window.location = URL + '/../admin/options.php';
                    },1000)
                }else if(response.hasOwnProperty('error')){
                    $('#updateOptions').prepend(`<div class="alert alert-danger" role="alert">
                    <strong>${response.error}</strong>
                </div>`);
                }
            }
        })
    }

    })

    /* Live Image Show By Updating */

    $('.new_logo').change(function(){
        changePicture(this)
    })

    function changePicture(current_input){

        if(current_input.files && current_input.files[0]){
            var reader = new FileReader();
            reader.onload = function(ev){
                $('#image').attr('src',ev.target.result);

            }
            reader.readAsDataURL(current_input.files[0]) // convert to base64 string
        }
    }

    /* Show The Data in Report By Search */

$('#reportSection').submit(function(e){
    e.preventDefault();
    var startDate = $('#startDate').val();
    var endDate = $('#endDate').val();

    $.ajax({
        url:'./php_files/reports.php',
        method:'POST',
        data:{submitBtn:1,startDate,endDate:endDate},
        success:function(data){
            
            if(data.hasOwnProperty('success')){
                console.log(data);
            }
            $('#reportTable').html(data);
           
        },
        error:function(){
            alert('Error Fetching Data');
        }
    })
})


/* Coupon Handle Here in admin */
$('.coupon-box').click(function(){
    var coupon_id = $(this).attr('data-coupon-id');
    // var status = $(this).attr('data-status');

    var status = '';
    if($(this).prop('checked') == true){
        status = '1';
    }else if($(this).prop('checked') == false){
        status = '0';
    }
 
    $.ajax({
        url:'./php_files/coupon.php',
        method:'POST',
        data:{coupon_id:coupon_id,coupon_status:status},
        success:function(response){
            // console.log(response);
        }
    })

})


/* Coupon add Here */

$('#add_coupon_form').submit(function(ev){
    ev.preventDefault();
    $('.alert').hide();
    var title = $('#coupon_title').val();
    var code = $('#coupon_code').val();
    var value = $('#coupon_value').val();
    var status = $('.status option:selected').val();
    console.log(status);
    if(title.trim() == ''){
            $('#add_coupon_form').prepend('<div class="alert alert-danger">Coupon Tile Field is Empty.</div>');
     }else if(code.trim() == ''){
            $('#add_coupon_form').prepend('<div class="alert alert-danger">Coupon Code Field is Empty.</div>');
        }else if(value.trim() == ''){
            $('#add_coupon_form').prepend('<div class="alert alert-danger">Coupon Value Field is Empty.</div>');
        }else if(status == ''){
            $('#add_coupon_form').prepend('<div class="alert alert-danger">Status is not selected.</div>');
        }else{

            var couponForm = new FormData(this);
            couponForm.append('create','1');
            $.ajax({
                url:'./php_files/coupon.php',
                method:"POST",
                data:couponForm,
                processData:false,
                contentType:false,
                dataType:'json',
                success:function(response) {
                    $('.alert').hide();
                    console.log(response);
                    if (response.hasOwnProperty('success')) {
                        $('#add_coupon_form').append(`<div class="alert alert-success">${response.success}.</div>`);
                        setTimeout(() => {
                            window.location = URL + '/../admin/coupon.php'
                        }, 1000);
                    }else if(response.hasOwnProperty('error')){
                        $('#add_coupon_form').append(`<div class="alert alert-danger">${response.error}</div>`)
                    }
                }
            })
        }
})

/* Edit Coupon Here */

$('#edit_coupon_form').submit(function(ev){
    ev.preventDefault();
    $('.alert').hide();
    var title = $('#coupon_title').val();
    var code = $('#coupon_code').val();
    var value = $('#coupon_value').val();
    var status = $('.status option:selected').val();
    // console.log(status);
    if(title.trim() == ''){
            $('#edit_coupon_form').prepend('<div class="alert alert-danger">Coupon Tile Field is Empty.</div>');
     }else if(code.trim() == ''){
            $('#edit_coupon_form').prepend('<div class="alert alert-danger">Coupon Code Field is Empty.</div>');
        }else if(value.trim() == ''){
            $('#edit_coupon_form').prepend('<div class="alert alert-danger">Coupon Value Field is Empty.</div>');
        }else if(status == ''){
            $('#edit_coupon_form').prepend('<div class="alert alert-danger">Status is not selected.</div>');
        }else{

            var couponForm = new FormData(this);
            couponForm.append('update','1');
            $.ajax({
                url:'./php_files/coupon.php',
                method:"POST",
                data:couponForm,
                processData:false,
                contentType:false,
                dataType:'json',
                success:function(response) {
                    $('.alert').hide();
                    console.log(response);
                    if (response.hasOwnProperty('success')) {
                        $('#edit_coupon_form').append(`<div class="alert alert-success">${response.success}.</div>`);
                        setTimeout(() => {
                            window.location = URL + '/../admin/coupon.php'
                        }, 1000);
                    }else if(response.hasOwnProperty('error')){
                        $('#edit_coupon_form').append(`<div class="alert alert-danger">${response.error}</div>`)
                    }
                }
            })
        }

})

$('.delete_coupon').click(function(ev){
    ev.preventDefault()
     var tr = $(this).closest('tr');
    // var tr = $(this);
    var coupon_id = $(this).data('id');

    if(confirm('Are you Sure Want To delete Coupon')){
        $.ajax({
            url:'php_files/coupon.php',
            method:"POST",
            data:{delete_coupon:'1',id:coupon_id},
            // dataType:'json',
            success:function(response){
                console.log(response);
                if(response.hasOwnProperty('success')){
                    // tr.remove();
                    // tr.parent().parent('tr').remove();
                    // $('.coupon-data').prepend(`<div class="alert alert-success">${response.success}.</div>`);
                }else if(response.hasOwnProperty('error')){
                    $('.coupon-data').prepend(`<div class="alert alert-danger">${response.error}.</div>`);
                }

            },
            error: function() {
                alert("Error occurred while deleting the record.");
            }

        })
    }
})

});