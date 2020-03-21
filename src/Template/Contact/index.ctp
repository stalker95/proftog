<section class="contact">
    <div class="d-flex flex-column-reverse align-items-center justify-content-md-between flex-md-row-reverse flex-md-row">
        <div class="contact-details">
            <div id="map">

            </div>
            <div class="description">
                <div class="email">
                    <i class="fas fa-envelope"></i>
                    <p><a href="mailto:<?= $contact_data[0]['email'] ?>"><?= $contact_data[0]['email'] ?></a></p>
                </div>
                <div class="phone">
                    <i class="fas fa-phone"></i>
                    <p><?= $contact_data[0]['phone'] ?></p>
                </div>
                <div class="address">
                    <i class="fas fa-map-marker-alt"></i>
                    <p><?= $contact_data[0]['location'] ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="contact-us d-flex flex-column justify-content-center">
            <div class="info">
                <h1 class="title"><?= __('צור קשר') ?></h1>
                <p class="description"><?= __('עדיין יש לך שאלה?'); ?></p>
            </div>

            <form class="contact-form form-inline" action="#" autocomplete="off">
                <div class="form-group">
                    <input class="form-item form-control" type="text" title="full name" name="name"
                           placeholder="<?= __('שם מלא') ?>">
                    <input class="form-item form-control" type="email" title="email" name="email"
                           placeholder="<?= __('דוא"ל') ?>">
                </div>
                <textarea class="form-item" rows="8" type="text" title="message" name="message"
                          placeholder="<?= __('הודעה') ?>"></textarea>
                <input class="btn btn-primary" type="submit" value="<?= __('לשלוח הודעה') ?>">
               
            </form>
             <p class="message_send_success"></p>
                <p class="message_send_errors"> </p>
        </div>
    </div>
</section>

<script>
    function initMap() {
        var location = {lat: 49.80431392, lng: 23.98918927};

        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 16, center: location});

        var image = 'http://softsprint.pp.ua/omry-tv/img/custom-marker.svg';

        var marker = new google.maps.Marker({
            position: location,
            map: map,
            icon: image
        });
    }
    $(".contact-form").submit(function(e) {
e.preventDefault();

      var form_data = $(this).serialize();
     // console.log(formData['g-recaptcha-response']);
     
        $.ajax({
          type: 'POST',
          url: '<?= $this->Url->build(['controller'=>'admin/contactForm','action' => 'add', '_full' => true]) ?>',
          data: form_data,
          success: function(datas)
          {
            //alert(datas);
            if (datas.status==true) {
              $(".message_send_success").html(datas.message);
              $(".message_send_errors").html("");
            }
            if (datas.status==false) {
             $(".message_send_errors").html(datas.message);
             $(".message_send_success").html("");
            }
          },
          beforeSend: function(data) {
           $(".main_contact_form_message_phone").text("");
          },
          error: function(data) 
          {
              console.log(data);
          }

        });

});
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiH-dVkb5t1NuNKnCe-LBPzUKo7JwYAtI&callback=initMap&language=iw">
</script>