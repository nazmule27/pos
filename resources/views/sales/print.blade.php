@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <div class="page">
        <div class="left-logo">
            <img class="sales-logo" src="{{ URL::asset('img/logo.png') }}" alt="">
        </div>
        <div class="right-address">
            <center><b>Ayan Electric House</b></center>
            <center>Akua warless Rood, Mymensingh</center>
        </div>
        <div class="full-with">
            <center><small class="contacts">Visit http://ayanelectric.com, Mobile: 01730867797, Email: ayanelectric1@gmail.com Like us: <img class="facebook" src="{{ URL::asset('img/fb32.png') }}" alt="">/AyanElectric</small></center>
        </div>
        <div class="full-with">
            ----------------------------------------------------------------------------------------------------------------------------------------------------
        </div>
        <div class="full-with customer-info">
           Date: {{date('Y-m-d H:i:s')}},
           Invoice No: {{session()->get('sale_input')['invoice_no']}},
           Branch: {{Auth::user()->branch}},
           Customer Name: {{session()->get('sale_input')['customer_id']}},
           Customer Addr.: {{session()->get('sale_input')['customer_address']}}.
        </div>
        <div class="full-with">
            ----------------------------------------------------------------------------------------------------------------------------------------------------
        </div>
        <div class="full-with">
            <table class="print-table">
                <thead>
                <tr>
                    <th width="30">SL</th>
                    <th width="400">Products</th>
                    <th width="30" align="right">Price</th>
                    <th width="50" align="right">Qunt.</th>
                    <th width="60" align="right">Total</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $productName=explode(",", session()->get('sale_input')['productNames']);
                $products=explode(",", session()->get('sale_input')['products']);
                $unit_price=explode(",", session()->get('sale_input')['unit_price']);
                $quantity=explode(",", session()->get('sale_input')['quantity']);
                $amount=explode(",", session()->get('sale_input')['amount']);
                for ($i = 0; $i < count($products)-1; ++$i) {
                ?>
                <tr>
                    <td>{{($i+1).'.'}}</td>
                    <td class="dot-table">{{$productName[$i]}}</td>
                    <td align="right">{{$unit_price[$i]}}</td>
                    <td align="right">{{$quantity[$i]}}</td>
                    <td align="right">{{$amount[$i]}}</td>
                </tr>

                <?php
                }
                ?>

                <tr>
                    <td colspan="3"></td>
                    <td align="right">--------------</td>
                    <td align="right">--------------</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2" align="right">Sub Total:</td>
                    <td align="right"> {{session()->get('sale_input')['total_price']}}</td>
                </tr>
                <tr>
                    <td colspan="2" align="right"></td>
                    <td colspan="2" align="right">(+) Vat: </td>
                    <td align="right">(%) {{session()->get('sale_input')['vat']}}</td>
                </tr>
                <tr>
                    <td colspan="2" align="right"></td>
                    <td colspan="2" align="right">(-) Discount: </td>
                    <td align="right">{{session()->get('sale_input')['discount']}}</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td align="right">--------------</td>
                    <td align="right">--------------</td>
                </tr>
                <tr>
                    <td colspan="2" align="right"></td>
                    <td colspan="2" align="right">Net Payable: </td>
                    <td align="right">{{session()->get('sale_input')['discount_price']}}</td>
                </tr>
                <tr>
                    <td colspan="2" align="right"></td>
                    <td colspan="2" align="right">Paid: </td>
                    <td align="right">{{session()->get('sale_input')['paid']}}</td>
                </tr>
                <tr>
                    <td colspan="2" align="right"></td>
                    <td colspan="2" align="right">Dues: </td>
                    <td align="right">{{session()->get('sale_input')['dues']}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="full-with">
            <span >----------------------</span>
            <span >&nbsp; &nbsp;  --------------------------</span>
        </div>
        <div class="full-with">
            <span>Signature of Saler</span>
            <span>&nbsp; Signature of Customer</span>
        </div>
        <div class="full-with">
            <span> Sold by: {{session()->get('sale_input')['sold_by']}}</span>
        </div>
        <div class="full-with">
            ----------------------------------------------------------------------------------------------------------------------------------------------------
        </div>
        <div class="full-with">
            <center><p class="note"><b>N. B.</b> Warrantied product is not returnable/exchangeable; Others product not returnable, but exchangeable within 15 days.</p></center>
        </div>
        <div class="full-with">
            <center><a class="btn btn-primary no-print" onclick="window.print()" href="{{url('sales/create')}}"><i class="glyphicon glyphicon-print"></i> Print</a></center>
        </div>
    </div>
</div>
<div class="print-powered">
    Powered by: Nazmul
</div>
@include('common.footer')