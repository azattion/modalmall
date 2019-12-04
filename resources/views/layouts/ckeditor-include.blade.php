<script type="text/javascript" src="/js/admin/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
<script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>
<script>
    //    $(function () {
    //        $('.wysihtml5').wysihtml5();
    //    })
    var editor = CKEDITOR.replace( '{{$name}}', {
        // Use named CKFinder browser route
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
        // Use named CKFinder connector route
        filebrowserUploadUrl: '{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files'
    });
    CKFinder.setupCKEditor( editor, '../' );
    CKEDITOR.on('dialogDefinition', function(ev) {
        var dialogName = ev.data.name;
        var dialogDefinition = ev.data.definition;
        var editor = ev.editor;
        if (dialogName == 'image') {
            dialogDefinition.onOk = function(e) {
                var imageSrcUrl = e.sender.originalElement.$.src;
                var imgHtml = CKEDITOR.dom.element.createFromHtml("<a class='lightbox'><img src='" + imageSrcUrl + "'></a>");
                editor.insertElement(imgHtml);
            };
        }
    });
    CKEDITOR.config.extraPlugins = 'lightbox';
</script>