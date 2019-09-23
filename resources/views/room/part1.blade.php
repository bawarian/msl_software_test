@include('layouts.header')

<div class="flex-center position-ref full-height">
	<div class="container">
		<form method="post" action="{{ url('/room/part1_add') }}">
			<div class="form-row">
				<div class="col-sm-3 my-1">
					<label class="sr-only" for="room-type-name">Room type name</label>
					<input type="text" class="form-control" id="room-type-name" name="room_type_name" placeholder="Room type name">
				</div>
				<div class="col-sm-3 my-1">
					<label class="sr-only" for="room-type-id">Room type ID</label>
					<input type="text" class="form-control" id="room-type-id" name="room_type_id" placeholder="Room type ID">
				</div>
				<div class="col-auto my-1">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>

		<table class="table table-sm table-striped table-hover">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Room Type Name</th>
					<th scope="col">Room Type ID</th>
					<th scope="col">Created Date</th>
					<th scope="col">Updated Date</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($rooms as $_room)
					<tr>
						<td>{{ $_room['id'] }}</td>
						<td>{{ $_room['room_type_name'] }}</td>
						<td>{{ $_room['room_type_id'] }}</td>
						<td>{{ $_room['created_at'] }}</td>
						<td>{{ $_room['updated_at'] }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
	</div>
</div>

@include('layouts.footer')
