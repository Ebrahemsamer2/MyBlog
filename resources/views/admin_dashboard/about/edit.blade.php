
@extends("admin_dashboard.layouts.app")

@section("style")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js" integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection


    @section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">About</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">About Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
          
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Edit About Page</h5>
                    <hr/>

                    <form action="{{ route('admin.setting.update') }}" method='post' enctype='multipart/form-data'>
                        @csrf
    
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <div class="mb-3">
                                            <label for="about_first_text" class="form-label">Top Text</label>
                                            <textarea name='about_first_text' class="form-control" id="about_first_text">{{ $setting->about_first_text }}</textarea>
                                        
                                            @error('about_first_text')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="about_second_text" class="form-label">Bottom Text</label>
                                            <textarea name='about_second_text' class="form-control" id="about_second_text">{{ $setting->about_second_text }}</textarea>
                                        
                                            @error('about_second_text')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class='row'>
                                            <div class='col-md-8'>
                                                <div class="mb-3">
                                                    <label for="about_first_image" class="form-label">First Image</label>
                                                    <input name='about_first_image' type='file' class="form-control" id="about_first_image">
                                                
                                                    @error('about_first_image')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class='col-md-4'>
                                                <div class='user-image p-2'>
                                                    <img class='img-fluid img-thumbnail' src='{{ asset('storage/' . $setting->about_first_image) }}' >
                                                </div>
                                            </div>
                                        </div>

                                        <div class='row'>
                                            <div class='col-md-8'>
                                                <div class="mb-3">
                                                    <label for="about_second_image" class="form-label">Second Image</label>
                                                    <input name='about_second_image' type='file' class="form-control" id="about_second_image">
                                                
                                                    @error('about_second_image')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class='col-md-4'>
                                                <div class='user-image p-2'>
                                                    <img class='img-fluid img-thumbnail' src='{{ asset('storage/' . $setting->about_second_image) }}' >
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="about_our_mission" class="form-label">About Our Mission</label>
                                            <textarea name='about_our_mission'  id='about_our_mission' class="form-control" id="our_mission" rows="3">{{ old("about_our_mission", $setting->about_our_mission) }}</textarea>
                                        
                                            @error('about_our_mission')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="about_our_vision" class="form-label">About Our Vision</label>
                                            <textarea name='about_our_vision'  id='about_our_vision' class="form-control" rows="3">{{ old("about_our_vision", $setting->about_our_vision) }}</textarea>
                                        
                                            @error('about_our_vision')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <label for="about_services" class="form-label">About Services</label>
                                            <textarea name='about_services'  id='about_services' class="form-control" rows="3">{{ old("about_services", $setting->about_services) }}</textarea>
                                        
                                            @error('about_services')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        

                                        <button class='btn btn-primary' type='submit'>Update</button>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>

                </div>
            </div>


        </div>
    </div>
    <!--end page wrapper -->
    @endsection

@section("script")
<script>
    $(document).ready(function () {
    
        setTimeout(() => {
            $(".general-message").fadeOut();
        }, 5000);

        let initTinyMCE = (id) => {
            tinymce.init({
                selector: '#'+id,
                plugins: 'advlist autolink lists link charmap print preview hr anchor pagebreak',
                toolbar_mode: 'floating',
                height: '300',

                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | rtl ltr',
                toolbar_mode: 'floating',
            });
        }

        initTinyMCE('about_our_mission');
        initTinyMCE('about_our_vision');
        initTinyMCE('about_services');

    });

</script>
@endsection