@extends('main_layouts.master')

@section('title', 'MyBlog | Contact')

@section('content')

		<div class="colorlib-contact">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-12 animate-box">
						<h2>Contact Information</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="contact-info-wrap-flex">
									<div class="con-info">
										<p><span><i class="icon-location-2"></i></span> 198 West 21th Street, <br> Suite 721 New York NY 10016</p>
									</div>
									<div class="con-info">
										<p><span><i class="icon-phone3"></i></span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
									</div>
									<div class="con-info">
										<p><span><i class="icon-paperplane"></i></span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
									</div>
									<div class="con-info">
										<p><span><i class="icon-globe"></i></span> <a href="#">yourwebsite.com</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h2>Message Us</h2>
					</div>

					<div class="col-md-6">
						<form autocomplete="off" method="POST" action="{{ route('contact.store') }}">
							@csrf
							<div class="row form-group">
								<div class="col-md-6">
									<x-blog.form.input value='{{ old("first_name") }}' placeholder='Your Firstname' name="first_name" />

								</div>
								<div class="col-md-6">
									<x-blog.form.input value='{{ old("last_name") }}' placeholder='Your Lastname' name="last_name" />
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<x-blog.form.input value='{{ old("email") }}' placeholder='Your Email' type='email' name="email" />
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<x-blog.form.input value='{{ old("subject") }}' required='false' name="subject" placeholder='Your Subject' />
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<x-blog.form.textarea value='{{ old("message") }}' placeholder='What you want to tell us.' name="message" />
								</div>
							</div>
							<div class="form-group">
								<input type="submit" value="Send Message" class="btn btn-primary">
							</div>
						</form>

						<x-blog.message :status="'success'" />
						
					</div>
					<div class="col-md-6">
						<div id="map" class="colorlib-map"></div>
					</div>
				</div>
			</div>
		</div>
		
@endsection