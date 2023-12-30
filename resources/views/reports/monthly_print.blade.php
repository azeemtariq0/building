
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report of Rooms</title>
  
</head>

<body>
    <header>
       <!--  <img src= "{{ public_path('female.png') }}" 
        class="float-left ml-0" height="60px" width="120px">
         -->
        <h1 style="text-align: center;margin-bottom: 0px">Shereen Chalet - Kalpitiya</h1>
    </header>

    <div class=" mt-0 ml-3" style="text-align: center;margin-top: -20px"> 
        <?php
            $current_date_time = \Carbon\Carbon::now()->toDateTimeString(); 
            echo "<div style='font-size: 20px;'> Date/Time : ".$current_date_time."</div>";
            $roomCount = 1;
        ?>
    <br>
        
        <table class="table table-bordered  table-striped mt-2 ">
            <tr style="background-color: #000; color: #fff;text-align: center;" >
                <th>#</th>
                <th>Block</th>
                <th>Unit</th>
                <th>Last Amount</th>
                <th>Last Date</th>
                
            </tr>
              <tr>
                    <td style="font-size: 12px;">5</td>
                    <td>5</td>
                    <td>5</td>
                    <td>87</td>
                    <td style="font-size: 14px;">5</td>
                    <td style="font-size: 16px;"></td>
                </tr>
                 <tr>
                    <td style="font-size: 12px;">5</td>
                    <td>5</td>
                    <td>5</td>
                    <td>87</td>
                    <td style="font-size: 14px;">5</td>
                    <td style="font-size: 16px;"></td>
                </tr>
                
  
   <tr>
                    <td style="font-size: 12px;">5</td>
                    <td>5</td>
                    <td>5</td>
                    <td>87</td>
                    <td style="font-size: 14px;">5</td>
                    <td style="font-size: 16px;"></td>
                </tr>
                
  
                
  

        </table>
     

    </div>

</body>

</html>