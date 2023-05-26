<script>
    function updateMycomment(str) {

        let data = JSON.parse(str);
        // // Access individual elements of the array
        // let number = data[0];
        // let id = data[1];
        console.log(data);

        if (str.length == 0) {
            // document.getElementById("textComment").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("textComment").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "ajaxUpdateComment.php?mycomment=" + str, true);
            xmlhttp.send();
        }
    }



    function addMore(str) {
        let data = JSON.parse(str);
        // Access individual elements of the array
        let number = data[0];
        let id = data[1];
        console.log(data);

        if (str.length == 0) {
            document.getElementById("commentSection").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.response);
                    // Reload the current page
                    // location.reload();

                    document.getElementById("commentSection").innerHTML = this.responseText;
                    // window.alert("Deleted Successfully");
                }
            };
            xmlhttp.open("GET", "ajaxMore.php?addMore=" + number + "&id=" + id, true);
            xmlhttp.send();
        }
    }

    function minusLimit(str) {
        let data = JSON.parse(str);
        // Access individual elements of the array
        let number = data[0]++;
        let id = data[1];
        console.log(data);

        if (str.length == 0) {
            document.getElementById("commentSection").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.response);
                    // Reload the current page
                    // location.reload();

                    document.getElementById("commentSection").innerHTML = this.responseText;
                    // window.alert("Deleted Successfully");
                }
            };
            xmlhttp.open("GET", "ajaxMinus.php?addMore=" + number + "&id=" + id, true);
            xmlhttp.send();
        }
    }


    function closeEditComment() {
        let form = document.getElementById("mycomment").style;
        form.display = "none";
    }

    function openEditComment() {
        let form = document.getElementById("mycomment").style;
        form.display = "block";
    }


    function closeEdit() {
        let form = document.getElementById("editForms").style;
        form.display = "none";
    }

    function openEdit() {
        let form = document.getElementById("editForms").style;
        form.display = "block";
    }

    function editComment(str) {
        console.log(str);
        if (str.length == 0) {
            document.getElementById("editForms").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.response);
                    // Reload the current page


                    document.getElementById("editForms").innerHTML = this.response;

                    // window.alert("Deleted Successfully");
                }
            };
            xmlhttp.open("GET", "ajaxShow.php?commentId=" + str, true);
            xmlhttp.send();
        }
    }

    function deleteMainComment(str) {
        window.confirm("Delete this comment?" + str);
        if (str.length == 0) {
            // document.getElementById("inputForm").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.response);
                    // Reload the current page
                    // location.reload();

                    // document.getElementById("inputForm").innerHTML = this.responseText;
                    // window.alert("Deleted Successfully");
                }
            };
            xmlhttp.open("GET", "ajaxInput.php?deleteMain=" + str, true);
            xmlhttp.send();
        }
    }

    function deleteComment(str) {
        window.confirm("Delete this comment?" + str);
        if (str.length == 0) {
            // document.getElementById("inputForm").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.response);
                    // Reload the current page
                    // location.reload();

                    // document.getElementById("inputForm").innerHTML = this.responseText;
                    // window.alert("Deleted Successfully");
                }
            };
            xmlhttp.open("GET", "ajaxInput.php?deleteComment=" + str, true);
            xmlhttp.send();
        }
    }

    function addComment(str) {

        // console.log(str);
        if (str.length == 0) {
            document.getElementById("inputForm").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    document.getElementById("inputForm").innerHTML = this.response;
                    // document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "ajaxInput.php?commentId=" + str, true);
            xmlhttp.send();
        }
    }



    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "showMore.php", true);
            xmlhttp.send();
        }
    }

    function closeInput() {
        let form = document.getElementById("form").style;
        form.display = "none";
    }

    function inputForm(str) {
        if (str.length == 0) {
            document.getElementById("inputForm").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("inputForm").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "ajaxInput.php?commentId=" + str, true);
            xmlhttp.send();
        }
    }



    function likesUp(str) {
        if (str.length == 0) {
            document.getElementById("likes").value = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.response);
                    // document.getElementById("inputForm").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "ajaxLikes.php?likeId=" + str, true);
            xmlhttp.send();
        }
    }

    function likesDown(str) {
        if (str.length == 0) {
            document.getElementById("likesDown").value = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.response);
                    // document.getElementById("inputForm").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "ajaxLikes.php?likeDownId=" + str, true);
            xmlhttp.send();
        }
    }
</script>