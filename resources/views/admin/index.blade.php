<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>关注回复管理</title>
</head>
<body>
<form action="/admin/doevent" method="post" enctype="multipart/form-data">
    <div class="select">
        <span>请选择回复的类型</span>
        <select name="type" id="type">
            <option value="text"> 文本</option>
            <option value="img">  图片</option>
            <option value="audio">语音</option>
            <option value="video">视频</option>
            <option value="news"> 图文</option> 
            <option value="music">音乐</option>
        </select>
        <div class="text">
            <textarea name="content" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="img audio video music" style="display:none">
            <input type="file">
        </div>
        <div class="news" style="display: none">
            设置标配：<input type="text">
            设置简介：<input type="text">
            选择图片：<input type="file">
            跳转地址：<input type="text">
        </div>
    </div>
    <div>
        <input type="submit" value="提交">
    </div>
</form>
</body>
</html>
<script src="{{url('js/jquery-1.8.3.min.js')}}"></script>
<script>
    $('#type').change(function () {
        var type=$(this).val();
        if(type =='news'){
            $('.news').show();
            $('.news').siblings('div').hide();
            $('.select').show();
        }else if(type=='text'){
            $('.text').show();
            $('.text').siblings('div').hide();
            $('.select').show();
        }else{
            $('.text').hide();
            $('.news').hide();
            $('.img').show();
        }
    })
</script>