        function showFileInfo() {
            var fileInput = document.getElementById('fileInput');
            var file = fileInput.files[0];
            var filename = file.name;
            var fileExtension = filename.split('.').pop();
            var filePath = fileInput.value;

            if (fileExtension === 'docx' || fileExtension === 'doc' || fileExtension === 'DOCM'|| fileExtension === 'Dotx') {
                fileExtension = 'Docx';
            }
            if (fileExtension === 'pdf' || fileExtension === 'Pdf' || fileExtension === 'PDF') {
                fileExtension = 'Pdf';
            }
            if ( fileExtension === 'xls' || fileExtension === 'xlsx' || fileExtension === 'xlsm' || fileExtension === 'xlsb'|| fileExtension === 'xltx' || fileExtension === 'xlt' || fileExtension === 'xltm' || fileExtension === 'xla' || fileExtension === 'xlam' || fileExtension === 'xlw' ) {
                fileExtension = 'Xlsm';
            }
            var newFilePath = "\\doci" + filePath.substring(filePath.lastIndexOf("\\"));
            if(newFilePath.includes("\\doci")) {
                var newFilePath = newFilePath.substring(newFilePath.indexOf("\\doci"));
            } else {
                alert("Ошибка: путь не содержит \\doci");
                return;
            }
           
            var fileNameWithoutExtension = filename.substring(0, filename.lastIndexOf('.'));
            document.getElementById('fileName').value = fileNameWithoutExtension; // Изменилось с filename на fileNameWithoutExtension
            document.getElementById('fileExtension').value = fileExtension;
            document.getElementById('filePath').value = newFilePath;
        }