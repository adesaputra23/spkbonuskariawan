

<script type="text/javascript">
            function isi_otomatis(){
                var nik = $("#nik").val();
                $.ajax({
                    method : 'get',
                    url: '<?=base_url('User/proses_ajax')?>',
                    data:"nik="+nik,
                }).success(function (data) {
                    obj = JSON.parse(data);
                    $('#nama_pengguna').val(obj.nama_kariawan);
                });
            }
</script>