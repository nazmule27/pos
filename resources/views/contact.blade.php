@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <h3>Contact with us</h3>
    <hr class="marginB10">
    <div class="row">
        <div class="col-md-12 login_error">
            @if (count($errors))
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="col-md-12">
            <form role="form" method="post" action="/contact_request">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control custom-text" name="name" id="name" placeholder="Your Name *" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control custom-text" name="email" id="email" placeholder="Your Email *" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control custom-text" name="subject" id="subject" placeholder="Subject *" required>
                    </div>
                    <div class="form-group col-md-6">
                        <textarea class="form-control col-md-12 custom-area" name="message" id="message" placeholder="Tell us somthing...*" required></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-default col-md-12 custom-text">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <div id="googleMap" style="width:100%;height:300px;"></div>
        </div>
    </div>

</div>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript">
    var locations = [
        ['Ayan Electric House', 24.7472612,90.3897278, 1]
    ];

    var map = new google.maps.Map(document.getElementById('googleMap'), {
        zoom: 15,
        center: new google.maps.LatLng(24.7472612,90.3897278),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
</script>
@include('common.footer')