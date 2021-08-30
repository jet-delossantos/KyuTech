
    function showTableData() {
        document.getElementById('info').innerHTML = "";
        var myTab = document.getElementById('example');
        var textFile = "";

        // LOOP THROUGH EACH ROW OF THE TABLE AFTER HEADER.
        for (i = 1; i < myTab.rows.length; i++) {

            // GET THE CELLS COLLECTION OF THE CURRENT ROW.
            var objCells = myTab.rows.item(i).cells;

            // LOOP THROUGH EACH CELL OF THE CURENT ROW TO READ CELL VALUES.
            for (var j = 2; j < objCells.length; j++) {

                textFile = textFile + objCells.item(j).innerHTML;
                //info.innerHTML = info.innerHTML + ' ' + objCells.item(j).innerHTML;
            }
            // ADD A BREAK (TAG).
            textFile = textFile + '\n';
            
        }
        nameFile = String(Date.now())+'.txt';
        download(nameFile, textFile);
    }

    function download(filename, text) {
        var element = document.createElement('a');
        element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
        element.setAttribute('download', filename);

        element.style.display = 'none';
        document.body.appendChild(element);

        element.click();

        document.body.removeChild(element);
    }
