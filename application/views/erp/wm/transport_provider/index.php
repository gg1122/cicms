<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet"
          href="<?= $this->config->item('base_url') ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $this->config->item('base_url') ?>assets/css/layui.css" media="all">
</head>
<body style="margin-left: 10px;margin-top: 10px;">
<div class="demoTable">
    <div class="layui-btn-group ">
        <button class="layui-btn" data-type="addProvider">
            <i class="layui-icon">&#xe608;</i> 新增服务商
        </button>
    </div>
    <div class="layui-inline  layui-form">
        <label class="layui-form-label">服务商状态</label>
        <div class="layui-input-block" style="width: 150px;">
            <select name="provider_status" id="provider_status" lay-verify="required" lay-search="">
                <option value="">请选择</option>
                <option value="0">已关闭</option>
                <option value="1">启用中</option>
            </select>
        </div>
    </div>
    <button class="layui-btn" data-type="searchData">搜索</button>
</div>
<table class="layui-table"
       lay-data="{height:'full',url:'/erp/wm/transport_provider/index', page:true,id:'transportProviderListForm',where:{provider_status:1},limit:10}"
       lay-filter="list" style="margin-left: 20px;">
    <thead>
    <tr>
        <th lay-data="{field:'provider_name', width:150}">物流服务商名称</th>
        <th lay-data="{field:'provider_website', width:200,templet:'#web_set'}">物流服务商网址</th>
        <th lay-data="{field:'provider_contact', width:100}">物流服务商联系人</th>
        <th lay-data="{field:'create_time', width:150}">创建时间</th>
        <th lay-data="{fixed: 'right', width:200,toolbar: '#setting'}">操作</th>
    </tr>
    </thead>
</table>
<script type="text/html" id="setting">
    <a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
</script>
<script type="text/html" id="web_set">
    {{ d.provider_website == '' ? '' :'<a href=\" '+ d.provider_website  + '" target="_blank">访问官网</a>' }}
</script>
<script type="text/html" id="setting">
    <input type="checkbox" name="sex" value="{{d.provider_status}}" lay-skin="switch"
           lay-text="开|关" {{ d.provider_status == 1 ? 'checked' : '' }}/>
</script>
<script src="<?= $this->config->item('base_url') ?>assets/layui/layui.all.js" charset="utf-8"></script>
<script src="<?= $this->config->item('base_url') ?>assets/js/erp/transport_provider.js" charset="utf-8"></script>
</body>
</html>