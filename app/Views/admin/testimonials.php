<?= $this->extend('/admin/layout') ?>

<?= $this->section('content') ?>
<?php $session = session(); ?>
<!--begin::Content-->
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/decoupled-document/ckeditor.js"></script> -->
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script> -->

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Testimonials</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="/admin/" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->

                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Testimonial</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->

            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <div class="container">
        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Testimonials</span>
                    <span class="text-muted mt-1 fw-bold fs-7"></span>
                </h3>
                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="" data-bs-original-title="Click to create blog">
                    <button class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_user_model">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                            </svg>
                        </span>
                        Create Testimonial
                    </button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted">

                                <th class="">#</th>
                                <th class="min-w-150px">Picture</th>
                                <th class="min-w-200px">Name</th>
                                <th class="min-w-200px">User Type</th>
                                <th class="min-w-150px">Testimonial</th>
                                <th class="min-w-100px text-end">Actions</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
<?php 

if ($testimonials) {
    foreach ($testimonials as $key => $value) {
        extract((array) $value);
        ?>
        <tr>
            <td><?= $id ?></td>
            <td><a href="/assets/uploads/<?= $user_picture ?>" target="_blank" rel="noopener noreferrer"><img src="/assets/uploads/<?= $user_picture ?>" width="100" height="100" alt=""></a></td>
            <td><?= $name ?></td>
            <td><?= $user_type ?></td>
            <td><?= $testimonial ?></td>
            <td></td>
        </tr>
        <?php
    }
}

?>
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
    </div>


</div>
<!--end::Content-->

<!-- create user -->
<div class="modal fade" id="kt_modal_user_model" tabindex="-1" style="display: none;" aria-hidden="true">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <div class="modal-header pb-0 border-0 justify-content-end">

                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">

                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </span>

                </div>

            </div>

            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">



                <form id="kt_modal_new_target_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST" enctype="multipart/form-data" action="">

                    <div class="mb-13 text-center">

                        <h1 class="mb-3">Upload New Testimonial</h1>
                        <div class="text-muted fw-bold fs-5">
                        </div>

                    </div>

                    <div class="row">
                        
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="d-flex flex-column mb-4 fv-row fv-plugins-icon-container">

                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Name</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Name of the Client" aria-label="Name of the Client"></i>
                                </label>

                                <input required type="text" class="form-control form-control-solid" placeholder="Name" name="name">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="d-flex flex-column mb-4 fv-row fv-plugins-icon-container">

                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">User Type</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="User Type" aria-label="User Type"></i>
                                </label>

                                <input required type="text" class="form-control form-control-solid" placeholder="Student or Artist or else" name="user_type">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="d-flex flex-column mb-4 fv-row fv-plugins-icon-container">

                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">User Picture</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Select jpg or jpeg type picture" aria-label="Select jpg or jpeg type picture"></i>
                                </label>

                                <input required type="file" accept="image/jpg, image/jpeg" class="form-control form-control-solid" placeholder="Student or Artist or else" name="user_picture">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="d-flex flex-column mb-4 fv-row fv-plugins-icon-container">

                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Testimonial</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Write testimonial here" aria-label="Write testimonial here"></i>
                                </label>

                                <textarea class="form-control form-control-solid" name="testimonial" id="" cols="30" rows="10"></textarea>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>


                    </div>





                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>

                    <div></div>
                </form>

            </div>

        </div>

    </div>

</div>



<?= $this->endSection() ?>