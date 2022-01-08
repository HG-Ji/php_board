<script src="/assets/js/jquery-3.3.1.js"></script>
<script src="/assets/js/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        //로그인 엔터값 키 이벤트
        $("#user_id").keydown(function (key) {
            if(key.keyCode == 13){
                login();
            }
        });
        $("#user_pw").keydown(function (key) {
            if(key.keyCode == 13){
                login();
            }
        });
    });

    function login() {
        var data_list = getAjax('/controllers/LoginController.php', 'post', {
            type: "login",
            user_id: $("#user_id").val(),
            user_pw: $("#user_pw").val()
        }).responseText;
        var result = JSON.parse(data_list);
        if (result != 0)
        {
            location.href = "/views/board/index.php";
            // alert(result[0].name);
        }
        else
        {
            alert("아이디 또는 비밀번호가 잘못 입력 되었습니다.\n아이디와 비밀번호를 정확히 입력해 주세요.");
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