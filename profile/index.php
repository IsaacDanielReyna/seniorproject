<?require_once("../scripts/head.php");?>
<script src="./js/script.js?v=<?=time()?>"></script>
<html lang="en">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<!-- Default panel contents -->
					<div class="panel-heading"><strong>Settings</strong></div>
						<!-- List group -->
						<ul class="list-group">
						<li class="list-group-item">Profile</li>
						<li class="list-group-item">Company</li>
						<li class="list-group-item">Employees</li>
						<li class="list-group-item">Notifications</li>
						<li class="list-group-item">Billing</li>
					</ul>
				</div>			
			</div>

			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"><strong>Profile</strong></div>
					
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3">
								<a href="#" class="thumbnail">
									<img src="https://avatars2.githubusercontent.com/u/17104924?v=3&s=466" alt="...">
								</a>
							</div>
							
							<div class="col-md-3">
								<div class="form-group">								
									<label for="fileinput" class="btn btn-default btn-file">
										<span id="filename">Upload new picture</span><input id="fileinput" type="file" style="display: none;">
									</label>
									<p class="help-block">100 KB Max</p>

								</div>
							</div>
						</div>

						<form>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputEmail1">First Name</label>
										<input type="text" class="form-control" id="first_name" placeholder="First Name">
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputEmail1">Middle Name</label>
										<input type="text" class="form-control" id="middle_name" placeholder="Middle Name">
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="exampleInputEmail1">Last Name</label>
										<input type="text" class="form-control" id="last_name" placeholder="Last Name">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="email_address">Email address</label>
										<input type="email" class="form-control" id="email_address" placeholder="Email">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="phone_number">Phone Number</label>
										<input type="text" class="form-control" id="phone_number" placeholder="Phone Number">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="street_address">Street Address</label>
										<input type="text" class="form-control" id="street_address" placeholder="Street Address">
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label for="city">City</label>
										<input type="text" class="form-control" id="city" placeholder="City">
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label for="state">State</label>
										<select class="form-control" id="state" placeholder="State">
											<option>State</option>
											<option value="AL">Alabama</option>
											<option value="AK">Alaska</option>
											<option value="AZ">Arizona</option>
											<option value="AR">Arkansas</option>
											<option value="CA">California</option>
											<option value="CO">Colorado</option>
											<option value="CT">Connecticut</option>
											<option value="DE">Delaware</option>
											<option value="DC">District Of Columbia</option>
											<option value="FL">Florida</option>
											<option value="GA">Georgia</option>
											<option value="HI">Hawaii</option>
											<option value="ID">Idaho</option>
											<option value="IL">Illinois</option>
											<option value="IN">Indiana</option>
											<option value="IA">Iowa</option>
											<option value="KS">Kansas</option>
											<option value="KY">Kentucky</option>
											<option value="LA">Louisiana</option>
											<option value="ME">Maine</option>
											<option value="MD">Maryland</option>
											<option value="MA">Massachusetts</option>
											<option value="MI">Michigan</option>
											<option value="MN">Minnesota</option>
											<option value="MS">Mississippi</option>
											<option value="MO">Missouri</option>
											<option value="MT">Montana</option>
											<option value="NE">Nebraska</option>
											<option value="NV">Nevada</option>
											<option value="NH">New Hampshire</option>
											<option value="NJ">New Jersey</option>
											<option value="NM">New Mexico</option>
											<option value="NY">New York</option>
											<option value="NC">North Carolina</option>
											<option value="ND">North Dakota</option>
											<option value="OH">Ohio</option>
											<option value="OK">Oklahoma</option>
											<option value="OR">Oregon</option>
											<option value="PA">Pennsylvania</option>
											<option value="RI">Rhode Island</option>
											<option value="SC">South Carolina</option>
											<option value="SD">South Dakota</option>
											<option value="TN">Tennessee</option>
											<option value="TX">Texas</option>
											<option value="UT">Utah</option>
											<option value="VT">Vermont</option>
											<option value="VA">Virginia</option>
											<option value="WA">Washington</option>
											<option value="WV">West Virginia</option>
											<option value="WI">Wisconsin</option>
											<option value="WY">Wyoming</option>
										</select>
									</div>
								</div>
								
								<div class="col-md-2">
									<div class="form-group">
										<label for="zip_code">Zip Code</label>
										<input type="text" class="form-control" id="zip_code" placeholder="Zip Code">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="password1">Password</label>
										<input type="password" class="form-control" id="password1" placeholder="Password">
									</div>
								</div>
							</div>

							<button type="submit" class="btn btn-success">Save Changes</button>
						</form>						
					</div>
				</div>
			</div>
		</div>
	</div>
</html>