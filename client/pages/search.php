<li>
    <input type="text" id="txt1" class="form-control" placeholder="search keywords..." onkeyup="showHint(this.value)">
    <div style="position: absolute; z-index:99;max-width: 300px; margin-top: 10px;" class="d-inline-block ">
        <p><span id="txtHint"></span></p>
    </div>
</li>

<script>
    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("txtHint").innerHTML =
                this.responseText;
        }
        xhttp.open("GET", "../control/data.php?hint=" + str);
        xhttp.send();
    }
</script>