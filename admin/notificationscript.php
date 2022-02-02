  <script>
   $(document).ready(function(){
     setInterval(demo(),5000);
   });
   function demo(){
     $.ajax({
          url: "getnotification.php",
          type: 'POST',
          success: function(result){
             var obj = jQuery.parseJSON(result);
             var op="";
              $.each(obj, function(key,value) {
               op=op+'<a href="test.php?id='+value.notification_id+'" class="dropdown-item preview-item"><div class="preview-thumbnail"><div class="preview-icon bg-success"><i class="mdi mdi-bell mx-0"></i></div></div><div class="preview-item-content"><h6 class="preview-subject font-weight-medium">'+value.notification_title+'</h6><p class="font-weight-light small-text mb-0"></p></div></a>';
              }); 
              $(".op").html(op);
          }
        });
   }
  </script>