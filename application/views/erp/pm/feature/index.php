<!DOCTYPE html>
<html>
<head>
    <title>规格列表</title>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet"
          href="<?= $this->config->item('base_url') ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $this->config->item('base_url') ?>assets/css/layui.css" media="all">
</head>
<body style="margin-left: 10px;margin-top: 10px;">
<div class="toolbar">
    <blockquote class="layui-elem-quote">
        <a href="javascript:;" class="layui-btn layui-btn-small" data-type="addFeature">
            <i class="layui-icon">&#xe608;</i> 新增规格
        </a>
        <div class="layui-inline layui-form">
            <label class="layui-form-label">规格状态</label>
            <div class="layui-input-block" style="width: 100px;">
                <select name="feature_status" id="feature_status">
                    <option value="">请选择</option>
                    <option value="0">已关闭</option>
                    <option value="1">启用中</option>
                </select>
            </div>
        </div>
        <div class="layui-inline layui-form">
            <label class="layui-form-label">规格名称</label>
            <div class="layui-input-inline">
                <input class="layui-input" name="feature_name" id="feature_name" autocomplete="off">
            </div>
        </div>
        <button class="layui-btn" data-type="searchData">搜索</button>
    </blockquote>
</div>
<table class="layui-table"
       lay-data="{height:'full',url:'/erp/pm/feature/index', page:true,id:'featureListForm',where:{feature_status:1},limit:10}"
       lay-filter="listForm" style="margin-left: 20px;">
    <thead>
    <tr>
        <th lay-data="{field:'feature_name', width:150}">规格名称</th>
        <th lay-data="{field:'feature_status', width:150,templet:'#setStatus'}">规格状态</th>
        <th lay-data="{field:'create_time', width:180}">创建时间</th>
        <th lay-data="{fixed: 'right', width:200,toolbar: '#setting'}">操作</th>
    </tr>
    </thead>
</table>
<script type="text/html" id="setStatus">
    {{ d.feature_status == 1 ? '开启中':'已关闭'}}
</script>
<script type="text/html" id="setting">
    <a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
</script>
<script src="<?= $this->config->item('base_url') ?>assets/layui/layui.js" charset="utf-8"></script>
<script src="<?= $this->config->item('base_url') ?>assets/js/erp/feature.js" charset="utf-8"></script>
</body>
</html>