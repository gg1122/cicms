<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
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
        <button class="layui-btn" data-type="addUser">
            <i class="layui-icon">&#xe608;</i> 新增用户
        </button>
    </div>
    <div class="layui-inline  layui-form">
        <label class="layui-form-label">搜索类型</label>
        <div class="layui-input-inline">
            <select name="search_type" id="search_type" lay-verify="required" lay-search="">
                <option value="">请选择</option>
                <option value="user_id">用户ID</option>
                <option value="user_name">用户登录名</option>
                <option value="display_name">用户展示名</option>
                <option value="user_email">用户邮箱</option>
            </select>
        </div>
    </div>
    搜索内容
    <div class="layui-inline">
        <input class="layui-input" name="search_value" id="search_value" autocomplete="off">
    </div>
    <button class="layui-btn" data-type="searchData">搜索</button>
</div>

<table class="layui-table"
       lay-data="{height:'full',url:'index', page:true,id:'userListForm',where:{role_status:1},limit:10}"
       lay-filter="demo" style="margin-left: 20px;">
    <thead>
    <tr>
        <th lay-data="{checkbox:true, fixed: true}"></th>
        <th lay-data="{field:'user_id', width:100, sort: true, fixed: true}">ID</th>
        <th lay-data="{field:'user_name', width:100}">登录名</th>
        <th lay-data="{field:'display_name', width:100}">展示名</th>
        <th lay-data="{field:'user_email', width:150}">邮箱</th>
        <th lay-data="{field:'user_status', width:50}">状态</th>
        <th lay-data="{field:'last_ip', width:150}">最近登录IP</th>
        <th lay-data="{field:'last_login', width:200}">最近登录时间</th>
        <th lay-data="{fixed: 'right', width:150,toolbar: '#barDemo'}">操作</th>
    </tr>
    </thead>
</table>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-warm layui-btn-mini" lay-event="config">配置</a>
    <a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
</script>
<script src="<?= $this->config->item('base_url') ?>/assets/layui/layui.all.js" charset="utf-8"></script>
<script src="<?= $this->config->item('base_url') ?>/assets/js/sys/user.js" charset="utf-8"></script>
</body>
</html>