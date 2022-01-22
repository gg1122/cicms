<!DOCTYPE html>
<html>
<head>
    <title>关键词管理</title>
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
        <a href="javascript::" class="layui-btn layui-btn-small" data-type="addKeyword">
            <i class="layui-icon">&#xe608;</i> 新增关键词
        </a>
        <div class="layui-inline layui-form">
            <label class="layui-form-label">词库状态</label>
            <div class="layui-input-block" style="width: 100px;">
                <select name="key_status" id="key_status">
                    <option value="">请选择</option>
                    <option value="0">已关闭</option>
                    <option value="1">启用中</option>
                </select>
            </div>
        </div>
        <div class="layui-inline layui-form">
            <label class="layui-form-label">词库内容</label>
            <div class="layui-input-block">
                <input class="layui-input" name="key_pool" id="key_pool" autocomplete="off">
            </div>
        </div>
        <button class="layui-btn" data-type="searchData">搜索</button>
    </blockquote>
</div>
<table class="layui-table"
       lay-data="{height:'full',url:'/erp/pm/keyword/index', page:true,id:'keywordListForm',where:{key_status:1},limit:10}"
       lay-filter="listForm" style="margin-left: 20px;">
    <thead>
    <tr>
        <th lay-data="{field:'key_name', width:150}">词库名称</th>
        <th lay-data="{field:'key_pool', width:200}">词库内容</th>
        <th lay-data="{field:'key_status', width:100,templet:'#setStatus'}">状态</th>
        <th lay-data="{field:'create_time', width:120}">创建时间</th>
        <th lay-data="{fixed: 'right', width:100,toolbar: '#setting'}">操作</th>
    </tr>
    </thead>
</table>
<script type="text/html" id="setStatus">
    {{ d.key_status == 1 ? '开启中':'已关闭'}}
</script>
<script type="text/html" id="setting">
    <a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
</script>
<script src="<?= $this->config->item('base_url') ?>assets/layui/layui.all.js" charset="utf-8"></script>
<script src="<?= $this->config->item('base_url') ?>assets/js/erp/keyword.js" charset="utf-8"></script>
</body>
</html>