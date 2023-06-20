$(document).ready(function () {
    var domain = window.location.origin;
    var path = window.location.pathname.split('/');
    var URL = domain + '/' + path[1] + '/';
    console.log(URL);

    $('#full-form').submit(function (ev) {
        ev.preventDefault()
        var username = $('.username').val();
        var password = $('.password').val();
        if (username == '' || password == '') {
            $('#full-form').append('<div class="alert alert-warning" role="alert">Username or Password must be filled!</div>')
        } else {
            $.ajax({
                url: './php_files/check_login.php',
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
                            window.location = URL + 'admin/dashboard.php';
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
                            window.location = URL + 'admin/products.php';
                        }, 1000);
                    } else if (responseData.hasOwnProperty('error')) {
                        $('#createProduct').prepend('<div class="alert alert-danger">' + responseData.error + '</div>');

                    }
                }

            })
        }

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
                            window.location = URL + 'admin/category.php';
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
                            window.location = URL + 'admin/category.php';
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
                            window.location = URL + 'admin/sub_category.php';
                        }, 1000);
                    } else if (res.hasOwnProperty('error')) {
                        $('#createSubCategory').prepend(`<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sorry!  &nbsp; &nbsp;</strong>${res.error}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                    }

                }
            })
        }
    })

    /* Sub_category Update */
    $('#editSubCategory').submit(function(ev){
        ev.preventDefault();
        var form_data = new FormData(this);
        form_data.append('update_sub_cateogry','1');
        console.log(form_data);
        // var sub_cat_id = $('#sub_cat_id').val();
        var sub_cat = $('#update_sub_category_name').val();
        var update_cat = $('#update_category_name').val();
        if (sub_cat == '') {

            $('#editSubCategory').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!  &nbsp; &nbsp;</strong>Sub Category Name must be filled.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');

        } else if (update_cat == '') {
            $('#editSubCategory').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!  &nbsp; &nbsp;</strong>Category title must be selected.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }else{

            $.ajax({
                url:'./php_files/sub_category.php',
                type:"post",
                data:form_data,
                processData:false,
                contentType:false,
                dataType:'json',
                success:(response)=>{
                    if(response.hasOwnProperty('success')){
                    $('#editSubCategory').prepend(`<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congrates!  &nbsp; &nbsp; Sub Category is successfully inserted</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                    setTimeout(() => {
                        window.location = URL + '/admin/sub_category.php'
                    }, 2000);
                }else if(response.hasOwnProperty('error')){
                    $('#editSubCategory').prepend(`<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congrates!  &nbsp; &nbsp; Sub Category is successfully inserted</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);
                }
            }
            })
        }
    })

    /* Active INactive async Operation for Show in Header */

    $('.showCat_Header').click(function(){
        var id = $(this).attr('data-id');
        var status = '';
        if($(this).prop('checked') == true){
            status = '1';
        }else if($(this).prop('checked') == false){
            status = '0';
        }
        $.ajax({
            url:'./php_files/sub_category.php',
            type:'post',
            data:{id:id,show_header:status},
            success:(response)=>{

            }
        })
    })

     /* Active INactive async Operation for Show in Header */
     $('.showCat_Footer').click(function(){
        // var status = $(this).attr('data-id');
        var id = $(this).attr('data-id');
        var status = ''
        if($(this).prop('checked') == true){
            status = '1';
          
            }  else if($(this).prop('checked') == false){
                status = '0';
        }
        $.ajax({
            url:'./php_files/sub_category.php',
            type:'post',
            data:{id:id,show_footer:status},
            success:(response)=>{

            }
        })

     });

     /* Create New Brand Here */
     $('#create_brand').submit(function(e){
        e.preventDefault();
        $('.alert').hide();
        var title = $('.brand_name').val();
        var parent = $('.brand_category option:selected').val();
        if(title.trim() == ''){
            $('#create_brand').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Sorry!  &nbsp; &nbsp;</strong>Brand Title must be filled.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
        else if(parent.trim()  == ''){
       $('#create_brand').prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Sorry! &nbsp; &nbsp; </strong> Brand Category must be filled <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        }
        else{
            var formData = new FormData(this);
            formData.append('create',1);
            $.ajax({
                type:'post',
                url:'./php_files/brands.php',
                dataType:'json',
                data: formData,
                processData:false,
                contentType:false,
                success:(response)=>{
                    $('.alert').hide();
                    console.log(response);
                    var res = response;
                    if(res.hasOwnProperty('success')){
                        $('#create_brand').prepend('<div class="alert alert-success alert-dismissible fade show" role="alert">Brand Added Successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        settimeout(()=>{
                            window.location = URL + 'admin/brands.php';
                        },1000);

                    }else if(res.hasOwnProperty('error')){
                $('#createBrand').prepend(`<div class='alert alert-danger'>${res.error}</div>`)
                }
            }
            })
        }
     })

     /* Update Brand Here */
     $('#update_brand').submit(function(ev){
        ev.preventDefault();
        $('.alert').hide();
        var title = $('.brand_name').val();
        var parent = $('.brand_category option:selected').val();
        if(title.trim() == ''){
            $('#update_brand').prepend('');
        }else if(parent.trim() == ''){
            $('#update_brand').prepend('');
        }else{
            var updateFormData = new FormData(this);
            updateFormData.append('update',1);
            $.ajax({
                type:'post',
                url:'./php_files/brands.php',
                data:updateFormData,
                processData:false,
                contentType:false,
                dataType:'json',
                success:(response)=>{
                    var res = response;
                    console.log(res);
                    if(res.hasOwnProperty('success')){
                        $('#update_brand').prepend('<div class="alert alert-success alert-dismissible fade show" role="alert">Brand Updated Successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        settimeout(()=>{
                            window.location = URL+'admin/brands.php';
                        },1000);
                    }else if(res.hasOwnProperty('error')){
                        $('#update_brand').prepend(`<div class='alert alert-danger'> ${res.error}</div>`);
                        
                    }
                   

                }
            })
        }
     })

     /* Delete Brand Here */
     $('.delete_brand').click(function(){
        var tr = $(this);
        var delete_id = $(this).attr('data-id');
        if(confirm('are you sure want to delete the brand')){
        $.ajax({
            url:'./php_files/brands.php',
            type:'post',
            data:{delete_id:delete_id},
            dataType:'json',
            success:(response)=>{
                var res = response;
                console.log(res);
                if(res.hasOwnProperty('success')){
                    tr.parent().parent('tr').remove();
                }else if(res.hasOwnProperty('error')){
                    alert('brand is not deleted');
                }
            }
        })
    }
     })
});
