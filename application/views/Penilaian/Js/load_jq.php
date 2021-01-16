

<script type="text/javascript">
            function isi_otomatis(){
                var nik = $("#nik").val();
                $.ajax({
                    method : 'get',
                    url: '<?=base_url('Penilaian/load_aj')?>',
                    data:"nik="+nik,
                }).success(function (data) {
                    // alert(data);
                    obj = JSON.parse(data);
                    <?php $no=1; foreach ($kt as $pn) : ?>
                    $('#nik<?=$no++;?>').val(obj.nik1);
                    <?php endforeach;?>
                    $('#nama_kariawan').val(obj.nama_kariawan);
                    $('#divisi').val(obj.divisi);
                });
            }

    function sum(){
        
        var nt = document.getElementById('nik').value;
        var tg = document.getElementById('tanggal').value;
        document.getElementById('nik_tahun').value = nt+tg;

        var tanggal = document.getElementById('tanggal').value;
        <?php $a=1; foreach ($kt as $pn) : ?>
            document.getElementById('tanggal<?=$a++;?>').value = tanggal;
        <?php endforeach;?>

        <?php foreach($kt as $tk): ?>
        var nilai_asli_<?=$tk->kode_kriteria?> = document.getElementById('nilai_asli_<?=$tk->kode_kriteria?>').value;
        var nilai_target_<?=$tk->kode_kriteria?> = document.getElementById('nilai_target_<?=$tk->kode_kriteria?>').value;
        var jumlah_<?=$tk->kode_kriteria?> = parseFloat(nilai_asli_<?=$tk->kode_kriteria?>) - parseFloat(nilai_target_<?=$tk->kode_kriteria?>);

        if(jumlah_<?=$tk->kode_kriteria?> == 0){
            nb_<?=$tk->kode_kriteria?> = 5;
        }else if(jumlah_<?=$tk->kode_kriteria?> == 1){
            nb_<?=$tk->kode_kriteria?> = 4.5;
        }else if(jumlah_<?=$tk->kode_kriteria?> == -1){
            nb_<?=$tk->kode_kriteria?> = 4;
        }else if(jumlah_<?=$tk->kode_kriteria?> == 2){
            nb_<?=$tk->kode_kriteria?> = 3.5;
        }else if(jumlah_<?=$tk->kode_kriteria?> == -2){
            nb_<?=$tk->kode_kriteria?> = 3;
        }else if(jumlah_<?=$tk->kode_kriteria?> == 3){
            nb_<?=$tk->kode_kriteria?> = 2.5;
        }else if(jumlah_<?=$tk->kode_kriteria?> == -3){
            nb_<?=$tk->kode_kriteria?> = 2;
        }else if(jumlah_<?=$tk->kode_kriteria?> == 4){
            nb_<?=$tk->kode_kriteria?> = 1.5;
        }else if(jumlah_<?=$tk->kode_kriteria?> == -4){
            nb_<?=$tk->kode_kriteria?> = 1;
            }

        if (!isNaN(jumlah_<?=$tk->kode_kriteria?>)) {
            document.getElementById('nilai_gap_<?=$tk->kode_kriteria?>').value = jumlah_<?=$tk->kode_kriteria?>;
        }
        if (!isNaN(jumlah_<?=$tk->kode_kriteria?>)) {
            document.getElementById('nilai_bobot_<?=$tk->kode_kriteria?>').value = nb_<?=$tk->kode_kriteria?>;
        }
        <?php endforeach ?>

        <?php $no=1; foreach ($core as $tk) { ?>
            var core<?=$no++;?> = document.getElementById('nilai_bobot_<?=$tk->kode_kriteria?>').value;
       <?php } ?>
            var hasil_cf = (parseFloat(core1) + parseFloat(core2) + parseFloat(core3) + parseFloat(core4) + parseFloat(core5) + parseFloat(core6) + parseFloat(core7) + parseFloat(core8) + parseFloat(core9)) / <?=$no-1;?>;

            if (!isNaN(hasil_cf)) {
            document.getElementById('nilai_cf').value = hasil_cf.toFixed(2);
        }

        <?php $no=1; foreach ($secondary as $sv) { ?>
            var secondary<?=$no++;?> = document.getElementById('nilai_bobot_<?=$sv->kode_kriteria?>').value;
       <?php } ?>
            var hasil_sf = (parseFloat(secondary1) + parseFloat(secondary2) + parseFloat(secondary3) + parseFloat(secondary4) + parseFloat(secondary5) + parseFloat(secondary6)) / <?=$no-1;?>;

            if (!isNaN(hasil_sf)) {
            document.getElementById('nilai_sf').value = hasil_sf.toFixed(2);
        }

            var nilai_cf = document.getElementById('nilai_cf').value;
            var nilai_sf = document.getElementById('nilai_sf').value;
            var hasil_total = (parseFloat(nilai_cf) * 0.60) + (parseFloat(nilai_sf) * 0.40);
            if (!isNaN(hasil_sf)) {
            document.getElementById('nilai_total').value = hasil_total.toFixed(2);

        var cf = document.getElementById('nilai_cf').value;
        var sf = document.getElementById('nilai_sf').value;
        var tt = document.getElementById('nilai_total').value;
        <?php $a=1; $sf=1; $to=1; foreach ($kt as $pn) : ?>
            document.getElementById('nilai_cf<?=$a++;?>').value = cf;
            document.getElementById('nilai_sf<?=$sf++;?>').value = sf;
            document.getElementById('nilai_total<?=$to++;?>').value = tt;
        <?php endforeach;?>
        
        }

        <?php $ri=1; $pr=1; $as=1; $hasil_ra=1; foreach ($kt as $key => $ra) { ?>
            var nilai_asli_<?=$ra->kode_kriteria?> = document.getElementById('nilai_asli_<?=$ra->kode_kriteria?>').value;
            var nilai_pr_<?=$ra->kode_kriteria?> = document.getElementById('nilai_pr<?=$pr++?>').value;
            // var hs = nilai_asli_<?=$ra->kode_kriteria?> + parseFloat(nilai_pr_<?=$ra->kode_kriteria?>);
            var hasil_pr_<?=$ra->kode_kriteria?> = parseFloat(nilai_asli_<?=$ra->kode_kriteria?>) + parseFloat(nilai_pr_<?=$ra->kode_kriteria?>);
            if (!isNaN(hasil_pr_<?=$ra->kode_kriteria?>)) {
            document.getElementById('nilai_ra<?=$ri++?>').value = hasil_pr_<?=$ra->kode_kriteria?>;
            
       }

        <?php  } ?>

         var hasli_ra = parseFloat(hasil_pr_K001) + parseFloat(hasil_pr_K002) + parseFloat(hasil_pr_K003) + parseFloat(hasil_pr_K004) + parseFloat(hasil_pr_K005) + parseFloat(hasil_pr_K006) + parseFloat(hasil_pr_K007) + parseFloat(hasil_pr_K008) + parseFloat(hasil_pr_K009) + parseFloat(hasil_pr_K010) + parseFloat(hasil_pr_K011) + parseFloat(hasil_pr_K012) + parseFloat(hasil_pr_K013) + parseFloat(hasil_pr_K014) + parseFloat(hasil_pr_K015);

          if (!isNaN(hasli_ra)) {
           var al = document.getElementById('hasil_ra<?=$hasil_ra++?>').value = hasli_ra;
             }
         <?php $rb=1; foreach ($kt as $pn) : ?>
            document.getElementById('hasil_ra<?=$rb++;?>').value = al.toFixed(2);
        <?php endforeach;?>
            

}

</script>
