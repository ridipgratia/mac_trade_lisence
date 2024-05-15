class TradeModule {
    // documentObject = {
    //     identity_document: null,
    //     address_document: null
    // }
    constructor() {
        this.identity_document = '';
        this.address_document = '';
    }
    async handleFiles(files) {
        var file = files[0];
        console.log(file);
        // $('#identity_proof_id').val(file.name);
    }
    async dragEnter(e, drag_component_id) {
        e.preventDefault();
        e.stopPropagation();
        $(drag_component_id).addClass("add-trade-file-hover");
    }
    async dragOver(e) {
        e.preventDefault();
        e.stopPropagation();
    }
    async dragLeave(e, drag_component_id) {
        e.preventDefault();
        e.stopPropagation();
        $(drag_component_id).removeClass("add-trade-file-hover");
    }
    // -------------validate select file --------------
    async validateSelectFile(selected_file) {
        var maxSize = 3 * 1024 * 1024;
        var check_file = false;
        if (selected_file[0].type !== "application/pdf") {
            return "Only Pdf Type file";
        } else {
            if (selected_file[0].size <= maxSize) {
                check_file = true;
            } else {
                return "File Size must be 3 mb";
            }
        }
        return check_file;
    }
    async DropMethod(e, drag_component_id, input_index) {
        // this.address_document = null;
        // this.identity_document = null;
        $(".trade_document_error")
            .eq(input_index - 1)
            .html("");
        e.preventDefault();
        e.stopPropagation();
        $(drag_component_id).removeClass("add-trade-file-hover");
        var selected_file = e.originalEvent.dataTransfer.files;
        var check_file = await this.validateSelectFile(selected_file);
        if (check_file == true) {
            if (input_index == 1) {
                this.identity_document = selected_file[0];
                $("#identity_docs").html(selected_file[0].name);
            } else if (input_index == 2) {
                this.address_document = selected_file[0];
                $("#address_docs").html(selected_file[0].name);
            }
        } else {
            $(".trade_document_error")
                .eq(input_index - 1)
                .html(check_file);
        }
    }
    // ------------------ check file browse --------------
    async checkBrowseFile(select_file, input_index) {
        // this.identity_document = null;
        // this.address_document = null;
        $(".trade_document_error")
            .eq(input_index - 1)
            .html("");
        if (select_file.files.length > 0) {
            var check_file = await this.validateSelectFile(select_file.files);
            if (check_file == true) {
                if (input_index == 1) {
                    this.identity_document = select_file.files[0];
                    $("#identity_docs").html(select_file.files[0].name);
                } else if (input_index == 2) {
                    this.address_document = select_file.files[0];
                    $("#address_docs").html(select_file.files[0].name);
                }
            } else {
                $(".trade_document_error")
                    .eq(input_index - 1)
                    .html(check_file);
            }
        }
    }

    // ----------------- validate all input field--------------------
    async validateAllField() {
        var check_validate = true;
        $(".trade_error").html("");
        for (var i = 0; i < $(".trade-input-name").length; i++) {
            if (
                $(".trade-input-name").eq(i).val() == null ||
                $(".trade-input-name").eq(i).val() == ""
            ) {
                $(".trade_error")
                    .eq(i)
                    .html(
                        `* ${$(".trade-input-name")
                            .eq(i)
                            .attr("name")
                            .replaceAll("_", " ")} is required field !`
                    );
                check_validate = false;
            }
        }
        if (check_validate) {
            if (this.identity_document == '') {
                $(".trade_document_error")
                    .eq(0)
                    .html("Identity Proof is required field");
                check_validate = false;
            } else {
                check_validate = true;
            }
            if (this.address_document == '') {
                $(".trade_document_error")
                    .eq(1)
                    .html("Address Proof is required field");
                check_validate = false;
            } else {
                check_validate = true;
            }
            // $('.trade_document_error').eq(0).html(this.identity_document ? ('', check_validate = "") : "Identity Proof is required field !", check_validate = false);
            // $('.trade_document_error').eq(1).html(this.address_document ? ('', check_validate = "") : "Address Proof is required field !", check_validate = false);
            if (check_validate) {
                if ($("#trade-checkout").is(":checked")) {
                    check_validate = true;
                } else {
                    check_validate = false;
                }
            }
        } else {
            $("html, body").animate(
                {
                    scrollTop: $(".frist-trade-div").offset().top, // Scroll to the target section
                },
                "fast"
            );
        }
        return check_validate;
    }
    async checkData() {
        console.log(this.identity_document);
        console.log(this.address_document);
    }
    // check phone number for otp send ------------------
    async checkTradePhone(number) {
        if (number != "") {
            var regex = /^\d{10}$/;
            if (regex.test(number)) {
                $.ajax({
                    type: "post",
                    url: "/verify-phone-number",
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        phone_number: number
                    },
                    success: function (response) {
                        console.log(response);
                    }, error: function (data) {
                        console.log(data);
                    }
                });
                $('.trade-otp-div').eq(0).attr({
                    'style': 'display:flex !important'
                });
                $('#send_trade_otp').html(`<i class="fa fa-spinner fa-spin"></i>`)
                $('#send_trade_otp').attr('disabled', true);
                $(".trade-contact-error").eq(0).html("");
                setTimeout(function () {
                    $('#send_trade_otp').html(`Send OTP`);
                    $('#send_trade_otp').attr('disabled', false);
                }, 1000)
            } else {
                $(".trade-contact-error").eq(0).html("Enter a valid phone number !");
            }
        } else {
            $(".trade-contact-error").eq(0).html("Enter a phone number !");
        }
    }
    async addTrade(form) {
        var form_data = new FormData(form[0]);
        form_data.append('identity_proof', this.identity_document);
        form_data.append('address_proof', this.address_document);
        $('#new-trade-btn').html(`<i class="fa fa-spinner fa-spin"></i>`);
        await $.ajax({
            type: "post",
            url: '/add-trade-post',
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: form_data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
                $('.trade_error').html('');
                if (response.res_data.error_step == 1) {
                    for (var i = 0; i < $('.trade-input-name').length; i++) {
                        response.res_data.message.forEach(mes => {
                            if (mes.indexOf($('.trade-input-name').eq(i).attr('name').replaceAll('_', ' ')) !== -1) {
                                $('.trade_error').eq(i).html(mes);
                            }
                        });
                    }
                } else {
                    if (response.res_data.status == 400) {
                        Swal.fire(
                            'info',
                            response.res_data.message,
                            'success'
                        );
                    } else {
                        // Swal.fire(
                        //     'success',
                        //     response.res_data.message,
                        //     'success'
                        // ).then(() => {
                        //     location.reload('/');
                        // });
                        console.log(response.res_data.message);
                    }
                }
                console.log(response);
            }, error: function (data) {
                console.log(data);
            }
        });
        $('#new-trade-btn').html(`submit & pay`);
    }
}
export default TradeModule;
