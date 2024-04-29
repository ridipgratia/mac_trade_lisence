class TradeModule {
    documents = "";
    constructor() {
        this.documents = null;
    }
    async handleFiles(files) {
        var file = files[0];
        console.log(file);
        // $('#identity_proof_id').val(file.name);
    }
    async DragDocument(drag_component_id) {
        $(document).on('dragenter', drag_component_id, function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(drag_component_id).addClass('hover');
        });

        $(document).on('dragover', drag_component_id, function (e) {
            e.preventDefault();
            e.stopPropagation();
        });

        $(document).on('dragleave', drag_component_id, function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(drag_component_id).removeClass('hover');
        });

        $(document).on('drop', drag_component_id, function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(drag_component_id).removeClass('hover');

            var files = e.originalEvent.dataTransfer.files;

            if (files.length > 0) {
                this.documents = files[0];
                console.log(this.documents);
            }
        });
    }


}
export default TradeModule;