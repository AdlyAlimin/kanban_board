<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
@stack('custom-script-vendor')
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
@stack('custom-script')
<!--end::Page Custom Javascript-->