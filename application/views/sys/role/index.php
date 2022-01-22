<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet"
          href="<?= $this->config->item('base_url') ?>/assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $this->config->item('base_url') ?>/assets/css/layui.css" media="all">
</head>
<body style="margin-left: 10px;margin-top: 10px;">
<div class="demoTable">
    <div class="layui-btn-group ">
        <button class="layui-btn" data-type="getCheckData">获取选中行数据</button>
        <button class="layui-btn" data-type="addRole">
            <i class="layui-icon">&#xe608;</i> 新增角色
        </button>
    </div>
    角色名称：
    <div class="layui-inline">
        <input class="layui-input" name="role_name" id="role_name" autocomplete="off">
    </div>
    <button class="layui-btn" data-type="searchData">搜索</button>
</div>

<table class="layui-table"
       lay-data="{height:'full',url:'index', page:true,id:'roleListForm',where:{role_status:1},limit:10}"
       lay-filter="demo" style="margin-left: 20px;">
    <thead>
    <tr>
        <th lay-data="{checkbox:true, fixed: true}"></th>
        <th lay-data="{field:'role_id', width:80, sort: true, fixed: true}">ID</th>
        <th lay-data="{field:'role_name', width:150}">角色名称</th>
        <th lay-data="{field:'role_desc', width:150}">角色描述</th>
        <th lay-data="{field:'role_status', width:150,templet:'#setRoleStatus'}">角色状态</th>
        <th lay-data="{fixed: 'right', width:200,toolbar: '#barDemo'}">操作</th>
    </tr>
    </thead>
</table>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-warm layui-btn-mini" lay-event="config">配置</a>
    <a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
</script>
<script type="text/html" id="setRoleStatus">
    {{ d.role_status == 1 ? '开启':'关闭' }}
</script>
<script src="<?= $this->config->item('base_url') ?>/assets/layui/layui.all.js" charset="utf-8"></script>
<script src="<?= $this->config->item('base_url') ?>/assets/js/sys/role.js" charset="utf-8"></script>
</body>
</html>