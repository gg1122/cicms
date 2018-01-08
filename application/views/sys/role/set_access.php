<ul id="accessList"></ul>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
    layui.use(['tree', 'layer'], function () {
        var layer = layui.layer
            , $ = layui.jquery;
        //生成一个模拟树
        var createTree = function (node, start) {
            node = node || function () {
                    var arr = [];
                    for (var i = 1; i < 10; i++) {
                        arr.push({
                            name: i.toString().replace(/(\d)/, '$1$1$1$1$1$1$1$1$1')
                        });
                    }
                    return arr;
                }();
            start = start || 1;
            layui.each(node, function (index, item) {
                if (start < 10 && index < 9) {
                    var child = [
                        {
                            name: (1 + index + start).toString().replace(/(\d)/, '$1$1$1$1$1$1$1$1$1')
                        }
                    ];
                    node[index].children = child;
                    createTree(child, index + start + 1);
                }
            });
            return node;
        };
        layui.tree({
            elem: '#accessList' //指定元素
            , nodes: createTree()
        });

    });
</script>