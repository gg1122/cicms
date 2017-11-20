<link rel="stylesheet" href="<?= $this->config->item('base_url') ?>/assets/plugins/layui/css/layui.css" media="all"/>
<div class="admin-main">
    <blockquote class="layui-elem-quote">
        <a href="javascript:;" class="layui-btn layui-btn-small" id="menu_create">
            <i class="layui-icon">&#xe608;</i> 新增菜单
        </a>
        <a href="#" class="layui-btn layui-btn-small" id="import">
            <i class="layui-icon">&#xe608;</i> 导入信息
        </a>
        <a href="#" class="layui-btn layui-btn-small">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> 导出信息
        </a>
        <a href="#" class="layui-btn layui-btn-small" id="getSelected">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> 获取全选信息
        </a>
        <a href="javascript:;" class="layui-btn layui-btn-small" id="search">
            <i class="layui-icon">&#xe615;</i> 搜索
        </a>
    </blockquote>
    <fieldset class="layui-elem-field">
        <legend>菜单</legend>
        <div class="layui-field-box layui-form">
            <table class="layui-table admin-table">
                <thead>
                <tr>
                    <th style="width: 30px;"><input type="checkbox" lay-filter="allselector" lay-skin="primary"></th>
                    <th>菜单名称</th>
                    <th>访问URI</th>
                    <th>操作时间</th>
                    <th>菜单状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="content">
                </tbody>
            </table>
        </div>
    </fieldset>
    <div class="admin-table-page">
        <div id="paged" class="page">
        </div>
    </div>
</div>
<!--模板-->
<script type="text/html" id="tpl">
    {{# layui.each(d.list, function(index, item){ }}
    <tr>
        <td><input type="checkbox" lay-skin="primary"></td>
        <td>{{ item.menu_name }}</td>
        <td>{{ item.menu_uri }}</td>
        <td>{{ item.create_time }}</td>
        <td>
            <div class="layui-form-item">
                <label class="layui-form-label">开关</label>
                <div class="layui-input-block">
                    {{# if(item.menu_status == 1){ }}
                    <input type="checkbox" name="switch" lay-skin="switch" lay-text="ON|OFF" value="1" checked>
                    {{# }else{ }}
                    <input type="checkbox" name="switch" lay-skin="switch" lay-text="ON|OFF" value="0">
                    {{# } }}
                </div>
            </div>
        </td>
        <td>
            <a href="javascript:;" data-name="" data-opt="edit" data-id=""
               class="layui-btn layui-btn-mini menu_edit" id="menu_edit">编辑</a>
            <a href="javascript:;" data-id="1" data-opt="del"
               class="layui-btn layui-btn-danger layui-btn-mini menu_">删除</a>
        </td>
    </tr>
    {{# }); }}
</script>
<script type="text/javascript" src="<?= $this->config->item('base_url') ?>/assets/plugins/layui/layui.js"></script>
<script type="text/javascript" src="<?= $this->config->item('base_url') ?>/assets/js/sys/menu.js"></script>
