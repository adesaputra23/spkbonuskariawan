 <script type="text/javascript">
        var speedCanvas = document.getElementById("speedChart");

        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;

        var speedData = {
        labels: [<?php
                   // $jumlah = $this->Stunting_model->l_wilayah($tahun)->result();
                    
                      foreach ($gr as $data) {
                            // $a=($data->total)*(32)/(100);
                        echo "'" .$data->nik.'-'.$data->nama_kariawan."',";
                      
                    }
          ?>],
        datasets: [{
            <?php foreach ($gr as $key => $value) {
                $value->tahun;
            } ?>
            label: "Nilai Akhir Tahun : " + <?=$value->tahun;?>,
            data: [<?php
                   // $jumlah = $this->Stunting_model->l_wilayah($tahun)->result();
                    
                      foreach ($gr as $data) {
                            // $a=($data->total)*(32)/(100);
                        echo "'" .$data->nilai_ra ."',";
                      
                    }
          ?>],
            lineTension: 0,
            fill: false,
            borderColor: 'orange',
            backgroundColor: 'transparent',
            borderDash: [5, 5],
            pointBorderColor: 'orange',
            pointBackgroundColor: 'rgba(255,150,0,0.5)',
            pointRadius: 5,
            pointHoverRadius: 10,
            pointHitRadius: 30,
            pointBorderWidth: 2,
            pointStyle: 'rectRounded'
        }]
        };

        var chartOptions = {
        legend: {
            display: true,
            position: 'top',
            labels: {
            boxWidth: 80,
            fontColor: 'black'
            }
        }
        };
        

        var lineChart = new Chart(speedCanvas, {
        type: 'line',
        data: speedData,
        options: chartOptions
        });


         var speedCanvas = document.getElementById("speedChart2");

        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;

        var speedData = {
        labels: [<?php
                   // $jumlah = $this->Stunting_model->l_wilayah($tahun)->result();
                    
                      foreach ($gr as $data) {
                            // $a=($data->total)*(32)/(100);
                        echo "'" .$data->nik. ' - ' .$data->nama_kariawan."',";
                      
                    }
          ?>],
        datasets: [{
            label: "Nilai Akhir Tahun : ",
            data: [<?php
                   // $jumlah = $this->Stunting_model->l_wilayah($tahun)->result();
                    
                      foreach ($gr as $data) {
                            // $a=($data->total)*(32)/(100);
                        echo "'" .$data->nilai_ra ."',";
                      
                    }
          ?>],
            lineTension: 0,
            fill: false,
            borderColor: 'orange',
            backgroundColor: 'transparent',
            borderDash: [5, 5],
            pointBorderColor: 'orange',
            pointBackgroundColor: 'rgba(255,150,0,0.5)',
            pointRadius: 5,
            pointHoverRadius: 10,
            pointHitRadius: 30,
            pointBorderWidth: 2,
            pointStyle: 'rectRounded'
        }]
        };

        var chartOptions = {
        legend: {
            display: true,
            position: 'top',
            labels: {
            boxWidth: 80,
            fontColor: 'black'
            }
        }
        };

        var lineChart = new Chart(speedCanvas, {
        type: 'line',
        data: speedData,
        options: chartOptions
        });
            

</script>