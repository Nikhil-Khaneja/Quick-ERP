var id = 2;
var baseURL = window.location.origin;
var filePath = '/helper/routing.php';

function deleteProduct(delete_id) {
    var elements = document.getElementsByClassName("product_row");
    if(elements.length != 1) {
        $("#element_" + delete_id).remove();
    }
}
function addProduct() {
    console.log(id);
    $("#product_container").append(
        `<!-- PRODUCT CUSTOM CONTROL -->
        <div class="row product_row" id="element_`+id+`">
            <!-- CATEGORY SELECT -->
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">Category</label>
                    <select id="category_`+id+`" class="form-control category_select">
                        <option disabled selected>Select Category</option>
                        
                    </select>
                </div>
            </div>
            <!-- /CATEGORY SELECT -->
            <!-- PRODUCTS SELECT -->
            <div class="col-md-3">
                <div class="form-group">
                        <label for="">Products</label>
                        <select name="product_id[]" id="product_`+id+`" class="form-control product_select">
                            <option disabled selected>Select Product</option>
                        </select>
                </div>
            </div>
            <!-- /PRODUCTS SELECT -->
            
            <!-- SELLING PRICE -->
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">Selling Price</label>
                    <input type="text" value="0" id="selling_price_`+id+`" class="form-control" disabled>
                </div>
            </div>
            <!-- /SELLING PRICE -->

            <!-- QUANTITY -->
            <div class="col-md-1">
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="text" name="quantity[]" id="quantity_`+id+`" value="0" class="form-control quantity_input">
                </div>
            </div>
            <!-- /QUANTITY -->
            
            <!-- DISCOUNT -->
            <div class="col-md-1">
                <div class="form-group">
                    <label for="">Discount</label>
                    <input type="text" name="discount[]" id="discount_`+id+`" class="form-control discount_input" value="0">
                </div>
            </div>
            <!-- /DISCOUNT -->
            
            <!-- BEGIN: FINAL RATE  -->
            <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Final Rate</label>
                            <input type="text"  class="form-control final_price_input" name= "final_rate[]" id="final_rate_`+id+`" disabled>
                        </div>              
                </div>                    
            <!-- END: FINAL RATE  -->
            <!-- DELETE BUTTON -->
            <div class="col-md-1">
                <button onclick="deleteProduct(`+id+`)" type="button" class="btn btn-danger" style="margin-top: 43%;"> 
                    <i class="far fa-trash-alt"></i>
                </button>
            </div>
            <!-- /DELETE BUTTON -->
        </div>
        <!-- /PRODUCT CUSTOM CONTROL -->`
    );
    
    $.ajax({
        url: baseURL+filePath,
        method: 'POST',
        data:{
            getCategories: true
        },
        dataType: 'json',
        success:function(categories){
            categories.forEach(function (category) {
                //console.log(category.name);
                $("#category_"+id).append(
                    `<option value='${category.id}'>${category.name}</option>`
                );
            });
            id++;
        }
    });
}//add product function ends here

$('#product_container').on('change', '.category_select',function(){
    var element_id = $(this).attr('id').split("_")[1];
    var category_id = this.value;
    $.ajax({
        url: baseURL+filePath,
        method: 'POST',
        data:{
            getProductByCategoryID: true,
            categoryID : category_id
        },
        dataType: 'json',
        success: function(products){
            $("#product_"+element_id).empty();
            $("#product_"+element_id).append('<option disabled selected>Select Product</option>');
            products.forEach(function (product){
                $("#product_"+element_id).append(
                    `<option value='${product.id}'>${product.name}</option>`
                );
            });
        }

    });
});

$('#product_container').on('change', '.product_select',function(){
    var element_id = $(this).attr('id').split("_")[1];
    var product_id = this.value;
    //console.log(product_id)
    // console.log($(this).attr('id'));
    $.ajax({
        url: baseURL+filePath,
        method: 'POST',
        data:{
            getSellingPriceByProductID: true,
            ProductID : product_id
        },
        dataType: 'json',
        success: function(products_selling_rate){
            var price = products_selling_rate[0].selling_rate;
            //console.log(products_selling_rate[0].selling_rate);
            $("#selling_price_"+element_id).attr("value",price);
        }

    });
});

$('#product_container').on('change', '.quantity_input, .discount_input',function(){
    var element_id = $(this).attr('id').split("_")[1];
    
    if($(this).val() == '' || parseInt($(this).val()) <= 0 ){
        $(this).addClass("text-field-error");
        return;
    }
    $(this).removeClass("text-field-error");

    calculateFinalPrice(element_id);
    calculateTotalPrice();
    // console.log(selling_price +" * "+ quantity + " - "+ disperc);   
});


function calculateFinalPrice(element_id){
    selling_price = parseInt($("#selling_price_"+element_id).val());
    disperc = parseInt($("#discount_"+element_id).val());
    quantity = parseInt($("#quantity_"+element_id).val());
    
    price = selling_price * quantity;
    if(disperc >0){
        discount = price * (disperc/100);
        price = price -discount;
    } 
    $("#final_rate_"+element_id).attr("value",price);
    console.log(price);
}

function calculateTotalPrice(){
    console.log($(".final_price_input"));
    totalFinalPrice = 0 ;
    for(i=0; i < $(".final_price_input").length; i++){
        totalFinalPrice += parseInt($(".final_price_input")[i].value);
    }
    $("#final_total").attr("value",totalFinalPrice);
}

$('#check_email').onclick(){
    
}




