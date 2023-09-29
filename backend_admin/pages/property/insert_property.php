<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<h1 class="app-page-title">បង្កើត ព័ត៌មាននៃអចលនទ្រព្យថ្មី</h1>
			<hr class="mb-4">

			<!-- Tap Click -->
			<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				<a class="flex-sm-fill text-sm-center nav-link" id="create_property-tab" data-bs-toggle="tab" href="#create_property" role="tab" aria-controls="create_property" aria-selected="false">បង្កើតអចលនទ្រព្យថ្មី</a>
			</nav>
			<div class="tab-content" id="orders-table-tab-content">
				<div class="tab-pane fade show active" id="create_property" role="tabpanel" aria-labelledby="create_property-tab">
					<div class="app-card app-card-orders-table mb-5">
						<div class="app-card-body">


							<!-- Form create property -->
							<div class="app-content pt-3 p-md-3 p-lg-4">
								<div class="container-xl">
									<div class="row g-4 settings-section">
										<div class="col-12 col-md-12">
											<div class="app-card app-card-settings shadow-sm p-4">
												<div class="app-card-body">

													<form class="settings-form">
														<div class="mb-3">
															<label for="txt_property_type_kh" class="form-label">ជ្រើសរើសប្រភេទអចលនទ្រព្យ<span style="color: red;">*</span></label>
															<select class="form-select" name="sel_property_type">
																<option selected>Open this select menu</option>
																<option value="1">One</option>
																<option value="2">Two</option>
																<option value="3">Three</option>
															</select>
														</div>

														<div class="mb-3">
															<label for="txt_property_type_kh" class="form-label">ឈ្មោះអចលនទ្រព្យ<span style="color: red;">*</span></label>
															<input type="text" class="form-control" name="txt_property_type_kh" id="txt_property_type_kh" value="" required>
														</div>

														<div class="mb-3">
															<label for="txt_property_type_en" class="form-label">តម្លៃអចលនទ្រព្យ<span style="color: red;">*</span></label>
															<input type="text" class="form-control" name="txt_property_type_en" id="txt_property_type_en" value="" required>
														</div>

														<div class="mb-3">
															<label for="txt_property_type_en" class="form-label">រូបភាពអចលនទ្រព្យ<span style="color: red;">*</span></label>
															<input type="file" class="form-control" name="txt_property_type_en" id="txt_property_type_en" value="" required>
														</div>

														<div class="mb-3">
															<label for="txt_property_type_kh" class="form-label">ជ្រើសរើសស្ថានភាពអចលនទ្រព្យ<span style="color: red;">*</span></label>
															<select class="form-select" name="sel_property_type">
																<option selected>Open this select menu</option>
																<option value="1">One</option>
																<option value="2">Two</option>
																<option value="3">Three</option>
															</select>
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
									</div>
								</div>
							</div>
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