 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <!-- Latest compiled JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


 <script>
     const CONTENT_WRAPPER = $('#content-wrapper');

     var last_loaded = null;

     function set_my_ajax_link_listner() {
         $('.my_ajax_link').on('click', (e) => {
             e.preventDefault();
             const page_name = e.target.href;
             load_ajax_page(page_name);
             last_loaded = page_name;
             //  console.log(last_loaded);
         });
     }

     function load_ajax_page(page_name = "/ajax/a") {
         CONTENT_WRAPPER.load(page_name, () => {
                set_my_ajax_link_listner();
         });
     }

     function go_back() {
         console.log(1);
         if (last_loaded == null) {
             load_ajax_page();
         } else {
             load_ajax_page(last_loaded);
         }
     }



     $(document).ready(function() {
         set_my_ajax_link_listner();
         load_ajax_page();
     });

     function post_request(element) {
         $.ajax({
             url: element.action,
             method: 'post',
             data: $(element).serialize(),
             success: (response) => {
                 CONTENT_WRAPPER.html(response);
             },
             error: () => {
                 alert('Error From Server\n Try again after sometime');
             }
         });
         return false;
     }


     //testing copy js from as


    //table js for appending and deleting new tr in table for enrollment field
    function deleteRow(row) {
        var i = row.parentNode.parentNode.rowIndex;
        if (i > 1) {
            document.getElementById('createbatchtable').deleteRow(i);
        }
    }

    function NewRow(e) {

        e = e || window.event;

        if (e.keyCode == 13) {
            insRow();
        }
    }

    function insRow() {

        var x = document.getElementById('createbatchtable');
        var y = document.getElementById('batchdetails');

        var len = x.rows.length;
        var new_row = x.rows[len - 1].cloneNode(true);

        new_row.cells[0].innerHTML =
            '<button class="btn" type="button" onclick="deleteRow(this)"><i class="fa fa-window-close" aria-hidden="true"></i> ' +
            len + '</button>'; //auto increment the srno

        new_row.cells[1].getElementsByTagName('input')[0].value = "";
        new_row.cells[2].getElementsByTagName('input')[0].value = "";

        y.appendChild(new_row);
        new_row.cells[1].getElementsByTagName('input')[0].focus();

    }

    function nextItem(e) {

        e = e || window.event;

        if (e.keyCode == 13) {
            insRow();
        }
    }


 </script>
