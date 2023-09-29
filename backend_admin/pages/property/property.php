<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">ព័ត៌មាន អចលនទ្រព្យ</h1>
				</div>
				<div class="col-auto">
					<div class="page-utilities">
						<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							<div class="col-auto">
								<form class="table-search-form row gx-1 align-items-center">
									<div class="col-auto">
										<input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
									</div>
									<div class="col-auto">
										<button type="submit" class="btn app-btn-secondary">Search</button>
									</div>
								</form>

							</div><!--//col-->
							<div class="col-auto">

								<select class="form-select w-auto">
									<option selected value="option-1">All</option>
									<option value="option-2">This week</option>
									<option value="option-3">This month</option>
									<option value="option-4">Last 3 months</option>

								</select>
							</div>
						</div><!--//row-->
					</div><!--//table-utilities-->
				</div><!--//col-auto-->
			</div><!--//row-->


			<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				<a class="flex-sm-fill text-sm-center nav-link active" id="property_list-tab" data-bs-toggle="tab" href="#property_list" role="tab" aria-controls="orders-all" aria-selected="true">បញ្ជីប្រភេទអចលនទ្រព្យ</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="create_property-tab" data-bs-toggle="tab" href="#create_property" role="tab" aria-controls="orders-paid" aria-selected="false">បង្កើតអចលនទ្រព្យថ្មី</a>
			</nav>


			<div class="tab-content" id="orders-table-tab-content">
				<div class="tab-pane fade show active" id="property_list" role="tabpanel" aria-labelledby="property_list-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="table-responsive">
								<table class="table app-table-hover mb-0 text-left">
									<thead>
										<tr>
											<th class="cell">#</th>
											<th class="cell" style="text-align: center;">រូបភាព</th>
											<th class="cell" style="text-align: center;">ឈ្មោះជាខ្មែរ</th>
											<th class="cell" style="text-align: center;">តម្លៃអចលនទ្រព្យ</th>
											<th class="cell" style="text-align: center;">បរិយាយ</th>
											<th class="cell" style="text-align: center;">ប្រភេទ</th>
											<th class="cell" style="text-align: center;">ស្ថានភាព</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include_once 'check_status.php';
										$rowNumber = 1;

										$sql = "
											SELECT
												p.property_id,
												p.property_img,
												p.property_name,
												p.property_price,
												p.property_desc,
												pt.property_type_kh,
												ps.property_status 
											FROM
												tbl_property p
												INNER JOIN tbl_property_type pt ON p.property_type_id = pt.property_type_id 
												LEFT JOIN tbl_property_status ps on p.property_status_id = ps.property_status_id
											ORDER BY
												p.property_id DESC; ";
										$result = mysqli_query($conn, $sql);
										while ($row = mysqli_fetch_array($result)) {
										?>
											<tr>
												<td class="cell"><?= $rowNumber++ ?></td>
												<td class="cell" style="text-align: center;"><img src="<?= $row['property_img'] ? "assets/images/img_data_store_upload/" . $row['property_img'] : 'assets/images/Asset.png' ?>" width="50px" height="50px"></td>
												<td class="cell" style="text-align: center;"><?= $row['property_name'] ?></td>
												<td class="cell" style="text-align: center;"><?= $row['property_price'] ?></td>
												<td class="cell" style="text-align: center;"><?= $row['property_desc'] ?></td>
												<td class="cell" style="text-align: center;"><?= $row['property_type_kh'] ?></td>
												<td class="cell" style="text-align: center;"><?= statusStyle($row['property_status']) ?></td>

												<td class="cell">
													<a class="btn btn-info" href="#"><i class="fas fa-eye"></i></a>
													<a class="btn btn-primary" href="index.php?p=update_property&proid=<?= $row['property_id'] ?>"><i class="far fa-edit"></i></a>
													<button type="submit" name="btnDelete" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')"><i class="fas fa-eraser"></i></i></button>
												</td>
											</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div><!--//table-responsive-->

						</div><!--//app-card-body-->
					</div><!--//app-card-->
					<nav class="app-pagination">
						<ul class="pagination justify-content-center">
							<li class="page-item disabled">
								<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
							</li>
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#">Next</a>
							</li>
						</ul>
					</nav><!--//app-pagination-->

				</div><!--//tab-pane-->

				<div class="tab-pane fade" id="create_property" role="tabpanel" aria-labelledby="create_property-tab">
					<div class="app-card app-card-orders-table mb-5">
						<div class="app-card-body">

							<!-- Form create property -->
							<div class="app-content pt-3 p-md-3 p-lg-4">
								<div class="container-xl">
									<h1 class="app-page-title">បំពេញព័ត៌មានប្រភេទនៃអចលនទ្រព្យ</h1>
									<hr class="mb-4">
									<div class="row g-4 settings-section">

										<div class="col-12 col-md-12">
											<div class="app-card app-card-settings shadow-sm p-4">

												<div class="app-card-body">
													<form class="settings-form">
														<div class="mb-3">
															<label for="txt_property_type_kh" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាខ្មែរ <span style="color: red;">*</span></label>
															<input type="text" class="form-control" name="txt_property_type_kh" id="txt_property_type_kh" value="" required>
														</div>
														<div class="mb-3">
															<label for="txt_property_type_en" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាអង់គ្លេស <span style="color: red;">*</span></label>
															<input type="text" class="form-control" name="txt_property_type_en" id="txt_property_type_en" value="" required>
														</div>
														<div class="mb-3">
															<label for="tar_property_desc" class="form-label">បរិយាយ</label>
															<textarea class="form-control" rows="3" name="tar_property_desc" id="tar_property_desc" style="height: 70px;"></textarea>
														</div>
														<button type="submit" name="btnSave" class="btn app-btn-primary">រក្សាទុក</button>
													</form>
												</div><!--//app-card-body-->

											</div><!--//app-card-->
										</div>
									</div><!--//row-->
									<!-- <hr class="my-4"> -->

								</div><!--//container-fluid-->
							</div><!--//app-content-->
							<!-- End of Form for create property -->



						</div><!--//app-card-body-->
					</div><!--//app-card-->
				</div><!--//tab-pane-->

				<div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
					<div class="app-card app-card-orders-table mb-5">
						<div class="app-card-body">


							<div class="table-responsive">
								<table class="table mb-0 text-left">
									<thead>
										<tr>
											<th class="cell">Order</th>
											<th class="cell">Product</th>
											<th class="cell">Customer</th>
											<th class="cell">Date</th>
											<th class="cell">Status</th>
											<th class="cell">Total</th>
											<th class="cell"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="cell">#15345</td>
											<td class="cell"><span class="truncate">Consectetur adipiscing elit</span></td>
											<td class="cell">Dylan Ambrose</td>
											<td class="cell"><span class="cell-data">16 Oct</span><span class="note">03:16 AM</span></td>
											<td class="cell"><span class="badge bg-warning">Pending</span></td>
											<td class="cell">$96.20</td>
											<td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
										</tr>
									</tbody>
								</table>
							</div><!--//table-responsive-->
						</div><!--//app-card-body-->
					</div><!--//app-card-->
				</div><!--//tab-pane-->
				<div class="tab-pane fade" id="orders-cancelled" role="tabpanel" aria-labelledby="orders-cancelled-tab">
					<div class="app-card app-card-orders-table mb-5">
						<div class="app-card-body">
							<div class="table-responsive">
								<table class="table mb-0 text-left">
									<thead>
										<tr>
											<th class="cell">Order</th>
											<th class="cell">Product</th>
											<th class="cell">Customer</th>
											<th class="cell">Date</th>
											<th class="cell">Status</th>
											<th class="cell">Total</th>
											<th class="cell"></th>
										</tr>
									</thead>
									<tbody>

										<tr>
											<td class="cell">#15342</td>
											<td class="cell"><span class="truncate">Justo feugiat neque</span></td>
											<td class="cell">Reina Brooks</td>
											<td class="cell"><span class="cell-data">12 Oct</span><span class="note">04:23 PM</span></td>
											<td class="cell"><span class="badge bg-danger">Cancelled</span></td>
											<td class="cell">$59.00</td>
											<td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td>
										</tr>

									</tbody>
								</table>
							</div><!--//table-responsive-->
						</div><!--//app-card-body-->
					</div><!--//app-card-->
				</div><!--//tab-pane-->
			</div><!--//tab-content-->

		</div><!--//container-fluid-->
	</div><!--//app-content-->

	<!-- Copyright -->
	<?php include_once 'pages/copyright.php'; ?>

</div><!--//app-wrapper-->

<script type="text/javascript">
	$(document).ready(function() {
		$('#property_list-tab', '#create_property').click(function() {
			window.location.href = "index.php?p=property";
		})
	})
</script>