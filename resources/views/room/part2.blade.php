@include('layouts.header')

<div class="flex-center position-ref full-height">
	<div class="content">
		<form method="post" action="{{ url('/room/part2') }}">
			<div class="form-row">
				<div class="col-auto my-1">
					<select name="room_type_id" class="browser-default custom-select">
						<option value="">-- Select Room Type --</option>
						@foreach ($rooms as $_room)
							<option value="{{ $_room['room_type_id'] }}">{{ $_room['room_type_name'] }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-sm-3 my-1">
					<input type="text" class="form-control datepicker" name="date">
				</div>
				<div class="col-auto my-1">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>

		@if ($data <> '')
			<pre id="json-reader" class="border text-left" style="padding: 10px;">
				
			</pre>
		@endif
	</div>
</div>

@include('layouts.footer')

<script>
	$(document).ready(function(){
		$('#json-reader').html(prettyPrintJson.toHtml(@php echo $data; @endphp));
	});
</script>
