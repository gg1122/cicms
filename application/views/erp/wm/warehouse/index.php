<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet"
          href="<?= $this->config->item('base_url') ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $this->config->item('base_url') ?>/assets/css/layui.css" media="all">
</head>
<body style="margin-left: 10px;margin-top: 10px;">
<div class="demoTable">
    <div class="layui-btn-group ">
        <button class="layui-btn layui-btn-small" data-type="addWarehouse">
            <i class="layui-icon">&#xe608;</i> 新增仓库
        </button>
    </div>

    <div class="layui-inline  layui-form">
        <label class="layui-form-label">仓库状态</label>
        <div class="layui-input-block" style="width: 100px;">
            <select name="warehouse_status" id="warehouse_status" lay-verify="required">
                <option value="">请选择</option>
                <option value="0">已关闭</option>
                <option value="1">启用中</option>
            </select>
        </div>
    </div>
    <button class="layui-btn layui-btn-small" data-type="searchData">搜索</button>
</div>
<table class="layui-table"
       lay-data="{height:'full',url:'/erp/wm/warehouse/index', page:true,id:'warehouseListForm',where:{warehouse_status:1},limit:10}"
       lay-filter="demo" style="margin-left: 20px;">
    <thead>
    <tr lay-data="{id:{warehouse_id}}">
        <th lay-data="{field:'warehouse_code', width:150,class:'layui-collapse',filter:'test'}">仓库编码</th>
        <th lay-data="{field:'warehouse_name', width:150}">仓库名称</th>
        <th lay-data="{field:'warehouse_type', width:150}">仓库类型</th>
        <th lay-data="{field:'create_time', width:150}">创建时间</th>
        <th lay-data="{field:'warehouse_status', width:100,toolbar: '#switchTab', unresize: true}">状态</th>
        <th lay-data="{fixed: 'right', width:120,templet: '#setting', unresize: true}">操作</th>
    </tr>
    </thead>
</table>
<script type="text/html" id="setting">
    <a class="layui-btn layui-btn-mini" lay-event="edit" disabled>编辑</a>
    <button class="layui-btn layui-btn-mini layui-collapse" lay-event="dropDown" lay-filter="test">
        <i class="layui-icon">&#xe625;</i></button>
</script>
<script type="text/html" id="switchTab">
    <input type="checkbox" name="sex" value="{{d.warehouse_status}}" lay-skin="switch"
           lay-text="开|关" lay-filter="setWarehouseStatus" {{ d.warehouse_status== 1 ? 'checked' : '' }}/>
</script>
<script src="<?= $this->config->item('base_url') ?>assets/layui/layui.all.js" charset="utf-8"></script>
<script src="<?= $this->config->item('base_url') ?>assets/js/erp/warehouse.js" charset="utf-8"></script>
</body>
</html>