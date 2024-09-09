document.addEventListener("DOMContentLoaded", function() {
    tinymce.init({
        selector: '#about_project, #about_builder', // Multiple selectors
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic backcolor | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist | outdent indent | link | ' +
            'removeformat | help',
        setup: function(editor) {
            // Custom button for arrow bullets
            editor.ui.registry.addButton('customArrowBullets', {
                text: 'Arrow Bullets',
                onAction: function() {
                    editor.execCommand('InsertUnorderedList', false, { 'list-style-type': 'arrow' });
                }
            });

            // Adding the custom button to the toolbar
            editor.ui.registry.addGroupToolbarButton('listformats', {
                icon: 'unordered-list',
                tooltip: 'Bullet & Numbering Options',
                items: 'bullist numlist customArrowBullets'
            });

            // Replacing the default list buttons with the custom group
            editor.on('init', function() {
                editor.ui.registry.addContextToolbar('listformats', {
                    predicate: function(node) {
                        return node.nodeName.toLowerCase() === 'ul' || node.nodeName.toLowerCase() === 'ol';
                    },
                    items: 'listformats',
                    position: 'node',
                    scope: 'node'
                });
            });
        },
        content_css: 'default'
    });
});