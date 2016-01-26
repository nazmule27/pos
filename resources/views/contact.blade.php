@include('common.header')
@include('common.navbar')

<div class="container padT60">
    <div class="row">
        <div class="col-md-5">
            <form role="form" method="post" action="contact/contact_form">
                <div class="form-group">
                    <input type="text" class="form-control custom-text" name="name" id="name" placeholder="Your Name *" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control custom-text" name="email" id="email" placeholder="Your Email *" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control custom-text" name="subject" id="subject" placeholder="Subject *" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control col-md-12 custom-area" name="message" id="message" placeholder="Tell us somthing...*" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default col-md-12 custom-text">Submit</button>
                </div>
            </form>
        </div>
        <?php if (isset($success_msg)) { echo $success_msg; } ?>
        <?php if (isset($error_msg)) { echo $error_msg; } ?>
        <div class="col-md-7">
            <div id="googleMap" style="width:100%;height:300px;"></div>
        </div>

    </div>

</div>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript">
    var myCenter=new google.maps.LatLng(24.7472612,90.3897278);
    function initialize()
    {
        var mapProp = {
            center: myCenter,
            zoom:15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

        var marker = new google.maps.Marker({
            position: myCenter,
            title:'Click to zoom'
        });

        marker.setMap(map);

// Zoom to 9 when clicking on marker
        google.maps.event.addListener(marker,'click',function() {
            map.setZoom(15);
            map.setCenter(marker.getPosition());
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
@include('common.footer')