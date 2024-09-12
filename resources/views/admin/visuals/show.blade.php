@extends('layouts.admin')

@section('content')
<div>
    <canvas id="myChart"></canvas>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <?php 
 $months = $visuals->pluck('month')->all();
 $counts = $visuals->pluck('visuals')->all();
 ?>
  <script>
    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: <?php  echo json_encode($months); ?>,

        // ['january', 'febrary', 'march', 'april', 'may', 'june',  'july',  'august', 'september', 'october', 'november', 'december'],
        
        datasets: [{
          label: 'Visuals',
          data: <?php   echo json_encode($counts); ?>,

          borderWidth: 2,
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
  

@endsection