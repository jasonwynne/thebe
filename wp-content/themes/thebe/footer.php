
<?php 
  if(!is_page(array( 'contact', 'client' ))){
    include(TEMPLATEPATH."/featured_work.php");
  } 
?>	

  <div id="footer" class="row line-space-row-bottom">
    <div class="col-md-12">
      <hr>
    </div>	  
    <div class="col-xs-12 footer-copy clearfix">
      <div class="footer-copy-left pull-left">
       <span class="footer-title">Thebe & Co</span><span>&#47;</span>1600 West Lake Street<span>&#47;</span>Minneapolis, MN 55408<span>&#47;</span>612-823-8577
      </div>
      <div class="footer-copyright pull-right">&copy;<?php echo date("Y"); ?> Thebe & Co. Inc. All rights reserved.</div>
    </div>		
  </div>

</div> <!-- end main container from header -->

<div id="video-model" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close model-close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <div class="video-container"></div> 
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<?php wp_footer(); ?>
</body>
</html>