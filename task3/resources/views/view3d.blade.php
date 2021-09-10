<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		<link rel="stylesheet" href="{{{ URL::asset('css/bootstrap.min.css')}}}" />
		<link rel="stylesheet" href="{{{ URL::asset('css/datatables.min.css')}}}" />
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body class="no-skin">
		<div class="main-container" id="main-container">
			<div class="main-content">
				<table class="table table-striped table-bordered table-hover" id="emp_list">					
					<thead>
						<tr>
							<th> Player Id</th>
							<th> Agent Id</th>
							<th> Currency  </th>
							<th> Bet </th>
							<th> Win </th>
							<th> Rake </th>
							<th> Tournament </th>
							<th> Net </th>
							<th> Fin </th>
							<th> Date </th>
						</tr>
					</thead>
					<tbody>
						 @foreach($data as $player)
						  <tr>
							<td> {{$player->playerid}} </td>
							<td> {{$player->agentid}} </td>
							<td> {{$player->currency}} </td>
							<td> {{$player->bet}} </td>
							<td> {{$player->win}} </td>
							<td> {{$player->rake}} </td>
							<td> {{$player->tournament}} </td>
							<td> {{$player->net}} </td>
							<td> {{$player->fin}} </td>
							<td> {{$player->date}} </td>						  
						  </tr>
						 @endforeach
				   </tbody>
				</table>
			</div>
        
		<script type="text/javascript" src="{{{ URL::asset('js/jquery-3.6.0.min.js')}}}"></script>
		<script src="{{{ URL::asset('js/bootstrap.js')}}}"></script> 
		<script src="{{{ URL::asset('js/datatables.min.js')}}}"></script>
		
  <script>
 $(function() {
   $('#emp_list').DataTable();
 });
</script>
<script>
$(function() {
   $('#emp_list').DataTable();
});
</script>
</div>
    </body>
</html>
