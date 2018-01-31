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
        <button class="layui-btn" data-type="addWarehouseLocation">
            <i class="layui-icon">&#xe608;</i> 新增仓库库位
        </button>
    </div>

    <div class="layui-inline layui-form">
        <label class="layui-form-label">仓库</label>
        <div class="layui-input-block" style="width: 100px;">
            <select name="warehouse_id" id="warehouse_id" lay-search="">
                <option value="">请选择</option>
                <?php
                foreach ($warehouse_list as $warehouse):
                    ?>
                    <option value="<?= $warehouse['warehouse_id'] ?>"><?= $warehouse['warehouse_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-inline layui-form">
        <label class="layui-form-label">库位状态</label>
        <div class="layui-input-block" style="width: 100px;">
            <select name="location_status" id="location_status">
                <option value="">请选择</option>
                <option value="0">已关闭</option>
                <option value="1">启用中</option>
            </select>
        </div>
    </div>
    <div class="layui-inline layui-form">
        <label class="layui-form-label">搜索条件</label>
        <div class="layui-input-block" style="width: 100px;">
            <select name="search_type" id="search_type">
                <option value="">请选择</option>
                <option value="section_name">区域名称</option>
                <option value="section_code">区域编码</option>
            </select>
        </div>
    </div>
    <div class="layui-input-inline">
        <input class="layui-input" name="search_value" id="search_value" autocomplete="off">
    </div>
    <button class="layui-btn" data-type="searchData">搜索</button>
</div>
<table class="layui-table"
       lay-data="{height:'full',url:'/erp/wm/warehouse_location/index', page:true,id:'warehouseLocationForm',where:{location_status:1},limit:10}"
       lay-filter="demo" style="margin-left: 20px;">
    <thead>
    <tr>
        <th lay-data="{checkbox:true, fixed: true}"></th>
        <th lay-data="{field:'location_id', width:80, sort: true, fixed: true,type:space,display:none}">ID</th>
        <th lay-data="{field:'warehouse_name', width:150}">仓库名称</th>
        <th lay-data="{field:'section_name', width:150}">区域名称</th>
        <th lay-data="{field:'location_code', width:150}">库位编码</th>
        <th lay-data="{field:'create_time', width:150}">创建时间</th>
        <th lay-data="{fixed: 'right', width:200,toolbar: '#barDemo'}">操作</th>
    </tr>
    </thead>
</table>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="disable">删除</a>
</script>
<script src="<?= $this->config->item('base_url') ?>/assets/layui/layui.all.js" charset="utf-8"></script>
<script src="<?= $this->config->item('base_url') ?>/assets/js/erp/warehouse_location.js" charset="utf-8"></script>
</body>
</html>