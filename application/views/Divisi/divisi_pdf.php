<div class="container">
                    <h1>Divisi <small>Data Divisi</small></h1>
                              <table class="table table-bordered">
                                <thead>
                                    <tr class="active">
                                        <th>No</th>
                                        <th>Kode Devisi</th>
                                        <th>Nama Devisi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $no= 1;
                                    foreach ($dv as $key => $value) { ?>
                                         <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value->kode_divisi; ?></td>
                                        <td><?= $value->nama_divisi; ?></td>
                                    </tr>
                                    <?php } 
                                    ?>
                                </tbody>
                                
                              </table>
                                            
    </div>
