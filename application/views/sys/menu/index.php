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
        <button class="layui-btn" data-type="addMenu">
            <i class="layui-icon">&#xe608;</i> 新增菜单
        </button>
        <a class="layui-btn layui-btn-radius layui-btn-warm" href="http://www.layui.com/doc/element/icon.html#table"
           target="_blank">
            <i class="layui-icon">&#xe630;</i>
            字体图标库</a>
    </div>
    搜索上级ID：
    <div class="layui-inline">
        <input class="layui-input" name="search_value" id="search_value" autocomplete="off">
    </div>
    <div class="layui-inline  layui-form">
        <label class="layui-form-label">搜索选择框</label>
        <div class="layui-input-inline">
            <select name="menu_id" id="menu_id" lay-verify="required" lay-search="">
                <option value="">直接选择或搜索选择</option>
                <?php
                if(!empty($menuList)){
                    foreach ($menuList as $item){
                        echo "<option value='{$item['menu_id']}'>{$item['menu_name']}</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <button class="layui-btn" data-type="searchData">搜索</button>
</div>

<table class="layui-table"
       lay-data="{height:'full',url:'/menu/getList', page:true,id:'menuListForm',where:{menu_fid:0},limit:10}"
       lay-filter="demo" style="margin-left: 20px;">
    <thead>
    <tr>
        <th lay-data="{checkbox:true, fixed: true}"></th>
        <th lay-data="{field:'menu_id', width:80, sort: true, fixed: true}">ID</th>
        <th lay-data="{field:'menu_name', width:150}">菜单名称</th>
        <th lay-data="{field:'menu_icon', width:150, sort: true}">菜单图标</th>
        <th lay-data="{field:'menu_uri', width:150}">菜单URI</th>
        <th lay-data="{fixed: 'right', width:200,toolbar: '#barDemo'}">操作</th>
    </tr>
    </thead>
</table>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="delete">删除</a>
</script>
<script src="<?= $this->config->item('base_url') ?>/assets/layui/layui.all.js" charset="utf-8"></script>
<script src="<?= $this->config->item('base_url') ?>/assets/js/sys/menu.js" charset="utf-8"></script>
</body>
</html>