
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>

<!--   <script src="assets/vendor/simple-datatables/simple-datatables.js"></script> -->



  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/jquery.min.js"></script>
<script src="assets/js/fontawesome.js"></script>

<!-- Text Editor JS File -->

<script src="assets/js/jquery-te-1.4.0.min.js"></script>
<script>
            $('.product_description').jqte({
                link: false,
                unlink: false,
                color: false,
                source: false,
            });

        </script>
<script src="assets/js/admin_actions.js"></script>

<script>
/* Thumbnail Image live Show Here */
   function thunmbnail_Url(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        $('#image').attr('src',e.target.result).width(80).height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }

    /* Image Name Show By This */
    if (input.files && input.files.length > 0) {
    // Get the selected file name
    const fileName = input.files[0].name;

    // Update the value attribute of the input to display the file name
    input.setAttribute('value', fileName);
  }
    };

  

</script>
<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function() {
    $('#productTable').DataTable({
        pageLength: 10, // Number of records per page
        searching: true, // Enable search functionality
        ordering: true, // Enable sorting
        // More options...
    });
});

</script>
<script>
  function printTable() {
    var contentToPrint = document.getElementById('reportTable').outerHTML;

    var printWindow = window.open('', '_blank');
    printWindow.document.open();
    printWindow.document.write('<html><head><title>Print Table</title></head><body>');
    printWindow.document.write(contentToPrint);
    printWindow.document.write('</body></html>');
    printWindow.document.close();

    printWindow.print();
    printWindow.close();
}

$(document).ready(function(){
 $('#product_gallery_images').on('change', function(){ //on file input change
    if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    {
        var data = $(this)[0].files; //this file data
         
        $.each(data, function(index, file){ //loop though each file
            if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                var fRead = new FileReader(); //new filereader
                fRead.onload = (function(file){ //trigger function on successful read
                return function(e) {
                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                .height(80); //create image element 
                    $('#preview_img').append(img); //append image to output element
                    $('.prev_images').hide();
                };
                })(file);
                fRead.readAsDataURL(file); //URL representing the file's data.
            }
        });
         
    }else{
        alert("Your browser doesn't support File API!"); //if File API is absent
    }
 });
});


/* Multiple Image select Names */
const inputElement = document.getElementById('product_gallery_images');
  const labelElement = document.querySelector('label[for="product_gallery_images"]');

  inputElement.addEventListener('change', function () {
    const files = inputElement.files;
    if (files.length > 0) {
      let fileNames = Array.from(files).map(file => file.name).join(', ');
      labelElement.textContent = 'Gallery Images: ' + fileNames;
    } else {
      labelElement.textContent = 'Gallery Image';
    }
  });
</script>
</body>

</html>