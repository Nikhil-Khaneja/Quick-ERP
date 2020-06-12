var TableDatatables = function(){
    var handleCategoryTable = function(){
        var manageCategoryTable = $("#manage-category-table");
        var baseURL = window.location.origin;
        var filepath = "/helper/routing.php";//yaha slash daalna padh rh hai bcoz base url se nhi aa rha 
        var oTable = manageCategoryTable.DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: baseURL+filepath,
                type: "POST",
                data:
                {
                    "page": "manage_category"
                }
            },
            "lengthMenu": [
                [5,15,25,-1],
                [5,15,25, "All"]
            ],
            "order": [
                [1, "desc"]
            ],
            "columnDefs": [
                { 
                    'orderable': false,
                    'targets': [0,-1]
                }
            ]

        });
        manageCategoryTable.on('click','.edit',function(e)
        {
            //alert("hello");
            var id = $(this).data('id');
            $("#edit_category_id").val(id);

            //fetching all other values from the database using ajax and loading them onto their resp fields in modal

            $.ajax({
                url: baseURL + filepath,
                method: "POST",
                data: {
                    "category_id" : id,
                    "fetch" : "category"
                },
                dataType: "json",
                success: function(data){
                    console.log(data);
                    $("#edit_category_name").val(data.name);
                }
            })
        });
        new $.fn.dataTable.Buttons( oTable, {
            buttons: [
                'copy', 'csv', 'pdf'
            ]
        } );
         
        oTable.buttons().container()
            .appendTo( $('#export-buttons') );
    }
    return {
        //main function to handle all the datatables
        init: function() {
            handleCategoryTable();
        } 
    }
}();

jQuery(document).ready(function(){
    TableDatatables.init();
});