window.onload = () => {
    const watchdog = new CKSource.EditorWatchdog();
   
    window.watchdog = watchdog;
    watchdog.setCreator((element, config) => {
        return CKSource.Editor
            .create(element, config)
            .then(editor => {
                window.editor = editor;
                return editor;
            })
    });

    watchdog.setDestructor(editor => {
        return editor.destroy();
    });

    watchdog.on('error', handleError);

    watchdog
        .create(document.querySelector('#editor'), {

            toolbar: {
                items: [
                    'heading', '|',
                     'fontsize', '|',
                    'alignment', '|',
                    'fontColor', 'fontBackgroundColor', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                    'link', '|',
                    'outdent', 'indent', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'code', 'codeBlock', '|',
                    'insertTable', '|',
                    'uploadImage', 'blockQuote', '|',
                    'undo', 'redo'
                ],
                shouldNotGroupWhenFull: true
            },
            language: 'zh',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:inline',
                    'imageStyle:block',
                    'imageStyle:side',
                    'linkImage'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
            codeBlock: {
                languages: [
                    // Do not render the CSS class for the plain text code blocks.
                    {
                        language: 'plaintext',
                        label: 'Plain text',
                        class: ''
                    },

                    // Use the "php-code" class for PHP code blocks.
                    {
                        language: 'php',
                        label: 'PHP',
                        class: 'php-code'
                    },

                    // Use the "js" class for JavaScript code blocks.
                    // Note that only the first ("js") class will determine the language of the block when loading data.
                    {
                        language: 'javascript',
                        label: 'JavaScript',
                        class: 'js javascript js-code'
                    },

                    // Python code blocks will have the default "language-python" CSS class.
                    {
                        language: 'python',
                        label: 'Python'
                    }
                ]
            }

            // licenseKey: '',



        })
        .catch(handleError);

    function handleError(error) {
        console.error('Oops, something went wrong!');
        console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
        console.warn('Build id: ukq02hgqlgoz-nohdljl880ze');
        console.error(error);
    }

}