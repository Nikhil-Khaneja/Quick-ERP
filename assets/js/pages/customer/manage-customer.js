// Data table ka pura kaisa chalega vo yaha rakha hai js 
var TableDatatables = function(){
    var handleCustomerTable = function(){
        var manageCustomerTable = $("#manage-customer-table");
        var baseURL = window.location.origin;
        var filepath = "/helper/routing.php";//yaha slash daalna padh rh hai bcoz base url se nhi aa rha 
        var oTable = manageCustomerTable.DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: baseURL+filepath,
                type: "POST",
                data:
                {
                    "page": "manage_customer"
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
            handleCustomerTable();
        } 
    }
}();

jQuery(document).ready(function(){
    TableDatatables.init();
});