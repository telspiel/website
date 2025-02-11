 <!--start switcher-->

 <!--bootstrap js-->
 <script src="{{ asset('website/assets/js/bootstrap.bundle.min.js') }}"></script>

 <!--plugins-->
 <script src="{{ asset('website/assets/js/jquery.min.js') }}"></script>
 <!--plugins-->
 <script src="{{ asset('website/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
 <script src="{{ asset('website/assets/plugins/metismenu/metisMenu.min.js') }}"></script>
 <script src="{{ asset('website/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
 <script src="{{ asset('website/assets/plugins/peity/jquery.peity.min.js') }}"></script>

 <script src="{{ asset('website/assets/js/main.js') }}"></script>

 <script src="{{ asset('website/assets/plugins/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
 <script src="{{ asset('website/assets/plugins/fancy-file-uploader/jquery.fileupload.js') }}"></script>
 <script src="{{ asset('website/assets/plugins/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
 <script src="{{ asset('website/assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
 <script src="{{ asset('website/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
 <script type="text/javascript" src="{{ asset('website/assets/js/dropify.min.js') }}"></script>
 <script>
     $('#fancy-file-upload').FancyFileUpload({
         params: {
             action: 'fileuploader'
         },
         maxfilesize: 1000000
     });
 </script>
 <script>
     $(document).ready(function() {

         $('#image-uploadify').imageuploadify();
         feather.replace();
     })
 </script>
 <script src="https://unpkg.com/feather-icons"></script>

 <script src="{{ asset('website/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('website/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
 <script>
     $(document).ready(function() {
         $('#image-uploadify').imageuploadify();
         feather.replace();
        //  $('#example').DataTable();
         $('#example').attr('style', 'border-collapse:collapse !important;width:1012px !important');
     });
 </script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.16.0/dist/sweetalert2.all.min.js"></script>
