<script src="{{ URL::to('js/lib/jquery.min.js')}}"></script>
    <!-- jquery vendor -->
    <script src="{{ URL::to('js/lib/jquery.nanoscroller.min.js')}}"></script>
    <!-- nano scroller -->
    <script src="{{ URL::to('js/lib/menubar/sidebar.js')}}"></script>
    <script src="{{ URL::to('js/lib/preloader/pace.min.js')}}"></script>
    <!-- sidebar -->
    <script src="{{ URL::to('js/lib/bootstrap.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{ URL::to('js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
    <script src="{{ URL::to('js/lib/weather/weather-init.js')}}"></script>
    <script src="{{ URL::to('js/lib/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{ URL::to('js/lib/circle-progress/circle-progress-init.js')}}"></script>
    <script src="{{ URL::to('js/lib/chartist/chartist.min.js')}}"></script>
    <script src="{{ URL::to('js/lib/chartist/chartist-init.js')}}"></script>
    <script src="{{ URL::to('js/lib/sparklinechart/jquery.sparkline.min.js')}}"></script>
    <script src="{{ URL::to('js/lib/sparklinechart/sparkline.init.js')}}"></script>
    <script src="{{ URL::to('js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{ URL::to('js/lib/owl-carousel/owl.carousel-init.js')}}"></script>
    <script src="{{ URL::to('js/scripts.js')}}"></script>

<script src="{{ URL::to('js/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::to('js/dataTables.bootstrap.min.js')}}"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>


<script type="text/javascript">
    window.onload = function () {
        //Reference the DropDownList.
        let dateDropdowns = document.getElementById('date-dropdowns'); 
       
  let currentYear = new Date().getFullYear();    
 // let earliestYear = 1950;     
 for (var i = 1950; i <= currentYear; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;        
    dateDropdowns.add(option);      
     
  }
    };

    let dateDropdown = document.getElementById('date-dropdown'); 
       
  let currentYear = new Date().getFullYear();    
 // let earliestYear = 1950;     
  for (var i = 1950; i <= currentYear; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;        
    dateDropdown.add(option);      
     
  }
</script>

<script type='text/javascript'>
    jQuery(document).ready(function(){
      $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
      var base_url = '<?php echo url('/'); ?>';
     jQuery('#carmake_id').change(function(){
        var pid = $(this).val();
        //alert(pid,base_url+'/dropdownmodel');
        var token = $('input[name="_token"]').val();
        jQuery.ajax({
          url:base_url+'/dropdownmodel',
          method: 'POST',
          data:{pid:pid,_token:token},
          success: function(result){
            $('#model_id').empty();
            $("#model_id").append('<option> Please select </option>');
            if(result){
                $.each(result,function(i,items){
                    $('#model_id').append($("<option/>", {
                       value: items.id,
                       text: items.name
                    }));
                });
            }
            //console.log(result);
          }});
      });
     $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
      var base_url = '<?php echo url('/'); ?>';
     jQuery('#bikemake_id').change(function(){
        var pid = $(this).val();
        //alert(base_url+'/dropdownmodels');
        var token = $('input[name="_token"]').val();
        jQuery.ajax({
          url:base_url+'/dropdownmodels',
          method: 'POST',
          data:{pid:pid,_token:token},
          success: function(result){
            $('#model_ids').empty();
            $("#model_ids").append('<option value="0"> Please select </option>');
            if(result){
                $.each(result,function(i,items){
                    $('#model_ids').append($("<option/>", {
                       value: items.id,
                       text: items.name
                    }));
                });
            }
            //console.log(result);
          }});
      });
  });
</script>

    </body>
    

</html>