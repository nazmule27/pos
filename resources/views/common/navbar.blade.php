<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <center><a class="navbar-brand" href="home"><img class="logo" src="{{ URL::asset('img/logo.png') }}" alt=""> POS</a></center>
        </div>
        <!--nav start-->
        <div id="nav-container">
            <nav>
                <ul>
                    <li>
                        <a href="home"><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                    @if (Auth::check())
                    <li>
                        <a href="{{route('stock.create')}}"><i class="glyphicon glyphicon-save"></i>Stock In</a>
                        <ul>
                            <li>
                                <a href="{{route('stock.index')}}">Stock</a>
                            </li>
                            <li>
                                <a href="{{route('stock_pay.index')}}">Stock Bill Pay</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('sales.create')}}"><i class="glyphicon glyphicon-open"></i>Sale Product</a>
                        <ul>
                            <li>
                                <a href="{{route('sales.index')}}">Sales List</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('payment.index')}}"><i class="glyphicon glyphicon-share-alt"></i> Payment</a>
                    </li>
                    <li>
                        <a href="{{route('loan.index')}}"><i class="glyphicon glyphicon-tower"></i> Loan</a>
                        <ul>
                            <li>
                                <a href="{{route('installment.index')}}">Installment</a>
                            </li>
                        </ul>
                    </li>
                    @if (Auth::user()->role=='superadmin')
                    <li>
                        <a href="javascript:void(0)"><i class="glyphicon glyphicon-list"></i> Report</a>
                        <ul>
                            <li>
                                <a href="{{route('stock.index')}}">stock</a>
                            </li>
                            <li>
                                <a href="{{route('sales.index')}}">Sales</a>
                            </li>
                            <li>
                                <a href="{{url('/report/payment')}}">Payments</a>
                            </li>
                            <li>
                                <a href="{{route('stock_pay.index')}}">Stock Bill Pay</a>
                            </li>
                            <li>
                                <a href="{{route('balancesheet.index')}}">Balance Sheet</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @endif
                    @if (!Auth::check())
                        <li><a href="{{url('/auth/login')}}"><i class="glyphicon glyphicon-pencil"></i> Log In</a></li>
                    @else (Auth::check())
                        <li>
                            <a href="javascript:void(0)"><i class="glyphicon glyphicon-user"></i> <i class="welcome">Welcome </i>{{strtok(Auth::user()->name, " ")}}</a>
                            <ul>
                                @if (Auth::user()->role=='superadmin')
                                <li>
                                    <a href="{{url('/auth/register')}}">New User Registration</a>
                                </li>
                                <li>
                                    <a href="{{route('category.index')}}">Category</a>
                                </li>
                                <li>
                                    <a href="{{route('product.index')}}">Product</a>
                                </li>
                                <li>
                                    <a href="{{url('/payment_type')}}">Payment Type</a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{url ('/auth/logout')}}">Log Out</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
        <!--nav end-->
    </div>
</div>