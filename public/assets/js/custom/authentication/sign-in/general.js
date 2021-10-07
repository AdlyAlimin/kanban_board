"use strict";
var KTSigninGeneral = (function() {
    var t, e, i;
    return {
        init: function() {
            (t = document.querySelector("#kt_sign_in_form")),
                (e = document.querySelector("#kt_sign_in_submit")),
                (i = FormValidation.formValidation(t, {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: "Email is required"
                                },
                                emailAddress: {
                                    message:
                                        "The value is not a valid email address"
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "The password is required"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row"
                        })
                    }
                })),
                e.addEventListener("click", function(n) {
                    n.preventDefault(), i.validate().then(function(i) {});
                });
        }
    };
})();
KTUtil.onDOMContentLoaded(function() {
    KTSigninGeneral.init();
});
