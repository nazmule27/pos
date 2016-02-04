@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <div class="row>">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{ URL::asset('img/slider/slide-1.jpg') }}" alt="...">
                    <div class="carousel-caption">
                        Integrated bedroom shade set
                    </div>
                </div>
                <div class="item">
                    <img src="{{ URL::asset('img/slider/slide-2.jpg') }}" alt="...">
                    <div class="carousel-caption">
                        Brand jar lighting
                    </div>
                </div>
                <div class="item">
                    <img src="{{ URL::asset('img/slider/slide-3.jpg') }}" alt="...">
                    <div class="carousel-caption">
                        Brand ultra model jar lighting set
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="row> paddingT20">
        <h3><b>Welcome to Ayan Electric House</b></h3>
        <p>Ayan Electric House is a provider and reseller of all king electric equipment. It is established in 2014. Propitar Md. Alam Sarker.</p>
    </div>
</div>

@include('common.footer')