<div class="container">
<h1>Kriteria <small>Data Kriteria</small></h1>
     <table class="table table-bordered">
        <thead>
            <tr class="active">
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Kode Kriteria</th>
                <th style="text-align: center;">Nama Kriteria</th>
                <th style="text-align: center;">Jenis Faktor</th>
                <th style="text-align: center;">Nilai Target</th>
                <th style="text-align: center;">Nilai Persentase<br>(100%)</th>
                <th style="text-align: center;">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($prn as $key => $value) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->kode_kriteria; ?></td>
                <td><?= $value->nama_kriteria; ?></td>
                <td><?= $value->jenis_faktor; ?></td>
                <td align="center"><?= $value->nilai_target; ?></td>
                <td align="center"><?=$value->nilai_persen ?>%</td>
                <td align="center">K<?=substr($value->kode_kriteria,2,3); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
