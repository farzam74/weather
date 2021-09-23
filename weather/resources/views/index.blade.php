<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href={{asset('style.css')}}>
    <title>Document</title>
</head>
<body>

<div class="card">

    <h2>{{$city}}</h2>
    <h3><span>Wind {{$weather['current']['wind_speed']}} km/h </span> <b  style="color: black ; margin-left: 15px">{{$weather['current']['weather'][0]['description']}}</b></h3>
    <h1>{{round($weather['current']['temp'])}}°</h1>
    <div class="sky">

        <img src="http://openweathermap.org/img/wn/{{$icon}}@2x.png" alt="icon">
    </div>
    <table>
        <tr>

          @for($i=0; $i<8; $i++)
                <th>{{now()->addDays($i)->format('D')}} </th>
           @endfor
        </tr>
        <tr>

            @foreach($weather['daily'] as $day)
                <td>{{ round($day['temp']['max']) }}°</td>
            @endforeach

        </tr>
        <tr>
            @foreach($weather['daily'] as $day)
                <td>{{ round($day['temp']['min']) }}°</td>
            @endforeach
        </tr>
    </table>
</div>



</body>
</html>


