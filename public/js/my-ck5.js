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
                    'undo', 'redo',
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
                    { language: 'plaintext', label: 'Plain text' }, // The default language.
                    { language: 'c', label: 'C' },
                    { language: 'cs', label: 'C#' },
                    { language: 'cpp', label: 'C++' },
                    { language: 'css', label: 'CSS' },
                    { language: 'diff', label: 'Diff' },
                    { language: 'html', label: 'HTML' },
                    { language: 'java', label: 'Java' },
                    { language: 'javascript', label: 'JavaScript' },
                    { language: 'php', label: 'PHP' },
                    { language: 'python', label: 'Python' },
                    { language: 'ruby', label: 'Ruby' },
                    { language: 'typescript', label: 'TypeScript' },
                    { language: 'xml', label: 'XML' }
                ]
            },
            simpleUpload: {
                uploadUrl: 'http://127.0.0.1/upload',
                /**
                 * @todo 接後端上傳圖片api
                 */
                // Feature configuration.
            }
            // licenseKey: '',



        })
        .catch(handleError);

    function handleError(error) {
        // console.error('Oops, something went wrong!');
        // console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
        // console.warn('Build id: ukq02hgqlgoz-nohdljl880ze');
        // console.error(error);
    }

}