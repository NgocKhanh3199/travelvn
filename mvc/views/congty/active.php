<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    var email = `<?= $_GET['email'];?>`;
    document.onload = active()
function active()
{
    $.ajax({
        url:"http://dulich123.com/travelvn175/index.php?controller=ccompany&action=active_accounts",
        method:"post",
        data:{
            email:email
        },success:function(data)
        {
            console.log(data);
            if(data>0)
            {
                alert('tài khoản của bạn đã được kích hoạt');
                location.href = 'http://dulich123.com/travelvn175/index.php?controller=cuser&action=loginpage';
            }
            else{
                alert(data)
            }
        }
    })
}
</script>