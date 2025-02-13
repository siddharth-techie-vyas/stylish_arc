<!-- Modal -->
<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<footer class="app-footer">
		    <div class="container text-center py-3">
		
            <small class="copyright">Developer & Maintained <span class="sr-only">by</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://www.prodhyogiki.com" target="_blank">Prodhyogiki</a> </small>
		       
		    </div>
	    </footer><!--//app-footer-->
	    
    </div><!--//app-wrapper-->    					

    <script>
    let table =     new DataTable('#data-table', { layout: { topStart: { buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5'] } } });
    </script>  
 
    <!-- Javascript -->          
    <script src="<?php echo $base_url;?>theme/assets/plugins/popper.min.js"></script>
    <script src="<?php echo $base_url;?>theme/assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

    <!-- Charts JS -->
    <script src="<?php echo $base_url;?>theme/assets/plugins/chart.js/chart.min.js"></script> 
    <script src="<?php echo $base_url;?>theme/assets/js/index-charts.js"></script> 
    
    <!-- Page Specific JS -->
    <script src="<?php echo $base_url;?>theme/assets/js/app.js"></script> 
    
    <!--- htm2pdf-->
    <script src="<?php echo $base_url;?>library/html2pdf.bundle.min.js"></script>
    
    <!-- custom function -->
    <script src="<?php echo $base_url;?>theme/assets/js/function.js?ver=<?php echo rand(10,9999);?>"></script>  

    

</body>
</html> 
