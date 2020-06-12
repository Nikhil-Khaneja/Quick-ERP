var TableDatatables = function(){
    var handleProductTable = function(){
        var manageProductTable = $("#manage-product-table");
        var baseURL = window.location.origin;
        var filepath = "/helper/routing.php";//yaha slash daalna padh rh hai bcoz base url se nhi aa rha 
        var oTable = manageProductTable.DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: baseURL+filepath,
                type: "POST",
                data:
                {
                    "page": "manage_product"
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
        manageProductTable.on('click','.edit',function(e)
        {
            //alert("hello");
            var id = $(this).data('id');
            $("#edit_product_id").val(id);

            //fetching all other values from the database using ajax and loading them onto their resp fields in modal

            $.ajax({
                url: baseURL + filepath,
                method: "POST",
                data: {
                    "product_id" : id,
                    "fetch" : "product"
                },
                dataType: "json",
                success: function(data){
                    console.log(data);
                    $("#edit_product_name").val(data.name);
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
            handleProductTable();
        } 
    }
}();

jQuery(document).ready(function(){
    TableDatatables.init();
});