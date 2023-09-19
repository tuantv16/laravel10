<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#btnSave').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/store-multi-data',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                type: 'POST',
                dataType: 'json',
                data: {
                   
                }
            }).done(function(res) {
                $('#result').empty();
                $('#result').append(res.message);
            });
            
    });
});
</script>
</head>
<body>
<form>
    @csrf
    <button id="btnSave" class="btn btn-primary">Save 300 data</button>
</form>
<div id="result">Status ...</div>

</body>
</html>
