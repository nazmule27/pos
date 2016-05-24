//breakdown the labels into single character spans
$(".flp label").each(function(){
    var sop = '<span class="ch">'; //span opening
    var scl = '</span>'; //span closing
    //split the label into single letters and inject span tags around them
    $(this).html(sop + $(this).html().split("").join(scl+sop) + scl);
    //to prevent space-only spans from collapsing
    $(".ch:contains(' ')").html("&nbsp;");
})

//animation time
$(".flp input").focus(function(){
    //calculate movement for .ch = half of input height
    var tm = $(this).outerHeight()/2 *-1 + "px";
    //label = next sibling of input
    //to prevent multiple animation trigger by mistake we will use .stop() before animating any character and clear any animation queued by .delay()
    $(this).next().addClass("focussed").children().stop(true).each(function(i){
        d = i*50;//delay
        $(this).delay(d).animate({top: tm}, 200, 'easeOutBack');
    })
})
$(".flp input, .flp textarea").blur(function(){
    //animate the label down if content of the input is empty
    if($(this).val() == "")
    {
        $(this).next().removeClass("focussed").children().stop(true).each(function(i){
            d = i*50;
            $(this).delay(d).animate({top: 0}, 500, 'easeInOutBack');
        })
    }
})
var x=document.getElementById('invoiceTable')
if(typeof x !== 'undefined' && x !== null) {
    var xt=x.getElementsByTagName('tbody')[0];
    var counter = xt.rows.length;
}
$(".flp textarea").focus(function(){
    //calculate movement for .ch = half of input height
    var tm = $(this).outerHeight()/3 *-1 + "px";
    //label = next sibling of input
    //to prevent multiple animation trigger by mistake we will use .stop() before animating any character and clear any animation queued by .delay()
    $(this).next().addClass("focussed").children().stop(true).each(function(i){
        d = i*30;//delay
        $(this).delay(d).animate({top: tm}, 200, 'easeOutBack');
    })
})
//var counter=1;


$('#stock_pay').dataTable( {
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "pagingType": "full_numbers",
    "order": [[ 8, "desc" ]],
    "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ?
            i.replace(/[\$,]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
        };

        // Total over all pages
        totalTaka = api
            .column( 3 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageTotalTaka = api
            .column( 3, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 3 ).footer() ).html(
            pageTotalTaka +' ('+ totalTaka +')'
        );
        //
        // Total over all pages
        totalDiscount = api
            .column( 4 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageTotalDiscount = api
            .column( 4, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 4 ).footer() ).html(
            pageTotalDiscount+' ('+ totalDiscount+')'
        );
        //
        // Total over all pages
        totalTakaSelling = api
            .column( 5 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageTotalTakaSelling = api
            .column( 5, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 5 ).footer() ).html(
            pageTotalTakaSelling +' ('+ totalTakaSelling +')'
        );
        //
        // Total over all pages
        totalPaid = api
            .column( 6 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageTotalPaid = api
            .column( 6, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 6 ).footer() ).html(
            pageTotalPaid+' ('+ totalPaid  +')'
        );
        //
        // Total over all pages
        totalDue = api
            .column( 7 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageTotalDue = api
            .column( 7, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 7 ).footer() ).html(
            pageTotalDue+' ('+ totalDue +')'
        );
    }
});
$('#payment').dataTable( {
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "pagingType": "full_numbers",
    "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ?
            i.replace(/[\$,]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
        };
        totalAmount = api
            .column( 3 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        pageTotaAmount = api
            .column( 3, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        $( api.column( 3 ).footer() ).html(
            pageTotaAmount +' ('+ totalAmount +')'
        );
    }
});
$('#category').dataTable( {
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "pagingType": "full_numbers",
});
$('#product').dataTable( {
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "pagingType": "full_numbers",
    "order": [[ 0, "asc" ], [ 1, "asc" ]]
});
$('#consumer').dataTable( {
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "pagingType": "full_numbers",
});
/*$('#stock').dataTable( {
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "pagingType": "full_numbers",
    drawCallback: function () {
        var api = this.api();
        api.table().footer().to$().html(
            api.column( 3, {page:'buying_price'} ).data().sum()
        );
    }
});*/
/*var table = $('#stock').dataTable();
table.column(3).data().sum();*/


$.fn.dataTable.Api.register( 'column().data().sum()', function () {
    return this.reduce( function (a, b) {
        var x = parseFloat( a ) || 0;
        var y = parseFloat( b ) || 0;
        return x + y;
    } );
} );

$('#stock').dataTable( {
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "pagingType": "full_numbers",
    "order": [[ 7, "desc" ]],
    "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ?
            i.replace(/[\$,]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
        };

        // Total over all pages
        totalTaka = api
            .column( 2 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageTotalTaka = api
            .column( 2, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 2 ).footer() ).html(
            parseFloat(pageTotalTaka).toFixed(2) +' ('+ parseFloat(totalTaka).toFixed(2) +')'
        );
        //
        // Total over all pages
        totalTakaSelling = api
            .column( 3 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageTotalTakaSelling = api
            .column( 3, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 3 ).footer() ).html(
            parseFloat(pageTotalTakaSelling).toFixed(2) +' ('+ parseFloat(totalTakaSelling).toFixed(2) +')'
        );
        //
        // Total over all pages
        totalQuantity = api
            .column( 4 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageTotalQuantity = api
            .column( 4, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 4 ).footer() ).html(
            parseFloat(pageTotalQuantity).toFixed(2)  +' ('+ parseFloat(totalQuantity).toFixed(2)+')'
        );
        //
        netTotalTaka = api
            .column( 5 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageNetTotalTaka = api
            .column( 5, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 5 ).footer() ).html(
            parseFloat(pageNetTotalTaka).toFixed(2) +' ('+ parseFloat(netTotalTaka).toFixed(2) +')'
        );
        //
        // Total over all pages
        netTotalTakaSelling = api
            .column( 6 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageNetTotalTakaSelling = api
            .column( 6, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 6 ).footer() ).html(
            parseFloat(pageNetTotalTakaSelling).toFixed(2) +' ('+ parseFloat(netTotalTakaSelling).toFixed(2) +')'
        );
    }
});

