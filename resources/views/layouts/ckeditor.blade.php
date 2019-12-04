<script type="text/javascript" src="/js/admin/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
<script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>
<script>
    //    $(function () {
    //        $('.wysihtml5').wysihtml5();
    //    })
    var editor = CKEDITOR.replace( '{{$name}}', {
        allowedContent: {
            '$1': {
                elements: CKEDITOR.dtd,
                attributes: true,
                styles: true,
                classes: true
            },
            'h1 h2 h3 h4 h5 hr i p iframe ul li ol a strong em table blockquote br s': true,
            img: {
                attributes: [ '!src', 'alt', 'width', 'height' ],
                classes: { tip: true }
            },
        },
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
                var imgHtml = CKEDITOR.dom.element.createFromHtml("<a class='lightbox lite-test'><img src='" + imageSrcUrl + "'></a>");
                editor.insertElement(imgHtml);
            };
        }
    });
    CKEDITOR.config.extraPlugins = 'lightbox';
</script>