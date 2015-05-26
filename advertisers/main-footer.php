 <footer class="main-footer">

        <div class="pull-right hidden-xs">

          <b>Version</b> 2.0

        </div>

        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Postslinks</a>.</strong> All rights reserved.

      </footer>



    </div><!-- ./wrapper -->



    <!-- jQuery 2.1.3 -->

    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>

    <!-- Bootstrap 3.3.2 JS -->

    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- FastClick -->

    <script src='../plugins/fastclick/fastclick.min.js'></script>

    <!-- AdminLTE App -->

    <script src="../dist/js/app.min.js" type="text/javascript"></script>

    <!-- Sparkline -->

    <script src="../plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>

     <!-- daterangepicker -->

    <script src="../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

    <!-- datepicker -->

    <script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

    <!-- iCheck -->

    <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>

    <!-- SlimScroll 1.3.0 -->

    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>

 
    <!-- AdminLTE for demo purposes -->

    <script src="../dist/js/demo.js" type="text/javascript"></script>

 <!-- CK Editor  -->
<script type="text/javascript" src="../plugins/ckeditor/ckeditor.js"></script>
 <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
           var editor =  CKEDITOR.replace( 'ckeditor',{
                uiColor: '#222D32',
                width : 1000,
                height : 500

});

editor.addCommand("mySimpleCommand", { // create named command
    exec: function(edt) {
     var desription=CKEDITOR.instances.ckeditor.getData(); 
     
        $.ajax({
        method: "POST",
        url: "../api/sppiner_api/api",
        data:{ cdata:desription}
        })
       .done(function( msg ) {
        CKEDITOR.instances.ckeditor.setData(msg); 
       });



       
       
    }
});

editor.ui.addButton('SuperButton', { // add new button and bind our command
    label: "Spine",
    command: 'mySimpleCommand',
    toolbar: 'insert',
    icon: 'http://www.gravatar.com/avatar/0071bb3cab29daadca87535bd7b287e3?s=48&d=wavatar'
});

           editor.on( 'change', function( evt ) {
    // getData() returns CKEditor's HTML content.
    console.log( 'Total bytes: ' + evt.editor.getData());
});
  </script>



      <!-- wysihtml5 Editor  -->

<link rel="stylesheet" type="text/css" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css"></link>
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.js"></script>
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script type="text/javascript">
    $('#wys').wysihtml5();
</script>


  </body>

</html>