<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?= $this->config->item('base_url') ?>/assets/css/layui.css" media="all">
</head>
<body>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>资源版本控制</legend>
</fieldset>
<?php echo validation_errors(); ?>
<?php echo form_open('sys/version/index', array('class' => 'layui-form')); ?>
    <?php
    if (!empty($version_list)) {
        foreach ($version_list as $version) {
            ?>
            <div class="layui-form-item">
                <label class="layui-form-label"><?=$version['name']?></label>
                <div class="layui-input-inline">
                    <input name="name[<?=$version['name']?>]" class="layui-input" type="text" title="JS版本" value="<?=$version['version']?>" readonly/>
                </div>
            </div>
            <?php
        }
    }
    ?>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
        </div>
    </div>
</form>
</body>
</html>