$('#sales').dataTable( {
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "pagingType": "full_numbers",
    "order": [[ 8, "desc" ]],
    "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ?
            i.replace(/[\$,]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
        };

        // Total over all pages
        totalTaka = api
            .column( 2 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageTotalTaka = api
            .column( 2, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 2 ).footer() ).html(
            pageTotalTaka +' ('+ totalTaka +')'
        );
        //
        // Total over all pages
        totalWDiscount = api
            .column( 3 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageTotalWDiscount = api
            .column( 3, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 3 ).footer() ).html(
            pageTotalWDiscount +' ('+ totalWDiscount +')'
        );
        //
        //
        // Total over all pages
        totalDiscount = api
            .column( 4 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageTotalDiscount = api
            .column( 4, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 4 ).footer() ).html(
            pageTotalDiscount +' ('+ totalDiscount +')'
        );
        //
        // Total over all pages
        totalTakaSelling = api
            .column( 5 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageTotalTakaSelling = api
            .column( 5, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 5 ).footer() ).html(
            pageTotalTakaSelling +' ('+ totalTakaSelling +')'
        );
        //
        // Total over all pages
        totalPaid = api
            .column( 6 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageTotalPaid = api
            .column( 6, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 6 ).footer() ).html(
            pageTotalPaid +' ('+ totalPaid +')'
        );
    }
});
$('#expense').dataTable( {
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "pagingType": "full_numbers",
    "order": [[3, "desc"]],
    "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ?
            i.replace(/[\$,]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
        };
        totalExpense = api
            .column( 2 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        pageTotalExpense = api
            .column( 2, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        $( api.column( 2 ).footer() ).html(
            pageTotalExpense +' ('+ totalExpense +')'
        );
    }
});
$('#loan').dataTable( {
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "pagingType": "full_numbers",
    "order": [[7, "desc"]],
    "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ?
            i.replace(/[\$,]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
        };
        totalLoan = api
            .column( 1 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        pageTotalLoan = api
            .column( 1, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        $( api.column( 1 ).footer() ).html(
            pageTotalLoan  +' ('+ totalLoan +')'
        );
        //
        owing = api
            .column( 6 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        pageOwing = api
            .column( 6, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        $( api.column( 6 ).footer() ).html(
            pageOwing  +' ('+ owing +')'
        );
    }
});
/*$('#installment').dataTable( {
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "pagingType": "full_numbers",
}).columnFilter({
    aoColumns: [
        {type: "select"},
    ]
});*/
/*
$('#installment').DataTable( {
    drawCallback: function () {
        var api = this.api();
        api.table().footer().to$().html(
            api.column( 2, {page:'current'} ).data().sum()
        );
    }
} );*/

$('#installment').DataTable( {
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "pagingType": "full_numbers",
    "order": [[4, "desc"]],
    "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ?
            i.replace(/[\$,]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
        };

        // Total over all pages
        totalTaka = api
            .column( 1 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageTotalTaka = api
            .column( 1, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 1 ).footer() ).html(
            pageTotalTaka +' ('+ totalTaka +')'
        );
        //
        // Total over all pages
        totalIns = api
            .column( 2 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageTotalIns = api
            .column( 2, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 2 ).footer() ).html(
            pageTotalIns +' ('+ totalIns +')'
        );
    }
});
$('#balanced').dataTable( {
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "pagingType": "full_numbers",
    "order": [[5, "desc"]],
    "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ?
            i.replace(/[\$,-]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
        };
        totalDr = api
            .column( 3 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        pageTotaDr = api
            .column( 3, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        $( api.column( 3 ).footer() ).html(
            pageTotaDr +' ('+ totalDr +')'
        );
        //
        totalCr = api
            .column( 4 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        pageTotaCr = api
            .column( 4, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        $( api.column( 4 ).footer() ).html(
            pageTotaCr +' ('+ totalCr +')'
        );


        $( api.column( 5 ).footer() ).html(
            'Balance = '+(pageTotaCr-pageTotaDr) +' ('+ (totalCr-totalDr) +')'
        );
    }
});
$('#sheet').dataTable( {
    /*"processing": true,
    "serverSide": true,
    "ajax": "/balance",*/
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "pagingType": "full_numbers",
    "order": [[5, "desc"]],
    "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ?
            i.replace(/[\$,-]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
        };
        totalDr = api
            .column( 3 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        pageTotaDr = api
            .column( 3, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        $( api.column( 3 ).footer() ).html(
            pageTotaDr +' ('+ totalDr +')'
        );
        //
        totalCr = api
            .column( 4 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        pageTotaCr = api
            .column( 4, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );
        $( api.column( 4 ).footer() ).html(
            pageTotaCr +' ('+ totalCr +')'
        );


        $( api.column( 5 ).footer() ).html(
            'Balance = '+(pageTotaCr-pageTotaDr) +' ('+ (totalCr-totalDr) +')'
        );
    }
});
$('#stock_pid').on('change',function(e){
    var pid = e.target.value;
    $.get('/ajax-product-stock?pid='+pid, function(data){
        $('#stock_buying_price').value='';
        $('#stock_selling_price').value='';
        $.each(data, function(index, productObj){
            document.getElementById('stock_buying_price').value = productObj.buying_price;
            document.getElementById('stock_selling_price').value = productObj.selling_price;
            document.getElementById('p_name').value = $('#stock_pid').find(":selected").text();
        });
    });
    stockQuantityChange();
});
$('#ptid').on('change',function(e){
    var pid = e.target.value;
    document.getElementById('payment_title').value = $('#ptid').find(":selected").text();
});

$('#lid').on('change',function(e){
    var lid = e.target.value;
    $.get('/ajax-loan-installment?lid='+lid, function(data){
        $('#installment_amount').value='';
        $('#loan_title_name').value='';
        $.each(data, function(index, productObj){
            document.getElementById('installment_amount').value = productObj.installment_taka;
            document.getElementById('loan_title_name').value = $('#lid').find(":selected").text();
        });
    });
});
function getProduct(e){
    var cid = e;
    $.get('/ajax-product?cid='+cid, function(data){
        $('#stock_pid').empty();
        $('#stock_pid').append('<option value="">Select Product</option>');
        $.each(data, function(index, productObj){
            $('#stock_pid').append('<option value="'+productObj.pid+'">'+productObj.p_name+'</option>');
        });
    });
}

function stockQuantityChange(){
    var stock_buying_price = document.getElementById('stock_buying_price');
    var stock_quantity= document.getElementById('stock_quantity');
    var stock_total_price= document.getElementById('stock_total_price');
    if (stock_quantity.value!='') {
        stock_total_price.value=((stock_buying_price.value)*(stock_quantity.value)).toFixed(2);
    }
    stockDiscountChange();
}
function stockDiscountChange(){
    var stock_discount = document.getElementById('stock_discount');
    var stock_net_price= document.getElementById('stock_net_price');
    var stock_total_price= document.getElementById('stock_total_price');
    if (stock_discount.value!='') {
        stock_net_price.value=(stock_total_price.value)-(stock_discount.value);
    }
    stockPaidChange();
}
function stockPaidChange(){
    var stock_paid = document.getElementById('stock_paid');
    var stock_due= document.getElementById('stock_due');
    var stock_net_price= document.getElementById('stock_net_price');
    if (stock_paid.value!='') {
        stock_due.value=(stock_net_price.value)-(stock_paid.value);
    }
}

function getSalesProduct(obj, e){
    var tableIndex = obj.replace( /\D+/g, '');
    var cid = e;
    $.get('/ajax-product?cid='+cid, function(data){
        $('#productName'+(tableIndex)).empty();
        $('#productName'+(tableIndex)).append('<option value="">Select Product</option>');
        $.each(data, function(index, productObj){
            $('#productName'+(tableIndex)).append('<option value="'+productObj.pid+'">'+productObj.p_name+'</option>');
        });
    });
    $("#productName"+(tableIndex)).focus();
}
function getPrice(id, e){
    var tableIndex = id.replace( /\D+/g, '');
    var pid = e;
    $.get('/ajax-product-price?pid='+pid, function(data){
        document.getElementById('buying_price'+(tableIndex)).value = '';
        document.getElementById('price'+(tableIndex)).value = '';
        document.getElementById('available'+(tableIndex)).value = '';
        document.getElementById('products'+(tableIndex)).value = '';
        document.getElementById('quantity'+(tableIndex)).value = '';
        $.each(data, function(index, productObj){
            document.getElementById('buying_price'+(tableIndex)).value = productObj.buying_price;
            document.getElementById('price'+(tableIndex)).value = productObj.selling_price;
            document.getElementById('available'+(tableIndex)).value = productObj.quantity;
            document.getElementById('products'+(tableIndex)).value = $('#productName'+(tableIndex)).find(":selected").text();
        });
    });
    $('#productName'+(tableIndex)).removeClass('error');
    $("#quantity"+(tableIndex)).focus();
    //quantityChange(id);
}

function quantityChange(id) {
    var  id = id.replace( /\D+/g, '');

    var buying_price = document.getElementById('buying_price'+id);
    var price = document.getElementById('price'+id);
    var amount= document.getElementById('amount'+id);
    var quantity= document.getElementById('quantity'+id);
    var available= document.getElementById('available'+id);
    var total_price= document.getElementById('total_price');
    var totalAmountVat= document.getElementById('totalAmountVat');
    var vat= document.getElementById('vat');
    var net_bought_price= document.getElementById('net_bought_price');

    if (quantity!==null) {
        if (quantity.value!=='') {
            amount.value=((price.value)*(quantity.value)).toFixed(2);
        }
        else {
            amount.value='';
            total_price.value='';
        }
    }

    var subV=0;
    var totalB=0;
    for(var i=1; i<=counter; i++ ) {
        var am_count=document.getElementById('amount'+i);
        if(typeof am_count !== 'undefined' && am_count !== null) {
            subV = parseFloat(subV) + parseFloat(document.getElementById('amount' + i).value);
            totalB = parseFloat(totalB) + ((parseFloat(document.getElementById('buying_price' + i).value)) * (parseFloat(document.getElementById('quantity' + i).value)));
        }
    }

    total_price.value=subV;
    net_bought_price.value=totalB.toFixed(2);

    if (quantity!==null) {
        if (quantity.value!='') {
            totalAmountVat.value=parseFloat(total_price.value)+parseFloat(vat.value);
        }
        else {
            totalAmountVat.value='';
        }
        if (parseInt(quantity.value)>parseInt(available.value)) {
            $('#quantity'+(id)).addClass('error');
        }
        else if (parseInt(quantity.value)<=parseInt(available.value)) {
            $('#quantity'+(id)).removeClass('error');
        }
    }

    vatChange();
    discountChange();
    paidChange();

};

function vatChange() {
    var totalAmountVat= document.getElementById('totalAmountVat');
    var vat= document.getElementById('vat');
    var total_price= document.getElementById('total_price');

    if (total_price.value!='') {
        totalAmountVat.value=(parseFloat(total_price.value)+(parseFloat(vat.value))*(parseFloat(total_price.value))/100).toFixed(0);
    }
    else {
        totalAmountVat.value='';
    }
    discountChange();
    paidChange();
};
function discountChange() {
    var discountAmount= document.getElementById('discountAmount');
    var discount= document.getElementById('discount');
    var totalAmountVat= document.getElementById('totalAmountVat');

    if (discount.value!='') {
        //discountAmount.value=(parseInt(totalAmountVat.value)-(((parseInt(discount.value))*(parseInt(totalAmountVat.value)))/100)).toFixed(2);
        discountAmount.value=((totalAmountVat.value)-(((discount.value)))).toFixed(0);
    }
    else {
        discountAmount.value='';
    }
    paidChange();
};
function paidChange() {
    var paid= document.getElementById('paid');
    var dues= document.getElementById('dues');
    var discountAmount= document.getElementById('discountAmount');
    var net_bought_price= document.getElementById('net_bought_price');
    var net_profit= document.getElementById('net_profit');

    if (discountAmount.value!='') {
        dues.value=((discountAmount.value)-((paid.value))).toFixed(0);
        net_profit.value=((discountAmount.value)-((net_bought_price.value))).toFixed(0);
    }
    else {
        dues.value='';
        net_profit.value='';
    }
};
function stockGetPrice(id, e){
    var tableIndex = id.replace( /\D+/g, '');
    var pid = e;
    $.get('/ajax-stock-product-price?pid='+pid, function(data){
        document.getElementById('buying_price'+(tableIndex)).value = '';
        document.getElementById('price'+(tableIndex)).value = '';
        document.getElementById('quantity'+(tableIndex)).value = '';
        $.each(data, function(index, productObj){
            document.getElementById('buying_price'+(tableIndex)).value = productObj.buying_price;
            document.getElementById('price'+(tableIndex)).value = productObj.selling_price;
        });
    });
    $('#productName'+(tableIndex)).removeClass('error');
    $("#quantity"+(tableIndex)).focus();
    //quantityChange(id);
}
function stockQuantityChange(id) {
    var  id = id.replace( /\D+/g, '');
    var buying_price = document.getElementById('buying_price'+id);
    var amount= document.getElementById('amount'+id);
    var quantity= document.getElementById('quantity'+id);
    var total_price= document.getElementById('total_price');
    var vat= document.getElementById('vat');

    if(quantity!==null){
        if (quantity.value!='') {
            amount.value=(buying_price.value)*(quantity.value);
        }
        else {
            amount.value='';
            total_price.value='';
        }
    }
    var subV=0;
    for(var i=1; i<=counter; i++ ) {
        var st_count=document.getElementById('amount'+i);
        if(typeof st_count !== 'undefined' && st_count !== null) {
            subV=parseInt(subV)+parseInt(document.getElementById('amount'+i).value);
        }
    }
    total_price.value=subV;

    stockDiscountChange();
    stockPaidChange();
};
function stockDiscountChange() {
    var discountAmount= document.getElementById('discountAmount');
    var discount= document.getElementById('discount');
    var total_price= document.getElementById('total_price');

    if (discount.value!='') {
        //discountAmount.value=(parseInt(totalAmountVat.value)-(((parseInt(discount.value))*(parseInt(totalAmountVat.value)))/100)).toFixed(2);
        discountAmount.value=((total_price.value)-(((discount.value)))).toFixed(0);
    }
    else {
        discountAmount.value='';
    }
    stockPaidChange();
};
function stockPaidChange() {
    var paid= document.getElementById('paid');
    var dues= document.getElementById('dues');
    var discountAmount= document.getElementById('discountAmount');

    if (discountAmount.value!='') {
        dues.value=((discountAmount.value)-((paid.value))).toFixed(0);
    }
    else {
        dues.value='';
    }
};
function insRow()
{
    var x=document.getElementById('invoiceTable').getElementsByTagName('tbody')[0];
    var new_row = x.rows[0].cloneNode(true);
    var len = counter+1;
    //var len = x.rows.length+1;

    //new_row.cells[0].innerHTML = len;

    var inp0 = new_row.cells[0].getElementsByTagName('select')[0];
    inp0.id=(inp0.id).substring(0, 8);
    inp0.id += len;
    inp0.name=inp0.id;
    inp0.value = '';
    var inp1 = new_row.cells[1].getElementsByTagName('select')[0];
    inp1.id=(inp1.id).substring(0, 11);
    inp1.id += len;
    inp1.name=inp1.id;
    inp1.value = '';
    var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
    inp2.id=(inp2.id).substring(0, 12);
    inp2.id += len;
    inp2.name=inp2.id;
    inp2.value = '';
    var inp3 = new_row.cells[3].getElementsByTagName('input')[0];
    inp3.id=(inp3.id).substring(0, 5);
    inp3.id += len;
    inp3.name=inp3.id;
    inp3.value = '';
    var inp4 = new_row.cells[4].getElementsByTagName('input')[0];
    inp4.id=(inp4.id).substring(0, 8);
    inp4.id += len;
    inp4.name=inp4.id;
    inp4.value = '';
    var inp5 = new_row.cells[5].getElementsByTagName('input')[0];
    inp5.id=(inp5.id).substring(0, 9);
    inp5.id += len;
    inp5.name=inp5.id;
    inp5.value = '';
    var inp6 = new_row.cells[6].getElementsByTagName('input')[0];
    inp6.id=(inp6.id).substring(0, 6);
    inp6.id += len;
    inp6.name=inp6.id;
    inp6.value = '';
    var inp7 = new_row.cells[7].getElementsByTagName('input')[0];
    inp7.id=(inp7.id).substring(0, 8);
    inp7.id += len;
    inp7.name=inp7.id;
    inp7.value = '';

    x.appendChild( new_row );

    $('#'+inp0.id).focus();
    counter=counter+1;
};
function KeyPress(e) {
    var evtobj = window.event? event : e
    if (evtobj.keyCode == 77 && evtobj.ctrlKey){
        insRow();
    }
}
document.onkeydown = KeyPress;
function deleteRowStock(row)
{
    var i=row.parentNode.parentNode.rowIndex;
    if(i>1){
        document.getElementById('invoiceTable').deleteRow(i);
    }
    var id='amount'+counter;
    stockQuantityChange(id);
};
function deleteRow(row)
{
    var i=row.parentNode.parentNode.rowIndex;
    if(i>1){
        document.getElementById('invoiceTable').deleteRow(i);
    }
    var id='amount'+counter;
    quantityChange(id);
};
function stockDuePaidChange(){
    var pay_net_price = document.getElementById('pay_net_price');
    var pay_old_paid= document.getElementById('pay_old_paid');
    var pay_paid= document.getElementById('pay_paid');
    var pay_due= document.getElementById('pay_due');
    if (pay_paid.value!='') {
        pay_due.value=(pay_net_price.value)-(parseInt(pay_old_paid.value)+parseInt(pay_paid.value));
    }
}
$(function() {
    var cn=document.getElementById('customerName');
    if(typeof cn !== 'undefined' && cn !== null) {
        cn.onkeydown = function(event) {
            if (event.keyCode == 13) {
                if(customerName.value==null||customerName.value==''||customerName.value==undefined){
                    $("#customerName").focus();
                    return false
                }
                else {
                    $("#address").focus();
                    return false
                }
            }
        }
    }
    var ca=document.getElementById('address');
    if(typeof ca !== 'undefined' && ca !== null) {
        ca.onkeydown = function(event) {
            if (event.keyCode == 13) {
                $("#category1").focus();
                return false
            }
        }
    }

});

function validateForm() {
    var product_arr = [];
    var rowCount =$('#sales-table tr').length;
    for(var i=1; i<rowCount; i++){
        var quantity = document.getElementById('quantity'+i).value;
        var available = document.getElementById('available'+i).value;
        if (available == null || available == "" || parseFloat(quantity)>parseFloat(available)||parseFloat(quantity)<0.001) {
            $("#quantity"+i).focus();
            $('#quantity'+i).addClass('error');
            return false;
        }
        product_arr.push(document.getElementById('productName'+i).value);
    }

    for(var i = 0; i <= product_arr.length; i++) {
        for(var j = i; j <= product_arr.length; j++) {
            if(i != j && product_arr[i] == product_arr[j]) {
                $('#productName'+(j+1)).addClass('error');
                $('#productName'+(j+1)).focus();
                return false;
            }
        }
    }
    var discountAmount = document.getElementById('discountAmount').value;
    var dues = document.getElementById('dues').value;
    if (discountAmount<1) {
        $("#discount").focus();
        $('#discount').addClass('error');
        return false;
    }
    if (dues<0) {
        $("#paid").focus();
        $('#paid').addClass('error');
        return false;
    }
}

function validateFormStock() {
    var product_arr = [];
    var rowCount =$('#sales-table tr').length;
    for(var i=1; i<rowCount; i++){
        var quantity = document.getElementById('quantity'+i).value;
        var available = document.getElementById('available'+i).value;
        product_arr.push(document.getElementById('productName'+i).value);
    }

    for(var i = 0; i <= product_arr.length; i++) {
        for(var j = i; j <= product_arr.length; j++) {
            if(i != j && product_arr[i] == product_arr[j]) {
                $('#productName'+(j+1)).addClass('error');
                $('#productName'+(j+1)).focus();
                return false;
            }
        }
    }
    var discountAmount = document.getElementById('discountAmount').value;
    var dues = document.getElementById('dues').value;
    if (discountAmount<1) {
        $("#discount").focus();
        $('#discount').addClass('error');
        return false;
    }
    if (dues<0) {
        $("#paid").focus();
        $('#paid').addClass('error');
        return false;
    }
}

function validateFormStockIn() {
    var stock_net_price = document.getElementById('stock_net_price').value;
    var stock_due = document.getElementById('stock_due').value;
    if (stock_net_price<1) {
        $("#stock_discount").focus();
        return false;
    }
    if (stock_due<0) {
        $("#stock_paid").focus();
        return false;
    }
}
function validateFormStockPay() {
    var pay_due = document.getElementById('pay_due').value;
    if (pay_due<0) {
        $("#pay_paid").focus();
        return false;
    }
}
function validateFormProduct() {
    var edit_buying_price = document.getElementById('edit_buying_price').value;
    var edit_selling_price = document.getElementById('edit_selling_price').value;
    if (parseFloat(edit_selling_price)<=parseFloat(edit_buying_price)) {
        $("#edit_selling_price").focus();
        return false;
    }
}

function arrearsDuePaidChange(){
    var pay_discount_price = document.getElementById('pay_discount_price');
    var pay_old_paid= document.getElementById('pay_old_paid');
    var pay_paid= document.getElementById('pay_paid');
    var pay_due= document.getElementById('pay_due');
    if (pay_paid.value!='') {
        pay_due.value=(pay_discount_price.value)-(parseInt(pay_old_paid.value)+parseInt(pay_paid.value));
    }
}

$(function() {
    $( "#customerName" ).autocomplete({
        source: '/ajax-client',
        select: function (event, ui) {
            $.get('/ajax-client-address?name='+(ui.item.value), function(data){
                $.each(data, function(index, productObj){
                    document.getElementById('address').value = productObj.address;
                });
            });
        }
    });
});
$(function() {
    $( "#vendor_name" ).autocomplete({
        source: '/ajax-vendor',
        select: function (event, ui) {
            $.get('/ajax-vendor-address?name='+(ui.item.value), function(data){
                $.each(data, function(index, productObj){
                    document.getElementById('vendor_address').value = productObj.address;
                });
            });
        }
    });
});
$(function() {
    var cname=document.getElementById('customerName');
    if(typeof cname !== 'undefined' && cname !== null) {
        cname.onkeydown = function(event) {
            if (event.keyCode == 13) {
                $.get('/ajax-client-address?name='+(cname.value), function(data){
                    $.each(data, function(index, productObj){
                        document.getElementById('address').value = productObj.address;
                    });
                });
            }
        }
    }
});