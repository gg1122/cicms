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
        <button class="layui-btn" data-type="addWarehouse">
            <i class="layui-icon">&#xe608;</i> 新增仓库
        </button>
    </div>

    <div class="layui-inline  layui-form">
        <label class="layui-form-label">仓库状态</label>
        <div class="layui-input-inline">
            <select name="warehouse_status" id="warehouse_status" lay-verify="required" lay-search="">
                <option value="">直接选择或搜索选择</option>
                <option value="0">已关闭</option>
                <option value="1">启用中</option>
            </select>
        </div>
    </div>
    <button class="layui-btn" data-type="searchData">搜索</button>
</div>
<table class="layui-table"
       lay-data="{height:'full',url:'/erp/wm/warehouse/index', page:true,id:'warehouseListForm',where:{warehouse_status:1},limit:10}"
       lay-filter="demo" style="margin-left: 20px;">
    <thead>
    <tr>
        <th lay-data="{checkbox:true, fixed: true}"></th>
        <th lay-data="{field:'warehouse_id', width:80, sort: true, fixed: true}">ID</th>
        <th lay-data="{field:'warehouse_code', width:150}">仓库编码</th>
        <th lay-data="{field:'warehouse_name', width:150}">仓库名称</th>
        <th lay-data="{field:'warehouse_type', width:150}">仓库类型</th>
        <th lay-data="{field:'create_time', width:150}">创建时间</th>
        <th lay-data="{fixed: 'right', width:200,toolbar: '#barDemo'}">操作</th>
    </tr>
    </thead>
</table>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
</script>
<script src="<?= $this->config->item('base_url') ?>/assets/layui/layui.all.js" charset="utf-8"></script>
<script src="<?= $this->config->item('base_url') ?>/assets/js/erp/warehouse.js" charset="utf-8"></script>
</body>
</html>