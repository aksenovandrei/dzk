@if(count($errors) > 0)
	<div class="">
		<div class="row">
			<div class="col-md-10">
				<div class="alert alert-danger alert-error">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
@endif
@if(session('status'))
	<div class="">
		<div class="row">
			<div class="col-md-10">
				<div class="alert alert-success">
					<ul>
						<li>
						{{ session('status') }}
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endif
@if(session('error'))
	<div class="">
		<div class="row">
			<div class="col-md-10">
				<div class="alert alert-error">
					<ul>
						<li>
						{{ session('error') }}
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endif
@if(isset($result))
	<div class="">
		<div class="row">
			<div class="col-md-10">
				<div class="alert alert-error">
					<ul>
						<li>
						{{ $result }}
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endif