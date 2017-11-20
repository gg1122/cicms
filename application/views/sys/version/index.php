<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?= $this->config->item('base_url') ?>/assets/css/layui.css" media="all">
    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>资源版本控制</legend>
</fieldset>
<?php
print_r($versiol_list);die;
?>
<form class="layui-form" action="">
    <div class="layui-form-item">
        <label class="layui-form-label">JS版本</label>
        <div class="layui-input-block">
            <input name="javascript" class="layui-input" type="text" title="JS版本" readonly />
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">CSS版本</label>
        <div class="layui-input-block">
            <input name="css" class="layui-input" type="text" title="CSS版本" readonly />
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
        </div>
    </div>
</form>
</body>
</html>