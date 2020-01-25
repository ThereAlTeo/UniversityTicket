          <!-- Admin Area -->
          <div class="mx-5">
               <div class="d-sm-flex align-items-center justify-content-between my-4">
                    <h1 class="h3 mb-0 text-ticketBlue">Dashboard</h1>
               </div>
               <div class="row">
                    <?php
                         $infoCardText = $config['infoCardText'][$_SESSION["accountLog"][1]];
                         $infoCardColor = $config['infoCardColor'];
                         $infoCardIcon = $config['infoCardIcon'][$_SESSION["accountLog"][1]];

                         for ($i=0; $i < 4; $i++) {
                              /***
                              * TODO: Veriicare se conviene creare una funzione oppure richiamare il php ...
                              */
                              $_GET["infoCard"] = array($infoCardText[$i], $infoCardColor[$i], $infoCardIcon[$i]);
                              include './../php/factoryItem/infoCard.php';
                         }
                    ?>
               </div>
               <div class="row px-2">
                    <?php
                    if($_SESSION["accountLog"][1] < 3){
                         $idValues = array("barChart", "doughnutChart");
                         $headerValues = $config['chartCardHeader'][$_SESSION["accountLog"][1]];
                         $heightCardValues = array(100, 215);
                         $column = array(8, 4);

                         for ($i=0; $i < 2; $i++) {
                              $_GET["chartCard"] = array($idValues[$i], $headerValues[$i], $heightCardValues[$i], $column[$i]);
                              include './../php/factoryItem/infoCard.php';
                         }
                    }
                    ?>
               </div>
          </div>
          <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
          <script>
               var ctx = document.getElementById('barChart');
               var myChart = new Chart(ctx, {
                   type: 'bar',
                   data: {
                       labels: ['Red', 'Blue', 'Orange'],
                       datasets: [{
                           label: 'prova',
                           data: [12, 19, 3, 5, 2, 3],
                           backgroundColor: [
                               'rgba(255, 99, 132, 0.2)',
                               'rgba(54, 162, 235, 0.2)',
                               'rgba(255, 206, 86, 0.2)',
                               'rgba(75, 192, 192, 0.2)',
                               'rgba(153, 102, 255, 0.2)',
                               'rgba(255, 159, 64, 0.2)'
                           ],
                           borderColor: [
                               'rgba(255, 99, 132, 1)',
                               'rgba(54, 162, 235, 1)',
                               'rgba(255, 206, 86, 1)',
                               'rgba(75, 192, 192, 1)',
                               'rgba(153, 102, 255, 1)',
                               'rgba(255, 159, 64, 1)'
                           ],
                           borderWidth: 1
                       }]
                   },
                   options: {
                       scales: {
                           yAxes: [{
                               ticks: {
                                   beginAtZero: true
                               }
                           }]
                      }
                 },
                 spanGaps: false
               });

               var doughnut = document.getElementById('doughnutChart');
               var myDoughnutChart = new Chart(doughnut, {
                    type: 'doughnut',
			data: {
				datasets: [{
					data: [30, 40, 100
					],
					backgroundColor: [
                              'rgba(255, 99, 132)',
                              'rgba(54, 162, 235)',
                              'rgba(255, 206, 86)',
					],
				}],
				labels: [
					'Red',
					'Orange',
					'Yellow'
				]
			}

               });
          </script>
          <!-- Admin Area -->
