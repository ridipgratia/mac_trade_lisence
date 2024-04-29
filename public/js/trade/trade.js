import TradeModule from "./TradeModule.js";
const trade_module = new TradeModule();
$(document).ready(function () {

    // ---------------- drag and drop method -------------------
    function DragDocument(drag_div, input_index) {
        $(document).on('dragenter', drag_div, function (e) {
            trade_module.dragEnter(e, drag_div);
        });
        $(document).on('dragover', drag_div, function (e) {
            trade_module.dragOver(e);
        });
        $(document).on('dragleave', drag_div, function (e) {
            trade_module.dragLeave(e, drag_div);
        });
        $(document).on('drop', drag_div, async function (e) {
            trade_module.DropMethod(e, drag_div, input_index);
        });
    }
    DragDocument('#identity_proof_div', 1);
    DragDocument('#address_proof_div', 2);
    // --------------- file choose method ------------------
    $(document).on('click', '.document_open', function () {
        $(`#${this.name}`).click();
    });
    // ---------------- file change select method -------------
    $(document).on('change', '#identity_proof_id', function (e) {
        trade_module.checkBrowseFile(this, 1);
    });
    $(document).on('change', '#address_proof_id', function (e) {
        trade_module.checkBrowseFile(this, 2);
    });
    // -------------- submit trade details ----------------
    $(document).on('submit', '#add-trade-form', async function (e) {
        e.preventDefault();
        trade_module.validateAllField();
    })
});