@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Suggest My Pc</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form method="POST" action="{{ route('suggest-my-pc-result') }}">
                        @csrf

                        <p>Please select your Age:</p>
                        <input type="radio" id="age_12_16" name="age" value="age_12_16">
                        <label for="age_12_16">12-16 Years</label><br>

                        <input type="radio" id="age_17_24" name="age" value="age_17_24">
                        <label for="age_17_24">17-24 Years</label><br>

                        <input type="radio" id="age_25_40" name="age" value="age_25_40">
                        <label for="age_25_40">25-40 Years</label><br>

                        <input type="radio" id="age_40_above" name="age" value="age_40_above">
                        <label for="age_40_above">40 to above years</label>
                        <br>
                        <br>

                        <p>Please select your gender:</p>
                        <input type="radio" id="gender_male" name="gender" value="gender_male">
                        <label for="gender_male">Male</label><br>

                        <input type="radio" id="gender_female" name="gender" value="gender_female">
                        <label for="gender_female">Female</label><br>
                        <br>
                        <br>

                        <p>Primary Usage:</p>
                        <input type="radio" id="pu_home" name="primary_usage" value="pu_home">
                        <label for="pu_home">For Everyday Home Use(Basic internet Tasks)</label><br>

                        <input type="radio" id="pu_school" name="primary_usage" value="pu_school">
                        <label for="pu_school">For School</label><br>

                        <input type="radio" id="pu_work" name="primary_usage" value="pu_work">
                        <label for="pu_work">For Work</label><br>

                        <input type="radio" id="pu_basic_gaming" name="primary_usage" value="pu_basic_gaming">
                        <label for="pu_basic_gaming">For Gaming (Basic Gaming)</label><br>

                        <input type="radio" id="pu_video_streaming" name="primary_usage" value="pu_video_streaming">
                        <label for="pu_video_streaming">Video Streaming</label><br>
                        <br>
                        <br>

                        <p>Moderate Usage:</p>
                        <input type="radio" id="mu_school_high_school_student" name="moderate_usage" value="mu_school_high_school_student">
                        <label for="mu_school_high_school_student">School/Hi-School Student </label><br>

                        <input type="radio" id="mu_college_university_student" name="moderate_usage" value="mu_college_university_student">
                        <label for="mu_college_university_student">College/University Student</label><br>

                        <input type="radio" id="mu_office_executive" name="moderate_usage" value="mu_office_executive">
                        <label for="mu_office_executive">Office Executive(Basic Office works)</label><br>

                        <input type="radio" id="mu_executive_manager" name="moderate_usage" value="mu_executive_manager">
                        <label for="mu_executive_manager">Executive Manager</label><br>

                        <input type="radio" id="mu_engineering_professional" name="moderate_usage" value="mu_engineering_professional">
                        <label for="mu_engineering_professional">Engineering Professional </label><br>

                        <input type="radio" id="mu_graphics_designer" name="moderate_usage" value="mu_graphics_designer">
                        <label for="mu_graphics_designer">Graphics designer </label><br>

                        <input type="radio" id="mu_engineering_designer" name="moderate_usage" value="mu_engineering_designer">
                        <label for="mu_engineering_designer">Engineering Designer </label><br>
                        <br>
                        <br>

                        <p>Advanced Usage (Multiple Task):</p>
                        <input type="checkbox" id="au_multiple_programs" name="advanced_usage[]" value="au_multiple_programs">
                        <label for="au_multiple_programs"> Run Multiple Programs </label><br>

                        <input type="checkbox" id="au_advance_gaming" name="advanced_usage[]" value="au_advance_gaming">
                        <label for="au_advance_gaming"> Playing Games (Advanced level)</label><br>

                        <input type="checkbox" id="au_pro_video_photo_editing" name="advanced_usage[]" value="au_pro_video_photo_editing">
                        <label for="au_pro_video_photo_editing"> Professional Photo & video editing </label><br>

                        <input type="checkbox" id="au_mechanical_design_simulation" name="advanced_usage[]" value="au_mechanical_design_simulation">
                        <label for="au_mechanical_design_simulation"> Mechanical designing & Simulation </label><br>
                        <br>
                        <br>

                        <p>Performance :</p>
                        <input type="radio" id="perf_stable" name="performance" value="perf_stable">
                        <label for="perf_stable"> Stable performance  </label><br>

                        <input type="radio" id="perf_faster_stable" name="performance" value="perf_faster_stable">
                        <label for="perf_faster_stable"> Faster & Stable performance </label><br>

                        <input type="radio" id="perf_heigher" name="performance" value="perf_heigher">
                        <label for="perf_heigher"> Higher Performance  </label><br>

                        <input type="radio" id="perf_battery_backup" name="performance" value="perf_battery_backup">
                        <label for="perf_battery_backup"> Battery Backup (Up to 9hours standby) </label><br>

                        <input type="radio" id="perf_extreme" name="performance" value="perf_extreme">
                        <label for="perf_extreme"> Extreme Performance </label><br>
                        <br>
                        <br>

                        <p>Gaming Performance:</p>
                        <input type="radio" id="gaming_basic" name="gaming_performance" value="gaming_basic">
                        <label for="gaming_basic"> Basic Gaming </label><br>

                        <input type="radio" id="gaming_mid" name="gaming_performance" value="gaming_mid">
                        <label for="gaming_mid"> Mid End Gaming </label><br>

                        <input type="radio" id="gaming_extreme" name="gaming_performance" value="gaming_extreme">
                        <label for="gaming_extreme"> Extreme gaming </label><br>
                        <br>
                        <br>

                        <p>Application Software:</p>
                        <input type="checkbox" id="app_internet" name="applications[]" value="app_internet">
                        <label for="app_internet"> Internet Browser(Mozilla, Chrome) </label><br>

                        <input type="checkbox" id="app_office" name="applications[]" value="app_office">
                        <label for="app_office"> Microsoft Office </label><br>

                        <input type="checkbox" id="app_4k_video" name="applications[]" value="app_4k_video">
                        <label for="app_4k_video"> 4K video player </label><br>

                        <input type="checkbox" id="app_solid_work" name="applications[]" value="app_solid_work">
                        <label for="app_solid_work"> Solid works  </label><br>

                        <input type="checkbox" id="app_photoshop" name="applications[]" value="app_photoshop">
                        <label for="app_photoshop"> Adobe photoshop </label><br>

                        <input type="checkbox" id="app_premiere_pro" name="applications[]" value="app_premiere_pro">
                        <label for="app_premiere_pro"> Adobe Premiere Pro</label><br>

                        <input type="checkbox" id="app_lightroom" name="applications[]" value="app_lightroom">
                        <label for="app_lightroom"> Adobe Lightroom </label><br>

                        <input type="checkbox" id="app_illustrator" name="applications[]" value="app_illustrator">
                        <label for="app_illustrator"> Illustrator </label><br>

                        <input type="checkbox" id="app_autodesk_3d" name="applications[]" value="app_autodesk_3d">
                        <label for="app_autodesk_3d"> Autodesk 3ds Max </label><br>

                        <input type="checkbox" id="app_maya" name="applications[]" value="app_maya">
                        <label for="app_maya"> Maya</label><br>

                        <input type="checkbox" id="app_codeblocks" name="applications[]" value="app_codeblocks">
                        <label for="app_codeblocks"> Codeblocks  </label><br>

                        <input type="checkbox" id="app_pycharm" name="applications[]" value="app_pycharm">
                        <label for="app_pycharm"> Pycharm  </label><br>

                        <input type="checkbox" id="app_matlab" name="applications[]" value="app_matlab">
                        <label for="app_matlab"> MATLAB </label><br>

                        <input type="checkbox" id="app_autocad" name="applications[]" value="app_autocad">
                        <label for="app_autocad"> Autocad civil 3d</label><br>

                        <input type="checkbox" id="app_etap" name="applications[]" value="app_etap">
                        <label for="app_etap"> ETAP </label><br>
                        <br>
                        <br>


                        <button type="submit" class="btn btn-primary">
                            {{ __('Submit') }}
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
