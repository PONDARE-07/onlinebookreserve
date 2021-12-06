<?php
    include 'conFunc.php';
?>
<head>
<title>Dashboard</title>
<script src="js\jquery-1.9.1.js"></script> 
<script src="js\Chart.min.js"></script> 
</head>
    <h3><br>Dashboard<br></h3>
    
<?php 
    $con = mysqli_connect("localhost","root","","prjctable");

    if(!$con){
        echo "Disconnected" . mysqli_error();
    }
    else{
        
              $sql= $sql = "SELECT * FROM tblbooks";
        
                $result = mysqli_query($con,$sql);

            while ($row = mysqli_fetch_array($result)) {
            
            $BookTitle[] = $row['BookTitle'];
            $Quantity[] = $row['Quantity'];

        }
    }

?>
<h2 class="text-center"><br>Book Quantity<br></h2>
<canvas id="chartjs_pie" style="width: 40px ; height: 10px;"></canvas><script type="text/javascript">
    var ctx = document.getElementById("chartjs_pie").getContext('2d');
              var myChart = new Chart(ctx,{
                type:'pie',
                data: {
                    labels: <?php echo json_encode($BookTitle);?>,
                    datasets:[{
                        backgroundColor:[
                        "#5969ff",
                        "#ff407b",
                        "#25d5f2",
                        "#ffc750",
                        "#2ec551",
                        "#7040fa",
                        "#ff004e"
                        ],
                        data: <?php echo json_encode($Quantity);?> ,
                    }]
                },
               options:{
                    legend:{
                        display: true,
                        position: 'bottom',

                        labels:{
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize:14,
                        }
                    },
                }


              });
</script>