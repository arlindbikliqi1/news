<footer class="foot text-center" style="position: relative; bottom: 0; width: 100%; padding: 15px 0; background-color: #f8f9fa; border-top: 1px solid #e9ecef; color: #6c757d;">
    &copy; <?php echo date('Y');?> NewsPortal. All rights reserved.
</footer>
</div>
</div>
<script>
var resizefunc = [];
</script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bts.js"></script>

<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="../plugins/switchery/switchery.min.js"></script>

<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<script src="../plugins/summernote/summernote.min.js"></script>
<!-- Select 2 -->
<script src="../plugins/select2/js/select2.min.js"></script>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        responsive: true // Enable DataTables responsiveness
    });
});
$(document).ready(function() {
    $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        responsive: true // Enable DataTables responsiveness
    });
});
</script>
<script>
jQuery(document).ready(function() {

    $('.summernote').summernote({
        height: 240, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false // set focus to editable area after initializing summernote
    });
    // Select2
    $(".select2").select2();

    $(".select2-limiting").select2({
        maximumSelectionLength: 2
    });
});
</script>
<script src="../plugins/switchery/switchery.min.js"></script>

<!--Summernote js-->
<script src="../plugins/summernote/summernote.min.js"></script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'en'
    }, 'google_translate_element');
}
</script>

<style>
/* Google Translate specific styles */
.goog-logo-link {
    display: none !important;
}

.goog-te-gadget {
    color: transparent;
}

.goog-te-gadget .goog-te-combo {
    margin: 0px 0;
    padding: 8px;
    color: #000;
    background: #eeee;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

/* Adjust position for smaller screens if needed, though it's now floated right */
@media (max-width: 767px) {
    #google_translate_element {
        position: relative; /* Change from absolute to relative */
        top: auto;
        right: auto;
        float: none; /* Remove float */
        text-align: center; /* Center the element */
        margin: 10px auto; /* Add margin for spacing */
        width: fit-content; /* Adjust width to content */
    }
}
</style>

</body>

</html>
