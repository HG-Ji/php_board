<script src="/assets/js/jquery-3.3.1.js"></script>
<script src="/assets/js/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function()
    {
        getList();
    });

    function getList() {
        var data_list = getAjax('/controllers/BoardController.php', 'post', {type:"getList"}).responseText;
        var result = JSON.parse(data_list);
        if(result != '[]')
        {
            $('#data_list_table').addClass('table-bordered table-striped');
            var html = '';
            for(var i=0;i<result.length;i++) {
                html += '<tr>';
                html += '    <td style="width:10%">' + (result.length-i) + '</td>';
                html += '    <td style="width:*;"><a href="">' + result[i].title + '</a></td>';
                html += '    <td style="width:15%">' + result[i].user_id + '</td>';
                html += '    <td style="width:15%">' + result[i].reg_dttm + '</td>';
                html += '    <td style="width:10%">' + result[i].cnt + '</td>';
                html += '</tr>';
            }
            $('#list_table').html(html);
        }
        else
        {
            var html = '<tr height="100%"><td style="text-align: center;">No Data</td></tr>';
            $('#data_list').html(html);
            $('#data_list_table').removeClass('table-bordered table-striped');
        }
    }

    function signUp()
    {
        var result = getAjax('/controllers/LoginController.php', 'post', {
            type: "signUp",
            user_id: $("#user_id").val(),
            user_pw: $("#user_pw").val(),
            user_name: $("#user_name").val()
        }).responseText;
        if (result > 0)
        {
            if(confirm("회원가입이 완료되었습니다.\n로그인 하시겠습니까?")){
                location.href = "/views/login/index.php";
            }
            else{
                return;
            }
        }
        else
        {
            alert("모든 입력 정보를 확인하여주세요.");
        }
    }

    function goLogin()
    {
        if (confirm("정말 취소하시겠습니까?") == true)
        {
            location.href="/views/login/index.php";
        }
        else{
            return;
        }
    }

    function getAjax(url, method, obj)
    {
        return $.ajax({
            method: method,
            async: false,
            url: url,
            data :  obj,
            success: function (result) {
                //console.log("getAjax : " , result);
            },
            error: function (result) {
                console.log('Error:', result);
            }
        });
    }
</script>