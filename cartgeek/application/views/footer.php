<div class="footer">
  <p> <?php 
  date_default_timezone_set("Asia/Calcutta");
  echo $date = date('d-m-y H:i:s');     
  
    ?> </p>
</div>
</body>
</html>

<script>
  $(document).ready(function() {
        $('#files').change(function() {
            var files = $('#files')[0].files;
            var error = '';
            var form_data = new FormData();
            for (var count = 0; countundefined < files.length; count++) {
              var name = files[count].name;
              var extension = name.split('.').pop().toLowerCase();
              if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                error += "Invalid " + count + " Image File"
              } else {
                form_data.append("files[]", files[count]);
              }
            }
            if (error == '') {
              $.ajax({
                  url: " < ? php echo base_url(); ? > upload_multiple / upload ", //base_url() return http://localhost/tutorial/codeigniter/
                  method : "POST",
                  data: form_data,
                  contentType: false,
                  cache: false,
                  processData: false,
                  beforeSend: function() {
                    $('#uploaded_images').html(" < label class = 'text-success' > Uploading... < /label>");
                      },
                      success: function(data) {
                        $('#uploaded_images').html(data);
                        $('#files').val('');
                      }
                  })
              }
              else {
                alert(error);
              }
            });
        }); 
</script>

<script>
  $(document).ready(function() {
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>