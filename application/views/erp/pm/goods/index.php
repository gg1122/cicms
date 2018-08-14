<!DOCTYPE html>
<html>
<head>
    <title>货品管理</title>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet"
          href="<?= $this->config->item('base_url') ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $this->config->item('base_url') ?>assets/css/layui.css" media="all">
    <link rel="stylesheet" href="<?= $this->config->item('base_url') ?>assets/css/select.css" media="all">
</head>
<body style="margin-left: 10px;margin-top: 10px;">
<div class="toolbar">
    <blockquote class="layui-elem-quote">
        <a href="javascript:;" class="layui-btn layui-btn-small" data-type="addGoods">
            <i class="layui-icon">&#xe608;</i> 新增货品
        </a>
        <a href="#" class="layui-btn layui-btn-small" data-type="importGoods">
            <i class="layui-icon">&#xe608;</i> 导入货品
        </a>
        <a href="#" class="layui-btn layui-btn-small" data-type="exportGoods">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> 导出货品
        </a>
    </blockquote>
    <div class="layui-inline layui-form">
        <label class="layui-form-label">仓库</label>
        <div class="layui-input-block" style="width: 150px;">
            <select name="warehouse_id" id="warehouse_id" lay-search="" lay-filter="warehouse_select">
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
        <label class="layui-form-label">货品状态</label>
        <div class="layui-input-block" style="width: 100px;">
            <select name="goods_status" id="goods_status">
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
                <option value="location_code">库位编码</option>
            </select>
        </div>
    </div>
    <div class="layui-input-inline">
        <input class="layui-input" name="search_value" id="search_value" autocomplete="off">
    </div>
    <button class="layui-btn" data-type="searchData">搜索</button>
</div>
<table class="layui-table"
       lay-data="{height:'full',url:'/erp/pm/goods/index', page:true,id:'goodsListForm',where:{goods_status:1},limit:10}"
       lay-filter="listForm" style="margin-left: 20px;">
    <thead>
    <tr>
        <th lay-data="{field:'goods_code', width:150}">货品编码</th>
        <th lay-data="{field:'goods_name', width:200}">货品全称</th>
        <th lay-data="{field:'goods_short_name', width:150}">货品简称</th>
        <th lay-data="{field:'brand_name', width:150}">品牌ID</th>
        <th lay-data="{field:'goods_status', width:150,templet:'#setStatus'}">货品状态</th>
        <th lay-data="{field:'create_time', width:180}">创建时间</th>
        <th lay-data="{fixed: 'right', width:200,toolbar: '#setting'}">操作</th>
    </tr>
    </thead>
</table>
<script type="text/html" id="setStatus">
   {{ d.goods_status == 1 ? '开启中':'已关闭'}}
</script>
<script type="text/html" id="setting">
    <a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
</script>
<script src="<?= $this->config->item('base_url') ?>assets/layui/layui.js" charset="utf-8"></script>
<script src="<?= $this->config->item('base_url') ?>assets/js/erp/goods.js" charset="utf-8"></script>
<script src="<?= $this->config->item('base_url') ?>assets/js/select.js" charset="utf-8"></script>
</body>
</html>