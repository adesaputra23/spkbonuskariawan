<div class="container">
                    <h1>Karyawan <small>Data Karyawan</small></h1>
                              <table class="table table-bordered">
                                <thead>
                                    <tr class="active">
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama Karyawan</th>
                                        <th>Tahun Masuk</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Divisi</th>
                                        <th>No Hp/Wa</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                $no=1;
                                    foreach ($kw as $key => $value) { ?>
                                         <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value->nik; ?></td>
                                        <td><?= $value->nama_kariawan; ?></td>
                                        <td><?= $value->periode; ?></td>
                                        <td><?= $value->jenis_kelamin; ?></td>
                                        <td><?= $value->alamat; ?></td>
                                        <td><?= $value->nama_divisi; ?></td>
                                        <td><?= $value->no_tlp; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                              </table>
                           
    </div>
