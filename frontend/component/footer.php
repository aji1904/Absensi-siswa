    <!-- Jquery JS-->
    <script src="component/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="component/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="component/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="component/vendor/slick/slick.min.js">
    </script>
    <script src="component/vendor/wow/wow.min.js"></script>
    <script src="component/vendor/animsition/animsition.min.js"></script>
    <script src="component/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="component/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="component/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="component/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="component/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="component/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="component/vendor/select2/select2.min.js">
    </script>
    <!-- Main JS-->
    <script src="component/js/main.js"></script>

<script type="text/javascript">
    function eraseText(){
        $("#upload").val("");
        $("#nama").val("");
        $("#nick").val("");
        $("#address").val("");
        $("#place").val("");
        $("#lahir").val("");
        $("#father").val("");
        $("#Father").val("");
        $("#mother").val("");
        $("#Mother").val("");
        $("#year").val("");
        $("#tahunMasuk").val("");
        $("#handphone").val("");
    }

    function erase(){
        $("#upload").val("");
        $("#nama").val("");
        $("#nick").val("");
        $("#address").val("");
        $("#place").val("");
        $("#lahir").val("");
        $("#tahunMasuk").val("");
        $("#handphone").val("");
        $("#status").val("");
    }

    function eraseAnggota(){
        $("#tahun").val("");
        $("#class").val("");
        $("#name").val("");
    }
    $('#upload').change(function () {
        var imgPath = this.value;
        var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
            readURL(this);
        else
            alert("Please select image file (jpg, jpeg, png).")
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
//              $("#remove").val(0);
            };
        }
    }
    function removeImage() {
        $('#preview').attr('src', 'component/images/noImages.png');
        $("#upload").val("");
    }
    
    for(let i = 1; i < 50; i++){
        $("#cekHadir"+i+"").click(function () {
            if ($(this).prop("checked")) {
                $("#cekHadir"+i+"").val("Hadir");
                $("#cekTidak"+i+"").attr("disabled",true);
            }else{
                $("#cekHadir"+i+"").val("Tidak Hadir");  
                $("#cekTidak"+i+"").attr("disabled",false);
            }
        });
        $("#cekTidak"+i+"").click(function () {
            if ($(this).prop("checked")) {
                $("#cekTidak"+i+"").val("Tidak Hadir");
                $("#cekHadir"+i+"").attr("disabled",true);
            }else{
                $("#cekTidak"+i+"").val("Hadir");  
                $("#cekHadir"+i+"").attr("disabled",false);
            }
        });
    }
    
</script>    

</body>

</html>
<!-- end document-->
