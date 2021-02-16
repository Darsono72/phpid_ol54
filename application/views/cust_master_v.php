<div class="page-header bg-primary" >
  <h1 style="color: white"><?php echo $title;?></h1>
</div>

<div class="jumbotron"style="padding:10px;">

<div class="row" style="border-bottom: solid 2px blue;">
	<div class="col-md-5">
		<input type="text" id="cust_src" name="cust_src" class="form-control form-control-sm ui-autocomplete-input" value="" autocomplete="off" placeholder="Cari Customer.................">
	</div>

	<div class="col-md-4 button-list mb-1" style="margin-top: -5px;">
		<button class="btn btn-xs btn-primary waves-effect" id="add_master"> 
			<i class="fas fa-plus mr-1"></i><span>ADD</span> 
		</button>
		<button class="btn btn-xs btn-success waves-effect" id="save_master"> 
			<i class="fas fa-save mr-1"></i><span>SAVE</span> 
		</button>	        
		<button class="btn btn-xs btn-warning waves-effect" style="display: none;"> 
			<i class="fas fa-print mr-1"></i><span>PRINT</span> 
		</button>
	</div>	
</div>

<form id="form_master_cust">

<div class="row d-flex justify-content-left" style="margin-top: 0px;">
	<div class="col-md-7 col-fix">
		<div class="card border border-primary">
			<div class="card-body" style="padding: 5px;">
				<div class="row row-fix">					
					<div class="col-md-2 col-fix">
						<label style="margin: 10px 0px 5px 0px;" for="cust_id">Cust ID</label>
					</div>
					<div class="col-md-10 col-fix">
						<div class="row row-fix">
							<div class="col-md-3 col-fix">
								<input type="text" class="form-control form-fix" id="cust_id" name="cust_id" value="" placeholder="Cust ID..." style="color: blue; font-weight: bold;" readonly>
							</div>
							<label style="margin: 10px 10px 5px 20px;" for="cust_coa_id">COA No</label>
							<div class="col-md-3 col-fix">
								<input type="text" id="cust_coa_id" name="cust_coa_id" class="form-control form-fix" value="" placeholder="COA No..." readonly>
							</div>	
							<label style="margin: 10px 10px 5px 20px;" for="cust_init">Init</label>
							<div class="col-md-2 col-fix">
								<input type="text" id="cust_init" name="cust_init" class="form-control form-fix" value="" placeholder="Initial...">
							</div>												
						</div>
					</div>
				</div>

				<div class="row row-fix">
					<div class="col-md-2 col-fix">
						<label style="margin: 10px 0px 5px 0px;" for="cust_type">Cust Name</label>
					</div>
					<div class="col-md-10">
						<div class="row row-fix">
							<div class="col-md-2 col-fix">
								<input type="text" id="cust_type" name="cust_type" class="form-control form-fix" value="" placeholder="CV/PT...">
							</div>
							<div class="col-md-10 col-fix">
								<input type="text" id="cust_name" name="cust_name" class="form-control form-fix" value="" placeholder="Cust Name..." style="font-weight: bold;">
							</div>					
						</div>
					</div>					
				</div>

				<div class="row row-fix">
					<div class="col-md-2 col-fix">
						<label style="margin: 10px 0px 5px 0px;" for="cust_type">Brand Name</label>
					</div>
					<div class="col-md-10"><div class="row row-fix">
							<div class="col-md-12 col-fix">
								<input type="text" id="cust_brand" name="cust_brand" class="form-control form-fix" value="" placeholder="Brand Name...">
							</div>					
					</div></div>					
				</div>				

				<div class="row row-fix">
					<div class="col-md-2 col-fix">
						<label style="margin: 10px 0px 5px 0px;" for="cust_ph1">Phone</label>
					</div>
					<div class="col-md-10 col-fix">
						<div class="row row-fix">
							<div class="col-md-3 col-fix">
								<input type="text" class="form-control form-fix" id="cust_ph1" name="cust_ph1" value="" placeholder="021-...">
							</div>
							<label style="margin: 10px 10px 5px 20px;" for="cust_ph2">#2</label>
							<div class="col-md-3 col-fix">
								<input type="text" id="cust_ph2" name="cust_ph2" class="form-control form-fix" value="" placeholder="021...">
							</div>	
							<label style="margin: 10px 10px 5px 20px;" for="cust_fax">Fax</label>
							<div class="col-md-3 col-fix">
								<input type="text" id="cust_fax" name="cust_fax" class="form-control form-fix" value="" placeholder="021...">
							</div>												
						</div>
					</div>					
				</div>

				<div class="row row-fix">
					<div class="col-md-2 col-fix">
						<label style="margin: 10px 0px 5px 0px;" for="cust_email">e-Mail</label>
					</div>
					<div class="col-md-10 col-fix"><div class="row row-fix">
						<div class="col-md-7 col-fix">
							<input type="text" id="cust_email" name="cust_email" class="form-control form-fix" value="" placeholder="e-Mail address...">
						</div>					
						<div class="col-md-2 col-fix" style="color: red; text-align: right;">Pay Term</div>
						<div class="col-md-2 col-fix">
							<input type="text" id="cust_pay_term" name="cust_pay_term" class="form-control form-fix" style="text-align: center;" value="">
						</div>	
						<div class="col-md-1 col-fix">days</div>						
					</div></div>					
				</div>

				<hr class="red">

				<div class="row row-fix">
					<div class="col-md-2 col-fix">
						<label style="margin: 10px 0px 5px 0px;" for="prov_id">Provinsi</label>
					</div>
					<div class="col-md-10 col-fix">
						<div class="row row-fix">                                  
                            <div class="col-md-5 col-fix">
                                <select class="form-control form-fix" id="prov_id" name="prov_id" onchange="get_kabupaten(this.value,'')">
                                	<option value="">--- Provinsi ---</option>
                                    	<?php echo pill_provinsi();?>
                                </select>
                            </div>  
							<div class="col-md-2 col-fix">
								<label style="margin: 10px 0px 5px 0px;" for="kab_id">Kab./Kota</label>
							</div>
                            <div class="col-md-5 col-fix">
                                <select class="form-control form-fix" id="kab_id" name="kab_id" onchange="get_kecamatan(this.value,'')">
                                    <option value="">--- Kab./Kota ---</option>
                                </select>
                            </div>                                                                  				
						</div>
					</div>					
				</div>

				<div class="row row-fix">
					<div class="col-md-2 col-fix">
						<label style="margin: 10px 0px 5px 0px;" for="kec_id">Kecamatan</label>
					</div>
					<div class="col-md-10 col-fix">
						<div class="row row-fix">                                  
                            <div class="col-md-5 col-fix">
                                <select class="form-control form-fix" id="kec_id" name="kec_id" onchange="get_desa(this.value,'')">
                                    <option value="">--- Kecamatan ---</option>
                                </select>
                            </div>  
							<div class="col-md-2 col-fix">
								<label style="margin: 10px 0px 5px 0px;" for="desa_id">Desa/Kel.</label>
							</div>
                            <div class="col-md-5 col-fix">
                                <select class="form-control form-fix" id="desa_id" name="desa_id">
                                    <option value="">--- Kab./Kota ---</option>
                                </select>
                            </div>                                                                  				
						</div>
					</div>					
				</div>

				<div class="row row-fix">
					<div class="col-md-2 col-fix">
						<label style="margin: 10px 0px 5px 0px;" for="cust_address">Address</label>
					</div>
					<div class="col-md-10 col-fix">
						<div class="row row-fix">
							<div class="col-md-10 col-fix">
								<input type="text" id="cust_address" name="cust_address" class="form-control form-fix" value="" placeholder="Address...">
							</div>	
							<div class="col-md-2 col-fix">
								<input type="text" id="cust_kd_pos" name="cust_kd_pos" class="form-control form-fix" value="" placeholder="Kd. Pos...">
							</div>												
						</div>
					</div>					
				</div>


				<hr class="red">
				<div class="row row-fix">
					<div class="col-md-2 col-fix">
						<label style="margin: 10px 0px 5px 0px;" for="cust_note">Note</label>
					</div>
					<div class="col-md-10 col-fix">
						<div class="row row-fix">
							<div class="col-md-12 col-fix">
								<input type="text" id="cust_note" name="cust_note" class="form-control form-fix" value="" placeholder="Address...">
							</div>					
						</div>
					</div>					
				</div>

				<div class="row row-fix">
					<div class="col-md-2 col-fix">
						<label style="margin: 10px 0px 5px 0px;" for="cust_note">Status</label>
					</div>
					<div class="col-md-10 col-fix">
						<div class="row row-fix">
							<div class="col-md-12 col-fix">
								<span type="button" class="btn btn-xs btn-success waves-effect waves-light" id="cust_good" style="display: none;" onclick="cust_status('1')"><i class="far fa-thumbs-up mr-1"></i>Good Perfomance</span>
								<span type="button" class="btn btn-xs btn-danger waves-effect waves-light" id="cust_blacklist" style="display: none;" onclick="cust_status('0')"><i class="far fa-thumbs-down mr-1"></i>Blacklisted</span>
							</div>					
						</div>
					</div>					
				</div>				
			</div>
		</div>
	</div>
</div>
</form>
	
</div>

<script src="<?php echo base_url('/assets/js/cust_master.js?r='.rand());?>"></script>