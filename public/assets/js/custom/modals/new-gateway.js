"use strict";
var KTModalNewTarget = (function () {
    var t, e, n, a, o, i;
    return {
        init: function () {
            (i = document.querySelector("#kt_modal_new_gateway")) &&
                ((o = new bootstrap.Modal(i)),
                (a = document.querySelector("#kt_modal_new_gateway_form")),
                (t = document.getElementById("kt_modal_new_gateway_submit")),
                (e = document.getElementById("kt_modal_new_gateway_cancel")),
                $(a.querySelector('[name="gateway_mac"]')).on(
                    "change",
                    function () {
                        n.revalidateField("gateway_mac");
                    }
                ),
                $(a.querySelector('[name="gateway_zone"]')).on(
                    "change",
                    function () {
                        n.revalidateField("gateway_zone");
                    }
                ),
                (n = FormValidation.formValidation(a, {
                    fields: {
                        name: {
                            validators: {
                                notEmpty: {
                                    message: "Gateway name is required",
                                },
                            },
                        },
                        mac: {
                            validators: {
                                notEmpty: {
                                    message: "Gateway mac is required",
                                },
                            },
                        },
                        zone: {
                            validators: {
                                notEmpty: {
                                    message: "Gateway zone is required",
                                },
                            },
                        },
                        lat: {
                            validators: {
                                notEmpty: {
                                    message: "Gateway latitude is required",
                                },
                            },
                        },
                        long: {
                            validators: {
                                notEmpty: {
                                    message: "Gateway longitude is required",
                                },
                            },
                        },
                        pole: {
                            validators: {
                                notEmpty: {
                                    message: "Gateway pole is required",
                                },
                            },
                        },
                        cctv: {
                            validators: {
                                notEmpty: {
                                    message: "Gateway cctv is required",
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        defaultSubmit:
                            new FormValidation.plugins.DefaultSubmit(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                })),
                t.addEventListener("click", function (e) {
                    e.preventDefault(),
                        n &&
                            n.validate().then(function (e) {
                                console.log("validated!"),
                                    "Valid" == e
                                        ? (t.setAttribute(
                                              "data-kt-indicator",
                                              "on"
                                          ),
                                          (t.disabled = !0),
                                          setTimeout(function () {
                                              t.removeAttribute(
                                                  "data-kt-indicator"
                                              ),
                                                  (t.disabled = !1),
                                                  Swal.fire({
                                                      text: "Form has been successfully submitted!",
                                                      icon: "success",
                                                      buttonsStyling: !1,
                                                      confirmButtonText:
                                                          "Ok, got it!",
                                                      customClass: {
                                                          confirmButton:
                                                              "btn btn-primary",
                                                      },
                                                  }).then(function (t) {
                                                      t.isConfirmed && o.hide();
                                                  });
                                          }, 2e3))
                                        : Swal.fire({
                                              text: "Sorry, looks like there are some errors detected, please try again.",
                                              icon: "error",
                                              buttonsStyling: !1,
                                              confirmButtonText: "Ok, got it!",
                                              customClass: {
                                                  confirmButton:
                                                      "btn btn-primary",
                                              },
                                          });
                            });
                }),
                e.addEventListener("click", function (t) {
                    t.preventDefault(),
                        Swal.fire({
                            text: "Are you sure you would like to cancel?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Yes, cancel it!",
                            cancelButtonText: "No, return",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light",
                            },
                        }).then(function (t) {
                            t.value
                                ? (a.reset(), o.hide())
                                : "cancel" === t.dismiss &&
                                  Swal.fire({
                                      text: "Your form has not been cancelled!.",
                                      icon: "error",
                                      buttonsStyling: !1,
                                      confirmButtonText: "Ok, got it!",
                                      customClass: {
                                          confirmButton: "btn btn-primary",
                                      },
                                  });
                        });
                }));
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTModalNewTarget.init();
});
