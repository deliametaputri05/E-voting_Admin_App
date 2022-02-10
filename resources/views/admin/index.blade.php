@extends('admin.layout')

@section('title', 'Dashboard')

@section('container')
<div class="main-panel">
	<div class="content">
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Pemilihan Raya </h2>

					</div>

				</div>
			</div>
		</div>
		<div class="page-inner">
			<div class="row">
				<div class="col-sm-6 col-md-6">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center bubble-shadow-small">
										<img src="/assets/img/ormawa/mpm.png" width="60px" alt="">
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Majelis Permusyawaratan Mahasiswa (MPM)</p>

										<h4 class="card-title">1.320</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center bubble-shadow-small">
										<img src="/assets/img/ormawa/bem.png" width="60px" alt="">
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Badan Eksekutif Mahasiswa (BEM)</p>
										<h4 class="card-title">1.450</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center bubble-shadow-small">
										<img src="/assets/img/ormawa/himatif.png" width="60px" alt="">
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">HIMATIF</p>
										<h4 class="card-title">298</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center bubble-shadow-small">
										<img src="/assets/img/ormawa/hmm.png" width="60px" alt="">
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">HMM</p>
										<h4 class="card-title">310</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center  bubble-shadow-small">
										<img src="/assets/img/ormawa/himra.png" width="60px" alt="">
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">HIMRA</p>
										<h4 class="card-title">215</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center  bubble-shadow-small float-left">
										<!-- <i class="flaticon-users"></i> -->
										<img src="/assets/img/ormawa/himakes.png" width="60px" alt="">
									</div>

								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">HIMAKES</p>
										<h4 class="card-title">180</h4>
									</div>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>

			<!-- 
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Pie Chart</div>
						</div>
						<div class="card-body">
							<div class="chart-container">
								<canvas id="pieChart" style="width: 50%; height: 50%"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div> -->



		</div>
	</div>


</div>

@endsection

@yield('chart')