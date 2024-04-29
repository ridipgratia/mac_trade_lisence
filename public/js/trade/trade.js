import TradeModule from "./TradeModule.js";
const trade_module = new TradeModule();
$(document).ready(function () {
    trade_module.DragDocument('#identity_proof_div');
});