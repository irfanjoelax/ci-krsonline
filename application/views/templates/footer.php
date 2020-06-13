</main>
<!-- end konten -->

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
   $(document).ready(function() {
      $('.dataTable').DataTable({
         "processing": true,
         "serverside": true,
         "ordering": false,
         "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
         }
      });

      $('#fklt_id').change(function() {
         $.ajax({
            type: "GET",
            url: "<?= site_url('ajax/data_prodi/') ?>" + $('#fklt_id').val(),
            dataType: "JSON",
            beforeSend: function() {
               $('#prd_id').html('<option value="">Sedang memuat..</option>');
            },
            success: function(response) {
               console.log(response);
               $('#prd_id').html('');
               $.each(response, function(i, data) {
                  console.log(data['nama_prd']);
                  $('#prd_id').append(`
                     <option value="` + data['id_prd'] + `">` + data['nama_prd'] + `</option>
                  `);
               });
            }
         });
      });
   });
</script>
</body>

</html>