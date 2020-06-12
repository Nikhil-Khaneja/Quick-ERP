$(function(){
    $('#add-customer').vaidate({
        rules: {
            'name':{
                required: true
            },
            "email" : {
                "required" : true,
                "maxlength":255,
                "unique" : "email_id",
                "email" : true
            },
            'gst_no' : {
                "required" : true,
                "unique" : "gst_no",
            }
                },
        submitHandler: function (form){
            form.submit();
        }
    })
});