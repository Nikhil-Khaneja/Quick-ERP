<div class="container-fluid">
					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between">
						<h1 class="h3 mb-4 text-gray-800">Sales</h1>
					</div>

					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="card shadow mb-4">
									<!-- CARD HEADER-->
									<div class="card-header py-3 d-flex flex-row justify-content-end">
                                        <div class="mr-3">
                                            <input type="text"
											 name="email" id="customer_email"
											  class="form-control"
											   placeholder="Enter Email Of Customer">
                                        </div>
                                        <div>
                                            <p class="email-verify" id="email_verify_success">
                                                <i class="fas fa-check fa-sm text-white mr-1">Email Verified</i>
                                            </p>

                                            <p class="email-verify bg-danger d-inline-block mb-0" id="email_verify_fail">
                                                <i class="fas fa-times fa-sm text-white mr-1">Email Not Verified</i>
                                            </p>
											

											<a href=" <?=BASEPAGES;?>add-customer.php"
											class="btn btn-sm btn-warning shadow-sm d-inline-block" id="add_customer_btn"
											style="display: none">
											<i class="fas fa-users fa-sm text-white"></i>Add Customer
											</a>

											<button type="button" class="d-sm-inline-block btn btn-primary shadow-sm" name="check_email" id="check_email">
											<i class="fas fa-enveloe fa-sm text-white"></i> Check Email
											</button>
                                        </div>
									</div>

									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">
									<i class="fas fa-plus"></i>Sales
									</h6>

									<button type="button"
									onclick="addProduct();"
									class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
									<i class="fas fa-plus fa-sm text-white"></i>Add One More Product
									</button>
									</div>
									<!-- CARD HEADER-->

									<!-- CARD BODY-->

									<form action="<?= BASEURL; ?>helper/routing.php" method="POST">

										<input type="hidden" name="csrf_token" value="<?= Session::getSession('csrf_token'); ?>" id="csrf_token">

										<input type="text" name="customer_id" id="customer_id">											

									<div class="card-body">

									<div id="products_container">
									
									<!-- BEGIN: PRODUCT CUSTOM CONTROL -->
									<div class="row product_row" id="element_1">
										<!-- BEGIN: CATEGORY  CONTROL -->
												<div class="col-md-2">
													<div class="form-group">
														<label for="">Category</label>
														<select id="category_1" class="form-control">
														<option disabled selected>Select Category</option>

														<?php
														$categories = $di->get('database')->readData("category",['id','name'],"deleted=0");

														foreach($categories as $category){
															echo "<option value='{$category->id}'>{$category->name}</option>";
														}
														?>
														</select>
													</div>
												</div>
												<!--END CATEGORY SELECT-->

												<!--BEGIN PRODUCTS SELECT-->
												<div class="col-md-3">
													<div class="form-group">
														<label for="">Products</label>
														<select name="product_id[]" id="product_1" class="form-control">
														<option disabled selected>Select Product</option>
														</select>
													</div>
												</div>
												<!--END PRODUCT SELECT-->

												<!--BEGIN QUANTITY-->

												<div class="col-md-2">
													<div class="form-group">
														<label for="">Quantity</label>
														<input type="text" name="quantity[]" id="quantity_1"
														class="form-control" placeholder="Enter Qunatity"
														>
														
													</div>
												</div>
												<!--END QUANTITY-->

												<!--BEGIN Discount-->

												<div class="col-md-2">
													<div class="form-group">
														<label for="">Discount</label>
														<input type="text" name="discount[]" id="discount_1"
														class="form-control" placeholder="Enter Discount"
														>
														
													</div>
												</div>
												<!--END DISCOUNT-->

												
												<!--BEGIN SELLING PRICE-->

												<div class="col-md-2">
													<div class="form-group">
														<label for="">Selling Price</label>
														<input type="text"  id="selling_price_1"
														class="form-control" disabled
														>
														
													</div>
												</div>
												<!--END SELLING PRICE-->

												
												<!--BEGIN DELETE BTN-->

												<div class="col-md-1">
													<div class="form-group">
														<button onclick="deleteProduct(1)" type="button"
														class="btn-danger btn" style="margin-top: 40%;"
														>
														<i class="far fa-trash-alt"></i>
													</button>
														
													</div>
												</div>
												<!--END DELETE BTN-->

											</div>
									</div>
									<input type="submit" value="Submit" name="add_category" class="btn btn-primary">
										</form>
									</div>
									<!-- END OF CARD BODY-->
								</div>
							</div>
						</div>