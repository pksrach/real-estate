<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">ប្រភេទ អចលនទ្រព្យ</h1>
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
				<a class="flex-sm-fill text-sm-center nav-link active" id="property_type_list-tab" data-bs-toggle="tab" href="#property_type_list" role="tab" aria-controls="orders-all" aria-selected="true">បញ្ជីប្រភេទអចលនទ្រព្យ</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="create_property_type-tab" data-bs-toggle="tab" href="#create_property_type" role="tab" aria-controls="orders-paid" aria-selected="false">បង្កើតអចលនទ្រព្យថ្មី</a>
			</nav>

			<?php
			# Update
			if (isset($_POST['btnUpdate'])) {
				$id = $_POST['u_id'];
				$property_type_kh = $_POST['txt_property_type_kh'];
				$property_type_en = $_POST['txt_property_type_en'];
				$property_type_desc = $_POST['tar_property_type_desc'];

				if (trim($property_type_kh) != '' && trim($property_type_en) != '') {
					$sql = "UPDATE tbl_property_type SET property_type_kh = '$property_type_kh', property_type_en = '$property_type_en', property_type_desc = '$property_type_desc' WHERE property_type_id = $id";

					if (mysqli_query($conn, $sql)) {
						echo msgstyle('Data updated success', 'success');
					} else {
						echo msgstyle('Data updated unsuccess', 'info');
					}
				}
			}

			# Delete
			if (isset($_GET['btnDelete'])) {
				$id = $_GET['txtid'];
				$sql = "DELETE FROM tbl_property_type WHERE property_type_id = $id";

				if (mysqli_query($conn, $sql)) {
					echo msgstyle('Data deleted success', 'success');
				} else {
					echo msgstyle('Data deleted unsuccess', 'info');
				}
			}
			?>

			<div class="tab-content" id="orders-table-tab-content">
				<div class="tab-pane fade show active" id="property_type_list" role="tabpanel" aria-labelledby="property_type_list-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="table-responsive">
								<table class="table app-table-hover mb-0 text-left">
									<thead>
										<tr>
											<th class="cell">#</th>
											<th class="cell">ឈ្មោះប្រភេទអចលនទ្រព្យជាខ្មែរ</th>
											<th class="cell">ឈ្មោះប្រភេទអចលនទ្រព្យជាអង់គ្លេស</th>
											<th class="cell">បរិយាយ</th>
											<th class="cell">សកម្មភាព</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$sql = "SELECT * FROM tbl_property_type order by property_type_id desc";
										$result = mysqli_query($conn, $sql);
										while ($row = mysqli_fetch_array($result)) {
										?>
											<form method="get">
												<input type="hidden" name="pt" value="property_type" />
												<input type="hidden" name="txtid" value="<?= $row['property_type_id'] ?>" />
												<tr>
													<td class="cell"><?= $row['property_type_id'] ?></td>
													<td class="cell"><?= $row['property_type_kh'] ?></td>
													<td class="cell"><?= $row['property_type_en'] ?></td>
													<td class="cell"><?= $row['property_type_desc'] ?></td>
													<td class="cell">
														<a class="btn btn-info" href="#"><i class="fas fa-eye"></i></a>
														<a class="btn btn-primary" href="#" data-toggle="modal" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['property_type_id'] ?>"><i class="far fa-edit"></i></a>
														<button type="submit" name="btnDelete" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')"><i class="fas fa-eraser"></i></i></button>
													</td>
												</tr>
											</form>
										<?php
											// Modal
											echo '
											<div class="modal fade bd-example-modal-lg" id="editModal' . $row['property_type_id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog modal-lg" role="document">
											  <div class="modal-content">
												<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">កែប្រប្រភេទអចលនទ្រព្យ</h5>
												</div>
												<div class="modal-body">
												
												<!-- Form -->
												<div class="app-card-body">
													<form method="post" class="settings-form" id="create_property_type-form" method="post" onsubmit="saveData(); return false;">

														<input type = "hidden" name="u_id" value="' . $row['property_type_id'] . '" />

														<div class="mb-3">
															<label for="txt_property_type_kh" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាខ្មែរ <span style="color: red;">*</span></label>
															<input type="text" class="form-control" name="txt_property_type_kh" id="txt_property_type_kh" value="' . $row['property_type_kh'] . '" required>
														</div>
														<div class="mb-3">
															<label for="txt_property_type_en" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាអង់គ្លេស <span style="color: red;">*</span></label>
															<input type="text" class="form-control" name="txt_property_type_en" id="txt_property_type_en" value="' . $row['property_type_en'] . '" required>
														</div>
														<div class="mb-3">
															<label for="tar_property_type_desc" class="form-label">បរិយាយ</label>
															<textarea class="form-control" rows="3" name="tar_property_type_desc" id="tar_property_type_desc" style="height: 70px;">' . $row['property_type_desc'] . '</textarea>
														</div>

														<button type="submit" name="btnUpdate" class="btn app-btn-primary">កែប្រែ</button>
													</form>
												</div><!--//app-card-body-->

												</div>
												
											  </div>
											  </div>
											</div>
											';
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

				<div class="tab-pane fade" id="create_property_type" role="tabpanel" aria-labelledby="create_property_type-tab">

					<?php
					if (isset($_POST['btnSave'])) {
						$property_type_kh = $_REQUEST['txt_property_type_kh'];
						$property_type_en = $_POST['txt_property_type_en'];
						$property_type_desc = $_REQUEST['tar_property_type_desc'];

						$sql = "
						INSERT INTO tbl_property_type (property_type_kh, property_type_en, property_type_desc) 
						VALUES ('$property_type_kh', '$property_type_en', '$property_type_desc');
						";

						if (mysqli_query($conn, $sql)) {
							echo msgstyle('Data inserted success', 'success');
						} else {
							echo msgstyle('Error inserting' . "$sql", 'warning') . mysqli_error($conn);
						}
					}
					// Close connection
					mysqli_close($conn);
					?>

					<div class="app-card app-card-orders-table mb-5">
						<div class="app-card-body">

							<div class="app-content pt-3 p-md-3 p-lg-4">
								<div class="container-xl">
									<h1 class="app-page-title">បំពេញព័ត៌មានប្រភេទនៃអចលនទ្រព្យ</h1>
									<hr class="mb-4">
									<div class="row g-4 settings-section">
										<div class="col-12 col-md-12">
											<div class="app-card app-card-settings shadow-sm p-4">
												<div class="app-card-body">

													<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" class="settings-form" id="create_property_type-form" method="post" onsubmit="saveData(); return false;">
														<div class="mb-3">
															<label for="txt_property_type_kh" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាខ្មែរ <span style="color: red;">*</span></label>
															<input type="text" class="form-control" name="txt_property_type_kh" id="txt_property_type_kh" value="" required>
														</div>
														<div class="mb-3">
															<label for="txt_property_type_en" class="form-label">ឈ្មោះប្រភេទអចលនទ្រព្យជាអង់គ្លេស <span style="color: red;">*</span></label>
															<input type="text" class="form-control" name="txt_property_type_en" id="txt_property_type_en" value="" required>
														</div>
														<div class="mb-3">
															<label for="tar_property_type_desc" class="form-label">បរិយាយ</label>
															<textarea class="form-control" rows="3" name="tar_property_type_desc" id="tar_property_type_desc" style="height: 70px;"></textarea>
														</div>
														<!-- <button type="submit" name="btnSave" class="btn app-btn-primary" onclick="saveData()">រក្សាទុក</button> -->
														<button type="submit" name="btnSave" value="រក្សាទុក" class="btn app-btn-primary">Submit</button>
													</form>

													<!-- save data -->
													<!-- <script src="assets/js/service/create_property_type.js"></script> -->

												</div><!--//app-card-body-->

											</div><!--//app-card-->
										</div>
									</div><!--//row-->

								</div><!--//container-fluid-->
							</div><!--//app-content-->

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
		$('#property_type_list-tab', '#create_property_type').click(function() {
			window.location.href = "index.php?pt=property_type";
		})
	})
</script>