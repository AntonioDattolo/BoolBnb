@extends('layouts.admin')

@section('content')
	<div class="d-flex justify-content-center">
		<table class="styled-table w-100">
			<thead class="">

				<th>SUITE IMAGE</th>
				<th>SUITE TITLE</th>
				<th>MESSAGES</th>
				<th>LAST MESSAGE</th>

			</thead>
			<tbody>
				{dd{{$suite}}}
				{{-- {{dd($suite[0]->sponsors[0]->id)}} --}}
				@foreach ($suite as $item)
					<tr>
						
						<td>
							@if (Str::startsWith($item->img, 'http'))
								<img class="rounded p-2" src="{{ $item['img'] }}">
							@else
								<img class="rounded p-2" src="{{ asset('/storage/' . $item->img) }}">
							@endif
						</td>

						<td> {{ $item->title }} </td>



						<td>
							

						</td>

						<td>

						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

<style scoped>
	img {
		width: 5rem;
	}

	

	.styled-table {
		border-collapse: collapse;
		margin: 25px 0;
		font-size: 0.9em;
		font-family: sans-serif;
		min-width: 400px;
		box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
	}

	.styled-table thead tr {
		background-color: #009879;
		color: #ffffff;
		text-align: left;
	}

	.styled-table th,
	.styled-table td {
		padding: 12px 15px;
	}

	.styled-table tbody tr {
		/* border-bottom: 2px solid #8A9A5B; */
		border-bottom: 1px solid #dddddd;
	}

	tbody tr:nth-child(even) {
		font-weight: bold;
		color: #009879;
		background-color: #f3f3f3;
	}

	tbody tr:last-of-type {
		border-bottom: 5px solid #009879;
	}
</style>
