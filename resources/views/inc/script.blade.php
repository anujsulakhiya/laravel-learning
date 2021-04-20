 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <!-- Latest compiled JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


 <script>
     var last_loaded = null;

     function load_ajax_page(page_name = "/ajax/a") {

         $('#content-wrapper').load(page_name);
     }

     function go_back() {
         console.log(1);
         if (last_loaded == null) {
             load_ajax_page();
         } else {
             load_ajax_page(last_loaded);
         }
     }

     function set_my_ajax_link_listner() {
         $('.my_ajax_link').on('click', (e) => {
             e.preventDefault();
             const page_name = e.target.href;
             load_ajax_page(page_name);
             last_loaded = page_name;
             //  console.log(last_loaded);
         });
     }

     $(document).ready(function() {

         set_my_ajax_link_listner();
         load_ajax_page();

     });

     const post_request = (element) => {
         console.log(element);

         $.post(url, function(){

         });
 
     }
    //  return false;
    //  }

 </script>
