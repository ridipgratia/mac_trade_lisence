<div class="d-flex flex-wrap add-trade-form col-12">
    <div class="d-flex flex-wrap add-trade-form-head col-12">
        <span><i class="fa-solid fa-file"></i></span>
        <span>Upload Documents</span>
    </div>
    <div class="d-flex flex-wrap add-trade-form-body col-12">
        <div class="d-flex flex-wrap col-11 col-md-4 add-trade-form-body-1 ">
            <p class="col-12">Identity Proof</p>
            <span>Allowed documents are Pan card, Election/Voter card, Driving License, Aadhar card. Please upload a JPG
                or PNG image, ensuring that it does not exceed 500KB in size.</span>
            <div class="d-flex flex-wrap col-12 add-trade-file" id="identity_proof_div">
                <p><span id="identity_docs">Drag & Drop File</span> <button type="button" name="identity_proof_id"
                        class="document_open" name="btn">Browse</button></p>
                <input type="file" name="identity_proof" class="col-12 document_file " id="identity_proof_id"
                    accept=".pdf">
            </div>
            <p class="trade_error  trade_document_error"></p>
        </div>
        <div class="d-flex flex-wrap col-11 col-md-4 add-trade-form-body-1">
            <p class="col-12">Address Proof</p>
            <span>Allowed documents are Please upload a JPG or PNG image, ensuring that it does not exceed 500KB in
                size.</span>
            <div class="d-flex flex-wrap col-12 add-trade-file" id="address_proof_div">
                <p><span id="address_docs">Drag & Drop File</span> <button type="button" name="address_proof_id"
                        class="document_open">Browse</button></p>
                <input type="file" name="address_proof" class="col-12 document_file " id="address_proof_id"
                    accept=".pdf">
            </div>
            <p class="trade_error trade_document_error"></p>
        </div>

    </div>
</div>
