@extends('layouts.blank')
@section('content')
<div>
	<div class="card">
		<div class="card-header">
			<h4>Beneficiario</h4>
		</div>
		<div class="card-body">
			{{dd($beneficiario)}}
		</div>
	</div>
</div>
@endsection