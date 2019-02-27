<div class="container mt-5">
	<form name="myForm" id="myForm" onSubmit="return validateForm()" action="<?= BASEURL ?>/stock/upload" method="post" enctype="multipart/form-data">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
		    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
		  </div>
		  <div class="custom-file">
		    <input type="file" id="listStock" name="liststock" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
		    <label class="custom-file-label" for="inputGroupFile01">Pilih File .xls</label>
		  </div>
		</div>
	</form>
</div>	

<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }

        if(!hasExtension('listStock', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
</script>