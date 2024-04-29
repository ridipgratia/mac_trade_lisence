class TradeModule {
    // documentObject = {
    //     identity_document: null,
    //     address_document: null
    // }
    constructor() {
        this.identity_document = null;
        this.address_document = null;
    }
    async handleFiles(files) {
        var file = files[0];
        console.log(file);
        // $('#identity_proof_id').val(file.name);
    }
    async dragEnter(e, drag_component_id) {
        e.preventDefault();
        e.stopPropagation();
        $(drag_component_id).addClass('add-trade-file-hover');
    }
    async dragOver(e) {
        e.preventDefault();
        e.stopPropagation();
    }
    async dragLeave(e, drag_component_id) {
        e.preventDefault();
        e.stopPropagation();
        $(drag_component_id).removeClass('add-trade-file-hover');
    }
    // -------------validate select file --------------
    async validateSelectFile(selected_file) {
        var maxSize = 3 * 1024 * 1024;
        var check_file = false;
        if (selected_file[0].type !== 'application/pdf') {
            return "Only Pdf Type file";
        } else {
            if (selected_file[0].size <= maxSize) {
                check_file = true;
            } else {
                return "File Size must be 3 mb"
            }
        }
        return check_file;
    }
    async DropMethod(e, drag_component_id, input_index) {
        // this.address_document = null;
        // this.identity_document = null;
        $('.trade_document_error').eq(input_index - 1).html('');
        e.preventDefault();
        e.stopPropagation();
        $(drag_component_id).removeClass('add-trade-file-hover');
        var selected_file = e.originalEvent.dataTransfer.files;
        var check_file = await this.validateSelectFile(selected_file);
        if (check_file == true) {
            if (input_index == 1) {
                this.identity_document = selected_file[0];
                $('#identity_docs').html(selected_file[0].name);
            } else if (input_index == 2) {
                this.address_document = selected_file[0];
                $('#address_docs').html(selected_file[0].name)
            }
        } else {
            $('.trade_document_error').eq(input_index - 1).html(check_file)
        }
    }
    // ------------------ check file browse --------------
    async checkBrowseFile(select_file, input_index) {
        // this.identity_document = null;
        // this.address_document = null;
        $('.trade_document_error').eq(input_index - 1).html('')
        if (select_file.files.length > 0) {
            var check_file = await this.validateSelectFile(select_file.files);
            if (check_file == true) {
                if (input_index == 1) {
                    this.identity_document = select_file.files[0];
                    $('#identity_docs').html(select_file.files[0].name);
                } else if (input_index == 2) {
                    this.address_document = select_file.files[0];
                    $('#address_docs').html(select_file.files[0].name)
                }
            } else {
                $('.trade_document_error').eq(input_index - 1).html(check_file)
            }
        }
    }

    // ----------------- validate all input field--------------------
    async validateAllField() {
        var check_validate = false;
        $('.trade_error').html('');
        for (var i = 0; i < $('.trade-input-name').length; i++) {
            if ($('.trade-input-name').eq(i).val() == null || $('.trade-input-name').eq(i).val() == "") {
                $('.trade_error').eq(i).html(`* ${$('.trade-input-name').eq(i).attr('name').replaceAll('_', ' ')} is required field !`);
            } else {
                check_validate = true;
            }
        }
        if (check_validate) {
            if (!this.identity_document) {
                $('.trade_document_error').eq(0).html("Identity Proof is required field");
                check_validate = false;
            } else {
                check_validate = true;
            }
            if (!this.address_document) {
                $('.trade_document_error').eq(1).html("Address Proof is required field");
                check_validate = false;
            } else {
                check_validate = true;
            }
            // $('.trade_document_error').eq(0).html(this.identity_document ? ('', check_validate = "") : "Identity Proof is required field !", check_validate = false);
            // $('.trade_document_error').eq(1).html(this.address_document ? ('', check_validate = "") : "Address Proof is required field !", check_validate = false);
            if (check_validate) {
                if ($('#trade-checkout').is(":checked")) {
                    Swal.fire(
                        'Success',
                        'Form successfully submitted',
                        'success'
                    ).then(() => {
                        location.reload('/')
                    });
                } else {
                    Swal.fire(
                        'information',
                        'Please check the declaration box',
                        'info'
                    );
                }
            }
        } else {
            $('html, body').animate({
                scrollTop: $('.frist-trade-div').offset().top // Scroll to the target section
            }, 'fast');
        }

    }
    async checkData() {
        console.log(this.identity_document);
        console.log(this.address_document)
    }

}
export default TradeModule;