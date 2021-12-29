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