<?php
	$title = "Products";
	$page_title = title_case("View All Products");
?>
@push("extra-css")
	{{--<link rel="stylesheet" href="css/jquery.dataTables.min.css">--}}
@endpush

@extends("layouts.app")

@section("content")
	@if(Session::has("success"))
		<div class="alert alert-success alert-dismissible show animated zoomIn" role="alert">
			{{ Session::get("success") }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif

	@if ($errors->any())
		<div class="alert alert-danger alert-dismissible show animated zoomIn">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<section>
		<div class="row">
			<div class="col-12">
				<div class="mb-4 animated fadeInDown">
					<a href="{{ route("createProduct") }}" class="btn btn-danger btn-md"><i class="mdi mdi-plus-circle-outline"></i> Add New Product</a>
				</div>
				<div class="card animated zoomIn">
					<div class="card-body">
						<h4 class="card-title">ALL PRODUCTS</h4>
						<h6 class="card-subtitle">List of all saleable products</h6>
						<div class="table-responsive m-t-30">
							<table id="tblAllProducts" class="display nowrap table table-hover table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>SKU</th>
										<th>Product Name</th>
										<th>Category</th>
										<th>SubCategory</th>
										<th>Stock</th>
										<th>Retail Price</th>
										<th>Actions</th>
									</tr>
								</thead>


								<tbody>
										@foreach($products as $product)
											<tr>
												<td>{{ $product->sku }}</td>
												<td>{{ $product->variation_name }}</td>
												<td>{{ $product->category }}</td>
												<td>{{ $product->sub_category }}</td>
												<td>{{ $product->available_stock }}</td>
												<td>{{ $product->retail_price }}</td>
												<td>
													<a href="{{ route("editProduct", $product->product_slug) }}" class="btn btn-primary mb-2"><i class="mdi mdi-eye"></i> View</a>
													<a href="{{ route("editProduct", $product->product_slug) }}" class="btn btn-success mb-2"><i class="mdi mdi-pen"></i> Edit</a>
												</td>
											</tr>
										@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
@endsection

@push('extra-js')
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.buttons.min.js"></script>
	<script src="js/buttons.flash.min.js"></script>
	<script src="js/jszip.min.js"></script>
	<script src="js/pdfmake.min.js"></script>
	<script src="js/vfs_fonts.js"></script>
	<script src="js/buttons.html5.min.js"></script>
	<script src="js/buttons.print.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var table = $("#tblAllProducts").DataTable({
				dom: 'Blfrtip',
				buttons: [
					'excel', 'pdf', 'print'
				]
			});
		});
	</script>
@endpush
