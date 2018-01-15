<?php echo form_open('sys/role/set_access', array('class' => 'accessList')); ?>
<input type="hidden" name="access" id="access"/>
<input type="hidden" name="role_id" value="<?= $role['role_id'] ?>"/>
<ul id="accessList" class="ztree"></ul>
<button lay-filter="edit" lay-submit style="display: none;"></button>
</form>
<link rel="stylesheet" href="<?= $this->config->item('base_url') ?>/assets/css/ztree.css" type="text/css">
<script type="text/javascript" src="<?= $this->config->item('base_url') ?>/assets/js/ztree/jquery.min.js"></script>
<script type="text/javascript"
        src="<?= $this->config->item('base_url') ?>/assets/js/ztree/jquery.ztree.core.js"></script>
<script type="text/javascript"
        src="<?= $this->config->item('base_url') ?>/assets/js/ztree/jquery.ztree.excheck.js"></script>
<script type="text/javascript"
        src="<?= $this->config->item('base_url') ?>/assets/js/ztree/jquery.ztree.exedit.js"></script>
<script type="text/javascript">
    <!--
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
        },
    };
    var zNodes = <?=$menu_tree?>;

    $(document).ready(function () {
        $.fn.zTree.init($("#accessList"), setting, zNodes);
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
            var zTree = $.fn.zTree.getZTreeObj("accessList");
            zTree.addNodes(treeNode, {id: (100 + newCount), pId: treeNode.id, name: "new node" + (newCount++)});
            return false;
        });
    };
    function removeHoverDom(treeId, treeNode) {
        $("#addBtn_" + treeNode.tId).unbind().remove();
    };

    function resetAccess() {
        var treeObj = $.fn.zTree.getZTreeObj("accessList"),
            nodes = treeObj.getCheckedNodes(true),
            v = "";
        var access_id = [];
        for (var i = 0; i < nodes.length; i++) {
            access_id.push(nodes[i].id);
        }
        $('#access').attr('value',access_id);
    }
    //-->
</script>

