<link rel="stylesheet" href="<?= $this->config->item('base_url') ?>assets/css/layui.css" media="all">

<div style="margin: 15px;">
    <form method="post" action="/erp/pm/category/" class="categoryTree">
        <input type="hidden" name="category" id="category"/>
        <ul id="categoryTree" class="ztree"></ul>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="submit" class="layui-btn layui-btn-warm" value="保存">
            </div>
        </div>
    </form>
</div>
<link rel="stylesheet" href="<?= $this->config->item('base_url') ?>assets/css/ztree.css" type="text/css">
<script type="text/javascript" src="<?= $this->config->item('base_url') ?>assets/js/ztree/jquery.min.js"></script>
<script type="text/javascript"
        src="<?= $this->config->item('base_url') ?>assets/js/ztree/jquery.ztree.core.js"></script>
<script type="text/javascript"
        src="<?= $this->config->item('base_url') ?>assets/js/ztree/jquery.ztree.excheck.js"></script>
<script type="text/javascript"
        src="<?= $this->config->item('base_url') ?>assets/js/ztree/jquery.ztree.exedit.js"></script>
<script type="text/javascript">
    var setting = {
        view: {
            addHoverDom: addHoverDom,
            removeHoverDom: removeHoverDom,
            selectedMulti: true
        },
        check: {
            enable: true
        },
        data: {
            simpleData: {
                enable: true
            }
        },
        edit: {
            enable: true
        }
    };
    var zNodes = <?=$category_tree?>;

    $(document).ready(function () {
        $.fn.zTree.init($("#categoryTree"), setting, zNodes);
    });

    var newCount = 1;

    function addHoverDom(treeId, treeNode) {
        var sObj = $("#" + treeNode.tId + "_span");
        if (treeNode.editNameFlag || $("#addBtn_" + treeNode.tId).length > 0) return;
        var addStr = "<span class='button add' id='addBtn_" + treeNode.tId
            + "' title='add node' onfocus='this.blur();'></span>";
        sObj.after(addStr);
        var btn = $("#addBtn_" + treeNode.tId);
        if (btn) btn.bind("click", function () {
            var zTree = $.fn.zTree.getZTreeObj("categoryTree");
            zTree.addNodes(treeNode, {id: (100 + newCount), pId: treeNode.id, name: "new node" + (newCount++)});
            return false;
        });
    }

    function removeHoverDom(treeId, treeNode) {
        $("#addBtn_" + treeNode.tId).unbind().remove();
    }

    //拼接数据
    function resetTree() {
        var treeObj = $.fn.zTree.getZTreeObj("categoryTree"),
            nodes = treeObj.getCheckedNodes(true);
        var category_tree = [];
        for (var i = 0; i < nodes.length; i++) {
            var name = nodes[i].name;
            if (name.indexOf('::') != -1) {
                alert('分类名称不能含有分号::');
                return false;
            }
            if (nodes[i].parentTId != null) {
                var parentTId = nodes[i].parentTId.split('_')[1];
            } else {  //顶级分类
                var parentTId = 0;
            }
            //分类ID+分类树父级ID+分类名称+分类htmlID+分类层级
            var category = nodes[i].id + '::' + parentTId + '::' + nodes[i].name + '::' + nodes[i].tId + '::' + nodes[i].level;
            console.log(category);
            category_tree.push(category);
        }
        $('#category').attr('value', category_tree);
    }

    $(".categoryTree").submit(function () {
        resetTree();
        console.log($('#category').val());
        $('from').submit();
    });
</script>
